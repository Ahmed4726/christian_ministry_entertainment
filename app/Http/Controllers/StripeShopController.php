<?php
      
namespace App\Http\Controllers;
       
use App\Models\Cart;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Stripe;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Models\Transaction;
       
class StripeShopController extends Controller
{
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripe()
    {
        $user = auth()->user();
        $cart = Order::selectRaw('SUM(bill) as subtotal')
            ->where('user_id', $user->id)
            ->where('status', 'Unpaid')
            ->first();

        return view('stripe_shop', compact('cart'));
    }
      
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripePost(Request $request): RedirectResponse
{
    // Get the authenticated user
    $user = auth()->user();

    // Calculate the total amount to charge
    $cart = Order::selectRaw('SUM(bill) as subtotal')
        ->where('user_id', $user->id)
        ->where('status', 'Unpaid')
        ->first();

    $totalAmount = $cart->subtotal * 100; // Convert to cents

    // Split percentages
    $userShare = $totalAmount * 0.0005 ; // 5%
    $adminShare = $totalAmount * 0.0005; // 5%
    $vendorShare = $totalAmount * 0.009; // 90%

    // Create a Stripe Charge
    Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

    Stripe\Charge::create([
        "amount" => $totalAmount,
        "currency" => "usd",
        "source" => $request->stripeToken,
        "description" => "Payment Successful order placed."
    ]);

    Cart::where('user_id',$user->id)->where('status','Unpaid')->update(['status' => 'Paid']);
    // Update the order status to 'Paid'
    Order::where('user_id', $user->id)
        ->where('status', 'Unpaid')
        ->update(['status' => 'Paid']);

    // Create transactions for the splits
    Transaction::create([
        'user_id' => $user->id,
        'amount' => $userShare,
        'description' => '5% return to user'
    ]);

    Transaction::create([
        'user_id' => 1, // Assuming role_id == 1
        'amount' => $adminShare,
        'description' => '5% return to admin'
    ]);

    // Find the vendor using the referral code (replace 'referral_code' with your actual column name)
    $vendor = User::where('referral_code', $user->referral_code)->first();
    $member = User::where('role_id',$user->id)->first();
    $admin = User::where('role_id',1)->first();
    if ($vendor) {
        // Update the vendor's balance
        $vendor->balance += $vendorShare;
        $member->balance += $userShare;
        $admin->balance += $adminShare;
        $vendor->save();
        $member->save();
        $admin->save();
        // Create a transaction for the vendor
        Transaction::create([
            'user_id' => $vendor->id,
            'amount' => $vendorShare,
            'description' => 'Vendor referral bonus'
        ]);
    }

    return redirect()->route('shopping_mall')->with('success', 'Payment successful and order placed');
}
}
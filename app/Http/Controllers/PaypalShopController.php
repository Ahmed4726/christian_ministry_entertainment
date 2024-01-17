<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Srmklive\PayPal\Services\PayPal as PayPalClient;

class PaypalShopController extends Controller
{
    public function showPaypal()
    {
        $user = auth()->user();
        $cart = Order::selectRaw('SUM(bill) as subtotal')
            ->where('user_id', $user->id)
            ->where('status', 'Unpaid')
            ->first();

        return view('paypal_shop', compact('cart'));
    }

    public function handlePayment(Request $request)
    {
        $user = auth()->user();
        $cart = Order::selectRaw('SUM(bill) as subtotal')
            ->where('user_id', $user->id)
            ->where('status', 'Unpaid')
            ->first();

        if (!$cart) {
            return redirect()
                ->route('shop.show.paypal')
                ->with('error', 'Cart is empty or not found.');
        }

        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $paypalToken = $provider->getAccessToken();

        $response = $provider->createOrder([
            "intent" => "CAPTURE",
            "application_context" => [
                "return_url" => route('shop.success.payment'),
                "cancel_url" => route('shop.cancel.payment'),
            ],
            "purchase_units" => [
                0 => [
                    "amount" => [
                        "currency_code" => "USD",
                        "value" => $cart->subtotal,
                    ]
                ]
            ]
        ]);

        if (isset($response['id']) && $response['id'] != null) {
            foreach ($response['links'] as $links) {
                if ($links['rel'] == 'approve') {
                    // Store the payment information here if needed.
                    // ...
                    return redirect()->away($links['href']);
                }
            }

            return redirect()
                ->route('shop.cancel.payment')
                ->with('error', 'Something went wrong.');
        } else {
            return redirect()
                ->route('shop.show.paypal')
                ->with('error', $response['message'] ?? 'Something went wrong.');
        }
    }

    public function paymentSuccess(Request $request)
    {
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $provider->getAccessToken();
        $response = $provider->capturePaymentOrder($request->input('token'));

        if (isset($response['status']) && $response['status'] == 'COMPLETED') {
            Cart::where('user_id',auth()->user()->id)->where('status','Unpaid')->update(['status' => 'Paid']);
            Order::where('user_id', auth()->user()->id)
                ->where('status', 'Unpaid')
                ->update(['status' => 'Paid']);
            return redirect()
                ->route('checkout') // Change this route as needed
                ->with('success', 'Transaction complete.');
        } else {
            return redirect()
                ->route('shop.show.paypal')
                ->with('error', $response['message'] ?? 'Something went wrong.');
        }
    }
}

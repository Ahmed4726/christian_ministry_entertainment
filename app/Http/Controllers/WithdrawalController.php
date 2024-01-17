<?php

namespace App\Http\Controllers;

use App\Models\User;
use DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Stripe\Payout;
use Illuminate\Http\Request;
use Auth;
use Stripe\Stripe;

class WithdrawalController extends Controller
{
    public function showWithdrawalForm()
    {
        return view('withdrawals');
    }
    public function processWithdrawal(Request $request)
    {
        // dd($request);
        $selectedPaymentMethod = $request->input('payment_method');
        if ($selectedPaymentMethod == 'paypal'){
        $loguserid = auth()->user()->id;
        $user = User::where('id', $loguserid)->value('paypal_email');
        $withdrawalAmount = $request->input('amount');
        if($withdrawalAmount > auth()->user()->balance){
            return redirect()->route('withdrawal.form')->with('success',"Insufficient balance");
        }
        else{

        $paypalAccessToken = $this->getPayPalAccessToken();

        // Create a PayPal Payout
        try {
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $paypalAccessToken,
                'Content-Type' => 'application/json',
            ])->post('https://api.sandbox.paypal.com/v1/payments/payouts', [
                'sender_batch_header' => [
                    'recipient_type' => 'EMAIL',
                    'email_message' => 'You have received a payment',
                ],
                'items' => [
                    [
                        'recipient_type' => 'EMAIL',
                        'receiver' => $user, // User's PayPal email address
                        'amount' => [
                            'value' => $withdrawalAmount,
                            'currency' => 'USD', // Replace with the user's currency
                        ],
                    ],
                ],
            ]);
            // dd($response);
            if ($response->successful()) {
                // Payout was successful
                $user = auth()->user();
                $newBalance = $user->balance - $withdrawalAmount;
                $user->update(['balance' => $newBalance]);
                return redirect()->route('withdrawal.form')->with('success',"Payment sucessful");
            } else {
                // Handle payout failure
                return "Withdrawal failed.";
            }
        } catch (\Throwable $e) {
            // Handle exceptions
            return "An error occurred: " . $e->getMessage();
        }
    }
    }

    
    
    


       else if ($selectedPaymentMethod == 'stripe'){
        try {
            $logUserId = auth()->user()->id;
            $user = User::where('id', $logUserId)->value('stripe_ID');
            // dd($user);
            $withdrawalAmount = $request->input('amount');
            $stripeCustomerId = $user;
            // $stripeSecretKey = config('services.stripe.secret');

            Stripe::setApiKey(config("services.stripe.secret"));

            // Create a payout to the user's Stripe account
            Payout::create([
                "amount" => $withdrawalAmount * 100, // Amount in cents
                "currency" => "usd", // Replace with the user's currency
                "source" => $request->stripeToken,
                "destination" => $stripeCustomerId,
            ]);
    
            // Update the user's balance (assuming you have a 'balance' field in your users table)
            $user = auth()->user();
            $newBalance = $user->balance - $withdrawalAmount;
            
            // Use a database transaction to ensure both operations succeed or fail together
            DB::beginTransaction();
    
            try {
                $user->update(['balance' => $newBalance]);
                DB::commit();
                return "Withdrawal successful.";
            } catch (\Throwable $e) {
                DB::rollback();
                return "An error occurred while updating the user's balance.";
            }
        } catch (\Throwable $e) {
            // Handle exceptions
            return "An error occurred: " . $e->getMessage();
        }
    }

}
    private function getPayPalAccessToken()
    {
        $error = null;
        $clientId = env('PAYPAL_SANDBOX_CLIENT_ID');
        $clientSecret = env('PAYPAL_SANDBOX_CLIENT_SECRET');
        // dd($clientId);
        // dd(env('PAYPAL_SANDBOX_CLIENT_SECRET'));
        $response = Http::withBasicAuth($clientId, $clientSecret)
    ->asForm() // Specify that the request data should be sent as a form
    ->post('https://api.sandbox.paypal.com/v1/oauth2/token', [
        'grant_type' => 'client_credentials',
    ]);

            // dPAYPAL_SANDBOX_CLIENT_ID
        if ($response->successful()) {
            // dd($response);
            $accessToken = $response->json('access_token');
            // dd($accessToken);
            return $accessToken;
        } else {
            Log::error('PayPal API Error: ' . json_encode($error));
            // Handle token request failure
            throw new \Exception('Failed to obtain PayPal access token.');
        }
    }
}
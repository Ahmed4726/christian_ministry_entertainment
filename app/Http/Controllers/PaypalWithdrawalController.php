<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PayPalHttp\HttpClient;
use PayPalCheckoutSdk\Payouts\PayoutsPostRequest;
use Srmklive\PayPal\Services\PayPal as PayPalClient;

use Auth;

class PaypalWithdrawalController extends Controller
{
    public function showWithdrawalForm()
    {
        return view('withdrawals');
    }

    public function processWithdrawal(Request $request)
    {
        $user = auth()->user()->id;
        $withdrawalAmount = $request->input('amount');
            // ... (previous code)

    // Get the user's PayPal email address
    $paypalEmail = $user->paypal_email; // Replace with the actual field name

    // Initiate the PayPal Payout
    $payoutRequest = new PayoutsPostRequest();
    $payoutRequest->body = [
        "sender_batch_header" => [
            "sender_batch_id" => uniqid(),
            "email_subject" => "Withdrawal from your account",
        ],
        "items" => [
            [
                "recipient_type" => "EMAIL",
                "receiver" => $paypalEmail,
                "amount" => [
                    "value" => $withdrawalAmount,
                    "currency" => "USD", // Replace with the user's currency
                ],
            ],
        ],
    ];

    try {
        $response = PayPalClient::client()->execute($payoutRequest);

        // Handle the PayPal payout response here

        // Record the withdrawal in your database (e.g., Withdrawal::create([...]))
        // ...
        $user->balance -= $withdrawalAmount;
        $user->save();

        return redirect()->route('withdrawals')->with('success', 'Withdrawal successful.');
    } catch (\Throwable $e) {
        // Handle the error (e.g., log it, show an error message)
        return redirect()->route('withdrawals')->with('error', 'Withdrawal failed.');
    }

        // Validate the withdrawal amount

        // Update user's balance (assuming you have a balance field in the users table)
        

        // Record the withdrawal in your database
        // Withdrawal::create([...]);
    }
}
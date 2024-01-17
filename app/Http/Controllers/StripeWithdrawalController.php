<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Transfer;
class StripeWithdrawalController extends Controller
{
    public function showWithdrawalForm()
    {
        return view('withdrawals');
    }

    public function processWithdrawal(Request $request)
    {
        $user = auth()->user()->id;
        $withdrawalAmount = $request->input('amount');
     // Get the user's Stripe account ID from the database
     $stripeAccountId = $user->stripe_ID; // Replace with the actual field name

     // Set your Stripe API key
     Stripe::setApiKey(config('STRIPE_SECRET'));
 
     // Create a transfer to the user's Stripe account
     try {
         Transfer::create([
             "amount" => $withdrawalAmount * 100, // Amount in cents
             "currency" => "usd", // Replace with the user's currency
             "destination" => $stripeAccountId,
         ]);
 
         // Record the withdrawal in your database (e.g., Withdrawal::create([...]))
         // ...
         $user->balance -= $withdrawalAmount;
         $user->save();
 
         return redirect()->route('withdrawals')->with('success', 'Withdrawal successful.');
     } catch (\Throwable $e) {
         // Handle the error (e.g., log it, show an error message)
         return redirect()->route('withdrawals')->with('error', 'Withdrawal failed.');
     }
}
}
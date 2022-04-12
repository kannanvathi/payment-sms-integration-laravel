<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe;


class StripeController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function stripe()
    {
        return view('stripe');
    }

    public function stripePost(Request $request)
    {
        /*Stripe\Stripe::setApiKey(config('sms.STRIPE_SECRET'));
        Stripe\Charge::create ([
                "amount" => 100*100,
                "currency" => "INR",
                "source" => $request->stripeToken,
                "description" => "This is test payment",
        ]);*/

        \Stripe\Stripe::setApiKey(config('sms.STRIPE_SECRET'));

        \Stripe\PaymentIntent::create([
        'amount' => 1099,
        'currency' => 'inr',
        'payment_method_types' => ['card'],
        ]);
   
        
           
        return back()->with('success', 'Payment successed');
    }
}


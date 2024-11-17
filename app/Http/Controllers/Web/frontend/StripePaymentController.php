<?php

namespace App\Http\Controllers\Web\frontend;

use App\Http\Controllers\Controller;
use App\Models\UserWallet;
use Illuminate\Http\Request;
use Session;
use Stripe;


class StripePaymentController extends Controller
{
    public function openStripePayment(){
        return view('frontend.layouts.payment.stripe');
    }

    public function stripePayment(Request $request){

        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        Stripe\Charge::create ([

                "amount" => $request->recharge_amount,
                "currency" => "usd",
                "source" => $request->stripeToken,
        ]);

        Session::flash('success', 'Payment successful!');

        $user_id = auth()->user()->id;
        $exist = UserWallet::where('user_id', $user_id)->first();

        if($exist){
            $exist->balance = $exist->balance + $request->recharge_amount;
            $exist->save();
        }else{
            $wallet = new UserWallet();
            $wallet->user_id = $user_id;
            $wallet->balance = $request->recharge_amount;
            $wallet->save();
        }


        return redirect()->route('home');
    }
}

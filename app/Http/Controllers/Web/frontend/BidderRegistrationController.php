<?php

namespace App\Http\Controllers\Web\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BidderRegistration;
class BidderRegistrationController extends Controller
{
    public function bidderRegistration(Request $request) {

        $request->validate([
            'curency' => 'required',
            'bit_amount' => 'required',
            'buyer_fee' => 'required',
        ]);



        $bidderRegistration = new BidderRegistration();
        $bidderRegistration->user_id = auth()->user()->id;
        $bidderRegistration->car_id = $request->car_id;

        $bidderRegistration->phone_number = $request->phone_number;

        $bidderRegistration->curency = $request->curency;
        $bidderRegistration->bit_amount = $request->bit_amount;
        $bidderRegistration->buyer_fee = $request->buyer_fee;
        $bidderRegistration->save();

        return response()->json([
            'status' => true,
            'message' => 'Bidder Registration Successful'
        ]);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BidderRegistration extends Model
{
       // "card_name" => null
            // "card_number" => null
            // "expiration" => null
            // "cvc" => null
            // "country_code" => "US/CA"
            // "phone_number" => null
            // "curency" => "USD"
            // "bit_amount" => "3000"
            // "buyer_fee" => "60"

    protected $fillable = [
        'user_id',
        'card_name',
        'card_number',
        'phone_number',
        'cvc',
        'country_code',
        'expiration',
        'curency',
        'bit_amount',
        'buyer_fee',
    ];
    
}

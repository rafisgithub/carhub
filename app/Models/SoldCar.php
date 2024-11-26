<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SoldCar extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'car_id',
        'buyer_id',
        'seller_id',
    ];
}

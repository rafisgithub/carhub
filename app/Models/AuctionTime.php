<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AuctionTime extends Model
{
    protected $fillable = [
        'car_id',
        'start_time',
        'end_time',
    ];
  

    protected $casts = [
        'start_time' => 'datetime',
        'end_time' => 'datetime',
    ];


}

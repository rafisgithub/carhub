<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{


    public function user()
    {
        return $this->belongsTo(related: User::class);
    }

    public function auctionTime()
    {
        return $this->hasOne(AuctionTime::class);
    }

    public function carCategory()
    {
        return $this->belongsTo(CarCategory::class);
    }

    public function carTransmission()
    {
        return $this->belongsTo(CarTransmission::class);
    }


}

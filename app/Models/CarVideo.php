<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CarVideo extends Model
{
    protected $fillable = [
        'car_id',
        'video',
    ];

    public function car()
    {
        return $this->belongsTo(Car::class);
    }
}

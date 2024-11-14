<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CarTransmission extends Model
{
    protected $fillable = ['transmission_type'];

    public function car()
    {
        return $this->hasMany(Car::class);
    }
}

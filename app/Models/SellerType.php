<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SellerType extends Model
{

    protected $fillable = [
        'seller_type',
    ];

    public $timestamps = false;

    public function cars()
    {
        return $this->hasMany(Car::class);
    }
}

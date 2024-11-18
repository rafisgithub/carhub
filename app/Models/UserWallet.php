<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserWallet extends Model
{
    protected $fillable = [
        'user_id',
        'balance',
        'stripeToken',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

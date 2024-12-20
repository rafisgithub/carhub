<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserPublicInformation extends Model
{
    protected $fillable = ['user_id', 'image','full_name','contact_number','address','biography'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

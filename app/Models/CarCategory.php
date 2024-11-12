<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CarCategory extends Model
{
    protected $fillable = ['category'];

    protected function casts(): array
    {
        return [
            'category' => 'string',
        ];
    }

}



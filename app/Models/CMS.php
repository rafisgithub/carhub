<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CMS extends Model
{

    protected $fillable = ['title','sub_title', 'content', 'image','url','banner'];
}

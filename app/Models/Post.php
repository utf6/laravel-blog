<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Post extends Authenticatable
{
    //
    protected $fillable = [
        'title', 'content', 'status', 'picture'
    ];
}

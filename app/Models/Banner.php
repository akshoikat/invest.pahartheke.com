<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $fillable = ['title', 'points', 'button_text'];

    protected $casts = [
        'points' => 'array',
    ];
}

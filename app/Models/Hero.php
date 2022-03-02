<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hero extends Model
{
    use HasFactory;

    // Tala om vad en post kan innehålla
    protected $fillable = [
        'name',
    ];

    // flera användare kan ha flera favorithjältar
    // public function user()
    // {
    //     return $this->belongsToMany(User::class);
    // }

    // public function posts()
    // {
    //     return $this->belongsToMany(User::class);
    // }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // Tala om vad en post kan innehålla
    protected $fillable = [
        'title',
        'content',
    ];

    // returnerna en post baserat på användar-ID

    public function user()
    {
        return $this->belongsTo(User::class);

    }
}

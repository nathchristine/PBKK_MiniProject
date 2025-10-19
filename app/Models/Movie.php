<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    /** @use HasFactory<\Database\Factories\MovieFactory> */
    use HasFactory;

    protected $fillable = [
        'title',
        'rating',
        'review',
        'cover',
        'genre_id',
    ];

    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }
}

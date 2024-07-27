<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'poster',
        'intro',
        'release_date',
        'genre_id',
    ];

    /**
     * Get the genre associated with the movie.
     */
    public function genre()
    {
        return $this->belongsTo(Gene::class, 'genre_id');
    }
}

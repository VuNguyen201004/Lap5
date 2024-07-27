<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gene extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
    ];

    /**
     * Get the movies associated with the genre.
     */
    public function movies()
    {
        return $this->hasMany(Movie::class, 'genre_id');
    }
}

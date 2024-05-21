<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Movie extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'moviedb_id', 
        'backdrop_path', 
        'original_title', 
        'overview', 
        'poster_path', 
        'adult', 
        'title', 
        'original_language', 
        'popularity', 
        'release_date', 
        'video', 
        'vote_average', 
        'vote_count'
    ];

    /**
     * many to many between movie and genre
     */
    public function genres(): BelongsToMany
    {
        return $this->belongsToMany(Genre::class, 'movie_genre');
    }
}

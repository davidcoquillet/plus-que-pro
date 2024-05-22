<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use DateTime;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property int $moviedb_id
 * @property string $backdrop_path
 * @property string $original_title
 * @property text $overview
 * @property string $poster_path
 * @property bool $adult
 * @property string $title
 * @property string $original_language
 * @property float $popularity
 * @property DateTime $release_date
 * @property bool $video
 * @property float $vote_average
 * @property float $vote_count
 */
class Movie extends Model
{
    use SoftDeletes;

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

    protected function releaseDate(): Attribute
    {
        return Attribute::make(
            get: fn ($releaseDate) => Carbon::parse($releaseDate)->format('Y'),
        );
    }

    /**
     * many to many between movie and genre
     */
    public function genres(): BelongsToMany
    {
        return $this->belongsToMany(Genre::class, 'movie_genre');
    }
}

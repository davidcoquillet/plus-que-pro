<?php 

namespace App\Repositories;

use App\Models\Genre;
use App\Models\Movie;

class MovieRepository 
{
    /**
     * @param array $movies
     */
    public function saveMovies(array $movies)
    {
        $moviesWithoutGenre = array_map(function ($movie) {
            $movie['moviedb_id'] = $movie['id'];

            unset($movie['id']);
            unset($movie['genre_ids']);
            unset($movie['media_type']);
            
            return $movie;
        }, $movies);

        Movie::upsert($moviesWithoutGenre, ['moviedb_id'], ['popularity']);
    }

    /**
     * @param array $movies
     */
    public function syncMovies(array $movies)
    {
        $moviesGenreOnly = array_map(fn($movie) => $movie['genre_ids'], $movies);

        foreach($movies as $movieData) {
            /** @var Movie $movie */
            $movie = Movie::where('moviedb_id', $movieData['id'])->first();

            /** @var Genre $genre */
            $genres = Genre::whereIn('moviedb_id', $movieData['genre_ids'])->get();

            $movie->genres()->sync($genres);
        }
    }
}
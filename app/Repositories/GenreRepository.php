<?php 

namespace App\Repositories;

use App\Models\Genre;

class GenreRepository 
{
    /**
     * @param array $genres
     */
    public function saveGenres(array $genres)
    {
        $genres = array_map(function ($genre) {
            $genre['moviedb_id'] = $genre['id'];
            unset($genre['id']);

            return $genre;
        }, $genres);

        Genre::upsert($genres, ['moviedb_id']);
    }
}
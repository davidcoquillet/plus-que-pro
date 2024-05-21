<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Support\Facades\Cache;

class MovieController extends Controller
{
    public function getTrendingMovies()
    {
        $movies = Cache::remember('getAllMovies', config('cache.ttl.getAllMovies'), function () {
            return Movie::all();
        });

        return view('movies.trending', compact('movies'));
    }

    public function getMovieDetails(Movie $movie)
    {
        return view('movies.detail', compact('movie'));
    }
}

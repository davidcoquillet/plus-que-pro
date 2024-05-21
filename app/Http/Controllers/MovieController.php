<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function getTrendingMovies()
    {
        $movies = Movie::all();

        return view('movies.trending', compact('movies'));
    }
}

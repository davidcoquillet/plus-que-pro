<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditMovieRequest;
use App\Models\Movie;
use Illuminate\Http\Request;
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

    public function getMovieEditMode(Movie $movie)
    {
        return view('movies.editMode', compact('movie'));
    }

    public function editMovie(EditMovieRequest $request, Movie $movie)
    {
        $fieldsToUpdate = $request->all();

        if(empty($fieldsToUpdate)) {
            return true;
        }

        foreach($fieldsToUpdate as $field => $value) {
            if(!$movie->hasAttribute($field)) {
                continue;
            }

            $movie->$field = $value;
        }
        
        $movie->save();
        
        Cache::forget('getAllMovies');

        return redirect()->route('trendingMovies');
    }

    public function deleteMovie(Movie $movie)
    {
        //only soft delete

        //in a real context we should make sure the person 
        //that is calling for the delete has the right permissions to be able to do so

        
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditMovieRequest;
use App\Models\Movie;
use App\Repositories\MovieRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class MovieController extends Controller
{
    public function getTrendingMovies()
    {
        $movies = Cache::remember('getAllMovies', config('cache.ttl.getAllMovies'), function () {
            return Movie::orderBy('vote_average', 'desc')->get();
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

        //eventhough we are protected with the middleware, in a real context we should make sure the person 
        //that is calling for the delete has the right permissions to be able to do so (only an admin ?)
        
        $movie->delete();

        Cache::forget('getAllMovies');

        return redirect()->route('trendingMovies');
    }

    public function search(Request $request)
    {
        $query = $request->get('query');
        /** @var MovieRepository $movieRepository */
        $movieRepository = resolve(MovieRepository::class);
        $movies = $movieRepository->searchMovie($query);

        $html = view('movies.partials.movieSearch', compact('movies'))->render();

        return response()->json($html);
    }

    /**
     * LOB no need to create a new Controller for this function
     */
    public function resetTests()
    {
        DB::table('movies')->truncate();
        DB::table('genres')->truncate();
        DB::table('movie_genre')->truncate();

        Artisan::call('app:init-movies');

        Cache::forget('getAllMovies');

        return redirect()->route('trendingMovies');
    }
}

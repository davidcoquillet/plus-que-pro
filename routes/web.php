<?php

use App\Http\Controllers\MovieController;
use Illuminate\Support\Facades\Route;

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () { return view('dashboard'); })->name('dashboard');
    Route::get('/', [MovieController::class, 'getTrendingMovies'])->name('trendingMovies');
    Route::get('/movie/{movie}', [MovieController::class, 'getMovieDetails'])->name('movie');
    Route::get('/movie/editMode/{movie}', [MovieController::class, 'getMovieEditMode'])->name('movieEditMode');
    Route::post('/movie/edit/{movie}', [MovieController::class, 'editMovie'])->name('editMovie');
    Route::get('/movie/delete/{movie}', [MovieController::class, 'deleteMovie'])->name('deleteMovie');
    Route::post('/movie/search', [MovieController::class, 'search'])->name('searchMovie');
    Route::get('/resetTests', [MovieController::class, 'resetTests'])->name('resetTests');
});

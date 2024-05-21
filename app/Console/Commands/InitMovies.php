<?php

namespace App\Console\Commands;

use App\Repositories\GenreRepository;
use App\Repositories\MovieRepository;
use Exception;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;

class InitMovies extends Command
{
    private $movieRepository;
    private $genreRepository;

    public function __construct(MovieRepository $movieRepository, GenreRepository $genreRepository)
    {
        $this->movieRepository = $movieRepository;
        $this->genreRepository = $genreRepository;

        parent::__construct();
    }
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:init-movies';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command to init the movie list on the first execution of the project';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        try {
            DB::transaction(function () {
                $movies = $this->fetchMovies();
                $genres = $this->fetchGenres();

                $this->movieRepository->saveMovies($movies);
                $this->genreRepository->saveGenres($genres);
                $this->movieRepository->syncMovies($movies);

                return true;
            });
        } catch (\Exception $e) {
            $errorMessage = sprintf('Migration failed : %s', $e->getMessage());
            Log::error($errorMessage);
            $this->error($errorMessage);
            
            return false;
        }

        return true;
    }

    /**
     * @return array
     */
    private function fetchMovies(): array
    {
        $response = Http::withToken(config('movies.api_key'))->acceptJson()->get('https://api.themoviedb.org/3/trending/movie/day');
        return json_decode($response->getBody()->getContents(), true)['results'];
    }

    /**
     * @return array
     */
    private function fetchGenres(): array
    {
        $response = Http::withToken(config('movies.api_key'))->acceptJson()->get('https://api.themoviedb.org/3/genre/movie/list');
        return json_decode($response->getBody()->getContents(), true)['genres'];
    }
}

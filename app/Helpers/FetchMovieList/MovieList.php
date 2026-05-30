<?php

namespace App\Helpers\FetchMovieList;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class MovieList
{
    public function loadMovies(int $page = 1): array
    {
        // caching the page for perfomamnce
        return Cache::remember("movies_page_{$page}", 3600, function () use ($page) {
            return $this->fetchMovies($page);
        });
    }

    /**
     * Internal logic to fetch from TMDB API
     */
    private function fetchMovies(int $page): array
    {
        try {
            $response = Http::timeout(5)->get('https://api.themoviedb.org/3/movie/popular', 
            [
                'api_key' => env('MOVIE_API_KEY'),
                'page'    => $page,
                'language'=> 'en-US'
            ]);

            if ($response->successful()) {
                return $response->json();
            }

            Log::error('TMDB API Error: '. $response->body());
            return ['results' => []];

        } catch (\Exception $e){
            Log::error('Connection To Api Error: '. $e->getMessage());
            return ['results' => []];
        }
    }
}
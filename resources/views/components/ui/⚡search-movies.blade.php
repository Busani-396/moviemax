<?php

use Livewire\Component;
use Illuminate\Support\Facades\Http;

new class extends Component
{
    public $query = '';
    public $results = [];

    public function updatedQuery()
    {
        if (strlen($this->query) < 2) {
            $this->results = [];
            return;
        }
        

        $response = Http::get('https://api.themoviedb.org/3/search/movie', [
            'api_key' => env('MOVIE_API_KEY'),
            'query'   => $this->query,
            'include_adult' => 'false'
        ]);

        $this->results = $response->json()['results'] ?? [];
    }

    public function selectMovie($movie)
    {
        $this->results = [];
        $this->query = ''; 
        $this->dispatch('open-movie-details', movieData: $movie);
    }
};
?>

<div class="relative max-w-md mx-auto">
    <input type="text" 
           wire:model.live.debounce.300ms="query" 
           placeholder="Search for a movie..." 
           class="w-full bg-gray-800 text-white p-3 rounded-lg border border-gray-700 focus:outline-none focus:border-red-500">

    @if(!empty($results))
        <div class="absolute z-50 w-full bg-gray-900 mt-2 rounded-lg shadow-xl border border-gray-700 overflow-hidden">
            @foreach($results as $movie)
                <div class="p-3 hover:bg-gray-800 cursor-pointer flex items-center gap-3"
                     wire:click="selectMovie({{ json_encode($movie) }})">
                    
                    @if($movie['poster_path'])
                        <img src="https://image.tmdb.org/t/p/w92{{ $movie['poster_path'] }}" class="w-10 h-14 object-cover">
                    @endif
                    
                    <div>
                        <p class="text-white text-sm font-semibold">{{ $movie['title'] }}</p>
                        <p class="text-gray-500 text-xs">{{ $movie['release_date'] ?? 'N/A' }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
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
    <div class="relative group">
        <input type="text" 
               wire:model.live.debounce.300ms="query" 
               placeholder="Search movies, series..." 
               class="w-full bg-black/40 text-white pl-12 pr-4 py-4 rounded-xl border border-gray-700 
                      focus:border-red-600 focus:ring-2 focus:ring-red-600/20 outline-none 
                      transition-all duration-300 placeholder-gray-500 shadow-inner">
        
        <svg class="w-6 h-6 absolute left-4 top-3.5 text-gray-500 group-focus-within:text-red-500 transition-colors" 
             fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
        </svg>
    </div>

    @if(!empty($results))
        <div class="absolute z-50 w-full mt-2 bg-[#121212] rounded-xl shadow-2xl border border-gray-800 overflow-hidden ring-1 ring-white/5">
            <div class="max-h-96 overflow-y-auto scrollbar-thin scrollbar-thumb-gray-700">
                @foreach($results as $movie)
                    <div class="group p-3 hover:bg-white/5 cursor-pointer flex items-center gap-4 transition-all duration-200 border-b border-white/5 last:border-0"
                         wire:click="selectMovie({{ json_encode($movie) }})">
                        
                        <div class="w-12 h-18 rounded overflow-hidden shadow-lg flex-shrink-0 bg-gray-800">
                            @if($movie['poster_path'])
                                <img src="https://image.tmdb.org/t/p/w92{{ $movie['poster_path'] }}" 
                                     class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                            @else
                                <div class="w-full h-full flex items-center justify-center text-[10px] text-gray-600">N/A</div>
                            @endif
                        </div>
                        
                        <div class="flex-col overflow-hidden">
                            <p class="text-white font-medium truncate group-hover:text-red-500 transition-colors">{{ $movie['title'] }}</p>
                            <p class="text-gray-500 text-xs">{{ \Carbon\Carbon::parse($movie['release_date'] ?? '')->format('Y') }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="bg-black/20 px-4 py-2 text-[10px] text-gray-600 uppercase tracking-widest text-center">
                Powered by TMDB
            </div>
        </div>
    @endif
</div>
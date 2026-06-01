<?php

use Livewire\Component;

new class extends Component
{
    public array $movie;

    public function mount(array $movie)
    {
        $this->movie = $movie;
    }
};
?>

<div  class="bg-gray-900 rounded-lg shadow-md overflow-hidden transition hover:scale-105 duration-300">
    <img wire:click="$dispatch('open-movie-details', { movieData: {{ json_encode($movie) }} })" src="https://image.tmdb.org/t/p/w500{{ $movie['poster_path'] }}" 
         alt="{{ $movie['title'] }}" 
         class="w-full h-80 object-cover cursor-pointer hover:opacity-70 transition duration-200">
    
    <div class="p-4">
        <h2 class="text-lg font-bold text-white truncate" title="{{ $movie['title'] }}">
            {{ $movie['title'] }}
        </h2>
        <p class="text-sm text-gray-400 mb-4">Released: {{ $movie['release_date'] }}</p>

        <livewire:ui.add-movie-to-favs :movie_id="$movie['id']" :movie_title="$movie['title']" :key="$movie['id']"/>
    </div>
</div>
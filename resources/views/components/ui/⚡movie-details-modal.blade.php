<?php

use Livewire\Component;
use Livewire\Attributes\On; 

new class extends Component
{
    public $showModal = false;
    public $movie;

    #[On('open-movie-details')]
    public function openModal($movieData) 
    {
        \Illuminate\Support\Facades\Log::info('Modal event received!');
        $this->movie = $movieData;
        $this->showModal = true;
    }

    public function closeModal()
    {
        $this->showModal = false;
    }
};
?>

<div>
    @if($showModal)
        <div class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black bg-opacity-90">
            <div class="bg-gray-900 rounded-lg max-w-2xl w-full text-white shadow-2xl overflow-hidden relative">
                
                <div class="relative h-64 w-full">
                    <img src="https://image.tmdb.org/t/p/original{{ $movie['backdrop_path'] }}" 
                         alt="{{ $movie['title'] }}"
                         class="w-full h-full object-cover opacity-60">
                    <div class="absolute inset-0 bg-gradient-to-t from-gray-900 to-transparent"></div>
                </div>

                <div class="p-8 -mt-20 relative">
                    <div class="flex items-end gap-6">
                        <img src="https://image.tmdb.org/t/p/w500{{ $movie['poster_path'] }}" 
                             alt="{{ $movie['title'] }}"
                             class="w-32 rounded-lg shadow-lg border-2 border-gray-800">
                        
                        <h2 class="text-3xl font-bold mb-2">{{ $movie['title'] }}</h2>
                    </div>

                    <p class="text-gray-300 mt-6 leading-relaxed">
                        {{ $movie['overview'] ?? 'No description available.' }}
                    </p>

                    <div class="mt-8 flex justify-end">
                        <button wire:click="closeModal" class="bg-red-600 px-6 py-2 rounded font-semibold hover:bg-red-700 transition">
                            Close
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
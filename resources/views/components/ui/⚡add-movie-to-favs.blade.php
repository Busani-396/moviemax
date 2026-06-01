<?php

use Livewire\Component;
use App\Services\Movies\FavouritesList\FavouriteList;
use App\Models\Favourites;
use Illuminate\Support\Facades\Log;

new class extends Component {

    public int $movie_id;
    public string $movie_title;
    public bool $isAdded;
    public ?string $authMessage = null; 

    public function mount(int $movie_id, string $movie_title)
    {
        $this->movie_id = $movie_id;
        $this->movie_title = $movie_title;
        $this->isAdded = false;
        $this->isAdded = auth()->check() && Favourites::where('user_id', auth()->id())
        ->where('movie_id', $this->movie_id)
        ->exists();
    }

    public function save(FavouriteList $service)
    {
        try{
            if (!auth()->check()) {
                $this->authMessage = "Please log in to save to you favourites";
                return;
            }
            $validated = $this->validate([
                'movie_id' => 'required|integer',
                'movie_title' => 'required|string|max:255',
            ]);

            $data = [
                'movie_id'=> $validated['movie_id'],
                'title'=> $validated['movie_title'],
            ];

            if($service->addToFavsList($data)){
                $this->isAdded = true;
            }

        }catch(\Exception $e){
            Log::error('Favourites error: ' . $e->getMessage());
            $this->authMessage = "An error occurred. Please try again.";
        }
    }
};
?>

<div>
    @if($isAdded)
        <button disabled class="w-full bg-green-600 text-white py-2 rounded opacity-75">
            Added to Favourites!
        </button>
    @else
        <button wire:click="save" class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700 transition">
            Add to Favourites
        </button>
    @endif
    @if($authMessage)
        <p class="text-red-500 text-sm mt-2 text-center animate-pulse">
            {{ $authMessage }}
        </p>
    @endif
</div>
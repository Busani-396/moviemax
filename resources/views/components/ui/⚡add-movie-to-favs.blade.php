<?php

use Livewire\Component;
use App\Services\Movies\FavouritesList\FavouriteList;

new class extends Component {

    public int $movie_id;
    public string $movie_title;
    public bool $isAdded;

    public function mount(int $movie_id, string $movie_title)
    {
        $this->movie_id = $movie_id;
        $this->movie_title = $movie_title;
        $this->isAdded = false;
    }

    public function save(FavouriteList $service)
    {
        try{
            $validated = $this->validate([
                'movie_id' => 'required|integer',
                'movie_title' => 'required|string|max:255',
            ]);

            $data = [
                'movie_id'=> $validated['movie_id'],
                'movie_title'=> $validated['movie_title'],
            ];

            if ($service->addToFavsList($data)){
                $this->isAdded = true;
            }

        }catch(\Exception $e){
            var_dump('Too many problem here ' . __FILE__ . ' on line ' . __LINE__ . $e->getMessage()); exit;
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
</div>
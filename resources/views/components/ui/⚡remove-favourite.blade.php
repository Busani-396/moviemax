<?php

use Livewire\Component;
use App\Models\Favourites;

new class extends Component
{

    public Favourites $favourite;

    public function refreshMe()
    {
    }

    public function remove()
    {
        $this->favourite->delete();
        $this->js("window.location.reload()");
    }
};
?>

<button wire:click="remove" 
        wire:confirm="Are you sure you want to remove this from your favourites?"
        class="mt-4 text-red-500 hover:text-red-400 text-sm font-semibold transition">
    Remove from Favourites
</button>
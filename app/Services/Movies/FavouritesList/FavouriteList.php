<?php

namespace App\Services\Movies\FavouritesList;

use App\Models\Favourites;
use Illuminate\Support\Facades\Auth;

class FavouriteList
{
    private int $user_id;

    public function __construct()
    {
        $this->user_id = Auth::id() ?? throw new \Exception("User Not Authenticated");
    }

    public function addToFavsList(array $data): bool
    {
        $data['user_id'] = $this->user_id;

        if (!$this->alreadyAddedOnFavsList($data['movie_id'])){
            return (bool) Favourites::create($data);
        }

        return false;
    }

    public function alreadyAddedOnFavsList(int $movie_id): bool
    {
        return Favourites::where('movie_id', $movie_id)
            ->where('user_id', $this->user_id)
            ->exists();
    }

    public function showUserFavList()
    {
        return Favourites::where('user_id', $this->user_id)->get();
    }
}
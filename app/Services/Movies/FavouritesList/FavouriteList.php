<?php

namespace App\Services\Movies\FavouritesList;

use App\Models\Favourites;
use Illuminate\Support\Facades\Auth;

class FavouriteList
{
    private int $user_id;

    public function getAuthUserId(): int
    {
        return Auth::id() ?? throw new \Exception("User Not Authenticated");
    }

    public function addToFavsList(array $data): bool
    {
        $userId = $this->getAuthUserId();
        $data['user_id'] = $userId;

        //dd($data);

       if(!$this->alreadyAddedOnFavsList($data['movie_id'], $userId)){
            return (bool) Favourites::create($data);
        }

        return false;
    }

    public function alreadyAddedOnFavsList(int $movie_id, int $userId): bool
    {
        $userId = $userId ?? $this->getAuthUserId();
        return Favourites::where('movie_id', $movie_id)
            ->where('user_id', $userId)
            ->exists();
    }

    public function showUserFavList()
    {
        return Favourites::where('user_id', $this->getAuthUserId())->get();
    }
}
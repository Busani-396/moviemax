<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class FavouriteController extends Controller
{
    public function index()
    {
        $favourites = Auth::user()->favourites()->latest()->get();

        return view('movies.favourites', compact('favourites'));
    }
}

<?php

use App\Http\Controllers\HomeMoviesController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/movies', [HomeMoviesController::class, 'index']);

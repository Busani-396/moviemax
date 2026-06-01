<?php

use App\Http\Controllers\HomeMoviesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\FavouriteController;

Route::get('/', function () {
    return view('movies.index');
});


Route::get('/', [HomeMoviesController::class, 'index']);

Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'create'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');


Route::get('/favourites', [FavouriteController::class, 'index'])
    ->middleware('auth')
    ->name('favourites');

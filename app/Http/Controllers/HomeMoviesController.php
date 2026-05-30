<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\FetchMovieList\MovieList;

class HomeMoviesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $page = $request->query('page', 1);
        $movieHelper = new MovieList();
        $data = $movieHelper->loadMovies($page);
        
        $movies = array_slice($data['results'] ?? [], 0, 9);

        //dd($movies); exit;
        
        return view('movies.index',[
            'movies' => $movies,
            'currentPage' => $page
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

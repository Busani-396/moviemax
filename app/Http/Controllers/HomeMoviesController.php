<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\FetchMovieList\MovieList;
use Illuminate\Pagination\LengthAwarePaginator;

class HomeMoviesController extends Controller
{
    protected $movieHelper;

    public function __construct(MovieList $movieHelper)
    {
        $this->movieHelper = $movieHelper;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $page = $request->query('page', 1);
        $data = $this->movieHelper->loadMovies($page);
        $results = $data['results'] ?? [];
        
        $movieCollection = collect($results);
        
        $perPage = 9;
        $maxTotalMovies = 45; 
        //4 movie, 5pages
        $movies = new LengthAwarePaginator(
            $movieCollection->take($perPage), 
            $maxTotalMovies, 
            $perPage, 
            $page,
            ['path' => $request->url(), 'query' => $request->query()]
        );
        
        return view('movies.index', ['movies' => $movies]);
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

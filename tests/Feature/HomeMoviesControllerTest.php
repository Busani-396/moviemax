<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\Http;
use PHPUnit\Framework\Attributes\Test; // Import the attribute
use Tests\TestCase;

class HomeMoviesControllerTest extends TestCase
{
    #[Test] 
    public function it_loads_the_home_page_successfully()
    {
        Http::fake([
            'api.themoviedb.org/*' => Http::response([
                'results' => array_fill(0, 9, [
                    'id' => 1, 
                    'title' => 'Test Movie',
                    'poster_path' => '/test.jpg', 
                    'release_date' => '2026-01-01'
                ]),
                'total_results' => 45
            ], 200),
        ]);

        $response = $this->get('/');

        // 3. Assertions
        $response->assertStatus(200);
        $response->assertViewHas('movies');
    }
}
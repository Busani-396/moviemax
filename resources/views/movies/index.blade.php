<x-layouts.app>
    <main class="container mx-auto px-4 py-8 bg-black min-h-screen">
        
        <h1 class="text-3xl font-bold text-white mb-8">Popular Movies</h1>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
            @foreach($movies as $movie)
                <div class="bg-gray-900 rounded-lg shadow-md overflow-hidden transition hover:scale-105 duration-300">
                    <img src="https://image.tmdb.org/t/p/w500{{$movie['poster_path']}}" 
                         alt="{{ $movie['title'] }}" 
                         class="w-full h-80 object-cover">
                    
                    <div class="p-4">
                        <h2 class="text-lg font-bold text-white truncate" title="{{ $movie['title'] }}">
                            {{ $movie['title'] }}
                        </h2>
                        <p class="text-sm text-gray-400 mb-4">Released: {{$movie['release_date'] }}</p>
                        
                        <livewire:ui.add-movie-to-favs :movie_id="$movie['id']" :movie_title="$movie['title']"/>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="flex justify-center mt-12 mb-12 space-x-4">
            @if($currentPage > 1)
                <a href="?page={{ $currentPage - 1 }}" 
                   class="px-6 py-2 bg-gray-800 text-white rounded hover:bg-gray-700">Previous</a>
            @endif

            @if($currentPage < 5)
                <a href="?page={{ $currentPage + 1 }}" 
                   class="px-6 py-2 bg-red-600 text-white rounded hover:bg-red-700 transition">Next 9 Movies</a>
            @endif
        </div>
    </main>
</x-layouts.app>
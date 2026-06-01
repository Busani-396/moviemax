<x-layouts.app>
    <main class="container mx-auto px-4 py-8 bg-black min-h-screen">
        
        <h1 class="text-3xl font-bold text-white mb-8">Popular Movies</h1>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
            @foreach($movies as $movie)
                <livewire:ui.movie-card :movie="$movie" :key="$movie['id']" />
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
    <livewire:ui.movie-details-modal />
</x-layouts.app>
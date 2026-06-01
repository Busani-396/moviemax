<x-layouts.app :title="'MovieMax App'">
    <livewire:ui.search-movies />
    <main class="container mx-auto px-4 py-8 bg-black min-h-screen">
        <h1 class="text-3xl font-bold text-white mb-8">Popular Movies</h1>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
            @foreach($movies as $movie)
                <livewire:ui.movie-card :movie="$movie" :key="$movie['id']" />
            @endforeach
        </div>
        <div class="mt-12 mb-12 mx-auto">
            {{$movies->links()}}
        </div>
    </main>
    <livewire:ui.movie-details-modal />
</x-layouts.app>
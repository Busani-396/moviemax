<x-layouts.app :title="'My Favourites'">
    <main class="container mx-auto px-4 py-8 bg-black min-h-screen">
        <h1 class="text-3xl font-bold text-white mb-8">My Favourites</h1>

        @if($favourites->isEmpty())
            <p class="text-gray-400">You havent added any movies to your favourites yet</p>
        @else
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
                @foreach($favourites as $fav)
                    <div class="bg-gray-900 rounded-lg shadow-md overflow-hidden transition hover:scale-105 duration-300">
                        <div class="p-6">
                            <h2 class="text-xl font-bold text-white">{{ $fav->title }}</h2>
                            <p class="text-sm text-gray-400 mt-2">Added on: {{ $fav->created_at->format('M d, Y') }}</p>
                            <livewire:ui.remove-favourite :favourite="$fav" :key="$fav->id" />
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </main>
</x-layouts.app>
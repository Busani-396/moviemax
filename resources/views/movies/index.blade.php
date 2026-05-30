<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MovieMax</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-900">

    <nav class="bg-white shadow p-4 mb-8">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-xl font-bold">MovieMax</h1>
            <!-- contact page as per requirement -->
            <a href="/contact" class="text-blue-600 hover:underline">Contact</a> 
        </div>
    </nav>

    <?php // var_dump($movies);?>
    <main class="container mx-auto px-4">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
            @foreach($movies as $movie)
                <div class="bg-white rounded-lg shadow-md overflow-hidden transition hover:shadow-xl">
                    <img src="https://image.tmdb.org/t/p/w500{{$movie['poster_path']}}" 
                         alt="{{ $movie['title'] }}" 
                         class="w-full h-80 object-cover">
                    <div class="p-4">
                        <h2 class="text-lg font-bold truncate" title="{{ $movie['title'] }}">{{ $movie['title'] }}</h2>
                        <p class="text-sm text-gray-600 mb-4">Released: {{$movie['release_date'] }}</p>
                        
                        <form action="/index" method="POST">
                            @csrf
                            <input type="hidden" name="movie_id" value="{{ $movie['id'] }}">
                            <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700 transition">
                                Add to Favourites
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="flex justify-center mt-12 mb-12 space-x-4">
            @if($currentPage > 1)
                <a href="?page={{ $currentPage - 1 }}" class="px-6 py-2 bg-gray-200 rounded hover:bg-gray-300">Previous</a>
            @endif

            @if($currentPage < 5)
                <a href="?page={{ $currentPage + 1 }}" class="px-6 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Next 9 Movies</a>
            @endif
        </div>
    </main>

</body>
</html>
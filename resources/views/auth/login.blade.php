<x-layouts.app :title="'Sign In'">
    <div class="relative min-h-screen flex items-center justify-center bg-black">
        
        <div class="absolute inset-0 bg-cover bg-center opacity-50" 
             style="background-image: url('{{ asset('/images/movie-bg.jpg') }}');">
        </div>

        <div class="relative bg-black bg-opacity-75 p-12 rounded-md shadow-lg w-full max-w-md">
            <h1 class="text-3xl font-bold text-white mb-8">Sign In</h1>

            <form action="{{ route('login') }}" method="POST">
                @csrf
                
                <div class="mb-4">
                    <input type="email" name="email" placeholder="Email or mobile number" 
                           class="w-full p-4 bg-gray-800 text-white rounded focus:outline-none focus:ring-2 focus:ring-red-600">
                </div>

                <div class="mb-6">
                    <input type="password" name="password" placeholder="Password" 
                           class="w-full p-4 bg-gray-800 text-white rounded focus:outline-none focus:ring-2 focus:ring-red-600">
                </div>

                <button type="submit" class="w-full bg-red-600 text-white font-bold py-3 rounded hover:bg-red-700 transition">
                    Sign In
                </button>
            </form>

            <div class="mt-4 text-gray-400">
                New to MovieMax? <a href="/register" class="text-white hover:underline">Sign up now.</a>
            </div>
        </div>
    </div>
</x-layouts.app>
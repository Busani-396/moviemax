<nav x-data="{ open: false }" class="bg-black border-b border-gray-800 p-4 sticky top-0 z-50">
    <div class="container mx-auto flex justify-between items-center">
        <a href="/" class="text-3xl font-extrabold text-red-600 tracking-tighter uppercase">
            MovieMax
        </a>

        <div class="hidden md:flex items-center space-x-8">
            <a href="/contact" class="text-gray-300 hover:text-red-500 transition duration-300 font-medium">Contact</a>
            
            @auth
                <a href="/favourites" class="text-gray-300 hover:text-red-500 transition duration-300 font-medium">My Favourites</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-5 py-2 rounded-full transition duration-300 text-sm font-semibold">
                        Logout
                    </button>
                </form>
            @else
                <a href="/login" class="text-gray-300 hover:text-red-500 transition duration-300 font-medium">Login</a>
                <a href="/register" class="bg-red-600 hover:bg-red-700 text-white px-5 py-2 rounded-full transition duration-300 text-sm font-semibold">Sign Up</a>
            @endauth
        </div>

        <button @click="open = !open" class="md:hidden text-gray-300 focus:outline-none">
            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
            </svg>
        </button>
    </div>

    <div x-show="open" @click.away="open = false" class="md:hidden mt-4 bg-gray-900 rounded-lg p-4 space-y-4">
        <a href="/contact" class="block text-gray-300 hover:text-red-500">Contact</a>
        @auth
            <a href="/favourites" class="block text-gray-300 hover:text-red-500">My Favourites</a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="w-full text-left text-red-600 font-bold">Logout</button>
            </form>
        @else
            <a href="/login" class="block text-gray-300 hover:text-red-500">Login</a>
        @endauth
    </div>
</nav>
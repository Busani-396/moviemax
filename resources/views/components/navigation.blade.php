<nav class="bg-black shadow p-4 mb-0">
    <div class="container mx-auto flex justify-between items-center">
        <a href="/" class="text-xl font-bold text-red-500">MovieMax</a>
        
        <div class="space-x-4">
            <a href="/contact" class="text-blue-600 hover:underline">Contact</a>
            
            @auth
                <a href="/favourites" class="text-gray-600 hover:text-black">My Favourites</a>
                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf
                    <button type="submit" class="text-red-600 hover:underline">Logout</button>
                </form>
            @else
                <a href="/login" class="text-blue-600 hover:underline">Login</a>
            @endauth
        </div>
    </div>
</nav>
<x-layouts.app :title="'Page Not Found'">
    <div class="flex flex-col items-center justify-center min-h-[60vh] text-center">
        <h1 class="text-9xl font-black text-blue-600">404</h1>
        <h2 class="text-3xl font-bold text-gray-800 mt-4">Oops! Page not found.</h2>
        <p class="text-gray-600 mt-2 max-w-md">
            The page you are looking for might have been moved, deleted, or you might have typed the URL incorrectly.
        </p>

        <div class="mt-8">
            <a href="/" class="px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
                Return to Home
            </a>
        </div>
    </div>
</x-layouts.app>
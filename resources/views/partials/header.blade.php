<!-- Navigation -->
<nav class="bg-gradient-to-r from-purple-600 via-pink-500 to-orange-400 shadow-lg sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex items-center">
                <div class="flex-shrink-0 flex items-center">
                    <div class="h-12 w-12 rounded-full bg-white flex items-center justify-center shadow-lg animate-pulse-slow">
                        <span class="text-purple-600 font-bold text-xl">S</span>
                    </div>
                    <div class="ml-3">
                        <h1 class="text-xl font-bold text-white">SNDT Women's University</h1>
                        <p class="text-xs text-purple-100">Empowering Women Since 1976</p>
                    </div>
                </div>
            </div>
            <div class="hidden md:flex items-center space-x-8">
                <a href="{{ route('welcome') }}" class="text-white hover:text-yellow-200 font-medium transition-all duration-300 hover:scale-105">Home</a>
                <a href="{{ route('about') }}" class="text-white hover:text-yellow-200 font-medium transition-all duration-300 hover:scale-105">About</a>
                <a href="{{ route('contact') }}" class="text-white hover:text-yellow-200 font-medium transition-all duration-300 hover:scale-105">Contact</a>
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/admin/dashboard') }}" class="bg-white text-purple-600 px-4 py-2 rounded-lg hover:bg-yellow-100 font-medium transition-all duration-300 hover:scale-105 shadow-md">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="bg-white text-purple-600 px-4 py-2 rounded-lg hover:bg-yellow-100 font-medium transition-all duration-300 hover:scale-105 shadow-md">Login</a>
                    @endauth
                @endif
            </div>
            <!-- Mobile menu button -->
            <div class="md:hidden flex items-center">
                <button id="mobile-menu-button" class="text-white hover:text-yellow-200 focus:outline-none">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>
        </div>
    </div>
    
    <!-- Mobile menu -->
    <div id="mobile-menu" class="md:hidden hidden bg-purple-700 bg-opacity-95">
        <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
            <a href="{{ route('welcome') }}" class="block px-3 py-2 rounded-md text-base font-medium text-white hover:bg-purple-600">Home</a>
            <a href="{{ route('about') }}" class="block px-3 py-2 rounded-md text-base font-medium text-white hover:bg-purple-600">About</a>
            <a href="{{ route('contact') }}" class="block px-3 py-2 rounded-md text-base font-medium text-white hover:bg-purple-600">Contact</a>
            @if (Route::has('login'))
                @auth
                    <a href="{{ url('/admin/dashboard') }}" class="block px-3 py-2 rounded-md text-base font-medium text-white hover:bg-purple-600">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="block px-3 py-2 rounded-md text-base font-medium text-white hover:bg-purple-600">Login</a>
                @endauth
            @endif
        </div>
    </div>
</nav>
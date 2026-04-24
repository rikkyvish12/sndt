<!-- Navigation -->
<nav class="bg-gradient-to-r from-purple-600 via-pink-500 to-orange-400 shadow-lg sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full">
        <div class="flex justify-between h-16 overflow-x-hidden">
            <div class="flex items-center">
                <div class="flex-shrink-0 flex items-center">
                    <div class="h-12 w-12 rounded-full bg-white flex items-center justify-center shadow-lg overflow-hidden">
                        <img src="{{ asset('sndt-logo.png') }}" alt="SNDT Logo" class="h-10 w-10 object-contain">
                    </div>
                    <div class="ml-3 min-w-0">
                        <h1 class="text-sm font-bold text-white truncate">PREMLILA VITHALDAS POLYTECHNIC</h1>
                        <p class="text-xs text-purple-100 truncate">SNDT Women's University</p>
                        <p class="text-xs text-purple-200 truncate">Empowering Women Since 1976</p>
                    </div>
                </div>
            </div>
            <div class="hidden md:flex items-center space-x-8">
                <a href="{{ route('welcome') }}" class="text-white hover:text-yellow-200 font-medium transition-all duration-300 hover:scale-105">Home</a>
                <a href="{{ route('about') }}" class="text-white hover:text-yellow-200 font-medium transition-all duration-300 hover:scale-105">About</a>
                <a href="{{ route('contact') }}" class="text-white hover:text-yellow-200 font-medium transition-all duration-300 hover:scale-105">Contact</a>
                @auth
                    <a href="{{ url('/admin/dashboard') }}" class="bg-white text-purple-600 px-4 py-2 rounded-lg hover:bg-yellow-100 font-medium transition-all duration-300 hover:scale-105 shadow-md">Dashboard</a>
                @endauth
            </div>
            <!-- Mobile menu button -->
            <div class="md:hidden flex items-center">
                <button id="mobile-menu-button" class="text-white hover:text-yellow-200 focus:outline-none">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
                <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const mobileMenuButton = document.getElementById('mobile-menu-button');
                    const mobileMenu = document.getElementById('mobile-menu');
                    
                    if (mobileMenuButton && mobileMenu) {
                        mobileMenuButton.addEventListener('click', function(e) {
                            e.stopPropagation();
                            mobileMenu.classList.toggle('hidden');
                        });
                        
                        // Close mobile menu when clicking outside
                        document.addEventListener('click', function(event) {
                            if (!mobileMenu.contains(event.target) && !mobileMenuButton.contains(event.target)) {
                                mobileMenu.classList.add('hidden');
                            }
                        });
                    }
                });
                </script>
            </div>
        </div>
    </div>
    
    <!-- Mobile menu -->
    <div id="mobile-menu" class="md:hidden hidden bg-purple-700 bg-opacity-95 w-full absolute top-full left-0 min-w-full z-50">
        <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
            <a href="{{ route('welcome') }}" class="block px-3 py-2 rounded-md text-base font-medium text-white hover:bg-purple-600 truncate">Home</a>
            <a href="{{ route('about') }}" class="block px-3 py-2 rounded-md text-base font-medium text-white hover:bg-purple-600 truncate">About</a>
            <a href="{{ route('contact') }}" class="block px-3 py-2 rounded-md text-base font-medium text-white hover:bg-purple-600 truncate">Contact</a>
            @auth
                <a href="{{ url('/admin/dashboard') }}" class="block px-3 py-2 rounded-md text-base font-medium text-white hover:bg-purple-600 truncate">Dashboard</a>
            @endauth
        </div>
    </div>
</nav>

<!-- Announcements Marquee (Below Navbar, Sticky) -->
@if(isset($announcements) && $announcements->count() > 0)
<div class="bg-yellow-100 border-b-2 border-yellow-400 py-2 overflow-hidden sticky top-16 z-40 shadow-md">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex items-center">
        <span class="bg-red-500 text-white px-2 py-1 rounded text-xs font-bold mr-3 flex-shrink-0 animate-pulse">📢 ANNOUNCEMENT</span>
        <marquee behavior="scroll" direction="left" scrollamount="5" class="text-gray-800 font-medium flex-1">
            @foreach($announcements as $announcement)
                @if($announcement->link)
                    <a href="{{ $announcement->link }}" class="hover:text-purple-600 transition-colors mr-8 inline-flex items-center gap-1">
                        <span class="font-semibold">{{ $announcement->title }}:</span> {{ $announcement->content }}
                        @if($announcement->link_text)
                            <span class="text-purple-600 underline text-sm">({{ $announcement->link_text }})</span>
                        @endif
                    </a>
                @else
                    <span class="mr-8"><span class="font-semibold">{{ $announcement->title }}:</span> {{ $announcement->content }}</span>
                @endif
            @endforeach
        </marquee>
    </div>
</div>
@endif
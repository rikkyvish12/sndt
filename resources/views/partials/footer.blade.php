<!-- Footer -->
<footer class="bg-gradient-to-r from-gray-900 via-purple-900 to-gray-900 text-white py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            <div class="col-span-2">
                <div class="flex items-center">
                    <div class="h-12 w-12 rounded-xl bg-gradient-to-r from-purple-500 to-pink-500 flex items-center justify-center shadow-lg">
                        <span class="text-white font-bold text-xl">S</span>
                    </div>
                    <div class="ml-3">
                        <h3 class="text-xl font-bold text-white">SNDT Women's University</h3>
                        <p class="text-purple-200 text-sm">Empowering Women Since 1976</p>
                    </div>
                </div>
                <p class="mt-4 text-purple-200 text-sm">
                    A premier institution dedicated to providing quality education and empowering women to become leaders in their respective fields.
                </p>
            </div>
            
            <div>
                <h4 class="text-lg font-semibold text-white mb-4">Quick Links</h4>
                <ul class="space-y-2">
                    <li><a href="{{ route('welcome') }}" class="text-purple-200 hover:text-white transition-colors duration-300 block py-1">Home</a></li>
                    <li><a href="{{ route('about') }}" class="text-purple-200 hover:text-white transition-colors duration-300 block py-1">About Us</a></li>
                    <li><a href="{{ route('contact') }}" class="text-purple-200 hover:text-white transition-colors duration-300 block py-1">Contact</a></li>
                    @isset($department)<li><a href="{{ route('department.show', $department->code) }}" class="text-purple-200 hover:text-white transition-colors duration-300 block py-1">{{ $department->name }}</a></li>@endisset
                </ul>
            </div>
            
            <div>
                <h4 class="text-lg font-semibold text-white mb-4">Contact Info</h4>
                <ul class="space-y-2 text-purple-200">
                    <li class="flex items-start">
                        <svg class="w-5 h-5 mr-2 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                        <span class="text-sm">University Campus, Mumbai</span>
                    </li>
                    <li class="flex items-center">
                        <svg class="w-5 h-5 mr-2 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                        </svg>
                        <span class="text-sm">+91 22 1234 5678</span>
                    </li>
                    <li class="flex items-center">
                        <svg class="w-5 h-5 mr-2 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                        <span class="text-sm">info@sndt.edu.in</span>
                    </li>
                </ul>
            </div>
        </div>
        
        <div class="mt-8 pt-8 border-t border-purple-800 text-center text-purple-300">
            <p class="text-sm">&copy; 2026 SNDT Women's University. All rights reserved.</p>
        </div>
    </div>
</footer>
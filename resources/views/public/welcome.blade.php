<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SNDT Women's University - Empowering Women Since 1976</title>
    <meta name="description" content="SNDT Women's University - Premier institution for women's education with world-class facilities and experienced faculty">
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Styles -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        'sans': ['Inter', 'sans-serif'],
                    },
                    colors: {
                        primary: {
                            50: '#eff6ff',
                            100: '#dbeafe',
                            500: '#3b82f6',
                            600: '#2563eb',
                            700: '#1d4ed8',
                            800: '#1e40af',
                            900: '#1e3a8a',
                        }
                    }
                }
            }
        }
    </script>
    <style type="text/tailwindcss">
        @layer utilities {
            .text-balance {
                text-wrap: balance;
            }
        }
    </style>
</head>
<body class="bg-gray-50 font-sans">
    <!-- Navigation -->
    <nav class="bg-white shadow-sm sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <div class="flex-shrink-0 flex items-center">
                        <div class="h-10 w-10 rounded-full bg-primary-600 flex items-center justify-center">
                            <span class="text-white font-bold text-xl">S</span>
                        </div>
                        <div class="ml-3">
                            <h1 class="text-xl font-bold text-gray-900">SNDT Women's University</h1>
                            <p class="text-xs text-gray-500">Empowering Women Since 1976</p>
                        </div>
                    </div>
                </div>
                <div class="hidden md:flex items-center space-x-8">
                    <a href="{{ route('welcome') }}" class="text-gray-700 hover:text-primary-600 font-medium">Home</a>
                    <a href="{{ route('about') }}" class="text-gray-700 hover:text-primary-600 font-medium">About</a>
                    <a href="{{ route('contact') }}" class="text-gray-700 hover:text-primary-600 font-medium">Contact</a>
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/admin/dashboard') }}" class="bg-primary-600 text-white px-4 py-2 rounded-lg hover:bg-primary-700 font-medium">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}" class="bg-primary-600 text-white px-4 py-2 rounded-lg hover:bg-primary-700 font-medium">Login</a>
                        @endauth
                    @endif
                </div>
                <!-- Mobile menu button -->
                <div class="md:hidden flex items-center">
                    <button id="mobile-menu-button" class="text-gray-700 hover:text-primary-600">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
        
        <!-- Mobile menu -->
        <div id="mobile-menu" class="md:hidden hidden">
            <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3 bg-white border-t">
                <a href="{{ route('welcome') }}" class="block px-3 py-2 text-gray-700 hover:text-primary-600 font-medium">Home</a>
                <a href="{{ route('about') }}" class="block px-3 py-2 text-gray-700 hover:text-primary-600 font-medium">About</a>
                <a href="{{ route('contact') }}" class="block px-3 py-2 text-gray-700 hover:text-primary-600 font-medium">Contact</a>
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/admin/dashboard') }}" class="block px-3 py-2 bg-primary-600 text-white rounded-lg hover:bg-primary-700 font-medium text-center mt-2">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="block px-3 py-2 bg-primary-600 text-white rounded-lg hover:bg-primary-700 font-medium text-center mt-2">Login</a>
                    @endauth
                @endif
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <div class="relative bg-gradient-to-r from-primary-700 to-primary-900 overflow-hidden">
        <div class="max-w-7xl mx-auto">
            <div class="relative z-10 pb-8 bg-gradient-to-r from-primary-700 to-primary-900 sm:pb-16 md:pb-20 lg:max-w-2xl lg:w-full lg:pb-28 xl:pb-32">
                <div class="pt-10 px-4 sm:px-6 lg:px-8">
                    <div class="text-center lg:text-left">
                        <h1 class="text-4xl tracking-tight font-extrabold text-white sm:text-5xl md:text-6xl">
                            <span class="block">Shreemati Nathibai</span>
                            <span class="block text-primary-200">Women's University</span>
                        </h1>
                        <p class="mt-3 text-base text-primary-100 sm:mt-5 sm:text-lg sm:max-w-xl sm:mx-auto md:mt-5 md:text-xl lg:mx-0">
                            Empowering women through quality education since 1976. Join our community of learners and become a leader of tomorrow.
                        </p>
                        <div class="mt-5 sm:mt-8 sm:flex sm:justify-center lg:justify-start">
                            <div class="rounded-md shadow">
                                <a href="#explore" class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-primary-600 bg-white hover:bg-gray-50 md:py-4 md:text-lg md:px-10">
                                    Explore Programs
                                </a>
                            </div>
                            <div class="mt-3 sm:mt-0 sm:ml-3">
                                <a href="{{ route('contact') }}" class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-white bg-primary-500 bg-opacity-60 hover:bg-opacity-70 md:py-4 md:text-lg md:px-10">
                                    Contact Us
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="lg:absolute lg:inset-y-0 lg:right-0 lg:w-1/2">
            <img class="h-56 w-full object-cover sm:h-72 md:h-96 lg:w-full lg:h-full" src="https://images.unsplash.com/photo-1523050854058-8df90110c9f1?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80" alt="Students studying">
        </div>
    </div>

    <!-- Stats Section -->
    <div class="bg-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-4">
                <div class="text-center">
                    <div class="text-4xl font-bold text-primary-600">{{ $departments->count() }}+</div>
                    <div class="mt-2 text-lg font-medium text-gray-600">Departments</div>
                </div>
                <div class="text-center">
                    <div class="text-4xl font-bold text-primary-600">{{ $courses->count() }}+</div>
                    <div class="mt-2 text-lg font-medium text-gray-600">Programs</div>
                </div>
                <div class="text-center">
                    <div class="text-4xl font-bold text-primary-600">{{ $faculty->count() }}+</div>
                    <div class="mt-2 text-lg font-medium text-gray-600">Faculty Members</div>
                </div>
                <div class="text-center">
                    <div class="text-4xl font-bold text-primary-600">45+</div>
                    <div class="mt-2 text-lg font-medium text-gray-600">Years of Excellence</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Departments Section -->
    <div id="explore" class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h2 class="text-3xl font-bold text-gray-900 sm:text-4xl">Our Departments</h2>
                <p class="mt-4 text-xl text-gray-600">Explore our diverse academic departments</p>
            </div>

            <div class="mt-12 grid gap-8 md:grid-cols-2 lg:grid-cols-3">
                @foreach($departments as $department)
                <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <div class="h-12 w-12 rounded-lg bg-primary-100 flex items-center justify-center">
                                    <svg class="h-6 w-6 text-primary-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                    </svg>
                                </div>
                            </div>
                            <div class="ml-4">
                                <h3 class="text-lg font-medium text-gray-900">{{ $department->name }}</h3>
                                <p class="text-sm text-gray-500">{{ $department->code }}</p>
                            </div>
                        </div>
                        <p class="mt-4 text-gray-600 text-sm">{{ Str::limit($department->description, 100) }}</p>
                        <div class="mt-4 flex justify-between text-sm text-gray-500">
                            <span>{{ $department->faculty_count }} Faculty</span>
                            <span>{{ $department->courses_count }} Courses</span>
                        </div>
                        <div class="mt-4">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                Head: {{ $department->head_name }}
                            </span>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <div class="mt-12 text-center">
                <a href="#" class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md text-white bg-primary-600 hover:bg-primary-700">
                    View All Departments
                </a>
            </div>
        </div>
    </div>

    <!-- Courses Section -->
    <div class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h2 class="text-3xl font-bold text-gray-900 sm:text-4xl">Popular Programs</h2>
                <p class="mt-4 text-xl text-gray-600">Discover our most sought-after courses</p>
            </div>

            <div class="mt-12 grid gap-8 md:grid-cols-2 lg:grid-cols-3">
                @foreach($courses as $course)
                <div class="bg-gray-50 rounded-xl p-6 hover:shadow-md transition-shadow duration-300">
                    <div class="flex justify-between items-start">
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900">{{ $course->name }}</h3>
                            <p class="text-sm text-gray-500 mt-1">{{ $course->department->name }}</p>
                        </div>
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                            {{ ucfirst($course->course_type) }}
                        </span>
                    </div>
                    <p class="mt-3 text-gray-600 text-sm">{{ Str::limit($course->description, 80) }}</p>
                    <div class="mt-4 grid grid-cols-2 gap-4 text-sm">
                        <div>
                            <span class="text-gray-500">Duration:</span>
                            <span class="font-medium text-gray-900 ml-1">{{ $course->duration }} years</span>
                        </div>
                        <div>
                            <span class="text-gray-500">Fees:</span>
                            <span class="font-medium text-gray-900 ml-1">₹{{ number_format($course->fees) }}</span>
                        </div>
                    </div>
                    <div class="mt-4">
                        <span class="text-sm text-gray-500">Available Seats: {{ $course->available_seats }}/{{ $course->total_seats }}</span>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Faculty Section -->
    <div class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h2 class="text-3xl font-bold text-gray-900 sm:text-4xl">Our Distinguished Faculty</h2>
                <p class="mt-4 text-xl text-gray-600">Learn from experienced professionals and scholars</p>
            </div>

            <div class="mt-12 grid gap-8 md:grid-cols-2 lg:grid-cols-3">
                @foreach($faculty as $member)
                <div class="bg-white rounded-xl shadow-md overflow-hidden">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <div class="h-16 w-16 rounded-full bg-primary-100 flex items-center justify-center">
                                    <span class="text-xl font-bold text-primary-600">
                                        {{ substr($member->first_name, 0, 1) }}{{ substr($member->last_name, 0, 1) }}
                                    </span>
                                </div>
                            </div>
                            <div class="ml-4">
                                <h3 class="text-lg font-medium text-gray-900">
                                    {{ $member->first_name }} {{ $member->last_name }}
                                </h3>
                                <p class="text-sm text-primary-600 font-medium">{{ $member->designation }}</p>
                            </div>
                        </div>
                        <div class="mt-4">
                            <p class="text-sm text-gray-600">
                                <span class="font-medium">Department:</span> {{ $member->department->name }}
                            </p>
                            <p class="text-sm text-gray-600 mt-1">
                                <span class="font-medium">Specialization:</span> {{ $member->specialization }}
                            </p>
                            <p class="text-sm text-gray-600 mt-1">
                                <span class="font-medium">Qualification:</span> {{ $member->qualification }}
                            </p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- CTA Section -->
    <div class="bg-primary-700">
        <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:py-16 lg:px-8 lg:flex lg:items-center lg:justify-between">
            <h2 class="text-3xl font-extrabold tracking-tight text-white sm:text-4xl">
                <span class="block">Ready to start your journey?</span>
                <span class="block text-primary-200">Join SNDT Women's University today.</span>
            </h2>
            <div class="mt-8 flex lg:mt-0 lg:flex-shrink-0">
                <div class="inline-flex rounded-md shadow">
                    <a href="{{ route('contact') }}" class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-primary-600 bg-white hover:bg-primary-50">
                        Get Started
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white">
        <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div class="col-span-1 md:col-span-2">
                    <div class="flex items-center">
                        <div class="h-10 w-10 rounded-full bg-primary-600 flex items-center justify-center">
                            <span class="text-white font-bold text-xl">S</span>
                        </div>
                        <div class="ml-3">
                            <h3 class="text-xl font-bold">SNDT Women's University</h3>
                            <p class="text-gray-400 text-sm">Empowering Women Since 1976</p>
                        </div>
                    </div>
                    <p class="mt-4 text-gray-400 max-w-md">
                        A premier institution dedicated to providing quality education and empowering women to become leaders in their respective fields.
                    </p>
                </div>
                <div>
                    <h4 class="text-lg font-semibold mb-4">Quick Links</h4>
                    <ul class="space-y-2">
                        <li><a href="{{ route('welcome') }}" class="text-gray-400 hover:text-white">Home</a></li>
                        <li><a href="{{ route('about') }}" class="text-gray-400 hover:text-white">About Us</a></li>
                        <li><a href="{{ route('contact') }}" class="text-gray-400 hover:text-white">Contact</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white">Admissions</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-lg font-semibold mb-4">Contact Info</h4>
                    <ul class="space-y-2 text-gray-400">
                        <li>📍 University Campus, Mumbai</li>
                        <li>📞 +91 22 1234 5678</li>
                        <li>✉️ info@sndt.edu.in</li>
                    </ul>
                </div>
            </div>
            <div class="mt-8 pt-8 border-t border-gray-800 text-center text-gray-400">
                <p>&copy; 2026 SNDT Women's University. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script>
        // Mobile menu toggle
        document.getElementById('mobile-menu-button').addEventListener('click', function() {
            const menu = document.getElementById('mobile-menu');
            menu.classList.toggle('hidden');
        });

        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });
    </script>
</body>
</html>
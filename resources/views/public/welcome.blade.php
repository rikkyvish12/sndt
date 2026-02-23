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
    <script src="https://unpkg.com/scrollreveal@4.0.9/dist/scrollreveal.min.js"></script>
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
                        },
                        secondary: {
                            500: '#8b5cf6',
                            600: '#7c3aed',
                            700: '#6d28d9',
                        },
                        accent: {
                            500: '#f59e0b',
                            600: '#d97706',
                        },
                        success: {
                            500: '#10b981',
                            600: '#059669',
                        }
                    },
                    animation: {
                        'fade-in': 'fadeIn 0.5s ease-in-out',
                        'slide-up': 'slideUp 0.5s ease-out',
                        'pulse-slow': 'pulse 3s cubic-bezier(0.4, 0, 0.6, 1) infinite',
                        'bounce-slow': 'bounce 2s infinite',
                        'float': 'float 3s ease-in-out infinite',
                    },
                    keyframes: {
                        fadeIn: {
                            '0%': { opacity: '0' },
                            '100%': { opacity: '1' },
                        },
                        slideUp: {
                            '0%': { transform: 'translateY(20px)', opacity: '0' },
                            '100%': { transform: 'translateY(0)', opacity: '1' },
                        },
                        float: {
                            '0%, 100%': { transform: 'translateY(0px)' },
                            '50%': { transform: 'translateY(-10px)' },
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
    <style>
        .gradient-bg {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        .gradient-text {
            background: linear-gradient(45deg, #667eea, #764ba2, #f093fb, #f5576c);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        .card-hover {
            transition: all 0.3s ease;
            transform: translateY(0);
        }
        .card-hover:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }
        .pulse-ring {
            animation: pulse-ring 2s cubic-bezier(0.4, 0, 0.6, 1) infinite;
        }
        @keyframes pulse-ring {
            0% { transform: scale(0.33); opacity: 1; }
            80%, 100% { transform: scale(1.5); opacity: 0; }
        }
        .shine-effect {
            position: relative;
            overflow: hidden;
        }
        .shine-effect::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.4), transparent);
            transition: left 0.6s ease;
        }
        .shine-effect:hover::before {
            left: 100%;
        }
        .animate-float-slow {
            animation: float 4s ease-in-out infinite;
        }
        .animate-float-medium {
            animation: float 3s ease-in-out infinite;
        }
        .animate-float-fast {
            animation: float 2s ease-in-out infinite;
        }
        .animation-delay-500 {
            animation-delay: 0.5s;
        }
        .animation-delay-1000 {
            animation-delay: 1s;
        }
        .animation-delay-1500 {
            animation-delay: 1.5s;
        }
        .animation-delay-2000 {
            animation-delay: 2s;
        }
        .animation-delay-3000 {
            animation-delay: 3s;
        }
        .animation-delay-4000 {
            animation-delay: 4s;
        }
        .bg-gradient-animated {
            background: linear-gradient(-45deg, #ee7752, #e73c7e, #23a6d5, #23d5ab);
            background-size: 400% 400%;
            animation: gradient 15s ease infinite;
        }
        @keyframes gradient {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }
        .text-glow {
            text-shadow: 0 0 10px rgba(255, 255, 255, 0.5);
        }
        .hover-grow {
            transition: transform 0.3s ease;
        }
        .hover-grow:hover {
            transform: scale(1.05);
        }
    </style>
</head>
<body class="bg-gray-50 font-sans overflow-x-hidden">
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
            <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3 bg-gradient-to-r from-purple-500 to-pink-500 border-t border-white">
                <a href="{{ route('welcome') }}" class="block px-3 py-2 text-white hover:text-yellow-200 font-medium transition-all duration-300">Home</a>
                <a href="{{ route('about') }}" class="block px-3 py-2 text-white hover:text-yellow-200 font-medium transition-all duration-300">About</a>
                <a href="{{ route('contact') }}" class="block px-3 py-2 text-white hover:text-yellow-200 font-medium transition-all duration-300">Contact</a>
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/admin/dashboard') }}" class="block px-3 py-2 bg-white text-purple-600 rounded-lg hover:bg-yellow-100 font-medium text-center mt-2 transition-all duration-300">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="block px-3 py-2 bg-white text-purple-600 rounded-lg hover:bg-yellow-100 font-medium text-center mt-2 transition-all duration-300">Login</a>
                    @endauth
                @endif
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <div class="relative bg-gradient-to-r from-purple-700 via-pink-600 to-orange-500">
        <div class="absolute inset-0">
            <div class="absolute top-0 left-0 w-32 h-32 md:w-72 md:h-72 bg-purple-300 rounded-full mix-blend-multiply filter blur-xl opacity-30 animate-pulse-slow"></div>
            <div class="absolute top-0 right-0 w-32 h-32 md:w-72 md:h-72 bg-yellow-300 rounded-full mix-blend-multiply filter blur-xl opacity-30 animate-pulse-slow animation-delay-2000"></div>
            <div class="absolute bottom-0 left-1/2 w-32 h-32 md:w-72 md:h-72 bg-pink-300 rounded-full mix-blend-multiply filter blur-xl opacity-30 animate-pulse-slow animation-delay-4000"></div>
        </div>
        <div class="max-w-7xl mx-auto relative z-10">
            <div class="relative z-10 pb-8 sm:pb-16 md:pb-20 lg:max-w-2xl lg:w-full lg:pb-28 xl:pb-32">
                <div class="pt-10 px-4 sm:px-6 lg:px-8 hero-content">
                    <div class="text-center lg:text-left animate-fade-in">
                        <h1 class="text-4xl tracking-tight font-extrabold text-white sm:text-5xl md:text-6xl animate-slide-up">
                            <span class="block">Shreemati Nathibai</span>
                            <span class="block text-yellow-200">Women's University</span>
                        </h1>
                        <p class="mt-3 text-base text-purple-100 sm:mt-5 sm:text-lg sm:max-w-xl sm:mx-auto md:mt-5 md:text-xl lg:mx-0 animate-slide-up animation-delay-300">
                            Empowering women through quality education since 1976. Join our community of learners and become a leader of tomorrow.
                        </p>
                        <div class="mt-5 sm:mt-8 sm:flex sm:justify-center lg:justify-start animate-slide-up animation-delay-500">
                            <div class="rounded-md shadow-lg transform hover:scale-105 transition-all duration-300">
                                <a href="#explore" class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-purple-600 bg-white hover:bg-yellow-50 md:py-4 md:text-lg md:px-10 shine-effect">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
                                    </svg>
                                    Explore Programs
                                </a>
                            </div>
                            <div class="mt-3 sm:mt-0 sm:ml-3 transform hover:scale-105 transition-all duration-300">
                                <a href="{{ route('contact') }}" class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-white bg-gradient-to-r from-pink-500 to-orange-400 hover:from-pink-600 hover:to-orange-500 md:py-4 md:text-lg md:px-10 shadow-lg">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                    </svg>
                                    Contact Us
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="lg:absolute lg:inset-y-0 lg:right-0 lg:w-1/2 hero-image">
            <img class="h-56 w-full object-cover sm:h-72 md:h-96 lg:w-full lg:h-full" src="https://images.unsplash.com/photo-1531482615713-2afd69097998?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80" alt="Students studying">
        </div>
    </div>

    <!-- Stats Section -->
    <div class="bg-gradient-to-r from-purple-50 to-pink-50 py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-4 stats-container">
                <div class="text-center bg-white rounded-2xl p-6 shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2 card-hover stats-item">
                    <div class="text-4xl font-bold text-purple-600 animate-float">{{ $departments->count() }}+</div>
                    <div class="mt-2 text-lg font-medium text-gray-700">Departments</div>
                    <div class="mt-2 w-16 h-1 bg-gradient-to-r from-purple-500 to-pink-500 mx-auto rounded-full"></div>
                </div>
                <div class="text-center bg-white rounded-2xl p-6 shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2 card-hover stats-item">
                    <div class="text-4xl font-bold text-pink-600 animate-float animation-delay-500">{{ $courses->count() }}+</div>
                    <div class="mt-2 text-lg font-medium text-gray-700">Programs</div>
                    <div class="mt-2 w-16 h-1 bg-gradient-to-r from-pink-500 to-orange-500 mx-auto rounded-full"></div>
                </div>
                <div class="text-center bg-white rounded-2xl p-6 shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2 card-hover stats-item">
                    <div class="text-4xl font-bold text-orange-600 animate-float animation-delay-1000">{{ $faculty->count() }}+</div>
                    <div class="mt-2 text-lg font-medium text-gray-700">Faculty Members</div>
                    <div class="mt-2 w-16 h-1 bg-gradient-to-r from-orange-500 to-yellow-500 mx-auto rounded-full"></div>
                </div>
                <div class="text-center bg-white rounded-2xl p-6 shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2 card-hover stats-item">
                    <div class="text-4xl font-bold text-yellow-600 animate-float animation-delay-1500">45+</div>
                    <div class="mt-2 text-lg font-medium text-gray-700">Years of Excellence</div>
                    <div class="mt-2 w-16 h-1 bg-gradient-to-r from-yellow-500 to-green-500 mx-auto rounded-full"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Departments Section -->
    <div id="explore" class="py-16 bg-gradient-to-br from-purple-50 via-pink-50 to-orange-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center animate-fade-in">
                <h2 class="text-3xl font-bold text-gray-900 sm:text-4xl gradient-text">Our Departments</h2>
                <p class="mt-4 text-xl text-gray-600">Explore our diverse academic departments</p>
                <div class="mt-2 w-24 h-1 bg-gradient-to-r from-purple-500 via-pink-500 to-orange-500 mx-auto rounded-full"></div>
            </div>

            <div class="mt-12 grid gap-8 md:grid-cols-2 lg:grid-cols-3 department-container">
                @foreach($departments as $department)
                <a href="{{ route('department.show', $department->code) }}" class="block bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-3 card-hover border border-purple-100 department-card">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 relative">
                                <div class="h-14 w-14 rounded-xl bg-gradient-to-r from-purple-100 to-pink-100 flex items-center justify-center relative overflow-hidden">
                                    <div class="absolute inset-0 bg-gradient-to-r from-purple-400 to-pink-400 opacity-20"></div>
                                    <svg class="h-7 w-7 text-purple-600 relative z-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                    </svg>
                                    <div class="absolute -top-1 -right-1 w-3 h-3 bg-green-400 rounded-full pulse-ring"></div>
                                </div>
                            </div>
                            <div class="ml-4">
                                <h3 class="text-lg font-bold text-gray-900">{{ $department->name }}</h3>
                                <p class="text-sm text-purple-600 font-medium">{{ $department->code }}</p>
                            </div>
                        </div>
                        <p class="mt-4 text-gray-600 text-sm leading-relaxed">{{ Str::limit($department->description, 100) }}</p>
                        <div class="mt-4 flex justify-between text-sm text-gray-500">
                            <span class="px-2 py-1 bg-purple-100 text-purple-700 rounded-full">{{ $department->faculty_count }} Faculty</span>
                            <span class="px-2 py-1 bg-pink-100 text-pink-700 rounded-full">{{ $department->courses_count }} Courses</span>
                        </div>
                        <div class="mt-4">
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-gradient-to-r from-green-100 to-emerald-100 text-green-800 border border-green-200">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                                Head: {{ $department->head_name }}
                            </span>
                        </div>
                    </div>
                </a>
                @endforeach
            </div>

            <div class="mt-12 text-center">
                <a href="{{ route('welcome') }}#explore" class="inline-flex items-center px-8 py-4 border border-transparent text-base font-bold rounded-xl text-white bg-gradient-to-r from-purple-600 to-pink-600 hover:from-purple-700 hover:to-pink-700 shadow-xl hover:shadow-2xl transform hover:scale-105 transition-all duration-300 hover-grow shine-effect">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                    Explore Departments
                </a>
            </div>
        </div>
    </div>

    <!-- Courses Section -->
    <div class="py-16 bg-gradient-to-br from-orange-50 via-yellow-50 to-green-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center animate-fade-in">
                <h2 class="text-3xl font-bold text-gray-900 sm:text-4xl gradient-text">Popular Programs</h2>
                <p class="mt-4 text-xl text-gray-600">Discover our most sought-after courses</p>
                <div class="mt-2 w-24 h-1 bg-gradient-to-r from-orange-500 via-yellow-500 to-green-500 mx-auto rounded-full"></div>
            </div>

            <div class="mt-12 grid gap-8 md:grid-cols-2 lg:grid-cols-3 course-container">
                @foreach($courses as $course)
                <div class="bg-white rounded-2xl p-6 hover:shadow-xl transition-all duration-300 transform hover:-translate-y-3 card-hover border border-orange-100 course-card">
                    <div class="flex justify-between items-start">
                        <div>
                            <h3 class="text-lg font-bold text-gray-900">{{ $course->name }}</h3>
                            <p class="text-sm text-orange-600 font-medium mt-1">{{ $course->department->name }}</p>
                        </div>
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-gradient-to-r from-blue-100 to-cyan-100 text-blue-800 border border-blue-200">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                            </svg>
                            {{ ucfirst($course->course_type) }}
                        </span>
                    </div>
                    <p class="mt-3 text-gray-600 text-sm leading-relaxed">{{ Str::limit($course->description, 80) }}</p>
                    <div class="mt-4 grid grid-cols-2 gap-4 text-sm">
                        <div class="bg-orange-50 p-3 rounded-lg">
                            <span class="text-orange-700 font-medium">Duration:</span>
                            <span class="font-bold text-orange-900 ml-1">{{ $course->duration }} years</span>
                        </div>
                        <div class="bg-green-50 p-3 rounded-lg">
                            <span class="text-green-700 font-medium">Fees:</span>
                            <span class="font-bold text-green-900 ml-1">₹{{ number_format($course->fees) }}</span>
                        </div>
                    </div>
                    <div class="mt-4">
                        <div class="w-full bg-gray-200 rounded-full h-2">
                            <div class="bg-gradient-to-r from-green-400 to-emerald-500 h-2 rounded-full" style="width: {{ ($course->available_seats / $course->total_seats) * 100 }}%"></div>
                        </div>
                        <span class="text-sm text-gray-600 mt-2 inline-block">Available Seats: {{ $course->available_seats }}/{{ $course->total_seats }}</span>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Faculty Section -->
    <div class="py-16 bg-gradient-to-br from-green-50 via-teal-50 to-cyan-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center animate-fade-in">
                <h2 class="text-3xl font-bold text-gray-900 sm:text-4xl gradient-text">Our Distinguished Faculty</h2>
                <p class="mt-4 text-xl text-gray-600">Learn from experienced professionals and scholars</p>
                <div class="mt-2 w-24 h-1 bg-gradient-to-r from-green-500 via-teal-500 to-cyan-500 mx-auto rounded-full"></div>
            </div>

            <div class="mt-12 grid gap-8 md:grid-cols-2 lg:grid-cols-3 faculty-container">
                @foreach($faculty as $member)
                <div class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-3 card-hover border border-green-100 faculty-card">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 relative">
                                <div class="h-20 w-20 rounded-2xl bg-gradient-to-r from-green-100 to-teal-100 flex items-center justify-center relative overflow-hidden">
                                    <div class="absolute inset-0 bg-gradient-to-r from-green-400 to-teal-400 opacity-20"></div>
                                    <span class="text-2xl font-bold text-green-600 relative z-10">
                                        {{ substr($member->first_name, 0, 1) }}{{ substr($member->last_name, 0, 1) }}
                                    </span>
                                    <div class="absolute -top-2 -right-2 w-4 h-4 bg-yellow-400 rounded-full animate-ping"></div>
                                </div>
                            </div>
                            <div class="ml-4">
                                <h3 class="text-lg font-bold text-gray-900">
                                    {{ $member->first_name }} {{ $member->last_name }}
                                </h3>
                                <p class="text-sm text-green-600 font-bold">{{ $member->designation }}</p>
                                <div class="mt-1 flex items-center">
                                    <svg class="w-4 h-4 text-yellow-500 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                    </svg>
                                    <span class="text-xs text-gray-500">Experienced Faculty</span>
                                </div>
                            </div>
                        </div>
                        <div class="mt-4 space-y-2">
                            <div class="bg-green-50 p-3 rounded-lg">
                                <p class="text-sm text-gray-700">
                                    <span class="font-bold text-green-700">Department:</span> 
                                    <span class="text-green-900">{{ $member->department->name }}</span>
                                </p>
                            </div>
                            <div class="bg-teal-50 p-3 rounded-lg">
                                <p class="text-sm text-gray-700">
                                    <span class="font-bold text-teal-700">Specialization:</span> 
                                    <span class="text-teal-900">{{ $member->specialization }}</span>
                                </p>
                            </div>
                            <div class="bg-cyan-50 p-3 rounded-lg">
                                <p class="text-sm text-gray-700">
                                    <span class="font-bold text-cyan-700">Qualification:</span> 
                                    <span class="text-cyan-900">{{ $member->qualification }}</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- CTA Section -->
    <div class="bg-gradient-to-r from-purple-700 via-pink-600 to-orange-500 relative overflow-hidden">
        <div class="absolute inset-0 bg-black opacity-10"></div>
        <div class="absolute inset-0">
            <div class="absolute top-0 left-0 w-48 h-48 md:w-96 md:h-96 bg-purple-300 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-pulse-slow"></div>
            <div class="absolute top-0 right-0 w-48 h-48 md:w-96 md:h-96 bg-yellow-300 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-pulse-slow animation-delay-2000"></div>
            <div class="absolute bottom-0 left-1/3 w-48 h-48 md:w-96 md:h-96 bg-pink-300 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-pulse-slow animation-delay-4000"></div>
        </div>
        <div class="max-w-7xl mx-auto py-16 px-4 sm:px-6 lg:py-20 lg:px-8 lg:flex lg:items-center lg:justify-between relative z-10">
            <div class="text-center lg:text-left animate-fade-in cta-content">
                <h2 class="text-3xl font-extrabold tracking-tight text-white sm:text-4xl">
                    <span class="block">Ready to start your journey?</span>
                    <span class="block text-yellow-200">Join SNDT Women's University today.</span>
                </h2>
                <p class="mt-4 text-xl text-purple-100 max-w-3xl">
                    Take the first step towards a bright future. Our world-class education and supportive community will help you achieve your dreams.
                </p>
            </div>
            <div class="mt-12 flex lg:mt-0 lg:flex-shrink-0 justify-center lg:justify-end cta-buttons">
                <div class="inline-flex rounded-xl shadow-2xl transform hover:scale-105 transition-all duration-300">
                    <a href="{{ route('contact') }}" class="inline-flex items-center justify-center px-8 py-4 border border-transparent text-base font-bold rounded-xl text-purple-600 bg-white hover:bg-yellow-50 shadow-lg shine-effect">
                        <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                        Get Started Now
                    </a>
                </div>
                <div class="ml-4 inline-flex rounded-xl shadow-2xl transform hover:scale-105 transition-all duration-300">
                    <a href="#explore" class="inline-flex items-center justify-center px-8 py-4 border-2 border-white text-base font-bold rounded-xl text-white bg-transparent hover:bg-white hover:text-purple-600 transition-all duration-300">
                        <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13l-7 7-7-7m14-8l-7 7-7-7"></path>
                        </svg>
                        Explore Programs
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-gradient-to-r from-gray-900 via-purple-900 to-gray-900 text-white relative overflow-hidden">
        <div class="absolute inset-0 bg-black opacity-30"></div>
        <div class="absolute top-0 left-0 w-32 h-32 md:w-64 md:h-64 bg-purple-500 rounded-full mix-blend-multiply filter blur-3xl opacity-10 animate-pulse-slow"></div>
        <div class="absolute bottom-0 right-0 w-32 h-32 md:w-64 md:h-64 bg-pink-500 rounded-full mix-blend-multiply filter blur-3xl opacity-10 animate-pulse-slow animation-delay-3000"></div>
        <div class="max-w-7xl mx-auto py-16 px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-12">
                <div class="col-span-1 md:col-span-2">
                    <div class="flex items-center">
                        <div class="h-16 w-16 rounded-2xl bg-gradient-to-r from-purple-500 to-pink-500 flex items-center justify-center shadow-2xl transform hover:scale-110 transition-all duration-300">
                            <span class="text-white font-bold text-2xl">S</span>
                        </div>
                        <div class="ml-4">
                            <h3 class="text-2xl font-bold bg-gradient-to-r from-white to-purple-200 bg-clip-text text-transparent">SNDT Women's University</h3>
                            <p class="text-purple-200 text-sm font-medium">Empowering Women Since 1976</p>
                        </div>
                    </div>
                    <p class="mt-6 text-gray-300 max-w-md leading-relaxed">
                        A premier institution dedicated to providing quality education and empowering women to become leaders in their respective fields.
                    </p>
                    <div class="mt-6 flex space-x-4">
                        <a href="#" class="text-gray-400 hover:text-white transition-colors duration-300">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/></svg>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white transition-colors duration-300">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M9 8h-3v4h3v12h5v-12h3.642l.358-4h-4v-1.667c0-.955.192-1.333 1.115-1.333h2.885v-5h-3.808c-3.596 0-5.192 1.583-5.192 4.615v3.385z"/></svg>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white transition-colors duration-300">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                        </a>
                    </div>
                </div>
                <div>
                    <h4 class="text-xl font-bold mb-6 bg-gradient-to-r from-purple-400 to-pink-400 bg-clip-text text-transparent">Quick Links</h4>
                    <ul class="space-y-3">
                        <li><a href="{{ route('welcome') }}" class="text-gray-300 hover:text-white hover:ml-2 transition-all duration-300 flex items-center"><span class="w-2 h-2 bg-purple-500 rounded-full mr-3"></span>Home</a></li>
                        <li><a href="{{ route('about') }}" class="text-gray-300 hover:text-white hover:ml-2 transition-all duration-300 flex items-center"><span class="w-2 h-2 bg-pink-500 rounded-full mr-3"></span>About Us</a></li>
                        <li><a href="{{ route('contact') }}" class="text-gray-300 hover:text-white hover:ml-2 transition-all duration-300 flex items-center"><span class="w-2 h-2 bg-orange-500 rounded-full mr-3"></span>Contact</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-white hover:ml-2 transition-all duration-300 flex items-center"><span class="w-2 h-2 bg-yellow-500 rounded-full mr-3"></span>Admissions</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-xl font-bold mb-6 bg-gradient-to-r from-green-400 to-teal-400 bg-clip-text text-transparent">Contact Info</h4>
                    <ul class="space-y-4 text-gray-300">
                        <li class="flex items-start">
                            <span class="text-purple-400 mr-3 mt-1">📍</span>
                            <span>University Campus, Mumbai, Maharashtra 400020</span>
                        </li>
                        <li class="flex items-center">
                            <span class="text-green-400 mr-3">📞</span>
                            <span>+91 22 1234 5678</span>
                        </li>
                        <li class="flex items-center">
                            <span class="text-yellow-400 mr-3">✉️</span>
                            <span>info@sndt.edu.in</span>
                        </li>
                        <li class="flex items-center">
                            <span class="text-pink-400 mr-3">🌐</span>
                            <span>www.sndt.edu.in</span>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="mt-12 pt-8 border-t border-gray-800 text-center text-gray-400">
                <div class="flex flex-col md:flex-row justify-between items-center">
                    <p>&copy; 2026 SNDT Women's University. All rights reserved.</p>
                    <div class="mt-4 md:mt-0 flex space-x-6">
                        <a href="#" class="hover:text-white transition-colors">Privacy Policy</a>
                        <a href="#" class="hover:text-white transition-colors">Terms of Service</a>
                        <a href="#" class="hover:text-white transition-colors">Sitemap</a>
                    </div>
                </div>
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

        // Initialize ScrollReveal animations
        document.addEventListener('DOMContentLoaded', function() {
            // Check if ScrollReveal is loaded
            if (typeof ScrollReveal !== 'undefined') {
                // Configure ScrollReveal
                ScrollReveal().reveal('.animate-hero', {
                    origin: 'bottom',
                    distance: '50px',
                    duration: 1000,
                    delay: 200,
                    opacity: 0,
                    scale: 0.9,
                    easing: 'cubic-bezier(0.5, 0, 0, 1)'
                });

                ScrollReveal().reveal('.animate-section', {
                    origin: 'bottom',
                    distance: '30px',
                    duration: 800,
                    delay: 100,
                    interval: 200,
                    opacity: 0,
                    easing: 'ease-out'
                });

                ScrollReveal().reveal('.animate-card', {
                    origin: 'bottom',
                    distance: '20px',
                    duration: 600,
                    interval: 100,
                    opacity: 0,
                    scale: 0.95,
                    easing: 'ease-out'
                });

                ScrollReveal().reveal('.animate-fade', {
                    opacity: 0,
                    duration: 1000,
                    delay: 300,
                    easing: 'ease-out'
                });

                // Initialize animations
                ScrollReveal().reveal('.hero-content', {
                    origin: 'left',
                    distance: '50px',
                    duration: 1200,
                    delay: 300,
                    opacity: 0
                });

                ScrollReveal().reveal('.hero-image', {
                    origin: 'right',
                    distance: '50px',
                    duration: 1200,
                    delay: 500,
                    opacity: 0
                });

                ScrollReveal().reveal('.stats-item', {
                    origin: 'bottom',
                    distance: '30px',
                    duration: 800,
                    interval: 150,
                    opacity: 0,
                    scale: 0.9
                });

                ScrollReveal().reveal('.department-card', {
                    origin: 'bottom',
                    distance: '25px',
                    duration: 700,
                    interval: 100,
                    opacity: 0,
                    scale: 0.95
                });

                ScrollReveal().reveal('.course-card', {
                    origin: 'bottom',
                    distance: '25px',
                    duration: 700,
                    interval: 120,
                    opacity: 0,
                    scale: 0.95
                });

                ScrollReveal().reveal('.faculty-card', {
                    origin: 'bottom',
                    distance: '25px',
                    duration: 700,
                    interval: 100,
                    opacity: 0,
                    scale: 0.95
                });

                ScrollReveal().reveal('.cta-content', {
                    origin: 'left',
                    distance: '40px',
                    duration: 1000,
                    delay: 200,
                    opacity: 0
                });

                ScrollReveal().reveal('.cta-buttons', {
                    origin: 'right',
                    distance: '40px',
                    duration: 1000,
                    delay: 400,
                    opacity: 0
                });
            }
        });
    </script>
</body>
</html>
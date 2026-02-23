<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $department->name }} - SNDT Women's University</title>
    <meta name="description" content="{{ $department->description }}">
    
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
                        'slide-left': 'slideLeft 0.5s ease-out',
                        'slide-right': 'slideRight 0.5s ease-out',
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
                        slideLeft: {
                            '0%': { transform: 'translateX(-20px)', opacity: '0' },
                            '100%': { transform: 'translateX(0)', opacity: '1' },
                        },
                        slideRight: {
                            '0%': { transform: 'translateX(20px)', opacity: '0' },
                            '100%': { transform: 'translateX(0)', opacity: '1' },
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
            0% {
                transform: scale(0.33);
            }
            80%, 100% {
                opacity: 0;
            }
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
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            transition: left 0.5s;
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
            0% {
                background-position: 0% 50%;
            }
            50% {
                background-position: 100% 50%;
            }
            100% {
                background-position: 0% 50%;
            }
        }
        .hover-grow {
            transition: all 0.3s ease;
        }
        .hover-grow:hover {
            transform: scale(1.05);
        }
        
        /* Hide scrollbar for horizontal navigation */
        .hide-scrollbar {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
        
        .hide-scrollbar::-webkit-scrollbar {
            display: none;
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
    
    <div class="relative min-h-screen overflow-hidden">
        <!-- Animated background elements -->
        <div class="absolute top-20 left-10 w-32 h-32 md:w-64 md:h-64 bg-purple-300 rounded-full mix-blend-multiply filter blur-xl opacity-30 animate-float"></div>
        <div class="absolute top-40 right-10 w-32 h-32 md:w-64 md:h-64 bg-pink-300 rounded-full mix-blend-multiply filter blur-xl opacity-30 animate-float animation-delay-2000"></div>
        <div class="absolute bottom-20 left-1/4 w-32 h-32 md:w-64 md:h-64 bg-blue-300 rounded-full mix-blend-multiply filter blur-xl opacity-30 animate-float animation-delay-4000"></div>
        <div class="absolute bottom-40 right-1/3 w-32 h-32 md:w-64 md:h-64 bg-yellow-300 rounded-full mix-blend-multiply filter blur-xl opacity-30 animate-float animation-delay-1000"></div>

        <!-- Hero Section -->
        <div class="relative bg-gradient-to-r from-purple-700 via-pink-600 to-orange-500" id="about">
            <div class="absolute inset-0">
                <div class="absolute top-0 left-0 w-32 h-32 md:w-72 md:h-72 bg-purple-300 rounded-full mix-blend-multiply filter blur-xl opacity-30 animate-pulse-slow"></div>
                <div class="absolute top-0 right-0 w-32 h-32 md:w-72 md:h-72 bg-yellow-300 rounded-full mix-blend-multiply filter blur-xl opacity-30 animate-pulse-slow animation-delay-2000"></div>
                <div class="absolute bottom-20 left-1/4 w-32 h-32 md:w-64 md:h-64 bg-blue-300 rounded-full mix-blend-multiply filter blur-xl opacity-30 animate-float animation-delay-4000"></div>
                <div class="absolute bottom-40 right-1/3 w-32 h-32 md:w-64 md:h-64 bg-yellow-300 rounded-full mix-blend-multiply filter blur-xl opacity-30 animate-float animation-delay-1000"></div>
            </div>
            <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24 sm:py-32">
                <div class="text-center">
                    <h1 class="text-4xl md:text-6xl font-bold text-white mb-6 animate-fade-in">
                        {{ $department->name }}
                    </h1>
                    <p class="text-xl md:text-2xl text-purple-100 mb-8 max-w-3xl mx-auto animate-slide-up">
                        {{ $department->description }}
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4 justify-center animate-slide-up animation-delay-400">
                        <a href="#faculty" class="px-8 py-4 bg-white text-purple-700 font-bold rounded-xl shadow-xl hover:shadow-2xl transform hover:scale-105 transition-all duration-300 hover-grow">
                            Meet Our Faculty
                        </a>
                        <a href="#courses" class="px-8 py-4 border-2 border-white text-white font-bold rounded-xl hover:bg-white hover:text-purple-700 transition-all duration-300 transform hover:scale-105">
                            Explore Courses
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Quick Navigation -->
        <div class="bg-white shadow-lg">
            <div class="px-4 sm:px-6 lg:px-8 py-6">
                <h3 class="text-lg font-bold text-gray-900 mb-4">Quick Navigation</h3>
                <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-7 gap-2">
                    <a href="#about" class="px-3 py-2 text-sm font-medium rounded-lg bg-purple-100 text-purple-700 text-center hover:bg-purple-200 transition-colors">
                        About
                    </a>
                    <a href="#vision" class="px-3 py-2 text-sm font-medium rounded-lg text-gray-700 bg-gray-100 text-center hover:bg-purple-50 hover:text-purple-600 transition-colors">
                        Vision & Mission
                    </a>
                    <a href="#po" class="px-3 py-2 text-sm font-medium rounded-lg text-gray-700 bg-gray-100 text-center hover:bg-purple-50 hover:text-purple-600 transition-colors">
                        PO/PSO/PEO
                    </a>
                    <a href="#hod" class="px-3 py-2 text-sm font-medium rounded-lg text-gray-700 bg-gray-100 text-center hover:bg-purple-50 hover:text-purple-600 transition-colors">
                        HOD's Desk
                    </a>
                    <a href="#committee" class="px-3 py-2 text-sm font-medium rounded-lg text-gray-700 bg-gray-100 text-center hover:bg-purple-50 hover:text-purple-600 transition-colors">
                        Committee
                    </a>
                    <a href="#faculty" class="px-3 py-2 text-sm font-medium rounded-lg text-gray-700 bg-gray-100 text-center hover:bg-purple-50 hover:text-purple-600 transition-colors">
                        Faculty
                    </a>
                    <a href="#laboratory" class="px-3 py-2 text-sm font-medium rounded-lg text-gray-700 bg-gray-100 text-center hover:bg-purple-50 hover:text-purple-600 transition-colors">
                        Laboratory
                    </a>
                    <a href="#mou" class="px-3 py-2 text-sm font-medium rounded-lg text-gray-700 bg-gray-100 text-center hover:bg-purple-50 hover:text-purple-600 transition-colors">
                        MOU
                    </a>
                    <a href="#industry" class="px-3 py-2 text-sm font-medium rounded-lg text-gray-700 bg-gray-100 text-center hover:bg-purple-50 hover:text-purple-600 transition-colors">
                        Industry
                    </a>
                    <a href="#gallery" class="px-3 py-2 text-sm font-medium rounded-lg text-gray-700 bg-gray-100 text-center hover:bg-purple-50 hover:text-purple-600 transition-colors">
                        Gallery
                    </a>
                    <a href="#events" class="px-3 py-2 text-sm font-medium rounded-lg text-gray-700 bg-gray-100 text-center hover:bg-purple-50 hover:text-purple-600 transition-colors">
                        Events
                    </a>
                    <a href="#alumnae" class="px-3 py-2 text-sm font-medium rounded-lg text-gray-700 bg-gray-100 text-center hover:bg-purple-50 hover:text-purple-600 transition-colors">
                        Alumnae
                    </a>
                    <a href="#social" class="px-3 py-2 text-sm font-medium rounded-lg text-gray-700 bg-gray-100 text-center hover:bg-purple-50 hover:text-purple-600 transition-colors">
                        Social Media
                    </a>
                </div>
            </div>
        </div>

        <!-- Main Content Area -->
        <div class="px-4 sm:px-6 lg:px-8 py-8">
            <div class="flex flex-col lg:flex-row gap-8">
                <!-- Sidebar Navigation -->
                <div class="lg:w-1/4">
                    <div class="bg-white rounded-xl shadow-lg p-6 sticky top-24">
                        <h3 class="text-lg font-bold text-gray-900 mb-4 border-b pb-2">Detailed Navigation</h3>
                        <nav class="space-y-2">
                            <a href="#about" class="block px-4 py-3 text-gray-700 hover:bg-purple-50 hover:text-purple-600 rounded-lg transition-all duration-200 sidebar-link font-medium">
                                <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                About Department
                            </a>
                            <a href="#vision" class="block px-4 py-3 text-gray-700 hover:bg-purple-50 hover:text-purple-600 rounded-lg transition-all duration-200 sidebar-link font-medium">
                                <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                </svg>
                                Vision & Mission
                            </a>
                            <a href="#po" class="block px-4 py-3 text-gray-700 hover:bg-purple-50 hover:text-purple-600 rounded-lg transition-all duration-200 sidebar-link font-medium">
                                <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                                PO, PSO, PEO
                            </a>
                            <a href="#hod" class="block px-4 py-3 text-gray-700 hover:bg-purple-50 hover:text-purple-600 rounded-lg transition-all duration-200 sidebar-link font-medium">
                                <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                                HOD's Desk
                            </a>
                            <a href="#committee" class="block px-4 py-3 text-gray-700 hover:bg-purple-50 hover:text-purple-600 rounded-lg transition-all duration-200 sidebar-link font-medium">
                                <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                </svg>
                                Committee Members
                            </a>
                            <a href="#faculty" class="block px-4 py-3 text-gray-700 hover:bg-purple-50 hover:text-purple-600 rounded-lg transition-all duration-200 sidebar-link font-medium">
                                <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path>
                                </svg>
                                Faculty
                            </a>
                            <a href="#laboratory" class="block px-4 py-3 text-gray-700 hover:bg-purple-50 hover:text-purple-600 rounded-lg transition-all duration-200 sidebar-link font-medium">
                                <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path>
                                </svg>
                                Laboratory
                            </a>
                            <a href="#mou" class="block px-4 py-3 text-gray-700 hover:bg-purple-50 hover:text-purple-600 rounded-lg transition-all duration-200 sidebar-link font-medium">
                                <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                </svg>
                                MOU
                            </a>
                            <a href="#industry" class="block px-4 py-3 text-gray-700 hover:bg-purple-50 hover:text-purple-600 rounded-lg transition-all duration-200 sidebar-link font-medium">
                                <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                </svg>
                                Industry Visits
                            </a>
                            <a href="#gallery" class="block px-4 py-3 text-gray-700 hover:bg-purple-50 hover:text-purple-600 rounded-lg transition-all duration-200 sidebar-link font-medium">
                                <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                                Gallery
                            </a>
                            <a href="#events" class="block px-4 py-3 text-gray-700 hover:bg-purple-50 hover:text-purple-600 rounded-lg transition-all duration-200 sidebar-link font-medium">
                                <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                                Events Organized
                            </a>
                            <a href="#alumnae" class="block px-4 py-3 text-gray-700 hover:bg-purple-50 hover:text-purple-600 rounded-lg transition-all duration-200 sidebar-link font-medium">
                                <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                                Alumnae
                            </a>
                            <a href="#social" class="block px-4 py-3 text-gray-700 hover:bg-purple-50 hover:text-purple-600 rounded-lg transition-all duration-200 sidebar-link font-medium">
                                <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z"></path>
                                </svg>
                                Social Media
                            </a>
                        </nav>
                    </div>
                </div>
                
                <!-- Main Content -->
                <div class="lg:w-3/4">

        <!-- Stats Section -->
        <div class="bg-white py-16 -mt-16 relative z-10">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="bg-white rounded-2xl shadow-xl p-8 border border-purple-100">
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center stats-container">
                        <div class="stats-item transform hover:scale-105 transition-all duration-300">
                            <div class="text-4xl font-bold bg-gradient-to-r from-purple-600 to-pink-500 bg-clip-text text-transparent">{{ $department->faculty->count() }}</div>
                            <div class="mt-2 text-gray-600 font-medium">Faculty Members</div>
                        </div>
                        <div class="stats-item transform hover:scale-105 transition-all duration-300">
                            <div class="text-4xl font-bold bg-gradient-to-r from-purple-600 to-pink-500 bg-clip-text text-transparent">{{ $department->courses->count() }}</div>
                            <div class="mt-2 text-gray-600 font-medium">Programs</div>
                        </div>
                        <div class="stats-item transform hover:scale-105 transition-all duration-300">
                            <div class="text-4xl font-bold bg-gradient-to-r from-purple-600 to-pink-500 bg-clip-text text-transparent">{{ $department->code }}</div>
                            <div class="mt-2 text-gray-600 font-medium">Department Code</div>
                        </div>
                        <div class="stats-item transform hover:scale-105 transition-all duration-300">
                            <div class="text-4xl font-bold bg-gradient-to-r from-purple-600 to-pink-500 bg-clip-text text-transparent">45+</div>
                            <div class="mt-2 text-gray-600 font-medium">Years Active</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Vision & Mission Section -->
        <div class="py-16 bg-white" id="vision">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-16">
                    <h2 class="text-3xl font-bold text-gray-900 sm:text-4xl animate-slide-up">Vision & Mission</h2>
                    <p class="mt-4 text-xl text-gray-600 animate-slide-up animation-delay-200">Our guiding principles and future aspirations</p>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
                    <div class="bg-gradient-to-br from-purple-100 to-pink-100 rounded-2xl p-8 shadow-lg vision-card">
                        <div class="flex items-center mb-6">
                            <div class="h-12 w-12 rounded-lg bg-gradient-to-r from-purple-600 to-pink-500 flex items-center justify-center">
                                <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                </svg>
                            </div>
                            <h3 class="ml-4 text-2xl font-bold text-gray-900">Our Vision</h3>
                        </div>
                        <p class="text-gray-700 text-lg">
                            To be a globally recognized center of excellence in {{ strtolower(str_replace('Department', '', $department->name)) }} education, research, and innovation, producing graduates who contribute meaningfully to society and inspire future generations.
                        </p>
                    </div>
                    
                    <div class="bg-gradient-to-br from-pink-100 to-orange-100 rounded-2xl p-8 shadow-lg mission-card">
                        <div class="flex items-center mb-6">
                            <div class="h-12 w-12 rounded-lg bg-gradient-to-r from-pink-500 to-orange-500 flex items-center justify-center">
                                <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                                </svg>
                            </div>
                            <h3 class="ml-4 text-2xl font-bold text-gray-900">Our Mission</h3>
                        </div>
                        <p class="text-gray-700 text-lg">
                            To provide quality {{ strtolower(str_replace('Department', '', $department->name)) }} education, foster intellectual and personal growth, and prepare students to become leaders and change-makers in society through innovative teaching, research, and community engagement.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- PO, PSO, PEO Section -->
        <div class="py-16 bg-gradient-to-br from-purple-50 via-pink-50 to-orange-50" id="po">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-16">
                    <h2 class="text-3xl font-bold text-gray-900 sm:text-4xl animate-slide-up">PO, PSO, PEO</h2>
                    <p class="mt-4 text-xl text-gray-600 animate-slide-up animation-delay-200">Program Outcomes, Program Specific Outcomes, and Program Educational Objectives</p>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div class="bg-white rounded-xl p-6 shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2">
                        <div class="h-12 w-12 rounded-lg bg-gradient-to-r from-purple-100 to-pink-100 flex items-center justify-center mb-4">
                            <svg class="h-6 w-6 text-purple-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Program Outcomes (PO)</h3>
                        <p class="text-gray-600">Graduates will demonstrate engineering knowledge, problem analysis, design solutions, and professional skills in their field.</p>
                    </div>
                    
                    <div class="bg-white rounded-xl p-6 shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2">
                        <div class="h-12 w-12 rounded-lg bg-gradient-to-r from-pink-100 to-orange-100 flex items-center justify-center mb-4">
                            <svg class="h-6 w-6 text-pink-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Program Specific Outcomes (PSO)</h3>
                        <p class="text-gray-600">Specialized knowledge and skills specific to {{ $department->code }} field and industry requirements.</p>
                    </div>
                    
                    <div class="bg-white rounded-xl p-6 shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2">
                        <div class="h-12 w-12 rounded-lg bg-gradient-to-r from-orange-100 to-yellow-100 flex items-center justify-center mb-4">
                            <svg class="h-6 w-6 text-orange-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Program Educational Objectives (PEO)</h3>
                        <p class="text-gray-600">Career advancement, leadership qualities, and contribution to technological and social development.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- HOD's Desk -->
        <div class="py-16 bg-white" id="hod">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-16">
                    <h2 class="text-3xl font-bold text-gray-900 sm:text-4xl animate-slide-up">HOD's Desk</h2>
                    <p class="mt-4 text-xl text-gray-600 animate-slide-up animation-delay-200">Message from the Head of Department</p>
                </div>
                
                <div class="bg-gradient-to-br from-purple-50 to-pink-50 rounded-2xl p-8 md:p-12 shadow-xl">
                    <div class="flex flex-col md:flex-row items-center gap-8">
                        <div class="flex-shrink-0">
                            <div class="h-32 w-32 rounded-full bg-gradient-to-r from-purple-200 to-pink-200 flex items-center justify-center border-4 border-white shadow-lg">
                                <svg class="h-16 w-16 text-purple-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                            </div>
                        </div>
                        <div class="flex-1 text-center md:text-left">
                            <h3 class="text-2xl font-bold text-gray-900 mb-2">{{ $department->head_name }}</h3>
                            <p class="text-purple-600 font-medium mb-4">Head of {{ $department->name }}</p>
                            <p class="text-gray-700 text-lg leading-relaxed">
                                Welcome to the {{ $department->name }}. Our department is committed to providing excellence in education and research. We strive to nurture critical thinking, innovation, and leadership qualities in our students to prepare them for the challenges of the modern world.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Department Overview -->
        <div class="py-16 bg-gradient-to-br from-purple-50 via-pink-50 to-orange-50" id="about">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-16">
                    <h2 class="text-3xl font-bold text-gray-900 sm:text-4xl animate-slide-up">About Department</h2>
                    <p class="mt-4 text-xl text-gray-600 animate-slide-up animation-delay-200">Learn more about our {{ $department->name }}</p>
                </div>
                
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                    <div class="overview-content">
                        <h3 class="text-2xl font-bold text-gray-900 mb-6 animate-slide-right">Department Information</h3>
                        <div class="space-y-6">
                            <div class="flex items-start animate-slide-right animation-delay-100">
                                <div class="flex-shrink-0 h-6 w-6 rounded-full bg-gradient-to-r from-purple-500 to-pink-500 flex items-center justify-center mt-1">
                                    <svg class="h-3 w-3 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                </div>
                                <div class="ml-4">
                                    <h4 class="text-lg font-medium text-gray-900">Department Head</h4>
                                    <p class="text-gray-600">{{ $department->head_name }}</p>
                                </div>
                            </div>
                            
                            <div class="flex items-start animate-slide-right animation-delay-200">
                                <div class="flex-shrink-0 h-6 w-6 rounded-full bg-gradient-to-r from-purple-500 to-pink-500 flex items-center justify-center mt-1">
                                    <svg class="h-3 w-3 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                    </svg>
                                </div>
                                <div class="ml-4">
                                    <h4 class="text-lg font-medium text-gray-900">Contact</h4>
                                    <p class="text-gray-600">
                                        <a href="mailto:{{ $department->email }}" class="text-purple-600 hover:text-purple-800">{{ $department->email }}</a><br>
                                        <a href="tel:{{ $department->phone }}" class="text-purple-600 hover:text-purple-800">{{ $department->phone }}</a>
                                    </p>
                                </div>
                            </div>
                            
                            <div class="flex items-start animate-slide-right animation-delay-300">
                                <div class="flex-shrink-0 h-6 w-6 rounded-full bg-gradient-to-r from-purple-500 to-pink-500 flex items-center justify-center mt-1">
                                    <svg class="h-3 w-3 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                </div>
                                <div class="ml-4">
                                    <h4 class="text-lg font-medium text-gray-900">Location</h4>
                                    <p class="text-gray-600">{{ $department->location }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="bg-gradient-to-br from-purple-200 to-pink-200 rounded-2xl h-96 flex items-center justify-center shadow-xl transform hover:scale-105 transition-all duration-500 animate-float">
                        <div class="text-center text-purple-800">
                            <svg class="h-24 w-24 mx-auto mb-4 text-purple-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                            </svg>
                            <p class="font-semibold text-lg">{{ $department->name }}</p>
                            <p class="text-sm mt-2">Department Building</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Faculty Section -->
        <div class="py-16 bg-white" id="faculty">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-16">
                    <h2 class="text-3xl font-bold text-gray-900 sm:text-4xl animate-slide-up">Our Faculty</h2>
                    <p class="mt-4 text-xl text-gray-600 animate-slide-up animation-delay-200">Meet the experts leading our department</p>
                </div>
                
                @if($department->faculty->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 faculty-container">
                    @foreach($department->faculty->take(6) as $faculty)
                    <div class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-3 card-hover border border-purple-100 faculty-card">
                        <div class="p-6">
                            <div class="flex items-center mb-4">
                                <div class="h-14 w-14 rounded-xl bg-gradient-to-r from-purple-100 to-pink-100 flex items-center justify-center relative overflow-hidden">
                                    <div class="absolute inset-0 bg-gradient-to-r from-purple-400 to-pink-400 opacity-20"></div>
                                    <div class="absolute -top-2 -right-2 w-4 h-4 bg-yellow-400 rounded-full animate-ping"></div>
                                    <svg class="w-6 h-6 text-purple-600 relative z-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                    </svg>
                                </div>
                                <div class="ml-4">
                                    <h3 class="text-lg font-bold text-gray-900">{{ $faculty->name }}</h3>
                                    <p class="text-purple-600 font-medium">{{ $faculty->designation }}</p>
                                </div>
                            </div>
                            <p class="text-gray-600 text-sm mb-4">{{ Str::limit($faculty->qualification, 100) }}</p>
                            <div class="flex items-center text-sm text-gray-500">
                                <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path>
                                    <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path>
                                </svg>
                                <span>{{ $faculty->email }}</span>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                @else
                <div class="text-center py-12">
                    <div class="bg-gradient-to-br from-purple-100 to-pink-100 rounded-2xl p-8 max-w-2xl mx-auto">
                        <svg class="h-16 w-16 mx-auto text-purple-500 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                        <h3 class="text-xl font-bold text-gray-900 mb-2">No Faculty Members</h3>
                        <p class="text-gray-600">This department currently has no faculty members listed.</p>
                    </div>
                </div>
                @endif
            </div>
        </div>

        <!-- Courses Section -->
        <div class="py-16 bg-gradient-to-br from-purple-50 via-pink-50 to-orange-50" id="po">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-16">
                    <h2 class="text-3xl font-bold text-gray-900 sm:text-4xl animate-slide-up">Programs Offered</h2>
                    <p class="mt-4 text-xl text-gray-600 animate-slide-up animation-delay-200">Explore our academic programs</p>
                </div>
                
                @if($department->courses->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 courses-container">
                    @foreach($department->courses->take(6) as $course)
                    <div class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-3 card-hover border border-green-100 course-card">
                        <div class="p-6">
                            <div class="flex items-center mb-4">
                                <div class="h-12 w-12 rounded-xl bg-gradient-to-r from-green-100 to-teal-100 flex items-center justify-center relative overflow-hidden">
                                    <div class="absolute inset-0 bg-gradient-to-r from-green-400 to-teal-400 opacity-20"></div>
                                    <div class="absolute -top-2 -right-2 w-4 h-4 bg-yellow-400 rounded-full animate-ping"></div>
                                    <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                                    </svg>
                                </div>
                                <div class="ml-4">
                                    <h3 class="text-lg font-bold text-gray-900">{{ $course->name }}</h3>
                                    <p class="text-green-600 font-medium">{{ $course->duration }}</p>
                                </div>
                            </div>
                            <p class="text-gray-600 text-sm mb-4">{{ Str::limit($course->description, 100) }}</p>
                            <div class="flex justify-between items-center">
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-800">
                                    {{ $course->code }}
                                </span>
                                <span class="text-lg font-bold text-green-600">₹{{ number_format($course->fees) }}</span>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                @else
                <div class="text-center py-12">
                    <div class="bg-gradient-to-br from-green-100 to-teal-100 rounded-2xl p-8 max-w-2xl mx-auto">
                        <svg class="h-16 w-16 mx-auto text-green-500 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                        </svg>
                        <h3 class="text-xl font-bold text-gray-900 mb-2">No Programs Available</h3>
                        <p class="text-gray-600">This department currently has no programs listed.</p>
                    </div>
                </div>
                @endif
            </div>
        </div>

        <!-- CTA Section -->
        <div class="bg-gradient-to-r from-purple-700 via-pink-600 to-orange-500 relative overflow-hidden" id="social">
            <div class="absolute inset-0 bg-black opacity-10"></div>
            <div class="absolute inset-0">
                <div class="absolute top-0 left-0 w-48 h-48 md:w-96 md:h-96 bg-purple-300 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-pulse-slow"></div>
                <div class="absolute top-0 right-0 w-48 h-48 md:w-96 md:h-96 bg-yellow-300 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-pulse-slow animation-delay-2000"></div>
                <div class="absolute bottom-0 left-1/3 w-48 h-48 md:w-96 md:h-96 bg-pink-300 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-pulse-slow animation-delay-4000"></div>
            </div>
            <div class="max-w-7xl mx-auto py-16 px-4 sm:px-6 lg:py-20 lg:px-8 lg:flex lg:items-center lg:justify-between relative z-10">
                <div class="text-center lg:text-left animate-fade-in cta-content">
                    <h2 class="text-3xl font-extrabold tracking-tight text-white sm:text-4xl">
                        <span class="block">Interested in joining {{ $department->code }}?</span>
                        <span class="block text-yellow-200">Start your application today.</span>
                    </h2>
                    <p class="mt-4 text-xl text-purple-100 max-w-3xl">
                        Take the next step in your academic journey with our {{ $department->name }} department.
                    </p>
                    <div class="mt-8 flex flex-col sm:flex-row sm:justify-center lg:justify-start gap-4 cta-buttons">
                        <a href="{{ route('contact') }}" class="inline-flex items-center justify-center px-8 py-4 border border-transparent text-base font-medium rounded-md text-purple-600 bg-white hover:bg-yellow-50 md:py-4 md:text-lg md:px-10 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-300 shine-effect">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                            Contact Admissions
                        </a>
                        <a href="{{ route('welcome') }}" class="inline-flex items-center justify-center px-8 py-4 border border-white text-base font-medium rounded-md text-white bg-transparent hover:bg-white hover:text-purple-600 md:py-4 md:text-lg md:px-10 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-300">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                            </svg>
                            Back to Home
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Committee Members -->
        <div class="py-16 bg-white" id="committee">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-16">
                    <h2 class="text-3xl font-bold text-gray-900 sm:text-4xl animate-slide-up">Committee Members</h2>
                    <p class="mt-4 text-xl text-gray-600 animate-slide-up animation-delay-200">Leadership and advisory committee</p>
                </div>
                
                <div class="text-center">
                    <div class="bg-gradient-to-br from-purple-100 to-pink-100 rounded-2xl p-12 shadow-lg">
                        <div class="h-24 w-24 rounded-full bg-gradient-to-r from-purple-200 to-pink-200 flex items-center justify-center mx-auto mb-6">
                            <svg class="h-12 w-12 text-purple-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-2">Department Committees</h3>
                        <p class="text-gray-700">Committee information and membership details coming soon.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Laboratory Section -->
        <div class="py-16 bg-gradient-to-br from-purple-50 via-pink-50 to-orange-50" id="laboratory">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-16">
                    <h2 class="text-3xl font-bold text-gray-900 sm:text-4xl animate-slide-up">Laboratory</h2>
                    <p class="mt-4 text-xl text-gray-600 animate-slide-up animation-delay-200">State-of-the-art facilities and research labs</p>
                </div>
                
                <div class="text-center">
                    <div class="bg-white rounded-2xl p-12 shadow-lg">
                        <div class="h-24 w-24 rounded-full bg-gradient-to-r from-purple-200 to-pink-200 flex items-center justify-center mx-auto mb-6">
                            <svg class="h-12 w-12 text-purple-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-2">Research Facilities</h3>
                        <p class="text-gray-700">Modern laboratory infrastructure and research facilities available for students and faculty.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- MOU Section -->
        <div class="py-16 bg-white" id="mou">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-16">
                    <h2 class="text-3xl font-bold text-gray-900 sm:text-4xl animate-slide-up">MOU</h2>
                    <p class="mt-4 text-xl text-gray-600 animate-slide-up animation-delay-200">Memorandums of Understanding</p>
                </div>
                
                <div class="text-center">
                    <div class="bg-gradient-to-br from-purple-100 to-pink-100 rounded-2xl p-12 shadow-lg">
                        <div class="h-24 w-24 rounded-full bg-gradient-to-r from-purple-200 to-pink-200 flex items-center justify-center mx-auto mb-6">
                            <svg class="h-12 w-12 text-purple-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-2">Partnership Agreements</h3>
                        <p class="text-gray-700">MOU details and collaborative partnerships with industry and academic institutions.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Industry Visits -->
        <div class="py-16 bg-gradient-to-br from-purple-50 via-pink-50 to-orange-50" id="industry">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-16">
                    <h2 class="text-3xl font-bold text-gray-900 sm:text-4xl animate-slide-up">Industry Visits</h2>
                    <p class="mt-4 text-xl text-gray-600 animate-slide-up animation-delay-200">Practical exposure and industrial collaborations</p>
                </div>
                
                <div class="text-center">
                    <div class="bg-white rounded-2xl p-12 shadow-lg">
                        <div class="h-24 w-24 rounded-full bg-gradient-to-r from-purple-200 to-pink-200 flex items-center justify-center mx-auto mb-6">
                            <svg class="h-12 w-12 text-purple-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-2">Industry Connect</h3>
                        <p class="text-gray-700">Industrial visits, guest lectures, and industry interaction programs for student enrichment.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Gallery -->
        <div class="py-16 bg-white" id="gallery">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-16">
                    <h2 class="text-3xl font-bold text-gray-900 sm:text-4xl animate-slide-up">Gallery</h2>
                    <p class="mt-4 text-xl text-gray-600 animate-slide-up animation-delay-200">Department events and activities</p>
                </div>
                
                <div class="text-center">
                    <div class="bg-gradient-to-br from-purple-100 to-pink-100 rounded-2xl p-12 shadow-lg">
                        <div class="h-24 w-24 rounded-full bg-gradient-to-r from-purple-200 to-pink-200 flex items-center justify-center mx-auto mb-6">
                            <svg class="h-12 w-12 text-purple-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-2">Photo Gallery</h3>
                        <p class="text-gray-700">Visual documentation of department activities, events, and achievements.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Events Organized -->
        <div class="py-16 bg-gradient-to-br from-purple-50 via-pink-50 to-orange-50" id="events">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-16">
                    <h2 class="text-3xl font-bold text-gray-900 sm:text-4xl animate-slide-up">Events Organized</h2>
                    <p class="mt-4 text-xl text-gray-600 animate-slide-up animation-delay-200">Department activities and programs</p>
                </div>
                
                <div class="text-center">
                    <div class="bg-white rounded-2xl p-12 shadow-lg">
                        <div class="h-24 w-24 rounded-full bg-gradient-to-r from-purple-200 to-pink-200 flex items-center justify-center mx-auto mb-6">
                            <svg class="h-12 w-12 text-purple-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-2">Events Calendar</h3>
                        <p class="text-gray-700">Workshops, seminars, conferences, and other academic events organized by the department.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Alumnae -->
        <div class="py-16 bg-white" id="alumnae">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-16">
                    <h2 class="text-3xl font-bold text-gray-900 sm:text-4xl animate-slide-up">Alumnae</h2>
                    <p class="mt-4 text-xl text-gray-600 animate-slide-up animation-delay-200">Our distinguished alumni network</p>
                </div>
                
                <div class="text-center">
                    <div class="bg-gradient-to-br from-purple-100 to-pink-100 rounded-2xl p-12 shadow-lg">
                        <div class="h-24 w-24 rounded-full bg-gradient-to-r from-purple-200 to-pink-200 flex items-center justify-center mx-auto mb-6">
                            <svg class="h-12 w-12 text-purple-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-2">Alumni Network</h3>
                        <p class="text-gray-700">Success stories and achievements of our department's graduates in various fields.</p>
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
                        <div class="flex items-center animate-slide-right">
                            <div class="h-16 w-16 rounded-2xl bg-gradient-to-r from-purple-500 to-pink-500 flex items-center justify-center shadow-2xl transform hover:scale-110 transition-all duration-300">
                                <span class="text-white font-bold text-2xl">S</span>
                            </div>
                            <div class="ml-4">
                                <h3 class="text-2xl font-bold bg-gradient-to-r from-white to-purple-200 bg-clip-text text-transparent">SNDT Women's University</h3>
                                <p class="text-purple-200 text-sm font-medium">Empowering Women Since 1976</p>
                            </div>
                        </div>
                        <p class="mt-6 text-purple-100 max-w-md animate-slide-right animation-delay-200">
                            A premier institution dedicated to providing quality education and empowering women to become leaders in their respective fields.
                        </p>
                    </div>
                    <div class="animate-slide-up animation-delay-300">
                        <h4 class="text-lg font-semibold mb-6 text-white">Quick Links</h4>
                        <ul class="space-y-3">
                            <li><a href="{{ route('welcome') }}" class="text-purple-200 hover:text-white transition-colors duration-300 flex items-center">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                                </svg>
                                Home
                            </a></li>
                            <li><a href="{{ route('about') }}" class="text-purple-200 hover:text-white transition-colors duration-300 flex items-center">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                About Us
                            </a></li>
                            <li><a href="{{ route('contact') }}" class="text-purple-200 hover:text-white transition-colors duration-300 flex items-center">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                </svg>
                                Contact
                            </a></li>
                            <li><a href="{{ route('department.show', $department->code) }}" class="text-purple-200 hover:text-white transition-colors duration-300 flex items-center">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                </svg>
                                {{ $department->name }}
                            </a></li>
                        </ul>
                    </div>
                    <div class="animate-slide-up animation-delay-400">
                        <h4 class="text-lg font-semibold mb-6 text-white">Contact Info</h4>
                        <ul class="space-y-3 text-purple-200">
                            <li class="flex items-start">
                                <svg class="w-4 h-4 mr-2 mt-1 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                                <span>University Campus, Mumbai</span>
                            </li>
                            <li class="flex items-center">
                                <svg class="w-4 h-4 mr-2 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                </svg>
                                <span>+91 22 1234 5678</span>
                            </li>
                            <li class="flex items-center">
                                <svg class="w-4 h-4 mr-2 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                </svg>
                                <span>info@sndt.edu.in</span>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="mt-12 pt-8 border-t border-purple-800 text-center text-purple-300 animate-fade-in">
                    <p>&copy; 2026 SNDT Women's University. All rights reserved.</p>
                </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Footer -->
        <footer class="bg-gradient-to-r from-gray-900 via-purple-900 to-gray-900 text-white relative overflow-hidden">
            <div class="absolute inset-0 bg-black opacity-30"></div>
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 relative z-10">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div>
                        <h3 class="text-xl font-bold mb-4">SNDT Women's University</h3>
                        <p class="text-purple-200">Empowering women through education since 1976</p>
                    </div>
                    <div>
                        <h4 class="text-lg font-semibold mb-4">Quick Links</h4>
                        <ul class="space-y-2 text-purple-200">
                            <li><a href="{{ route('welcome') }}" class="hover:text-white transition-colors">Home</a></li>
                            <li><a href="{{ route('about') }}" class="hover:text-white transition-colors">About</a></li>
                            <li><a href="{{ route('contact') }}" class="hover:text-white transition-colors">Contact</a></li>
                        </ul>
                    </div>
                    <div>
                        <h4 class="text-lg font-semibold mb-4">Contact Info</h4>
                        <ul class="space-y-2 text-purple-200">
                            <li class="flex items-center">
                                <svg class="w-4 h-4 mr-2 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                </svg>
                                <span>+91 9876543210</span>
                            </li>
                            <li class="flex items-center">
                                <svg class="w-4 h-4 mr-2 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                </svg>
                                <span>info@sndt.edu.in</span>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="mt-12 pt-8 border-t border-purple-800 text-center text-purple-300 animate-fade-in">
                    <p>&copy; 2026 SNDT Women's University. All rights reserved.</p>
                </div>
            </div>
        </footer>
    </div>
    </div>

    <script>
        // Sidebar navigation active state
        document.addEventListener('DOMContentLoaded', function() {
            const sidebarLinks = document.querySelectorAll('.sidebar-link');
            const sections = document.querySelectorAll('div[id]');
            
            function setActiveLink() {
                let current = '';
                sections.forEach(section => {
                    const sectionTop = section.offsetTop;
                    const sectionHeight = section.clientHeight;
                    if (pageYOffset >= (sectionTop - 120)) {
                        current = section.getAttribute('id');
                    }
                });
                
                sidebarLinks.forEach(link => {
                    link.classList.remove('bg-purple-50', 'text-purple-600');
                    link.classList.add('text-gray-700');
                    if (link.getAttribute('href') === '#' + current) {
                        link.classList.remove('text-gray-700');
                        link.classList.add('bg-purple-50', 'text-purple-600');
                    }
                });
            }
            
            window.addEventListener('scroll', setActiveLink);
            setActiveLink(); // Set initial state
        });
        
        // ScrollReveal animations
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize ScrollReveal
            ScrollReveal().reveal('.stats-item', {
                origin: 'bottom',
                distance: '30px',
                duration: 800,
                delay: 200,
                interval: 100,
                opacity: 0,
                easing: 'ease-out'
            });
            
            ScrollReveal().reveal('.overview-content', {
                origin: 'left',
                distance: '50px',
                duration: 1000,
                delay: 300,
                opacity: 0,
                easing: 'ease-out'
            });
            
            ScrollReveal().reveal('.faculty-card', {
                origin: 'bottom',
                distance: '30px',
                duration: 800,
                delay: 200,
                interval: 150,
                opacity: 0,
                easing: 'ease-out'
            });
            
            ScrollReveal().reveal('.course-card', {
                origin: 'bottom',
                distance: '30px',
                duration: 800,
                delay: 200,
                interval: 150,
                opacity: 0,
                easing: 'ease-out'
            });
            
            ScrollReveal().reveal('.cta-content', {
                origin: 'left',
                distance: '50px',
                duration: 1000,
                delay: 300,
                opacity: 0,
                easing: 'ease-out'
            });
            
            ScrollReveal().reveal('.cta-buttons', {
                origin: 'bottom',
                distance: '30px',
                duration: 800,
                delay: 500,
                opacity: 0,
                easing: 'ease-out'
            });
        });
    </script>
    
    <script>
        // Mobile menu toggle
        document.getElementById('mobile-menu-button').addEventListener('click', function() {
            const mobileMenu = document.getElementById('mobile-menu');
            mobileMenu.classList.toggle('hidden');
        });
        
        // Close mobile menu when clicking on a link
        document.querySelectorAll('#mobile-menu a').forEach(link => {
            link.addEventListener('click', function() {
                const mobileMenu = document.getElementById('mobile-menu');
                mobileMenu.classList.add('hidden');
            });
        });
    </script>
</body>
</html>
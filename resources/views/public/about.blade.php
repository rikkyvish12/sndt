<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>About SNDT Women's University</title>
    <meta name="description" content="Learn about SNDT Women's University - our history, mission, vision, and commitment to women's education">
    
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
                        },
                        secondary: {
                            500: '#8b5cf6',
                            600: '#7c3aed',
                            700: '#6d28d9',
                        },
                        accent: {
                            500: '#ec4899',
                            600: '#db2777',
                        }
                    },
                    animation: {
                        'fade-in': 'fadeIn 0.6s ease-out',
                        'slide-up': 'slideUp 0.6s ease-out',
                        'slide-left': 'slideLeft 0.6s ease-out',
                        'slide-right': 'slideRight 0.6s ease-out',
                        'bounce-slow': 'bounce 3s infinite',
                        'pulse-slow': 'pulse 3s cubic-bezier(0.4, 0, 0.6, 1) infinite',
                        'float': 'float 6s ease-in-out infinite',
                    },
                    keyframes: {
                        fadeIn: {
                            '0%': { opacity: '0' },
                            '100%': { opacity: '1' },
                        },
                        slideUp: {
                            '0%': { transform: 'translateY(30px)', opacity: '0' },
                            '100%': { transform: 'translateY(0)', opacity: '1' },
                        },
                        slideLeft: {
                            '0%': { transform: 'translateX(-30px)', opacity: '0' },
                            '100%': { transform: 'translateX(0)', opacity: '1' },
                        },
                        slideRight: {
                            '0%': { transform: 'translateX(30px)', opacity: '0' },
                            '100%': { transform: 'translateX(0)', opacity: '1' },
                        },
                        float: {
                            '0%, 100%': { transform: 'translateY(0px)' },
                            '50%': { transform: 'translateY(-20px)' },
                        }
                    }
                }
            }
        }
    </script>
    
    <!-- ScrollReveal.js -->
    <script src="https://unpkg.com/scrollreveal@4.0.9/dist/scrollreveal.min.js"></script>
</head>
<body class="bg-gradient-to-br from-gray-50 via-purple-50 to-pink-50 font-sans">
    <div class="relative min-h-screen overflow-hidden">
        <!-- Animated background elements -->
        <div class="absolute top-20 left-10 w-64 h-64 bg-purple-200 rounded-full mix-blend-multiply filter blur-xl opacity-30 animate-float"></div>
        <div class="absolute top-40 right-10 w-72 h-72 bg-pink-200 rounded-full mix-blend-multiply filter blur-xl opacity-30 animate-float animation-delay-2000"></div>
        <div class="absolute bottom-20 left-1/4 w-80 h-80 bg-blue-200 rounded-full mix-blend-multiply filter blur-xl opacity-30 animate-float animation-delay-4000"></div>
        <div class="absolute bottom-40 right-1/3 w-60 h-60 bg-yellow-200 rounded-full mix-blend-multiply filter blur-xl opacity-30 animate-float animation-delay-1000"></div>
    <!-- Navigation -->
    <nav class="bg-white/90 backdrop-blur-md shadow-lg sticky top-0 z-50 border-b border-white/20 animate-fade-in">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <div class="flex-shrink-0 flex items-center animate-slide-right">
                        <div class="h-10 w-10 rounded-full bg-gradient-to-r from-purple-600 to-pink-500 flex items-center justify-center shadow-lg transform hover:scale-110 transition-transform duration-300">
                            <span class="text-white font-bold text-xl">S</span>
                        </div>
                        <div class="ml-3">
                            <h1 class="text-xl font-bold text-gray-900">SNDT Women's University</h1>
                            <p class="text-xs text-gray-500">Empowering Women Since 1976</p>
                        </div>
                    </div>
                </div>
                <div class="hidden md:flex items-center space-x-8 animate-slide-left">
                    <a href="{{ route('welcome') }}" class="text-gray-700 hover:text-purple-600 font-medium transition-colors duration-300 px-3 py-2 rounded-lg hover:bg-purple-50">Home</a>
                    <a href="{{ route('about') }}" class="text-purple-600 font-medium border-b-2 border-purple-600 px-3 py-2">About</a>
                    <a href="{{ route('contact') }}" class="text-gray-700 hover:text-purple-600 font-medium transition-colors duration-300 px-3 py-2 rounded-lg hover:bg-purple-50">Contact</a>
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/admin/dashboard') }}" class="bg-gradient-to-r from-purple-600 to-pink-500 text-white px-4 py-2 rounded-lg hover:from-purple-700 hover:to-pink-600 font-medium shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-0.5">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}" class="bg-gradient-to-r from-purple-600 to-pink-500 text-white px-4 py-2 rounded-lg hover:from-purple-700 hover:to-pink-600 font-medium shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-0.5">Login</a>
                        @endauth
                    @endif
                </div>
                <div class="md:hidden flex items-center">
                    <button id="mobile-menu-button" class="text-gray-700 hover:text-purple-600 transition-colors duration-300">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
        <div id="mobile-menu" class="md:hidden hidden animate-slide-up">
            <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3 bg-white/95 backdrop-blur-md border-t border-white/20">
                <a href="{{ route('welcome') }}" class="block px-3 py-2 text-gray-700 hover:text-purple-600 font-medium rounded-lg hover:bg-purple-50 transition-colors duration-300">Home</a>
                <a href="{{ route('about') }}" class="block px-3 py-2 text-purple-600 font-medium border-l-4 border-purple-600 bg-purple-50">About</a>
                <a href="{{ route('contact') }}" class="block px-3 py-2 text-gray-700 hover:text-purple-600 font-medium rounded-lg hover:bg-purple-50 transition-colors duration-300">Contact</a>
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/admin/dashboard') }}" class="block px-3 py-2 bg-gradient-to-r from-purple-600 to-pink-500 text-white rounded-lg hover:from-purple-700 hover:to-pink-600 font-medium text-center mt-2 shadow-lg transition-all duration-300">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="block px-3 py-2 bg-gradient-to-r from-purple-600 to-pink-500 text-white rounded-lg hover:from-purple-700 hover:to-pink-600 font-medium text-center mt-2 shadow-lg transition-all duration-300">Login</a>
                    @endauth
                @endif
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <div class="relative bg-gradient-to-r from-purple-700 via-pink-600 to-orange-500 py-24 overflow-hidden animate-fade-in">
        <div class="absolute inset-0 bg-black/20"></div>
        <div class="absolute inset-0">
            <svg class="absolute inset-0 w-full h-full" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 400" preserveAspectRatio="none">
                <defs>
                    <linearGradient id="aboutHeroGrad" x1="0%" y1="0%" x2="100%" y2="0%">
                        <stop offset="0%" style="stop-color:#7e22ce;stop-opacity:1" />
                        <stop offset="50%" style="stop-color:#ec4899;stop-opacity:1" />
                        <stop offset="100%" style="stop-color:#f97316;stop-opacity:1" />
                    </linearGradient>
                </defs>
                <path d="M0,0 L1200,0 L1200,300 Q600,400 0,300 Z" fill="url(#aboutHeroGrad)"/>
            </svg>
        </div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center">
                <h1 class="text-4xl font-bold text-white sm:text-5xl md:text-6xl animate-slide-up">
                    About SNDT Women's University
                </h1>
                <p class="mt-6 text-xl text-purple-100 max-w-3xl mx-auto animate-slide-up animation-delay-200">
                    A premier institution dedicated to empowering women through quality education and holistic development since 1976.
                </p>
            </div>
        </div>
    </div>

    <!-- Stats Section -->
    <div class="bg-white/80 backdrop-blur-sm py-16 -mt-16 relative z-10 animate-fade-in">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-gradient-to-br from-white to-purple-50 rounded-2xl shadow-2xl p-8 border border-white/50">
                <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center stats-container">
                    <div class="stats-item transform hover:scale-105 transition-all duration-300">
                        <div class="text-4xl font-bold bg-gradient-to-r from-purple-600 to-pink-500 bg-clip-text text-transparent">{{ $departments }}</div>
                        <div class="mt-2 text-gray-600 font-medium">Departments</div>
                    </div>
                    <div class="stats-item transform hover:scale-105 transition-all duration-300">
                        <div class="text-4xl font-bold bg-gradient-to-r from-purple-600 to-pink-500 bg-clip-text text-transparent">{{ $facultyCount }}</div>
                        <div class="mt-2 text-gray-600 font-medium">Faculty Members</div>
                    </div>
                    <div class="stats-item transform hover:scale-105 transition-all duration-300">
                        <div class="text-4xl font-bold bg-gradient-to-r from-purple-600 to-pink-500 bg-clip-text text-transparent">{{ $coursesCount }}</div>
                        <div class="mt-2 text-gray-600 font-medium">Programs</div>
                    </div>
                    <div class="stats-item transform hover:scale-105 transition-all duration-300">
                        <div class="text-4xl font-bold bg-gradient-to-r from-purple-600 to-pink-500 bg-clip-text text-transparent">45+</div>
                        <div class="mt-2 text-gray-600 font-medium">Years of Excellence</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- History Section -->
    <div class="py-16 bg-gradient-to-br from-purple-50 via-pink-50 to-orange-50 animate-fade-in">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="lg:text-center">
                <h2 class="text-base bg-gradient-to-r from-purple-600 to-pink-500 bg-clip-text text-transparent font-semibold tracking-wide uppercase animate-pulse-slow">Our Legacy</h2>
                <p class="mt-2 text-3xl leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl animate-slide-up">
                    A Rich History of Excellence
                </p>
                <p class="mt-4 max-w-2xl text-xl text-gray-600 lg:mx-auto animate-slide-up animation-delay-200">
                    Founded in 1976, SNDT Women's University has been at the forefront of women's education, creating leaders who shape the future.
                </p>
            </div>

            <div class="mt-16">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
                    <div class="history-content">
                        <h3 class="text-2xl font-bold text-gray-900 mb-6 animate-slide-right">Our Founding Vision</h3>
                        <p class="text-gray-700 mb-4 animate-slide-right animation-delay-100">
                            Established with the vision of providing quality higher education to women, SNDT Women's University has grown from a small institution to a comprehensive university offering diverse programs across multiple disciplines.
                        </p>
                        <p class="text-gray-700 mb-4 animate-slide-right animation-delay-200">
                            Our commitment to excellence in education, research, and community service has made us a beacon of learning for women from all walks of life.
                        </p>
                        <div class="mt-8">
                            <div class="flex items-center mb-4 animate-slide-right animation-delay-300">
                                <div class="flex-shrink-0">
                                    <div class="h-12 w-12 rounded-full bg-gradient-to-r from-purple-100 to-pink-100 flex items-center justify-center transform hover:scale-110 transition-transform duration-300">
                                        <svg class="h-6 w-6 text-purple-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                        </svg>
                                    </div>
                                </div>
                                <div class="ml-4">
                                    <h4 class="text-lg font-medium text-gray-900">Academic Excellence</h4>
                                    <p class="text-gray-600">Maintaining the highest standards in education and research</p>
                                </div>
                            </div>
                            <div class="flex items-center animate-slide-right animation-delay-400">
                                <div class="flex-shrink-0">
                                    <div class="h-12 w-12 rounded-full bg-gradient-to-r from-purple-100 to-pink-100 flex items-center justify-center transform hover:scale-110 transition-transform duration-300">
                                        <svg class="h-6 w-6 text-purple-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                        </svg>
                                    </div>
                                </div>
                                <div class="ml-4">
                                    <h4 class="text-lg font-medium text-gray-900">Women Empowerment</h4>
                                    <p class="text-gray-600">Creating confident and capable women leaders</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gradient-to-br from-purple-200 to-pink-200 rounded-2xl h-96 flex items-center justify-center shadow-xl transform hover:scale-105 transition-all duration-500 animate-float">
                        <div class="text-center text-purple-800">
                            <svg class="h-24 w-24 mx-auto mb-4 text-purple-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                            </svg>
                            <p class="font-semibold">University Campus</p>
                            <p class="text-sm mt-2">Mumbai, India</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Mission & Vision Section -->
    <div class="py-16 bg-gradient-to-br from-white via-purple-50 to-pink-50 animate-fade-in">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
                <div class="bg-gradient-to-br from-purple-100 to-pink-100 rounded-2xl p-8 shadow-lg transform hover:scale-[1.02] transition-all duration-300 mission-card">
                    <div class="flex items-center mb-6">
                        <div class="h-12 w-12 rounded-lg bg-gradient-to-r from-purple-600 to-pink-500 flex items-center justify-center transform hover:rotate-12 transition-transform duration-300">
                            <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                            </svg>
                        </div>
                        <h3 class="ml-4 text-2xl font-bold text-gray-900">Our Mission</h3>
                    </div>
                    <p class="text-gray-700 text-lg">
                        To provide quality higher education to women, foster their intellectual and personal growth, and prepare them to become leaders and change-makers in society through innovative teaching, research, and community engagement.
                    </p>
                </div>
                
                <div class="bg-gradient-to-br from-pink-100 to-orange-100 rounded-2xl p-8 shadow-lg transform hover:scale-[1.02] transition-all duration-300 vision-card">
                    <div class="flex items-center mb-6">
                        <div class="h-12 w-12 rounded-lg bg-gradient-to-r from-pink-500 to-orange-500 flex items-center justify-center transform hover:rotate-12 transition-transform duration-300">
                            <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                        </div>
                        <h3 class="ml-4 text-2xl font-bold text-gray-900">Our Vision</h3>
                    </div>
                    <p class="text-gray-700 text-lg">
                        To be a globally recognized center of excellence in women's education, research, and innovation, producing graduates who contribute meaningfully to society and inspire future generations of women leaders.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Values Section -->
    <div class="py-16 bg-gradient-to-br from-purple-50 via-pink-50 to-orange-50 animate-fade-in">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-bold text-gray-900 sm:text-4xl animate-slide-up">Our Core Values</h2>
                <p class="mt-4 text-xl text-gray-600 animate-slide-up animation-delay-200">The principles that guide our journey</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 values-container">
                <div class="bg-white rounded-xl p-6 shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2 value-card">
                    <div class="h-12 w-12 rounded-lg bg-gradient-to-r from-purple-100 to-pink-100 flex items-center justify-center mb-4 transform hover:scale-110 transition-transform duration-300">
                        <svg class="h-6 w-6 text-purple-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-2">Excellence</h3>
                    <p class="text-gray-600">Commitment to maintaining the highest standards in education, research, and service.</p>
                </div>
                
                <div class="bg-white rounded-xl p-6 shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2 value-card animation-delay-100">
                    <div class="h-12 w-12 rounded-lg bg-gradient-to-r from-pink-100 to-orange-100 flex items-center justify-center mb-4 transform hover:scale-110 transition-transform duration-300">
                        <svg class="h-6 w-6 text-pink-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-2">Inclusivity</h3>
                    <p class="text-gray-600">Creating an environment where all women can thrive regardless of their background.</p>
                </div>
                
                <div class="bg-white rounded-xl p-6 shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2 value-card animation-delay-200">
                    <div class="h-12 w-12 rounded-lg bg-gradient-to-r from-orange-100 to-yellow-100 flex items-center justify-center mb-4 transform hover:scale-110 transition-transform duration-300">
                        <svg class="h-6 w-6 text-orange-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-2">Innovation</h3>
                    <p class="text-gray-600">Encouraging creative thinking and embracing new approaches to learning and research.</p>
                </div>
                
                <div class="bg-white rounded-xl p-6 shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2 value-card animation-delay-300">
                    <div class="h-12 w-12 rounded-lg bg-gradient-to-r from-purple-100 to-indigo-100 flex items-center justify-center mb-4 transform hover:scale-110 transition-transform duration-300">
                        <svg class="h-6 w-6 text-purple-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-2">Integrity</h3>
                    <p class="text-gray-600">Maintaining ethical standards and honesty in all our academic and administrative activities.</p>
                </div>
                
                <div class="bg-white rounded-xl p-6 shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2 value-card animation-delay-400">
                    <div class="h-12 w-12 rounded-lg bg-gradient-to-r from-blue-100 to-purple-100 flex items-center justify-center mb-4 transform hover:scale-110 transition-transform duration-300">
                        <svg class="h-6 w-6 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a1 1 0 001-1V9a1 1 0 00-1-1h-4a1 1 0 00-1 1v4a1 1 0 001 1m-6 0h6" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-2">Community</h3>
                    <p class="text-gray-600">Building strong relationships within our university community and with society at large.</p>
                </div>
                
                <div class="bg-white rounded-xl p-6 shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2 value-card animation-delay-500">
                    <div class="h-12 w-12 rounded-lg bg-gradient-to-r from-pink-100 to-red-100 flex items-center justify-center mb-4 transform hover:scale-110 transition-transform duration-300">
                        <svg class="h-6 w-6 text-pink-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-2">Service</h3>
                    <p class="text-gray-600">Dedication to serving society through education, research, and community engagement.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-gradient-to-r from-gray-900 via-purple-900 to-pink-900 text-white animate-fade-in">
        <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div class="col-span-1 md:col-span-2">
                    <div class="flex items-center animate-slide-right">
                        <div class="h-10 w-10 rounded-full bg-gradient-to-r from-purple-600 to-pink-500 flex items-center justify-center shadow-lg">
                            <span class="text-white font-bold text-xl">S</span>
                        </div>
                        <div class="ml-3">
                            <h3 class="text-xl font-bold">SNDT Women's University</h3>
                            <p class="text-gray-300 text-sm">Empowering Women Since 1976</p>
                        </div>
                    </div>
                    <p class="mt-4 text-gray-300 max-w-md animate-slide-right animation-delay-200">
                        A premier institution dedicated to providing quality education and empowering women to become leaders in their respective fields.
                    </p>
                </div>
                <div class="animate-slide-up animation-delay-300">
                    <h4 class="text-lg font-semibold mb-4">Quick Links</h4>
                    <ul class="space-y-2">
                        <li><a href="{{ route('welcome') }}" class="text-gray-300 hover:text-white transition-colors duration-300">Home</a></li>
                        <li><a href="{{ route('about') }}" class="text-gray-300 hover:text-white transition-colors duration-300">About Us</a></li>
                        <li><a href="{{ route('contact') }}" class="text-gray-300 hover:text-white transition-colors duration-300">Contact</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-white transition-colors duration-300">Admissions</a></li>
                    </ul>
                </div>
                <div class="animate-slide-up animation-delay-400">
                    <h4 class="text-lg font-semibold mb-4">Contact Info</h4>
                    <ul class="space-y-2 text-gray-300">
                        <li>📍 University Campus, Mumbai</li>
                        <li>📞 +91 22 1234 5678</li>
                        <li>✉️ info@sndt.edu.in</li>
                    </ul>
                </div>
            </div>
            <div class="mt-8 pt-8 border-t border-gray-700 text-center text-gray-400 animate-fade-in">
                <p>&copy; 2026 SNDT Women's University. All rights reserved.</p>
            </div>
        </div>
    </footer>
    
    <!-- Close the main container -->
    </div>

    <script>
        // Mobile menu toggle
        document.getElementById('mobile-menu-button').addEventListener('click', function() {
            const menu = document.getElementById('mobile-menu');
            menu.classList.toggle('hidden');
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
            
            ScrollReveal().reveal('.history-content', {
                origin: 'left',
                distance: '50px',
                duration: 1000,
                delay: 300,
                opacity: 0,
                easing: 'ease-out'
            });
            
            ScrollReveal().reveal('.mission-card, .vision-card', {
                origin: 'bottom',
                distance: '30px',
                duration: 800,
                delay: 200,
                interval: 200,
                opacity: 0,
                easing: 'ease-out'
            });
            
            ScrollReveal().reveal('.value-card', {
                origin: 'bottom',
                distance: '30px',
                duration: 600,
                delay: 100,
                interval: 150,
                opacity: 0,
                easing: 'ease-out'
            });
        });
    </script>
</body>
</html>
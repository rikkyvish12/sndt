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
        .animate-float {
            animation: float 3s ease-in-out infinite;
        }
        .animate-blob {
            animation: blob 8s infinite;
        }
        @keyframes float {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-15px); }
            100% { transform: translateY(0px); }
        }
        @keyframes blob {
            0% {
                transform: translate(0px, 0px) scale(1);
            }
            33% {
                transform: translate(30px, -50px) scale(1.1);
            }
            66% {
                transform: translate(-20px, 20px) scale(0.9);
            }
            100% {
                transform: translate(0px, 0px) scale(1);
            }
        }
        @keyframes float-pattern {
            0% { transform: translateY(0) rotate(0deg); }
            50% { transform: translateY(-20px) rotate(5deg); }
            100% { transform: translateY(0) rotate(0deg); }
        }
        @keyframes shine-badge {
            0% { left: -100%; }
            50%, 100% { left: 100%; }
        }
        .animate-float-pattern {
            animation: float-pattern 6s ease-in-out infinite;
        }
        .animate-float-pattern-reverse {
            animation: float-pattern 8s ease-in-out infinite reverse;
        }
        .badge-shine {
            position: relative;
            overflow: hidden;
        }
        .badge-shine::after {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 50%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.4), transparent);
            transform: skewX(-25deg);
            animation: shine-badge 4s infinite;
        }
        .testimonial-card-3d {
            transition: transform 0.8s cubic-bezier(0.2, 0.8, 0.2, 1), box-shadow 0.8s cubic-bezier(0.2, 0.8, 0.2, 1);
            transform-style: preserve-3d;
            perspective: 1000px;
        }
        .testimonial-card-3d:hover {
            transform: translateY(-10px) rotateX(2deg) rotateY(-2deg);
        }
        
        /* Golden Jubilee Special Effects */
        @keyframes jubilee-fall-bounce {
            0% { transform: translateY(-110vh); opacity: 0; }
            60% { transform: translateY(0); opacity: 1; }
            75% { transform: translateY(-30px); }
            90% { transform: translateY(0); }
            95% { transform: translateY(-15px); }
            100% { transform: translateY(0); }
        }
        @keyframes jubilee-gentle-bounce {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-15px); }
        }
        .golden-jubilee-btn {
            position: fixed !important;
            bottom: 1.5rem !important;
            left: 5px !important;
            right: auto !important;
            z-index: 9999;
            width: 120px;
            height: 120px;
            cursor: pointer;
            animation: jubilee-fall-bounce 1.8s cubic-bezier(0.175, 0.885, 0.32, 1.275) both, 
                       jubilee-gentle-bounce 3s infinite ease-in-out 2s;
            filter: drop-shadow(0 15px 25px rgba(0,0,0,0.4));
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }
        .golden-jubilee-btn:hover {
            transform: scale(1.15) rotate(8deg);
            filter: drop-shadow(0 20px 35px rgba(0,0,0,0.5));
        }
        .jubilee-modal {
            display: none;
            position: fixed;
            inset: 0;
            z-index: 1000;
            background: rgba(0, 0, 0, 0.85);
            backdrop-filter: blur(12px);
            align-items: center;
            justify-content: center;
            padding: 2rem;
            opacity: 0;
            transition: all 0.5s ease;
        }
        .jubilee-modal.active {
            display: flex;
            opacity: 1;
        }
        .jubilee-modal img {
            max-width: 90%;
            max-height: 90vh;
            border-radius: 2rem;
            border: 4px solid rgba(255, 255, 255, 0.2);
            box-shadow: 0 0 60px rgba(255, 215, 0, 0.25);
            transform: scale(0.8) translateY(20px);
            transition: all 0.6s cubic-bezier(0.34, 1.56, 0.64, 1);
        }
        .jubilee-modal.active img {
            transform: scale(1) translateY(0);
        }
        .close-jubilee {
            position: absolute;
            top: 1.5rem;
            right: 1.5rem;
            background: white;
            color: black;
            width: 3rem;
            height: 3rem;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 10px 20px rgba(0,0,0,0.2);
        }
        .close-jubilee:hover {
            transform: rotate(90deg) scale(1.1);
            background: #f59e0b;
            color: white;
        }

        /* Placement Partners Marquee */
        @keyframes marquee {
            0% { transform: translateX(0); }
            100% { transform: translateX(-50%); }
        }
        .animate-marquee {
            animation: marquee 25s linear infinite;
        }
        .animate-marquee:hover {
            animation-play-state: paused;
        }
    </style>
</head>
<body class="bg-gray-50 font-sans overflow-x-hidden">
    @include('partials.header')

    <!-- Hero Section -->
    <div class="relative bg-gradient-to-br from-purple-800 via-pink-700 to-orange-600 min-h-screen flex items-center overflow-x-hidden overflow-y-hidden">
        <!-- Animated background elements -->
        <div class="absolute inset-0 z-0">
            <div class="absolute top-0 left-0 w-48 h-48 sm:w-64 sm:h-64 md:w-96 md:h-96 bg-purple-400 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-blob"></div>
            <div class="absolute top-0 right-0 w-48 h-48 sm:w-64 sm:h-64 md:w-96 md:h-96 bg-yellow-400 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-blob animation-delay-2000"></div>
            <div class="absolute bottom-0 left-1/2 w-48 h-48 sm:w-64 sm:h-64 md:w-96 md:h-96 bg-pink-400 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-blob animation-delay-4000"></div>
            
            <!-- Floating shapes for additional animation -->
            <div class="absolute top-1/4 left-1/4 w-12 h-12 sm:w-16 sm:h-16 md:w-24 md:h-24 bg-white/10 rounded-full animate-ping animation-delay-1000"></div>
            <div class="absolute top-1/3 right-1/3 w-8 h-8 sm:w-12 sm:h-12 md:w-20 md:h-20 bg-white/10 rounded-lg rotate-45 animate-pulse animation-delay-3000"></div>
            <div class="absolute bottom-1/4 left-1/3 w-12 h-12 sm:w-20 sm:h-20 md:w-28 md:h-28 bg-white/10 rounded-full animate-bounce animation-delay-5000"></div>
        </div>
        
        <div class="w-full px-4 sm:px-6 lg:px-8 relative z-10 py-16 md:py-24">
            <div class="flex flex-col md:flex-row items-center max-w-7xl mx-auto">
                <div class="md:w-1/2 mb-12 md:mb-0 text-center md:text-left">
                    <h1 class="text-4xl tracking-tight font-extrabold text-white sm:text-5xl md:text-6xl animate-float">
                        <span class="block">PREMLILA VITHALDAS</span>
                        <span class="block text-yellow-200">POLYTECHNIC</span>
                        <span class="block text-lg text-yellow-100 mt-2">SNDT Women's University</span>
                    </h1>
                    <p class="mt-6 text-lg text-purple-100 sm:text-xl md:text-2xl max-w-xl mx-auto md:mx-0 animate-float animation-delay-500">
                        Empowering women through quality education since 1976. Join our community of learners and become a leader of tomorrow.
                    </p>
                    <div class="mt-8 flex flex-col sm:flex-row sm:justify-center md:justify-start space-y-4 sm:space-y-0 sm:space-x-4 animate-float animation-delay-1000">
                        <div class="transform hover:scale-105 transition-all duration-300">
                            <a href="#explore" class="w-full flex items-center justify-center px-8 py-4 border border-transparent text-base font-medium rounded-xl text-purple-600 bg-white hover:bg-yellow-50 md:py-4 md:text-lg md:px-10 shadow-xl shine-effect">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
                                </svg>
                                Explore Programs
                            </a>
                        </div>
                        <div class="transform hover:scale-105 transition-all duration-300">
                            <a href="{{ route('contact') }}" class="w-full flex items-center justify-center px-8 py-4 border border-transparent text-base font-medium rounded-xl text-white bg-gradient-to-r from-pink-500 to-orange-400 hover:from-pink-600 hover:to-orange-500 md:py-4 md:text-lg md:px-10 shadow-xl">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                </svg>
                                Contact Us
                            </a>
                        </div>
                    </div>
                </div>
                
                <div class="md:w-1/2 flex justify-center">
                    <div class="relative group">
                        <!-- Main Image with specialized frame -->
                        <div class="relative w-64 h-64 sm:w-80 sm:h-80 md:w-[450px] md:h-[450px] animate-float">
                            <!-- Background Glow -->
                            <div class="absolute -inset-4 bg-gradient-to-tr from-yellow-400 via-pink-500 to-purple-600 rounded-[2.5rem] blur-2xl opacity-30 group-hover:opacity-50 transition-opacity duration-500 animate-pulse-slow"></div>
                            
                            <!-- Image Container -->
                            <div class="relative h-full w-full rounded-[2.5rem] overflow-hidden border-4 border-white/50 shadow-2xl backdrop-blur-sm transform transition-all duration-700 group-hover:scale-[1.02] group-hover:rotate-2">
                                <img src="{{ asset('graduated_student_hero.png') }}" alt="Successful Student" class="w-full h-full object-cover">
                                
                                <!-- Overlay Gradient -->
                                <div class="absolute inset-0 bg-gradient-to-t from-black/40 via-transparent to-transparent opacity-60"></div>
                            </div>

                            <!-- Decorative Floating Badges -->
                            <div class="absolute -top-6 -right-6 bg-white p-4 rounded-2xl shadow-xl animate-bounce-slow flex items-center space-x-3 border border-purple-100 z-20">
                                <div class="bg-yellow-100 p-2 rounded-lg text-yellow-600">
                                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-xs font-bold text-gray-500 uppercase">Success Rate</p>
                                    <p class="text-lg font-black text-purple-700">95%+</p>
                                </div>
                            </div>

                            <div class="absolute -bottom-6 -left-6 bg-white p-4 rounded-2xl shadow-xl animate-float-medium flex items-center space-x-3 border border-orange-100 z-20">
                                <div class="bg-orange-100 p-2 rounded-lg text-orange-600">
                                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-xs font-bold text-gray-500 uppercase">Alumni Network</p>
                                    <p class="text-lg font-black text-orange-700">10k+</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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

    <!-- Courses Section -->
    <div class="py-16 bg-gradient-to-br from-orange-50 via-yellow-50 to-green-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center animate-fade-in">
                <h2 class="text-3xl font-bold text-gray-900 sm:text-4xl gradient-text">Popular Programs</h2>
                <p class="mt-4 text-xl text-gray-600">Discover our most sought-after courses</p>
                <div class="mt-2 w-24 h-1 bg-gradient-to-r from-orange-500 via-yellow-500 to-green-500 mx-auto rounded-full"></div>
            </div>

            <div class="mt-12 grid gap-8 md:grid-cols-2 lg:grid-cols-3 course-container">
                {{-- Debug: Total courses: {{ $courses->count() }} --}}
                @forelse($courses as $course)
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
                        @if($course->total_seats && $course->total_seats > 0)
                        <div class="w-full bg-gray-200 rounded-full h-2">
                            <div class="bg-gradient-to-r from-green-400 to-emerald-500 h-2 rounded-full" style="width: {{ ($course->available_seats / $course->total_seats) * 100 }}%"></div>
                        </div>
                        <span class="text-sm text-gray-600 mt-2 inline-block">Available Seats: {{ $course->available_seats }}/{{ $course->total_seats }}</span>
                        @else
                        <span class="text-sm text-gray-600 mt-2 inline-block">Seats: Not specified</span>
                        @endif
                    </div>
                </div>
                @empty
                <div class="col-12 text-center py-5">
                    <h3 class="text-gray-500">No courses available at the moment</h3>
                </div>
                @endforelse
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
                                Head: {{ $department->headOfDepartment ? $department->headOfDepartment->first_name . ' ' . $department->headOfDepartment->last_name : 'TBD' }}
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

    <!-- Alumni Section -->
    <div class="py-20 bg-gradient-to-br from-slate-900 via-purple-900 to-slate-900 relative overflow-hidden">
        <!-- Animated background elements -->
        <div class="absolute inset-0">
            <div class="absolute top-10 left-10 w-72 h-72 bg-purple-500 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob"></div>
            <div class="absolute top-10 right-10 w-72 h-72 bg-yellow-500 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob animation-delay-2000"></div>
            <div class="absolute bottom-10 left-1/2 w-72 h-72 bg-pink-500 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob animation-delay-4000"></div>
        </div>
        
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center mb-16 animate-fade-in">
                <h2 class="text-4xl md:text-5xl font-extrabold text-white mb-4">
                    <span class="bg-gradient-to-r from-yellow-200 via-pink-200 to-purple-200 bg-clip-text text-transparent">Our Distinguished Alumni</span>
                </h2>
                <p class="mt-4 text-xl text-gray-300 max-w-3xl mx-auto">Celebrating the success stories of our graduates who are making a difference worldwide</p>
                <div class="mt-4 w-32 h-1.5 bg-gradient-to-r from-yellow-400 via-pink-500 to-purple-500 mx-auto rounded-full"></div>
            </div>

            <div class="flex overflow-hidden alumni-container" id="alumni-scroll-container">
                <div class="flex space-x-8 animate-scroll-alumni" id="alumni-scroll-content">
                <!-- Alumni Card 1 -->
                <div class="group relative alumni-card snap-center flex-shrink-0 w-96">
                    <div class="relative overflow-hidden rounded-3xl bg-gradient-to-b from-white/10 to-white/5 backdrop-blur-sm border border-white/20 shadow-2xl transition-all duration-500 group-hover:shadow-purple-500/30 group-hover:scale-[1.02]">
                        <!-- Large Image Container -->
                        <div class="relative h-80 overflow-hidden">
                            <div class="absolute inset-0 bg-gradient-to-br from-blue-400 via-purple-500 to-pink-500"></div>
                            <div class="absolute inset-0 flex items-end justify-center">
                                <img src="{{ asset('neeta-lulla.png') }}" alt="Neeta Lulla" class="h-full w-auto object-contain transition-transform duration-500 group-hover:scale-110">
                            </div>
                            <!-- Overlay gradient at bottom -->
                            <div class="absolute bottom-0 left-0 right-0 h-32 bg-gradient-to-t from-black/60 to-transparent"></div>
                            <!-- Year badge -->
                            <div class="absolute top-4 right-4 bg-gradient-to-r from-yellow-400 to-orange-500 text-white px-4 py-2 rounded-full text-sm font-bold shadow-lg">
                                Class of 2018
                            </div>
                        </div>
                        
                        <!-- Content Section -->
                        <div class="p-6 relative">
                            <div class="absolute -top-12 left-6">
                                <div class="w-24 h-24 rounded-2xl bg-gradient-to-br from-blue-500 to-purple-600 flex items-center justify-center shadow-xl border-4 border-slate-900">
                                    <svg class="w-12 h-12 text-white" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                                    </svg>
                                </div>
                            </div>
                            
                            <div class="mt-8">
                                <h3 class="text-2xl font-bold text-white mb-1">Neeta Lulla</h3>
                                <p class="text-lg font-semibold text-transparent bg-clip-text bg-gradient-to-r from-blue-300 to-purple-300 mb-3">Costume Designer</p>
                                
                                <div class="space-y-3 mt-4">
                                    <div class="flex items-start space-x-3">
                                        <div class="flex-shrink-0 w-8 h-8 rounded-lg bg-blue-500/20 flex items-center justify-center mt-1">
                                            <svg class="w-4 h-4 text-blue-300" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3zM3.31 9.397L5 10.12v4.102a8.969 8.969 0 00-1.05-.174 1 1 0 01-.89-.89 11.115 11.115 0 01.25-3.762zM9.3 16.5c1.175 0 2.278-.229 3.286-.638a8.998 8.998 0 00-2.536-1.862 1 1 0 01-.75 1.5c-.553 0-1.09.048-1.616.134A7.002 7.002 0 009.3 16.5z"/>
                                            </svg>
                                        </div>
                                        <div>
                                            <p class="text-sm text-gray-300 font-medium">Department</p>
                                            <p class="text-white font-semibold">Computer Science & Engineering</p>
                                        </div>
                                    </div>
                                    
                                    <div class="flex items-start space-x-3">
                                        <div class="flex-shrink-0 w-8 h-8 rounded-lg bg-purple-500/20 flex items-center justify-center mt-1">
                                            <svg class="w-4 h-4 text-purple-300" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                            </svg>
                                        </div>
                                        <div>
                                            <p class="text-sm text-gray-300 font-medium">Achievement</p>
                                            <p class="text-white font-semibold">Academy Award-winning costume designer for Devdas, Baahubali</p>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Quote -->
                                <div class="mt-5 p-4 bg-white/5 rounded-xl border border-white/10">
                                    <p class="text-sm text-gray-300 italic">"SNDT gave me the creative foundation to design for cinema's greatest epics."</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Alumni Card 2 -->
                <div class="group relative alumni-card snap-center flex-shrink-0 w-96">
                    <div class="relative overflow-hidden rounded-3xl bg-gradient-to-b from-white/10 to-white/5 backdrop-blur-sm border border-white/20 shadow-2xl transition-all duration-500 group-hover:shadow-pink-500/30 group-hover:scale-[1.02]">
                        <!-- Large Image Container -->
                        <div class="relative h-80 overflow-hidden">
                            <div class="absolute inset-0 bg-gradient-to-br from-pink-400 via-rose-500 to-red-500"></div>
                            <div class="absolute inset-0 flex items-end justify-center">
                                <img src="{{ asset('anita-dongre.png') }}" alt="Anita Dongre" class="h-full w-auto object-contain transition-transform duration-500 group-hover:scale-110">
                            </div>
                            <!-- Overlay gradient at bottom -->
                            <div class="absolute bottom-0 left-0 right-0 h-32 bg-gradient-to-t from-black/60 to-transparent"></div>
                            <!-- Year badge -->
                            <div class="absolute top-4 right-4 bg-gradient-to-r from-pink-400 to-rose-500 text-white px-4 py-2 rounded-full text-sm font-bold shadow-lg">
                                Class of 2019
                            </div>
                        </div>
                        
                        <!-- Content Section -->
                        <div class="p-6 relative">
                            <div class="absolute -top-12 left-6">
                                <div class="w-24 h-24 rounded-2xl bg-gradient-to-br from-pink-500 to-rose-600 flex items-center justify-center shadow-xl border-4 border-slate-900">
                                    <svg class="w-12 h-12 text-white" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                                    </svg>
                                </div>
                            </div>
                            
                            <div class="mt-8">
                                <h3 class="text-2xl font-bold text-white mb-1">Anita Dongre</h3>
                                <p class="text-lg font-semibold text-transparent bg-clip-text bg-gradient-to-r from-pink-300 to-rose-300 mb-3">Fashion Designer</p>
                                
                                <div class="space-y-3 mt-4">
                                    <div class="flex items-start space-x-3">
                                        <div class="flex-shrink-0 w-8 h-8 rounded-lg bg-pink-500/20 flex items-center justify-center mt-1">
                                            <svg class="w-4 h-4 text-pink-300" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3zM3.31 9.397L5 10.12v4.102a8.969 8.969 0 00-1.05-.174 1 1 0 01-.89-.89 11.115 11.115 0 01.25-3.762zM9.3 16.5c1.175 0 2.278-.229 3.286-.638a8.998 8.998 0 00-2.536-1.862 1 1 0 01-.75 1.5c-.553 0-1.09.048-1.616.134A7.002 7.002 0 009.3 16.5z"/>
                                            </svg>
                                        </div>
                                        <div>
                                            <p class="text-sm text-gray-300 font-medium">Department</p>
                                            <p class="text-white font-semibold">Fashion Design & Textiles</p>
                                        </div>
                                    </div>
                                    
                                    <div class="flex items-start space-x-3">
                                        <div class="flex-shrink-0 w-8 h-8 rounded-lg bg-rose-500/20 flex items-center justify-center mt-1">
                                            <svg class="w-4 h-4 text-rose-300" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                            </svg>
                                        </div>
                                        <div>
                                            <p class="text-sm text-gray-300 font-medium">Achievement</p>
                                            <p class="text-white font-semibold">Founded global fashion brand, dressed celebrities worldwide</p>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Quote -->
                                <div class="mt-5 p-4 bg-white/5 rounded-xl border border-white/10">
                                    <p class="text-sm text-gray-300 italic">"My journey from SNDT to building a global fashion empire was fueled by passion and perseverance."</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Alumni Card 3 -->
                <div class="group relative alumni-card snap-center flex-shrink-0 w-96">
                    <div class="relative overflow-hidden rounded-3xl bg-gradient-to-b from-white/10 to-white/5 backdrop-blur-sm border border-white/20 shadow-2xl transition-all duration-500 group-hover:shadow-green-500/30 group-hover:scale-[1.02]">
                        <!-- Large Image Container -->
                        <div class="relative h-80 overflow-hidden">
                            <div class="absolute inset-0 bg-gradient-to-br from-green-400 via-emerald-500 to-teal-500"></div>
                            <div class="absolute inset-0 flex items-end justify-center">
                                <img src="{{ asset('eka-lakhani.png') }}" alt="Eka Lakhani" class="h-full w-auto object-contain transition-transform duration-500 group-hover:scale-110">
                            </div>
                            <!-- Overlay gradient at bottom -->
                            <div class="absolute bottom-0 left-0 right-0 h-32 bg-gradient-to-t from-black/60 to-transparent"></div>
                            <!-- Year badge -->
                            <div class="absolute top-4 right-4 bg-gradient-to-r from-green-400 to-emerald-500 text-white px-4 py-2 rounded-full text-sm font-bold shadow-lg">
                                Class of 2017
                            </div>
                        </div>
                        
                        <!-- Content Section -->
                        <div class="p-6 relative">
                            <div class="absolute -top-12 left-6">
                                <div class="w-24 h-24 rounded-2xl bg-gradient-to-br from-green-500 to-emerald-600 flex items-center justify-center shadow-xl border-4 border-slate-900">
                                    <svg class="w-12 h-12 text-white" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                                    </svg>
                                </div>
                            </div>
                            
                            <div class="mt-8">
                                <h3 class="text-2xl font-bold text-white mb-1">Eka Lakhani</h3>
                                <p class="text-lg font-semibold text-transparent bg-clip-text bg-gradient-to-r from-green-300 to-emerald-300 mb-3">Costume Designer</p>
                                
                                <div class="space-y-3 mt-4">
                                    <div class="flex items-start space-x-3">
                                        <div class="flex-shrink-0 w-8 h-8 rounded-lg bg-green-500/20 flex items-center justify-center mt-1">
                                            <svg class="w-4 h-4 text-green-300" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3zM3.31 9.397L5 10.12v4.102a8.969 8.969 0 00-1.05-.174 1 1 0 01-.89-.89 11.115 11.115 0 01.25-3.762zM9.3 16.5c1.175 0 2.278-.229 3.286-.638a8.998 8.998 0 00-2.536-1.862 1 1 0 01-.75 1.5c-.553 0-1.09.048-1.616.134A7.002 7.002 0 009.3 16.5z"/>
                                            </svg>
                                        </div>
                                        <div>
                                            <p class="text-sm text-gray-300 font-medium">Department</p>
                                            <p class="text-white font-semibold">Electronics Engineering</p>
                                        </div>
                                    </div>
                                    
                                    <div class="flex items-start space-x-3">
                                        <div class="flex-shrink-0 w-8 h-8 rounded-lg bg-emerald-500/20 flex items-center justify-center mt-1">
                                            <svg class="w-4 h-4 text-emerald-300" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                            </svg>
                                        </div>
                                        <div>
                                            <p class="text-sm text-gray-300 font-medium">Achievement</p>
                                            <p class="text-white font-semibold">Renowned for Bollywood film costumes and contemporary fashion design</p>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Quote -->
                                <div class="mt-5 p-4 bg-white/5 rounded-xl border border-white/10">
                                    <p class="text-sm text-gray-300 italic">"SNDT taught me that creativity and hard work can transform dreams into reality."</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Alumni Card 4 -->
                <div class="group relative alumni-card snap-center flex-shrink-0 w-96">
                    <div class="relative overflow-hidden rounded-3xl bg-gradient-to-b from-white/10 to-white/5 backdrop-blur-sm border border-white/20 shadow-2xl transition-all duration-500 group-hover:shadow-amber-500/30 group-hover:scale-[1.02]">
                        <!-- Large Image Container -->
                        <div class="relative h-80 overflow-hidden">
                            <div class="absolute inset-0 bg-gradient-to-br from-amber-400 via-orange-500 to-red-500"></div>
                            <div class="absolute inset-0 flex items-end justify-center">
                                <img src="{{ asset('sonakshi-sinha.png') }}" alt="Sonakshi Sinha" class="h-full w-auto object-contain transition-transform duration-500 group-hover:scale-110">
                            </div>
                            <!-- Overlay gradient at bottom -->
                            <div class="absolute bottom-0 left-0 right-0 h-32 bg-gradient-to-t from-black/60 to-transparent"></div>
                            <!-- Year badge -->
                            <div class="absolute top-4 right-4 bg-gradient-to-r from-amber-400 to-orange-500 text-white px-4 py-2 rounded-full text-sm font-bold shadow-lg">
                                Notable Alumni
                            </div>
                        </div>
                        
                        <!-- Content Section -->
                        <div class="p-6 relative">
                            <div class="absolute -top-12 left-6">
                                <div class="w-24 h-24 rounded-2xl bg-gradient-to-br from-amber-500 to-orange-600 flex items-center justify-center shadow-xl border-4 border-slate-900">
                                    <svg class="w-12 h-12 text-white" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                                    </svg>
                                </div>
                            </div>
                            
                            <div class="mt-8">
                                <h3 class="text-2xl font-bold text-white mb-1">Sonakshi Sinha</h3>
                                <p class="text-lg font-semibold text-transparent bg-clip-text bg-gradient-to-r from-amber-300 to-orange-300 mb-3">Actress</p>
                                
                                <div class="space-y-3 mt-4">
                                    <div class="flex items-start space-x-3">
                                        <div class="flex-shrink-0 w-8 h-8 rounded-lg bg-amber-500/20 flex items-center justify-center mt-1">
                                            <svg class="w-4 h-4 text-amber-300" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3zM3.31 9.397L5 10.12v4.102a8.969 8.969 0 00-1.05-.174 1 1 0 01-.89-.89 11.115 11.115 0 01.25-3.762zM9.3 16.5c1.175 0 2.278-.229 3.286-.638a8.998 8.998 0 00-2.536-1.862 1 1 0 01-.75 1.5c-.553 0-1.09.048-1.616.134A7.002 7.002 0 009.3 16.5z"/>
                                            </svg>
                                        </div>
                                        <div>
                                            <p class="text-sm text-gray-300 font-medium">Field</p>
                                            <p class="text-white font-semibold">Bollywood Cinema & Entertainment</p>
                                        </div>
                                    </div>
                                    
                                    <div class="flex items-start space-x-3">
                                        <div class="flex-shrink-0 w-8 h-8 rounded-lg bg-orange-500/20 flex items-center justify-center mt-1">
                                            <svg class="w-4 h-4 text-orange-300" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                            </svg>
                                        </div>
                                        <div>
                                            <p class="text-sm text-gray-300 font-medium">Achievement</p>
                                            <p class="text-white font-semibold">Award-winning actress in Dabangg, Lootera & more</p>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Quote -->
                                <div class="mt-5 p-4 bg-white/5 rounded-xl border border-white/10">
                                    <p class="text-sm text-gray-300 italic">"SNDT empowered me to pursue my dreams with confidence and grace."</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Alumni Card 5 -->
                <div class="group relative alumni-card snap-center flex-shrink-0 w-96">
                    <div class="relative overflow-hidden rounded-3xl bg-gradient-to-b from-white/10 to-white/5 backdrop-blur-sm border border-white/20 shadow-2xl transition-all duration-500 group-hover:shadow-cyan-500/30 group-hover:scale-[1.02]">
                        <!-- Large Image Container -->
                        <div class="relative h-80 overflow-hidden">
                            <div class="absolute inset-0 bg-gradient-to-br from-cyan-400 via-blue-500 to-indigo-500"></div>
                            <div class="absolute inset-0 flex items-end justify-center">
                                <img src="{{ asset('sonakshi raaj.png') }}" alt="Sonaakshi Raaj" class="h-full w-auto object-contain transition-transform duration-500 group-hover:scale-110">
                            </div>
                            <!-- Overlay gradient at bottom -->
                            <div class="absolute bottom-0 left-0 right-0 h-32 bg-gradient-to-t from-black/60 to-transparent"></div>
                            <!-- Year badge -->
                            <div class="absolute top-4 right-4 bg-gradient-to-r from-cyan-400 to-blue-500 text-white px-4 py-2 rounded-full text-sm font-bold shadow-lg">
                                Notable Alumni
                            </div>
                        </div>
                        
                        <!-- Content Section -->
                        <div class="p-6 relative">
                            <div class="absolute -top-12 left-6">
                                <div class="w-24 h-24 rounded-2xl bg-gradient-to-br from-cyan-500 to-blue-600 flex items-center justify-center shadow-xl border-4 border-slate-900">
                                    <svg class="w-12 h-12 text-white" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                                    </svg>
                                </div>
                            </div>
                            
                            <div class="mt-8">
                                <h3 class="text-2xl font-bold text-white mb-1">Sonaakshi Raaj</h3>
                                <p class="text-lg font-semibold text-transparent bg-clip-text bg-gradient-to-r from-cyan-300 to-blue-300 mb-3">Fashion Designer</p>
                                
                                <div class="space-y-3 mt-4">
                                    <div class="flex items-start space-x-3">
                                        <div class="flex-shrink-0 w-8 h-8 rounded-lg bg-cyan-500/20 flex items-center justify-center mt-1">
                                            <svg class="w-4 h-4 text-cyan-300" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3zM3.31 9.397L5 10.12v4.102a8.969 8.969 0 00-1.05-.174 1 1 0 01-.89-.89 11.115 11.115 0 01.25-3.762zM9.3 16.5c1.175 0 2.278-.229 3.286-.638a8.998 8.998 0 00-2.536-1.862 1 1 0 01-.75 1.5c-.553 0-1.09.048-1.616.134A7.002 7.002 0 009.3 16.5z"/>
                                            </svg>
                                        </div>
                                        <div>
                                            <p class="text-sm text-gray-300 font-medium">Field</p>
                                            <p class="text-white font-semibold">Fashion Design & Styling</p>
                                        </div>
                                    </div>
                                    
                                    <div class="flex items-start space-x-3">
                                        <div class="flex-shrink-0 w-8 h-8 rounded-lg bg-blue-500/20 flex items-center justify-center mt-1">
                                            <svg class="w-4 h-4 text-blue-300" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                            </svg>
                                        </div>
                                        <div>
                                            <p class="text-sm text-gray-300 font-medium">Achievement</p>
                                            <p class="text-white font-semibold">Celebrity fashion designer and style icon</p>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Quote -->
                                <div class="mt-5 p-4 bg-white/5 rounded-xl border border-white/10">
                                    <p class="text-sm text-gray-300 italic">"SNDT shaped my creative vision and inspired me to make fashion accessible."</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- DUPLICATE CARDS FOR SEAMLESS LOOP -->
                <!-- Alumni Card 1 (Duplicate) -->
                <div class="group relative alumni-card snap-center flex-shrink-0 w-96">
                    <div class="relative overflow-hidden rounded-3xl bg-gradient-to-b from-white/10 to-white/5 backdrop-blur-sm border border-white/20 shadow-2xl transition-all duration-500 group-hover:shadow-purple-500/30 group-hover:scale-[1.02]">
                        <div class="relative h-80 overflow-hidden">
                            <div class="absolute inset-0 bg-gradient-to-br from-blue-400 via-purple-500 to-pink-500"></div>
                            <div class="absolute inset-0 flex items-end justify-center">
                                <img src="{{ asset('neeta-lulla.png') }}" alt="Neeta Lulla" class="h-full w-auto object-contain transition-transform duration-500 group-hover:scale-110">
                            </div>
                            <div class="absolute bottom-0 left-0 right-0 h-32 bg-gradient-to-t from-black/60 to-transparent"></div>
                            <div class="absolute top-4 right-4 bg-gradient-to-r from-blue-400 to-purple-500 text-white px-4 py-2 rounded-full text-sm font-bold shadow-lg">
                                Notable Alumni
                            </div>
                        </div>
                        <div class="p-6 relative">
                            <div class="absolute -top-12 left-6">
                                <div class="w-24 h-24 rounded-2xl bg-gradient-to-br from-blue-500 to-purple-600 flex items-center justify-center shadow-xl border-4 border-slate-900">
                                    <svg class="w-12 h-12 text-white" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                                    </svg>
                                </div>
                            </div>
                            <div class="mt-8">
                                <h3 class="text-2xl font-bold text-white mb-1">Neeta Lulla</h3>
                                <p class="text-lg font-semibold text-transparent bg-clip-text bg-gradient-to-r from-blue-300 to-purple-300 mb-3">Costume Designer</p>
                                <div class="space-y-3 mt-4">
                                    <div class="flex items-start space-x-3">
                                        <div class="flex-shrink-0 w-8 h-8 rounded-lg bg-blue-500/20 flex items-center justify-center mt-1">
                                            <svg class="w-4 h-4 text-blue-300" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3zM3.31 9.397L5 10.12v4.102a8.969 8.969 0 00-1.05-.174 1 1 0 01-.89-.89 11.115 11.115 0 01.25-3.762zM9.3 16.5c1.175 0 2.278-.229 3.286-.638a8.998 8.998 0 00-2.536-1.862 1 1 0 01-.75 1.5c-.553 0-1.09.048-1.616.134A7.002 7.002 0 009.3 16.5z"/>
                                            </svg>
                                        </div>
                                        <div>
                                            <p class="text-sm text-gray-300 font-medium">Field</p>
                                            <p class="text-white font-semibold">Costume Design for Cinema</p>
                                        </div>
                                    </div>
                                    <div class="flex items-start space-x-3">
                                        <div class="flex-shrink-0 w-8 h-8 rounded-lg bg-purple-500/20 flex items-center justify-center mt-1">
                                            <svg class="w-4 h-4 text-purple-300" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                            </svg>
                                        </div>
                                        <div>
                                            <p class="text-sm text-gray-300 font-medium">Achievement</p>
                                            <p class="text-white font-semibold">Academy Award-winning costume designer for Devdas, Baahubali</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-5 p-4 bg-white/5 rounded-xl border border-white/10">
                                    <p class="text-sm text-gray-300 italic">"SNDT gave me the creative foundation to design for cinema's greatest epics."</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Alumni Card 2 (Duplicate) -->
                <div class="group relative alumni-card snap-center flex-shrink-0 w-96">
                    <div class="relative overflow-hidden rounded-3xl bg-gradient-to-b from-white/10 to-white/5 backdrop-blur-sm border border-white/20 shadow-2xl transition-all duration-500 group-hover:shadow-pink-500/30 group-hover:scale-[1.02]">
                        <div class="relative h-80 overflow-hidden">
                            <div class="absolute inset-0 bg-gradient-to-br from-pink-400 via-rose-500 to-red-500"></div>
                            <div class="absolute inset-0 flex items-end justify-center">
                                <img src="{{ asset('anita-dongre.png') }}" alt="Anita Dongre" class="h-full w-auto object-contain transition-transform duration-500 group-hover:scale-110">
                            </div>
                            <div class="absolute bottom-0 left-0 right-0 h-32 bg-gradient-to-t from-black/60 to-transparent"></div>
                            <div class="absolute top-4 right-4 bg-gradient-to-r from-pink-400 to-rose-500 text-white px-4 py-2 rounded-full text-sm font-bold shadow-lg">
                                Notable Alumni
                            </div>
                        </div>
                        <div class="p-6 relative">
                            <div class="absolute -top-12 left-6">
                                <div class="w-24 h-24 rounded-2xl bg-gradient-to-br from-pink-500 to-rose-600 flex items-center justify-center shadow-xl border-4 border-slate-900">
                                    <svg class="w-12 h-12 text-white" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                                    </svg>
                                </div>
                            </div>
                            <div class="mt-8">
                                <h3 class="text-2xl font-bold text-white mb-1">Anita Dongre</h3>
                                <p class="text-lg font-semibold text-transparent bg-clip-text bg-gradient-to-r from-pink-300 to-rose-300 mb-3">Fashion Designer</p>
                                <div class="space-y-3 mt-4">
                                    <div class="flex items-start space-x-3">
                                        <div class="flex-shrink-0 w-8 h-8 rounded-lg bg-pink-500/20 flex items-center justify-center mt-1">
                                            <svg class="w-4 h-4 text-pink-300" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3zM3.31 9.397L5 10.12v4.102a8.969 8.969 0 00-1.05-.174 1 1 0 01-.89-.89 11.115 11.115 0 01.25-3.762zM9.3 16.5c1.175 0 2.278-.229 3.286-.638a8.998 8.998 0 00-2.536-1.862 1 1 0 01-.75 1.5c-.553 0-1.09.048-1.616.134A7.002 7.002 0 009.3 16.5z"/>
                                            </svg>
                                        </div>
                                        <div>
                                            <p class="text-sm text-gray-300 font-medium">Field</p>
                                            <p class="text-white font-semibold">Fashion Design & Textiles</p>
                                        </div>
                                    </div>
                                    <div class="flex items-start space-x-3">
                                        <div class="flex-shrink-0 w-8 h-8 rounded-lg bg-rose-500/20 flex items-center justify-center mt-1">
                                            <svg class="w-4 h-4 text-rose-300" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                            </svg>
                                        </div>
                                        <div>
                                            <p class="text-sm text-gray-300 font-medium">Achievement</p>
                                            <p class="text-white font-semibold">Founded global fashion brand, dressed celebrities worldwide</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-5 p-4 bg-white/5 rounded-xl border border-white/10">
                                    <p class="text-sm text-gray-300 italic">"My journey from SNDT to building a global fashion empire was fueled by passion and perseverance."</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Alumni Card 3 (Duplicate) -->
                <div class="group relative alumni-card snap-center flex-shrink-0 w-96">
                    <div class="relative overflow-hidden rounded-3xl bg-gradient-to-b from-white/10 to-white/5 backdrop-blur-sm border border-white/20 shadow-2xl transition-all duration-500 group-hover:shadow-green-500/30 group-hover:scale-[1.02]">
                        <div class="relative h-80 overflow-hidden">
                            <div class="absolute inset-0 bg-gradient-to-br from-green-400 via-emerald-500 to-teal-500"></div>
                            <div class="absolute inset-0 flex items-end justify-center">
                                <img src="{{ asset('eka-lakhani.png') }}" alt="Eka Lakhani" class="h-full w-auto object-contain transition-transform duration-500 group-hover:scale-110">
                            </div>
                            <div class="absolute bottom-0 left-0 right-0 h-32 bg-gradient-to-t from-black/60 to-transparent"></div>
                            <div class="absolute top-4 right-4 bg-gradient-to-r from-green-400 to-emerald-500 text-white px-4 py-2 rounded-full text-sm font-bold shadow-lg">
                                Notable Alumni
                            </div>
                        </div>
                        <div class="p-6 relative">
                            <div class="absolute -top-12 left-6">
                                <div class="w-24 h-24 rounded-2xl bg-gradient-to-br from-green-500 to-emerald-600 flex items-center justify-center shadow-xl border-4 border-slate-900">
                                    <svg class="w-12 h-12 text-white" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                                    </svg>
                                </div>
                            </div>
                            <div class="mt-8">
                                <h3 class="text-2xl font-bold text-white mb-1">Eka Lakhani</h3>
                                <p class="text-lg font-semibold text-transparent bg-clip-text bg-gradient-to-r from-green-300 to-emerald-300 mb-3">Costume Designer</p>
                                <div class="space-y-3 mt-4">
                                    <div class="flex items-start space-x-3">
                                        <div class="flex-shrink-0 w-8 h-8 rounded-lg bg-green-500/20 flex items-center justify-center mt-1">
                                            <svg class="w-4 h-4 text-green-300" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3zM3.31 9.397L5 10.12v4.102a8.969 8.969 0 00-1.05-.174 1 1 0 01-.89-.89 11.115 11.115 0 01.25-3.762zM9.3 16.5c1.175 0 2.278-.229 3.286-.638a8.998 8.998 0 00-2.536-1.862 1 1 0 01-.75 1.5c-.553 0-1.09.048-1.616.134A7.002 7.002 0 009.3 16.5z"/>
                                            </svg>
                                        </div>
                                        <div>
                                            <p class="text-sm text-gray-300 font-medium">Field</p>
                                            <p class="text-white font-semibold">Bollywood Costume Design</p>
                                        </div>
                                    </div>
                                    <div class="flex items-start space-x-3">
                                        <div class="flex-shrink-0 w-8 h-8 rounded-lg bg-emerald-500/20 flex items-center justify-center mt-1">
                                            <svg class="w-4 h-4 text-emerald-300" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                            </svg>
                                        </div>
                                        <div>
                                            <p class="text-sm text-gray-300 font-medium">Achievement</p>
                                            <p class="text-white font-semibold">Renowned for Bollywood film costumes and contemporary fashion design</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-5 p-4 bg-white/5 rounded-xl border border-white/10">
                                    <p class="text-sm text-gray-300 italic">"SNDT taught me that creativity and hard work can transform dreams into reality."</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Alumni Card 4 (Duplicate) -->
                <div class="group relative alumni-card snap-center flex-shrink-0 w-96">
                    <div class="relative overflow-hidden rounded-3xl bg-gradient-to-b from-white/10 to-white/5 backdrop-blur-sm border border-white/20 shadow-2xl transition-all duration-500 group-hover:shadow-amber-500/30 group-hover:scale-[1.02]">
                        <div class="relative h-80 overflow-hidden">
                            <div class="absolute inset-0 bg-gradient-to-br from-amber-400 via-orange-500 to-red-500"></div>
                            <div class="absolute inset-0 flex items-end justify-center">
                                <img src="{{ asset('sonakshi-sinha.png') }}" alt="Sonakshi Sinha" class="h-full w-auto object-contain transition-transform duration-500 group-hover:scale-110">
                            </div>
                            <div class="absolute bottom-0 left-0 right-0 h-32 bg-gradient-to-t from-black/60 to-transparent"></div>
                            <div class="absolute top-4 right-4 bg-gradient-to-r from-amber-400 to-orange-500 text-white px-4 py-2 rounded-full text-sm font-bold shadow-lg">
                                Notable Alumni
                            </div>
                        </div>
                        <div class="p-6 relative">
                            <div class="absolute -top-12 left-6">
                                <div class="w-24 h-24 rounded-2xl bg-gradient-to-br from-amber-500 to-orange-600 flex items-center justify-center shadow-xl border-4 border-slate-900">
                                    <svg class="w-12 h-12 text-white" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                                    </svg>
                                </div>
                            </div>
                            <div class="mt-8">
                                <h3 class="text-2xl font-bold text-white mb-1">Sonakshi Sinha</h3>
                                <p class="text-lg font-semibold text-transparent bg-clip-text bg-gradient-to-r from-amber-300 to-orange-300 mb-3">Actress</p>
                                <div class="space-y-3 mt-4">
                                    <div class="flex items-start space-x-3">
                                        <div class="flex-shrink-0 w-8 h-8 rounded-lg bg-amber-500/20 flex items-center justify-center mt-1">
                                            <svg class="w-4 h-4 text-amber-300" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3zM3.31 9.397L5 10.12v4.102a8.969 8.969 0 00-1.05-.174 1 1 0 01-.89-.89 11.115 11.115 0 01.25-3.762zM9.3 16.5c1.175 0 2.278-.229 3.286-.638a8.998 8.998 0 00-2.536-1.862 1 1 0 01-.75 1.5c-.553 0-1.09.048-1.616.134A7.002 7.002 0 009.3 16.5z"/>
                                            </svg>
                                        </div>
                                        <div>
                                            <p class="text-sm text-gray-300 font-medium">Field</p>
                                            <p class="text-white font-semibold">Bollywood Cinema & Entertainment</p>
                                        </div>
                                    </div>
                                    <div class="flex items-start space-x-3">
                                        <div class="flex-shrink-0 w-8 h-8 rounded-lg bg-orange-500/20 flex items-center justify-center mt-1">
                                            <svg class="w-4 h-4 text-orange-300" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                            </svg>
                                        </div>
                                        <div>
                                            <p class="text-sm text-gray-300 font-medium">Achievement</p>
                                            <p class="text-white font-semibold">Award-winning actress in Dabangg, Lootera & more</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-5 p-4 bg-white/5 rounded-xl border border-white/10">
                                    <p class="text-sm text-gray-300 italic">"SNDT empowered me to pursue my dreams with confidence and grace."</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Alumni Card 5 (Duplicate) -->
                <div class="group relative alumni-card snap-center flex-shrink-0 w-96">
                    <div class="relative overflow-hidden rounded-3xl bg-gradient-to-b from-white/10 to-white/5 backdrop-blur-sm border border-white/20 shadow-2xl transition-all duration-500 group-hover:shadow-cyan-500/30 group-hover:scale-[1.02]">
                        <div class="relative h-80 overflow-hidden">
                            <div class="absolute inset-0 bg-gradient-to-br from-cyan-400 via-blue-500 to-indigo-500"></div>
                            <div class="absolute inset-0 flex items-end justify-center">
                                <img src="{{ asset('sonakshi raaj.png') }}" alt="Sonaakshi Raaj" class="h-full w-auto object-contain transition-transform duration-500 group-hover:scale-110">
                            </div>
                            <div class="absolute bottom-0 left-0 right-0 h-32 bg-gradient-to-t from-black/60 to-transparent"></div>
                            <div class="absolute top-4 right-4 bg-gradient-to-r from-cyan-400 to-blue-500 text-white px-4 py-2 rounded-full text-sm font-bold shadow-lg">
                                Notable Alumni
                            </div>
                        </div>
                        <div class="p-6 relative">
                            <div class="absolute -top-12 left-6">
                                <div class="w-24 h-24 rounded-2xl bg-gradient-to-br from-cyan-500 to-blue-600 flex items-center justify-center shadow-xl border-4 border-slate-900">
                                    <svg class="w-12 h-12 text-white" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                                    </svg>
                                </div>
                            </div>
                            <div class="mt-8">
                                <h3 class="text-2xl font-bold text-white mb-1">Sonaakshi Raaj</h3>
                                <p class="text-lg font-semibold text-transparent bg-clip-text bg-gradient-to-r from-cyan-300 to-blue-300 mb-3">Fashion Designer</p>
                                <div class="space-y-3 mt-4">
                                    <div class="flex items-start space-x-3">
                                        <div class="flex-shrink-0 w-8 h-8 rounded-lg bg-cyan-500/20 flex items-center justify-center mt-1">
                                            <svg class="w-4 h-4 text-cyan-300" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3zM3.31 9.397L5 10.12v4.102a8.969 8.969 0 00-1.05-.174 1 1 0 01-.89-.89 11.115 11.115 0 01.25-3.762zM9.3 16.5c1.175 0 2.278-.229 3.286-.638a8.998 8.998 0 00-2.536-1.862 1 1 0 01-.75 1.5c-.553 0-1.09.048-1.616.134A7.002 7.002 0 009.3 16.5z"/>
                                            </svg>
                                        </div>
                                        <div>
                                            <p class="text-sm text-gray-300 font-medium">Field</p>
                                            <p class="text-white font-semibold">Fashion Design & Styling</p>
                                        </div>
                                    </div>
                                    <div class="flex items-start space-x-3">
                                        <div class="flex-shrink-0 w-8 h-8 rounded-lg bg-blue-500/20 flex items-center justify-center mt-1">
                                            <svg class="w-4 h-4 text-blue-300" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                            </svg>
                                        </div>
                                        <div>
                                            <p class="text-sm text-gray-300 font-medium">Achievement</p>
                                            <p class="text-white font-semibold">Celebrity fashion designer and style icon</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-5 p-4 bg-white/5 rounded-xl border border-white/10">
                                    <p class="text-sm text-gray-300 italic">"SNDT shaped my creative vision and inspired me to make fashion accessible."</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        @keyframes scrollAlumni {
            0% {
                transform: translateX(0);
            }
            100% {
                transform: translateX(-50%);
            }
        }
        .animate-scroll-alumni {
            animation: scrollAlumni 40s linear infinite;
        }
        .animate-scroll-alumni:hover {
            animation-play-state: paused;
        }
    </style>

    <!-- Top Placement Partners Section -->
    <div class="py-16 bg-white overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-12">
            <div class="text-center">
                <h2 class="text-3xl font-bold text-gray-900 sm:text-4xl gradient-text">Our Top Placement Partners</h2>
                <p class="mt-4 text-xl text-gray-600">Our students are placed in world-class organizations</p>
                <div class="mt-2 w-24 h-1 bg-gradient-to-r from-purple-500 via-pink-500 to-orange-500 mx-auto rounded-full"></div>
            </div>
        </div>

        <div class="relative flex overflow-hidden group">
            <div class="flex space-x-12 animate-marquee whitespace-nowrap py-4">
                <!-- First set of logos -->
                <div class="flex space-x-12 items-center">
                    <img src="https://pvpsndt.ac.in/build/assets/sndt-logo-DmGKQnP5.png" alt="SNDT Logo" class="h-20 w-auto grayscale hover:grayscale-0 transition-all duration-300 opacity-70 hover:opacity-100 transform hover:scale-110">
                    <img src="https://pvpsndt.ac.in/build/assets/WhatsApp_icon-fXwyEBjV.png" alt="WhatsApp Partner" class="h-16 w-auto grayscale hover:grayscale-0 transition-all duration-300 opacity-70 hover:opacity-100 transform hover:scale-110">
                    <img src="https://pvpsndt.ac.in/build/assets/P.V.POLYTECHNIC-BYarhyCK.png" alt="PV Polytechnic" class="h-16 w-auto grayscale hover:grayscale-0 transition-all duration-300 opacity-70 hover:opacity-100 transform hover:scale-110">
                    <img src="https://pvpsndt.ac.in/build/assets/image-BTgLJJLi.png" alt="Partner Image" class="h-20 w-auto grayscale hover:grayscale-0 transition-all duration-300 opacity-70 hover:opacity-100 transform hover:scale-110">
                    <img src="https://pvpsndt.ac.in/build/assets/frame-Bewihn-R.png" alt="Partner Frame" class="h-20 w-auto grayscale hover:grayscale-0 transition-all duration-300 opacity-70 hover:opacity-100 transform hover:scale-110">
                    <!-- Duplicate some for length -->
                    <img src="https://pvpsndt.ac.in/build/assets/sndt-logo-DmGKQnP5.png" alt="SNDT Logo" class="h-20 w-auto grayscale hover:grayscale-0 transition-all duration-300 opacity-70 hover:opacity-100 transform hover:scale-110">
                    <img src="https://pvpsndt.ac.in/build/assets/image-BTgLJJLi.png" alt="Partner Image" class="h-20 w-auto grayscale hover:grayscale-0 transition-all duration-300 opacity-70 hover:opacity-100 transform hover:scale-110">
                </div>
                <!-- Second set of logos for seamless loop -->
                <div class="flex space-x-12 items-center">
                    <img src="https://pvpsndt.ac.in/build/assets/sndt-logo-DmGKQnP5.png" alt="SNDT Logo" class="h-20 w-auto grayscale hover:grayscale-0 transition-all duration-300 opacity-70 hover:opacity-100 transform hover:scale-110">
                    <img src="https://pvpsndt.ac.in/build/assets/WhatsApp_icon-fXwyEBjV.png" alt="WhatsApp Partner" class="h-16 w-auto grayscale hover:grayscale-0 transition-all duration-300 opacity-70 hover:opacity-100 transform hover:scale-110">
                    <img src="https://pvpsndt.ac.in/build/assets/P.V.POLYTECHNIC-BYarhyCK.png" alt="PV Polytechnic" class="h-16 w-auto grayscale hover:grayscale-0 transition-all duration-300 opacity-70 hover:opacity-100 transform hover:scale-110">
                    <img src="https://pvpsndt.ac.in/build/assets/image-BTgLJJLi.png" alt="Partner Image" class="h-20 w-auto grayscale hover:grayscale-0 transition-all duration-300 opacity-70 hover:opacity-100 transform hover:scale-110">
                    <img src="https://pvpsndt.ac.in/build/assets/frame-Bewihn-R.png" alt="Partner Frame" class="h-20 w-auto grayscale hover:grayscale-0 transition-all duration-300 opacity-70 hover:opacity-100 transform hover:scale-110">
                    <img src="https://pvpsndt.ac.in/build/assets/sndt-logo-DmGKQnP5.png" alt="SNDT Logo" class="h-20 w-auto grayscale hover:grayscale-0 transition-all duration-300 opacity-70 hover:opacity-100 transform hover:scale-110">
                    <img src="https://pvpsndt.ac.in/build/assets/image-BTgLJJLi.png" alt="Partner Image" class="h-20 w-auto grayscale hover:grayscale-0 transition-all duration-300 opacity-70 hover:opacity-100 transform hover:scale-110">
                </div>
            </div>
            
            <!-- Gradient Overlays for smooth fading at edges -->
            <div class="absolute inset-y-0 left-0 w-24 bg-gradient-to-r from-white to-transparent z-10"></div>
            <div class="absolute inset-y-0 right-0 w-24 bg-gradient-to-l from-white to-transparent z-10"></div>
        </div>
    </div>


    <!-- Student Testimonial Section -->
    <div class="py-24 bg-white overflow-hidden relative">
        <!-- Floating background particles -->
        <div class="absolute inset-0 z-0 pointer-events-none">
            <div class="absolute top-20 left-10 w-4 h-4 bg-blue-400 rounded-full opacity-20 animate-float-pattern"></div>
            <div class="absolute top-40 right-20 w-6 h-6 bg-purple-400 rounded-full opacity-20 animate-float-pattern-reverse"></div>
            <div class="absolute bottom-20 left-1/4 w-3 h-3 bg-yellow-400 rounded-full opacity-20 animate-float-pattern"></div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center mb-20">
                <h2 class="text-4xl md:text-6xl font-black text-[#000080] mb-4 tracking-tight animate-section">
                    Our Students Speak
                </h2>
                <div class="mt-2 w-32 h-2 bg-gradient-to-r from-[#000080] to-blue-500 mx-auto rounded-full animate-fade"></div>
            </div>

            <div class="relative bg-white rounded-[3rem] overflow-hidden shadow-[0_40px_100px_-20px_rgba(0,0,128,0.15)] lg:flex items-stretch min-h-[650px] border border-blue-50/50 testimonial-card-3d">
                <!-- Content Column -->
                <div class="lg:w-3/5 p-10 lg:p-24 flex flex-col justify-center relative bg-gradient-to-br from-white to-blue-50/30">
                    <div class="mb-10 font-serif opacity-20 group-hover:opacity-40 transition-opacity">
                        <svg class="h-16 w-16 text-[#000080]" fill="currentColor" viewBox="0 0 32 32">
                            <path d="M9.352 4C4.456 7.456 1 13.12 1 19.36c0 5.088 3.072 8.064 6.624 8.064 3.36 0 5.856-2.688 5.856-5.856 0-3.168-2.208-5.472-5.088-5.472-.576 0-1.344.096-1.536.192.48-3.264 3.552-7.104 6.624-9.024L9.352 4zm16.512 0c-4.8 3.456-8.256 9.12-8.256 15.36 0 5.088 3.072 8.064 6.624 8.064 3.264 0 5.856-2.688 5.856-5.856 0-3.168-2.304-5.472-5.184-5.472-.576 0-1.248.096-1.44.192.48-3.264 3.456-7.104 6.528-9.024L25.864 4z" />
                        </svg>
                    </div>
                    
                    <h3 class="text-4xl md:text-5xl font-black text-gray-900 leading-[1.1] mb-10 animate-section">
                        “A transformative journey at <span class="text-[#000080]">SNDT University</span>”
                    </h3>
                    
                    <div class="space-y-8">
                        <p class="text-xl md:text-2xl text-gray-700 leading-relaxed font-medium animate-card">
                            As an alumna of the Diploma in Electronics program at P.V. Polytechnic, I consider it one of my greatest achievements to have been admitted to this esteemed institution. 
                        </p>
                        <p class="text-xl md:text-2xl text-gray-600 leading-relaxed animate-card">
                            The internships and continuous practical training have equipped me with invaluable knowledge and ignited a deep curiosity to keep learning.
                        </p>
                        <div class="pt-6 border-t border-blue-100 mt-8 animate-fade">
                            <p class="text-lg md:text-xl text-[#000080] font-bold italic">
                                "I am deeply grateful for the guidance and support I received throughout my journey at SNDT."
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Image Column -->
                <div class="lg:w-2/5 relative bg-[#f0f4ff] flex items-end justify-center pt-20 lg:pt-0 overflow-hidden group">
                    <!-- Dynamic Doodle Decorations -->
                    <div class="absolute inset-0 z-0 pointer-events-none">
                        <div class="absolute top-10 right-10 animate-float-pattern">
                            <svg class="w-32 h-32 text-blue-200/50 rotate-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 4.354l1.107 3.18h3.344l-2.706 1.966 1.034 3.178-2.779-2.02-2.779 2.02 1.034-3.178-2.706-1.966h3.344l1.107-3.18z" />
                            </svg>
                        </div>
                        <div class="absolute bottom-40 left-10 animate-float-pattern-reverse">
                            <svg class="w-24 h-24 text-purple-200/50 -rotate-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 002 2z" />
                            </svg>
                        </div>
                        <!-- Artistic line decorations mimic doodles -->
                        <svg class="absolute top-1/2 left-0 w-full h-full text-blue-100/40" viewBox="0 0 200 200" fill="none">
                            <path d="M10 80 Q 50 10, 90 80 T 170 80" stroke="currentColor" stroke-width="3" stroke-dasharray="8 8" class="animate-float-pattern" />
                            <path d="M20 150 Q 60 190, 100 150 T 180 150" stroke="currentColor" stroke-width="2" stroke-dasharray="4 4" class="animate-float-pattern-reverse" />
                        </svg>
                    </div>

                    <div class="relative z-10 w-full h-full flex items-end px-6 lg:px-0">
                        <img src="{{ asset('shivani-nikam.png') }}" alt="Shivani Nikam" class="w-full h-auto object-cover transform transition-all duration-1000 group-hover:scale-110 group-hover:translate-y-[-10px] origin-bottom scale-105 filter drop-shadow-2xl">
                        
                        <!-- Name Badge -->
                        <div class="absolute bottom-10 left-1/2 lg:left-0 transform -translate-x-1/2 lg:translate-x-[-15%] bg-[#000080] text-white px-12 py-5 rounded-full text-3xl font-black shadow-[0_20px_40px_rgba(0,0,128,0.4)] whitespace-nowrap border-4 border-white transition-all duration-500 hover:scale-110 badge-shine group-hover:bottom-14">
                            Shivani Nikam
                            <span class="block text-sm font-medium text-blue-200 tracking-wider uppercase mt-1">Electronics Engineering</span>
                        </div>
                    </div>
                </div>
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

                ScrollReveal().reveal('.alumni-card', {
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
    @include('partials.scripts')
    @include('partials.footer')
    <!-- Golden Jubilee Button -->
    <div class="golden-jubilee-btn shadow-2xl" id="goldenJubileeBtn" title="Celebrate our Golden Jubilee!">
        <img src="{{ asset('goldan_jubli.png') }}" alt="Golden Jubilee" class="w-full h-full object-contain">
        <div class="absolute inset-0 rounded-full animate-pulse-slow bg-yellow-400 opacity-20 blur-xl"></div>
    </div>

    <!-- Jubilee Modal -->
    <div class="jubilee-modal" id="jubileeModal">
        <div class="close-jubilee" id="closeJubileeModal">&times;</div>
        <img src="{{ asset('goldan_jubli.png') }}" alt="Golden Jubilee Full Content" class="shadow-2xl">
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const jubileeBtn = document.getElementById('goldenJubileeBtn');
            const jubileeModal = document.getElementById('jubileeModal');
            const closeJubilee = document.getElementById('closeJubileeModal');

            if (jubileeBtn && jubileeModal) {
                jubileeBtn.addEventListener('click', () => {
                    jubileeModal.classList.add('active');
                    document.body.style.overflow = 'hidden';
                });

                const hideJubileeModal = () => {
                    jubileeModal.classList.remove('active');
                    setTimeout(() => {
                        if (!jubileeModal.classList.contains('active')) {
                            document.body.style.overflow = '';
                        }
                    }, 500);
                };

                closeJubilee.addEventListener('click', hideJubileeModal);
                jubileeModal.addEventListener('click', (e) => {
                    if (e.target === jubileeModal) hideJubileeModal();
                });

                // Escape key support
                document.addEventListener('keydown', (e) => {
                    if (e.key === 'Escape' && jubileeModal.classList.contains('active')) {
                        hideJubileeModal();
                    }
                });
            }
        });
    </script>
</body>
</html>
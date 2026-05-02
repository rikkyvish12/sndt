<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $course->name }} - SNDT Women's University</title>
    <meta name="description" content="{{ Str::limit($course->description, 150) }}">

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
                    },
                    animation: {
                        'fade-in': 'fadeIn 0.5s ease-in-out',
                        'slide-up': 'slideUp 0.5s ease-out',
                        'blob': 'blob 7s infinite',
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
                        blob: {
                            '0%': { transform: 'translate(0px, 0px) scale(1)' },
                            '33%': { transform: 'translate(30px, -50px) scale(1.1)' },
                            '66%': { transform: 'translate(-20px, 20px) scale(0.9)' },
                            '100%': { transform: 'translate(0px, 0px) scale(1)' },
                        },
                        float: {
                            '0%': { transform: 'translateY(0px)' },
                            '50%': { transform: 'translateY(-10px)' },
                            '100%': { transform: 'translateY(0px)' },
                        }
                    }
                }
            }
        }
    </script>
</head>

<body class="bg-gray-50 font-sans">
    <div class="min-h-screen flex flex-col">
        @include('partials.header')

        <div class="flex-grow">
            <!-- Hero Section -->
            <div class="relative bg-gradient-to-br from-indigo-800 via-purple-700 to-pink-600 overflow-hidden">
                <!-- Animated Background Blobs -->
                <div class="absolute inset-0 z-0">
                    <div class="absolute top-0 -left-4 w-72 h-72 bg-purple-500 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-blob"></div>
                    <div class="absolute top-0 -right-4 w-72 h-72 bg-yellow-500 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-blob" style="animation-delay: 2s;"></div>
                    <div class="absolute -bottom-8 left-20 w-72 h-72 bg-pink-500 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-blob" style="animation-delay: 4s;"></div>
                </div>

                <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24 sm:py-32">
                    <div class="text-center animate-slide-up">
                        <div class="inline-flex items-center px-4 py-2 rounded-full text-sm font-semibold bg-white/20 text-white backdrop-blur-md border border-white/30 mb-6 shadow-lg">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                            </svg>
                            {{ $course->department->name ?? 'Department' }}
                        </div>
                        <h1 class="text-4xl md:text-6xl font-extrabold text-white mb-6 tracking-tight drop-shadow-md">
                            {{ $course->name }}
                        </h1>
                        <div class="flex flex-wrap justify-center gap-4 mt-8">
                            <span class="inline-flex items-center px-6 py-3 rounded-xl text-base font-bold bg-white text-purple-700 shadow-xl animate-float">
                                <svg class="w-5 h-5 mr-2 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                {{ $course->duration }} Years
                            </span>
                            <span class="inline-flex items-center px-6 py-3 rounded-xl text-base font-bold bg-white text-pink-700 shadow-xl animate-float" style="animation-delay: 0.5s;">
                                <svg class="w-5 h-5 mr-2 text-pink-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                {{ ucfirst($course->course_type) }}
                            </span>
                            <span class="inline-flex items-center px-6 py-3 rounded-xl text-base font-bold bg-white text-green-700 shadow-xl animate-float" style="animation-delay: 1s;">
                                <svg class="w-5 h-5 mr-2 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                ₹{{ number_format($course->fees) }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Content Section -->
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 -mt-16 relative z-20">
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                    <!-- Main Course Description -->
                    <div class="lg:col-span-2">
                        <div class="bg-white rounded-3xl shadow-2xl p-8 md:p-10 border border-gray-100 h-full animate-fade-in">
                            <h2 class="text-3xl font-extrabold text-gray-900 mb-6 bg-gradient-to-r from-purple-600 to-pink-500 bg-clip-text text-transparent">About the Program</h2>
                            <div class="prose max-w-none text-gray-700 leading-relaxed text-lg">
                                {!! nl2br(e($course->description)) !!}
                            </div>
                        </div>
                    </div>

                    <!-- Sidebar Stats and Action -->
                    <div class="lg:col-span-1 space-y-6">
                        <div class="bg-white rounded-3xl shadow-2xl p-8 border border-gray-100 animate-slide-up" style="animation-delay: 0.2s;">
                            <h3 class="text-xl font-bold text-gray-900 mb-6 border-b pb-4">Program Overview</h3>
                            
                            <ul class="space-y-5">
                                <li class="flex items-center">
                                    <div class="flex-shrink-0 w-12 h-12 rounded-xl bg-purple-100 flex items-center justify-center mr-4">
                                        <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="text-sm text-gray-500 font-medium">Course Code</p>
                                        <p class="text-lg font-bold text-gray-900">{{ $course->code }}</p>
                                    </div>
                                </li>
                                
                                <li class="flex items-center">
                                    <div class="flex-shrink-0 w-12 h-12 rounded-xl bg-pink-100 flex items-center justify-center mr-4">
                                        <svg class="w-6 h-6 text-pink-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                        </svg>
                                    </div>
                                    <div class="flex-grow">
                                        <div class="flex justify-between items-end mb-1">
                                            <p class="text-sm text-gray-500 font-medium">Available Seats</p>
                                            <p class="text-sm font-bold text-pink-600">{{ $course->available_seats }} / {{ $course->total_seats }}</p>
                                        </div>
                                        @if($course->total_seats > 0)
                                        <div class="w-full bg-gray-200 rounded-full h-2.5">
                                            <div class="bg-gradient-to-r from-pink-400 to-rose-500 h-2.5 rounded-full" style="width: {{ ($course->available_seats / $course->total_seats) * 100 }}%"></div>
                                        </div>
                                        @endif
                                    </div>
                                </li>
                                
                                @if($course->start_date)
                                <li class="flex items-center">
                                    <div class="flex-shrink-0 w-12 h-12 rounded-xl bg-orange-100 flex items-center justify-center mr-4">
                                        <svg class="w-6 h-6 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="text-sm text-gray-500 font-medium">Start Date</p>
                                        <p class="text-lg font-bold text-gray-900">{{ $course->start_date->format('M d, Y') }}</p>
                                    </div>
                                </li>
                                @endif
                                
                                @if($course->end_date)
                                <li class="flex items-center">
                                    <div class="flex-shrink-0 w-12 h-12 rounded-xl bg-red-100 flex items-center justify-center mr-4">
                                        <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="text-sm text-gray-500 font-medium">End Date</p>
                                        <p class="text-lg font-bold text-gray-900">{{ $course->end_date->format('M d, Y') }}</p>
                                    </div>
                                </li>
                                @endif
                            </ul>
                        </div>
                        
                        <div class="bg-gradient-to-br from-blue-600 to-indigo-700 rounded-3xl shadow-2xl p-8 text-white text-center animate-slide-up" style="animation-delay: 0.4s;">
                            <h3 class="text-2xl font-bold mb-4">Interested in this Program?</h3>
                            <p class="text-blue-100 mb-6">Take the first step towards a successful career. Get in touch with us to learn more about the admission process.</p>
                            <a href="https://admission.pvpsndt.ac.in/" target="_blank" rel="noopener noreferrer" class="inline-flex items-center justify-center w-full px-6 py-4 border border-transparent text-lg font-bold rounded-xl text-indigo-700 bg-white hover:bg-indigo-50 shadow-lg transform transition-all hover:scale-105">
                                Apply Now
                                <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('partials.footer', ['departmentId' => $course->department_id])
    </div>
</body>

</html>

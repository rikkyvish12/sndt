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
    <script src="https://cdn.tailwindcss.com?plugins=typography"></script>
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
                    },
                    animation: {
                        'fade-in': 'fadeIn 0.5s ease-in-out',
                        'slide-up': 'slideUp 0.5s ease-out',
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
                    }
                }
            }
        }
    </script>
    <style>
        /* Force WYSIWYG tables to not squish text infinitely */
        .prose table {
            min-width: 100%;
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
            overflow: hidden;
            border-radius: 1rem;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            margin: 0;
        }
        .prose table, .prose table * {
            box-sizing: border-box;
        }
        .prose thead {
            background: linear-gradient(135deg, #7c3aed 0%, #ec4899 50%, #f97316 100%);
        }
        .prose thead th {
            color: white !important;
            font-weight: 700 !important;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            padding: 1.25rem 1.5rem !important;
            border: none !important;
            position: relative;
            overflow: hidden;
            text-align: left;
        }
        .prose thead th::after {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            animation: shimmer 3s infinite;
        }
        @keyframes shimmer {
            0% { left: -100%; }
            100% { left: 100%; }
        }
        .prose tbody tr {
            transition: all 0.3s ease;
            animation: fadeInUp 0.5s ease-out;
            animation-fill-mode: both;
        }
        .prose tbody tr:nth-child(1) { animation-delay: 0.1s; }
        .prose tbody tr:nth-child(2) { animation-delay: 0.2s; }
        .prose tbody tr:nth-child(3) { animation-delay: 0.3s; }
        .prose tbody tr:nth-child(4) { animation-delay: 0.4s; }
        .prose tbody tr:nth-child(5) { animation-delay: 0.5s; }
        .prose tbody tr:nth-child(6) { animation-delay: 0.6s; }
        .prose tbody tr:nth-child(7) { animation-delay: 0.7s; }
        .prose tbody tr:nth-child(8) { animation-delay: 0.8s; }
        .prose tbody tr:nth-child(9) { animation-delay: 0.9s; }
        .prose tbody tr:nth-child(10) { animation-delay: 1s; }
        
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        .prose tbody tr:hover {
            background: linear-gradient(135deg, #f3e8ff 0%, #fce7f3 100%);
            transform: scale(1.01);
            box-shadow: 0 4px 12px rgba(124, 58, 237, 0.15);
        }
        .prose tbody tr:nth-child(even) {
            background-color: #faf5ff;
        }
        .prose tbody tr:nth-child(odd) {
            background-color: #ffffff;
        }
        .prose td, .prose th {
            vertical-align: top;
            padding: 1.25rem 1.5rem !important;
            min-width: 150px;
            border-bottom: 1px solid #e5e7eb;
            word-wrap: break-word;
            overflow-wrap: break-word;
        }
        .prose tbody td {
            color: #374151;
            font-weight: 500;
        }
        .prose img {
            max-width: 100%;
            height: auto;
            border-radius: 0.75rem;
        }
        
        /* Smooth scroll behavior */
        html {
            scroll-behavior: smooth;
        }
        
        /* Card hover effects */
        .hover-lift {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .hover-lift:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.1);
        }
        
        /* Section divider */
        .section-divider {
            height: 4px;
            background: linear-gradient(to right, #7c3aed, #ec4899, #f97316);
            border-radius: 2px;
        }
        
        /* Reset for nested containers */
        section > div > div {
            overflow-x: auto;
        }
    </style>
</head>

<body class="bg-gray-50 font-sans">
    <div class="min-h-screen flex flex-col">
        @include('partials.header')

        <div class="flex-grow">
            <!-- Hero Section -->
            <div class="relative bg-gradient-to-r from-purple-700 via-pink-600 to-orange-500 overflow-hidden">
                <!-- Decorative elements -->
                <div class="absolute inset-0 opacity-10">
                    <div class="absolute top-10 left-10 w-32 h-32 bg-white rounded-full blur-3xl"></div>
                    <div class="absolute bottom-10 right-10 w-48 h-48 bg-white rounded-full blur-3xl"></div>
                    <div class="absolute top-1/2 left-1/4 w-24 h-24 bg-white rounded-full blur-3xl"></div>
                </div>
                
                <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24 sm:py-32">
                    <div class="text-center">
                        <!-- Badge -->
                        <div class="inline-flex items-center px-6 py-2 bg-white bg-opacity-20 backdrop-blur-sm rounded-full mb-6">
                            <svg class="w-5 h-5 mr-2 text-yellow-300" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                            </svg>
                            @php
                                $currentYear = date('Y');
                                $nextYear = $currentYear + 1;
                                // If we're in the second half of the year, show next academic year
                                if(date('n') >= 7) {
                                    $admissionYear = ($currentYear + 1) . '-' . ($currentYear + 2);
                                } else {
                                    $admissionYear = $currentYear . '-' . $nextYear;
                                }
                            @endphp
                            <span class="text-white font-semibold text-sm">Admissions Open {{ $admissionYear }}</span>
                        </div>
                        
                        <h1 class="text-5xl md:text-7xl font-bold text-white mb-6 animate-fade-in leading-tight">
                            {{ $department->name }}
                        </h1>
                        <p class="text-xl md:text-2xl text-purple-100 mb-8 max-w-4xl mx-auto leading-relaxed">
                            {{ $department->description }}
                        </p>
                        
                        <!-- Quick Stats -->
                        <div class="flex flex-wrap justify-center gap-6 mb-10">
                            <div class="bg-white bg-opacity-20 backdrop-blur-sm rounded-2xl px-6 py-4">
                                <div class="text-3xl font-bold text-white">{{ $department->faculty->count() }}+</div>
                                <div class="text-purple-100 text-sm font-medium">Expert Faculty</div>
                            </div>
                            <div class="bg-white bg-opacity-20 backdrop-blur-sm rounded-2xl px-6 py-4">
                                <div class="text-3xl font-bold text-white">{{ $department->courses->count() }}+</div>
                                <div class="text-purple-100 text-sm font-medium">Programs</div>
                            </div>
                            <div class="bg-white bg-opacity-20 backdrop-blur-sm rounded-2xl px-6 py-4">
                                <div class="text-3xl font-bold text-white">95%</div>
                                <div class="text-purple-100 text-sm font-medium">Placement Rate</div>
                            </div>
                            <div class="bg-white bg-opacity-20 backdrop-blur-sm rounded-2xl px-6 py-4">
                                <div class="text-3xl font-bold text-white">45+</div>
                                <div class="text-purple-100 text-sm font-medium">Years Legacy</div>
                            </div>
                        </div>
                        
                        <!-- CTA Buttons -->
                        <div class="flex flex-wrap justify-center gap-4">
                            <a href="#courses-section" class="inline-flex items-center px-10 py-5 bg-white text-purple-700 font-bold text-lg rounded-full hover:bg-purple-50 transition-all duration-300 shadow-2xl hover:shadow-3xl transform hover:-translate-y-1">
                                <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                                </svg>
                                Explore Programs
                            </a>
                            <a href="{{ route('contact') }}" class="inline-flex items-center px-10 py-5 bg-transparent border-3 border-white text-white font-bold text-lg rounded-full hover:bg-white hover:text-purple-700 transition-all duration-300 transform hover:-translate-y-1">
                                <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                </svg>
                                Apply Now
                            </a>
                        </div>
                    </div>
                </div>
                
                <!-- Wave Separator -->
                <div class="absolute bottom-0 left-0 right-0">
                    <svg viewBox="0 0 1440 120" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M0 120L60 105C120 90 240 60 360 45C480 30 600 30 720 37.5C840 45 960 60 1080 67.5C1200 75 1320 75 1380 75L1440 75V120H1380C1320 120 1200 120 1080 120C960 120 840 120 720 120C600 120 480 120 360 120C240 120 120 120 60 120H0Z" fill="#f9fafb"/>
                    </svg>
                </div>
            </div>

            <!-- Dynamic Content Sections - Only displayed if content exists -->
            @php
            $sectionBackgrounds = [
                'about' => 'bg-blue-50',
                'vision' => 'bg-purple-50',
                'po' => 'bg-green-50',
                'hod' => 'bg-yellow-50',
                'committee' => 'bg-pink-50',
                'faculty' => 'bg-indigo-50',
                'courses' => 'bg-teal-50',
                'laboratory' => 'bg-red-50',
                'mou' => 'bg-orange-50',
                'industry' => 'bg-cyan-50',
                'gallery' => 'bg-violet-50',
                'events' => 'bg-rose-50',
                'alumnae' => 'bg-amber-50',
                'social' => 'bg-emerald-50',
            ];
            @endphp

            @foreach($dynamicContents as $section => $content)
            <section id="{{ $section }}-section" class="{{ $sectionBackgrounds[$section] ?? 'bg-white' }} py-20">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    
                    {{-- Section Header with Icon --}}
                    @php
                    $sectionIcons = [
                        'about' => 'M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z',
                        'vision' => 'M15 12a3 3 0 11-6 0 3 3 0 016 0z M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z',
                        'po' => 'M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z',
                        'hod' => 'M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z',
                        'committee' => 'M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z',
                        'faculty' => 'M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z',
                        'courses' => 'M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253',
                        'laboratory' => 'M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z',
                        'mou' => 'M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z',
                        'industry' => 'M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z',
                        'gallery' => 'M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z',
                        'events' => 'M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z',
                        'alumnae' => 'M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z',
                        'social' => 'M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z',
                    ];
                    $iconPath = $sectionIcons[$section] ?? 'M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z';
                    @endphp
                    
                    @if(!in_array($section, ['social']))
                    <div class="text-center mb-12">
                        <div class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-r from-purple-600 to-pink-500 rounded-2xl mb-4 shadow-lg">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $iconPath }}"></path>
                            </svg>
                        </div>
                    </div>
                    @endif
                    
                    {{-- About Section --}}
                    @if($section === 'about')
                    <div class="mb-12">
                        <h2 class="text-5xl font-bold text-gray-900 mb-6 text-center">Why Choose {{ $department->name }}?</h2>
                        <div class="section-divider w-32 mx-auto mb-8"></div>
                        
                        <!-- Key Highlights Grid -->
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-12">
                            <div class="bg-gradient-to-br from-purple-500 to-purple-600 rounded-3xl p-8 text-white hover-lift">
                                <div class="w-16 h-16 bg-white bg-opacity-20 rounded-2xl flex items-center justify-center mb-6">
                                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path>
                                    </svg>
                                </div>
                                <h3 class="text-2xl font-bold mb-3">Industry-Ready Curriculum</h3>
                                <p class="text-purple-100 leading-relaxed">Updated syllabus designed with industry experts to ensure you're job-ready from day one</p>
                            </div>
                            
                            <div class="bg-gradient-to-br from-pink-500 to-pink-600 rounded-3xl p-8 text-white hover-lift">
                                <div class="w-16 h-16 bg-white bg-opacity-20 rounded-2xl flex items-center justify-center mb-6">
                                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                    </svg>
                                </div>
                                <h3 class="text-2xl font-bold mb-3">95% Placement Rate</h3>
                                <p class="text-pink-100 leading-relaxed">Strong industry connections with top companies ensuring excellent career opportunities</p>
                            </div>
                            
                            <div class="bg-gradient-to-br from-orange-500 to-orange-600 rounded-3xl p-8 text-white hover-lift">
                                <div class="w-16 h-16 bg-white bg-opacity-20 rounded-2xl flex items-center justify-center mb-6">
                                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path>
                                    </svg>
                                </div>
                                <h3 class="text-2xl font-bold mb-3">State-of-Art Labs</h3>
                                <p class="text-orange-100 leading-relaxed">Modern infrastructure with cutting-edge technology for hands-on learning experience</p>
                            </div>
                        </div>
                        
                        <!-- About Content -->
                        <div class="bg-white rounded-3xl shadow-xl p-8 md:p-12 hover-lift">
                            <div class="prose prose-lg max-w-none text-gray-700 leading-relaxed">
                                {!! $content->content !!}
                            </div>
                        </div>
                    </div>
                    @endif

                    {{-- Vision & Mission Section --}}
                    @if($section === 'vision')
                    <h2 class="text-4xl font-bold text-gray-900 mb-4 text-center">Vision & Mission</h2>
                    <div class="section-divider w-24 mx-auto mb-12"></div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div class="bg-white rounded-3xl p-8 md:p-10 shadow-lg hover-lift border-t-4 border-purple-500">
                            <div class="flex items-center mb-6">
                                <div class="w-12 h-12 bg-purple-100 rounded-xl flex items-center justify-center mr-4">
                                    <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                    </svg>
                                </div>
                                <h3 class="text-2xl font-bold text-gray-900">Our Vision</h3>
                            </div>
                            <div class="text-gray-700 text-lg leading-relaxed prose max-w-none">
                                {!! $content->content !!}
                            </div>
                        </div>
                        @php
                        $extraData = is_array($content->extra_data) ? $content->extra_data : json_decode($content->extra_data, true) ?? [];
                        @endphp
                        @if(!empty($extraData['mission']))
                        <div class="bg-white rounded-3xl p-8 md:p-10 shadow-lg hover-lift border-t-4 border-pink-500">
                            <div class="flex items-center mb-6">
                                <div class="w-12 h-12 bg-pink-100 rounded-xl flex items-center justify-center mr-4">
                                    <svg class="w-6 h-6 text-pink-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                    </svg>
                                </div>
                                <h3 class="text-2xl font-bold text-gray-900">Our Mission</h3>
                            </div>
                            <div class="text-gray-700 text-lg leading-relaxed prose max-w-none">
                                {!! $extraData['mission'] !!}
                            </div>
                        </div>
                        @endif
                    </div>
                    @endif

                    {{-- PO/PSO/PEO Section --}}
                    @if($section === 'po')
                    <h2 class="text-4xl font-bold text-gray-900 mb-4 text-center">Program Outcomes</h2>
                    <div class="section-divider w-24 mx-auto mb-12"></div>
                    <div class="bg-white rounded-3xl shadow-xl p-8 md:p-12 hover-lift">
                        <div class="prose prose-lg max-w-none text-gray-700 leading-relaxed">
                            {!! $content->content !!}
                        </div>
                        @php
                        $poExtraData = is_array($content->extra_data) ? $content->extra_data : json_decode($content->extra_data, true) ?? [];
                        @endphp
                        @if(!empty($poExtraData['pso']))
                        <div class="mt-8 pt-8 border-t border-gray-200">
                            <div class="flex items-center mb-4">
                                <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center mr-3">
                                    <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                                <h3 class="text-2xl font-bold text-gray-900">Program Specific Outcomes (PSO)</h3>
                            </div>
                            <div class="prose prose-lg max-w-none text-gray-700 leading-relaxed">
                                {!! $poExtraData['pso'] !!}
                            </div>
                        </div>
                        @endif
                        @if(!empty($poExtraData['peo']))
                        <div class="mt-8 pt-8 border-t border-gray-200">
                            <div class="flex items-center mb-4">
                                <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center mr-3">
                                    <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                                    </svg>
                                </div>
                                <h3 class="text-2xl font-bold text-gray-900">Program Educational Objectives (PEO)</h3>
                            </div>
                            <div class="prose prose-lg max-w-none text-gray-700 leading-relaxed">
                                {!! $poExtraData['peo'] !!}
                            </div>
                        </div>
                        @endif
                    </div>
                    @endif

                    {{-- HOD's Desk Section --}}
                    @if($section === 'hod')
                    <h2 class="text-4xl font-bold text-gray-900 mb-4 text-center">HOD's Desk</h2>
                    <div class="section-divider w-24 mx-auto mb-12"></div>
                    <div class="bg-white rounded-3xl shadow-xl p-8 md:p-12 hover-lift">
                        <div class="prose prose-lg max-w-none text-gray-700 leading-relaxed">
                            {!! $content->content !!}
                        </div>
                    </div>
                    @if($department->headOfDepartment)
                    <div class="mt-10 bg-gradient-to-r from-purple-50 to-pink-50 rounded-3xl p-8 md:p-12 shadow-lg border border-purple-100">
                        <div class="flex flex-col md:flex-row items-center gap-8">
                            @if($department->headOfDepartment->photo)
                                <img src="{{ asset('public/' . $department->headOfDepartment->photo) }}" alt="{{ $department->headOfDepartment->first_name }}" class="h-40 w-40 rounded-full object-cover shadow-lg border-4 border-white">
                            @else
                                <div class="h-40 w-40 rounded-full bg-gradient-to-r from-purple-400 to-pink-400 flex items-center justify-center shadow-lg">
                                    <svg class="h-20 w-20 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                    </svg>
                                </div>
                            @endif
                            <div class="text-center md:text-left flex-1">
                                <h3 class="text-3xl font-bold text-gray-900 mb-2">{{ $department->headOfDepartment->first_name }} {{ $department->headOfDepartment->last_name }}</h3>
                                <p class="text-purple-600 font-semibold text-lg mb-3">Head of Department</p>
                                @if($department->headOfDepartment->email)
                                <p class="text-gray-600 flex items-center justify-center md:justify-start">
                                    <svg class="w-5 h-5 mr-2 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                    </svg>
                                    {{ $department->headOfDepartment->email }}
                                </p>
                                @endif
                            </div>
                        </div>
                    </div>
                    @endif
                    @endif

                    {{-- Committee Section --}}
                    @if($section === 'committee')
                    <h2 class="text-4xl font-bold text-gray-900 mb-4 text-center">Committee Members</h2>
                    <div class="section-divider w-24 mx-auto mb-12"></div>
                    <div class="bg-white rounded-3xl shadow-xl p-8 md:p-12 hover-lift overflow-x-auto">
                        <div class="prose prose-lg max-w-none text-gray-700 leading-relaxed">
                            {!! $content->content !!}
                        </div>
                    </div>
                    @endif

                    {{-- Faculty Section --}}
                    @if($section === 'faculty')
                    <h2 class="text-4xl font-bold text-gray-900 mb-4 text-center">Meet Our Faculty</h2>
                    <div class="section-divider w-24 mx-auto mb-12"></div>
                    @if($content->content)
                    <div class="bg-white rounded-3xl shadow-xl p-8 md:p-12 mb-10 hover-lift">
                        <div class="prose prose-lg max-w-none text-gray-700 leading-relaxed">
                            {!! $content->content !!}
                        </div>
                    </div>
                    @endif
                    @if($department->faculty->count() > 0)
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                        @foreach($department->faculty as $faculty)
                        <div class="bg-white rounded-3xl shadow-lg p-6 hover-lift border border-gray-100">
                            <div class="flex items-center mb-4">
                                @if($faculty->photo)
                                    <img src="{{ asset('public/' . $faculty->photo) }}" alt="{{ $faculty->first_name }}" class="h-20 w-20 rounded-full object-cover mr-4 border-2 border-purple-200">
                                @else
                                    <div class="h-20 w-20 rounded-full bg-gradient-to-r from-purple-200 to-pink-200 flex items-center justify-center mr-4">
                                        <svg class="w-12 h-12 text-purple-600" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path>
                                        </svg>
                                    </div>
                                @endif
                                <div class="flex-1">
                                    <h3 class="text-xl font-bold text-gray-900 mb-1">{{ $faculty->first_name }} {{ $faculty->last_name }}</h3>
                                    <p class="text-purple-600 font-semibold text-sm">{{ $faculty->designation }}</p>
                                </div>
                            </div>
                            @if($faculty->qualification)
                            <div class="mb-3">
                                <p class="text-gray-600 text-sm flex items-start">
                                    <svg class="w-4 h-4 mr-2 mt-0.5 text-purple-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                                    </svg>
                                    <span>{{ Str::limit($faculty->qualification, 100) }}</span>
                                </p>
                            </div>
                            @endif
                            @if($faculty->email)
                            <div class="flex items-center text-sm text-gray-600 pt-3 border-t border-gray-100">
                                <svg class="w-4 h-4 mr-2 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                </svg>
                                <span>{{ $faculty->email }}</span>
                            </div>
                            @endif
                        </div>
                        @endforeach
                    </div>
                    @endif
                    @endif

                    {{-- Courses Section --}}
                    @if($section === 'courses')
                    <div id="courses-section">
                        <h2 class="text-5xl font-bold text-gray-900 mb-4 text-center">Transform Your Future</h2>
                        <p class="text-xl text-gray-600 text-center mb-4">Choose from our industry-aligned programs</p>
                        <div class="section-divider w-32 mx-auto mb-12"></div>
                        @if($content->content)
                        <div class="bg-white rounded-3xl shadow-xl p-8 md:p-12 mb-10 hover-lift">
                            <div class="prose prose-lg max-w-none text-gray-700 leading-relaxed">
                                {!! $content->content !!}
                            </div>
                        </div>
                        @endif
                        @if($department->courses->count() > 0)
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                            @foreach($department->courses as $index => $course)
                            <div class="bg-white rounded-3xl shadow-lg overflow-hidden hover-lift border-2 border-transparent hover:border-purple-300 group">
                                <!-- Course Header with Number Badge -->
                                <div class="relative bg-gradient-to-r from-purple-600 to-pink-500 p-8">
                                    <div class="absolute top-4 right-4 w-12 h-12 bg-white bg-opacity-20 backdrop-blur-sm rounded-full flex items-center justify-center">
                                        <span class="text-white font-bold text-lg">{{ $index + 1 }}</span>
                                    </div>
                                    <div class="absolute -bottom-6 right-6 w-24 h-24 bg-white bg-opacity-10 rounded-full blur-2xl"></div>
                                    <h3 class="text-2xl font-bold text-white mb-3 pr-16">{{ $course->name }}</h3>
                                    <span class="inline-block px-4 py-2 bg-white bg-opacity-20 backdrop-blur-sm text-white text-sm font-bold rounded-full">
                                        {{ $course->code }}
                                    </span>
                                </div>
                                
                                <!-- Course Details -->
                                <div class="p-8">
                                    @if($course->description)
                                    <p class="text-gray-600 text-base mb-6 leading-relaxed">{{ Str::limit($course->description, 150) }}</p>
                                    @endif
                                    
                                    <div class="space-y-4 mb-6">
                                        <div class="flex items-center text-gray-700">
                                            <div class="w-10 h-10 bg-purple-100 rounded-xl flex items-center justify-center mr-3">
                                                <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                </svg>
                                            </div>
                                            <div>
                                                <div class="text-xs text-gray-500 font-medium">Duration</div>
                                                <div class="font-bold">{{ $course->duration }}</div>
                                            </div>
                                        </div>
                                        
                                        <div class="flex items-center text-gray-700">
                                            <div class="w-10 h-10 bg-pink-100 rounded-xl flex items-center justify-center mr-3">
                                                <svg class="w-5 h-5 text-pink-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                </svg>
                                            </div>
                                            <div>
                                                <div class="text-xs text-gray-500 font-medium">Program Fee</div>
                                                <div class="font-bold text-2xl bg-gradient-to-r from-purple-600 to-pink-500 bg-clip-text text-transparent">₹{{ number_format($course->fees) }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <a href="{{ route('contact') }}" class="block w-full text-center py-4 bg-gradient-to-r from-purple-600 to-pink-500 text-white font-bold rounded-2xl hover:shadow-lg transition-all duration-300 transform group-hover:scale-105">
                                        Enroll Now →
                                    </a>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        
                        <!-- CTA Banner -->
                        <div class="mt-12 bg-gradient-to-r from-purple-600 via-pink-500 to-orange-500 rounded-3xl p-10 text-center text-white shadow-2xl">
                            <h3 class="text-3xl font-bold mb-4">Ready to Start Your Journey?</h3>
                            <p class="text-lg mb-6 text-purple-100">Limited seats available. Apply now to secure your future!</p>
                            <a href="{{ route('contact') }}" class="inline-flex items-center px-10 py-5 bg-white text-purple-700 font-bold text-lg rounded-full hover:bg-purple-50 transition-all duration-300 shadow-xl transform hover:-translate-y-1">
                                <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                Apply for Admission
                            </a>
                        </div>
                    </div>
                    @endif
                    @endif

                    {{-- Laboratory Section --}}
                    @if($section === 'laboratory')
                    <h2 class="text-4xl font-bold text-gray-900 mb-4 text-center">Laboratory Facilities</h2>
                    <div class="section-divider w-24 mx-auto mb-12"></div>
                    <div class="bg-white rounded-3xl shadow-xl p-8 md:p-12 hover-lift overflow-x-auto">
                        <div class="prose prose-lg max-w-none text-gray-700 leading-relaxed">
                            {!! $content->content !!}
                        </div>
                    </div>
                    @endif

                    {{-- MOU Section --}}
                    @if($section === 'mou')
                    <h2 class="text-4xl font-bold text-gray-900 mb-4 text-center">Memorandum of Understanding</h2>
                    <div class="section-divider w-24 mx-auto mb-12"></div>
                    <div class="bg-white rounded-3xl shadow-xl p-8 md:p-12 hover-lift overflow-x-auto">
                        <div class="prose prose-lg max-w-none text-gray-700 leading-relaxed">
                            {!! $content->content !!}
                        </div>
                    </div>
                    @endif

                    {{-- Industry Visits Section --}}
                    @if($section === 'industry')
                    <h2 class="text-4xl font-bold text-gray-900 mb-4 text-center">Industry Visits & Exposure</h2>
                    <div class="section-divider w-24 mx-auto mb-12"></div>
                    <div class="bg-white rounded-3xl shadow-xl p-8 md:p-12 hover-lift overflow-x-auto">
                        <div class="prose prose-lg max-w-none text-gray-700 leading-relaxed min-w-[600px] animate-table">
                            {!! $content->content !!}
                        </div>
                    </div>
                    @endif

                    {{-- Gallery Section --}}
                    @if($section === 'gallery')
                    <h2 class="text-4xl font-bold text-gray-900 mb-4 text-center">Photo Gallery</h2>
                    <div class="section-divider w-24 mx-auto mb-12"></div>
                    @php
                    $galleryExtraData = is_array($content->extra_data) ? $content->extra_data : json_decode($content->extra_data, true) ?? [];
                    @endphp
                    @if(!empty($galleryExtraData['images']))
                    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                        @foreach($galleryExtraData['images'] as $image)
                        <div class="overflow-hidden rounded-2xl shadow-lg hover-lift group">
                            <img src="{{ asset('public/' . $image) }}"
                                alt="Gallery Image"
                                class="w-full h-64 object-cover group-hover:scale-110 transition-transform duration-500 cursor-pointer"
                                onclick="openLightbox('{{ asset('public/' . $image) }}')">
                            <div class="absolute inset-0 bg-gradient-to-t from-purple-600 to-transparent opacity-0 group-hover:opacity-60 transition-opacity duration-300"></div>
                        </div>
                        @endforeach
                    </div>
                    @endif
                    @if($content->content)
                    <div class="mt-10 bg-white rounded-3xl shadow-xl p-8 md:p-12 hover-lift">
                        <div class="prose prose-lg max-w-none text-gray-700 leading-relaxed">
                            {!! $content->content !!}
                        </div>
                    </div>
                    @endif
                    @endif

                    {{-- Events Section --}}
                    @if($section === 'events')
                    <h2 class="text-4xl font-bold text-gray-900 mb-4 text-center">Events & Activities</h2>
                    <div class="section-divider w-24 mx-auto mb-12"></div>
                    @if($content->content)
                    <div class="bg-white rounded-3xl shadow-xl p-8 md:p-12 mb-10 hover-lift">
                        <div class="prose prose-lg max-w-none">
                            <ul class="space-y-4">
                                @php
                                // Parse the content to extract list items
                                $lines = explode("\n", strip_tags($content->content));
                                $hasList = false;
                                foreach($lines as $line) {
                                    $line = trim($line);
                                    if(!empty($line)) {
                                        $hasList = true;
                                        echo '<li class="flex items-start group">';
                                        echo '<span class="flex-shrink-0 w-8 h-8 bg-gradient-to-r from-purple-500 to-pink-500 rounded-full flex items-center justify-center mr-4 mt-1 group-hover:scale-110 transition-transform">';
                                        echo '<svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>';
                                        echo '</span>';
                                        echo '<span class="text-gray-700 text-lg font-medium">' . e($line) . '</span>';
                                        echo '</li>';
                                    }
                                }
                                if(!$hasList) {
                                    echo '<div class="text-gray-700 text-lg leading-relaxed">' . $content->content . '</div>';
                                }
                                @endphp
                            </ul>
                        </div>
                    </div>
                    @endif
                    @php
                    $eventsExtraData = is_array($content->extra_data) ? $content->extra_data : json_decode($content->extra_data, true) ?? [];
                    @endphp
                    @if(!empty($eventsExtraData['images']))
                    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                        @foreach($eventsExtraData['images'] as $image)
                        <div class="overflow-hidden rounded-2xl shadow-lg hover-lift group relative">
                            <img src="{{ asset('public/' . $image) }}"
                                alt="Event Image"
                                class="w-full h-64 object-cover group-hover:scale-110 transition-transform duration-500 cursor-pointer"
                                onclick="openLightbox('{{ asset('public/' . $image) }}')">
                            <div class="absolute inset-0 bg-gradient-to-t from-purple-600 to-transparent opacity-0 group-hover:opacity-60 transition-opacity duration-300"></div>
                        </div>
                        @endforeach
                    </div>
                    @endif
                    @endif

                    {{-- Alumnae Section --}}
                    @if($section === 'alumnae')
                    <h2 class="text-4xl font-bold text-gray-900 mb-4 text-center">Our Alumnae Network</h2>
                    <div class="section-divider w-24 mx-auto mb-12"></div>
                    <div class="bg-gradient-to-br from-purple-50 to-pink-50 rounded-3xl shadow-xl p-8 md:p-12 border border-purple-100">
                        @php
                        // Parse alumnae content to create beautiful cards
                        $alumnaeLines = explode("\n", strip_tags($content->content));
                        $alumnaeCount = 0;
                        foreach($alumnaeLines as $line) {
                            $line = trim($line);
                            if(!empty($line) && (strpos($line, 'Ms.') !== false || strpos($line, 'Batch') !== false)) {
                                $alumnaeCount++;
                                echo '<div class="bg-white rounded-2xl p-6 mb-6 shadow-md hover-lift border-l-4 border-purple-500">';
                                echo '<div class="flex items-start">';
                                echo '<div class="flex-shrink-0 w-12 h-12 bg-gradient-to-r from-purple-500 to-pink-500 rounded-full flex items-center justify-center mr-4">';
                                echo '<svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>';
                                echo '</div>';
                                echo '<div class="flex-1">';
                                echo '<p class="text-gray-800 text-base leading-relaxed">' . e($line) . '</p>';
                                echo '</div>';
                                echo '</div>';
                                echo '</div>';
                            }
                        }
                        if($alumnaeCount == 0) {
                            echo '<div class="prose prose-lg max-w-none text-gray-700 leading-relaxed">' . $content->content . '</div>';
                        }
                        @endphp
                    </div>
                    @endif

                    {{-- Social/Contact Section --}}
                    @if($section === 'social')
                    <div class="bg-gradient-to-r from-purple-700 via-pink-600 to-orange-500 rounded-3xl p-12 md:p-16 text-center text-white shadow-2xl relative overflow-hidden">
                        <!-- Decorative elements -->
                        <div class="absolute inset-0 opacity-10">
                            <div class="absolute top-5 left-5 w-24 h-24 bg-white rounded-full blur-2xl"></div>
                            <div class="absolute bottom-5 right-5 w-32 h-32 bg-white rounded-full blur-2xl"></div>
                        </div>
                        
                        <div class="relative">
                            <div class="inline-flex items-center justify-center w-20 h-20 bg-white bg-opacity-20 rounded-2xl mb-6">
                                <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                            <h2 class="text-4xl font-bold mb-6">Get in Touch</h2>
                            
                            @php
                            // Parse social content to properly display images and text
                            $socialContent = $content->content;
                            // Check if content has image tags
                            if(preg_match_all('/<img[^>]+src="([^"]+)"[^>]*>/i', $socialContent, $matches)) {
                                echo '<div class="max-w-4xl mx-auto">';
                                echo '<div class="prose prose-lg max-w-none mx-auto text-white leading-relaxed mb-8">';
                                // Remove images from content to display separately
                                $textOnly = preg_replace('/<img[^>]+>/i', '', $socialContent);
                                echo $textOnly;
                                echo '</div>';
                                echo '<div class="grid grid-cols-2 md:grid-cols-3 gap-8 mt-10">';
                                foreach($matches[1] as $imageUrl) {
                                    echo '<div class="bg-white bg-opacity-20 backdrop-blur-sm rounded-2xl p-4 hover-lift">';
                                    echo '<img src="' . e($imageUrl) . '" alt="Social Media" class="w-full h-auto rounded-xl">';
                                    echo '</div>';
                                }
                                echo '</div>';
                                echo '</div>';
                            } else {
                                echo '<div class="prose prose-lg max-w-none mx-auto text-white leading-relaxed">';
                                echo $socialContent;
                                echo '</div>';
                            }
                            @endphp
                            
                            <div class="mt-10">
                                <a href="{{ route('contact') }}" class="inline-flex items-center justify-center px-10 py-4 bg-white text-purple-700 text-lg font-bold rounded-full hover:bg-purple-50 transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-1">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                    </svg>
                                    Contact Us Today
                                </a>
                            </div>
                        </div>
                    </div>
                    @endif

                    {{-- Generic image display for any section that has uploaded images --}}
                    {{-- (gallery and events handle their own images above, skip them here) --}}
                    @if(!in_array($section, ['gallery', 'events']))
                    @php
                        $genericExtraData = is_array($content->extra_data)
                            ? $content->extra_data
                            : (json_decode($content->extra_data, true) ?? []);
                    @endphp
                    @if(!empty($genericExtraData['images']))
                    <div class="mt-10">
                        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                            @foreach($genericExtraData['images'] as $image)
                            <div class="overflow-hidden rounded-2xl shadow-lg hover-lift group relative">
                                <img src="{{ asset('public/' . $image) }}"
                                    alt="{{ ucfirst($section) }} Image"
                                    class="w-full h-64 object-cover group-hover:scale-110 transition-transform duration-500 cursor-pointer"
                                    onclick="openLightbox('{{ asset('public/' . $image) }}')">
                                <div class="absolute inset-0 bg-gradient-to-t from-purple-600 to-transparent opacity-0 group-hover:opacity-60 transition-opacity duration-300"></div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endif
                    @endif

                </div>
            </section>
            @endforeach

        </div>

        @include('partials.footer', ['departmentId' => $department->id])
    </div>

    <script>
        // Lightbox functionality
        function openLightbox(imageSrc) {
            const lightbox = document.getElementById('image-lightbox');
            if (lightbox) {
                const lightboxImg = lightbox.querySelector('.lightbox-image');
                lightboxImg.src = imageSrc;
                lightbox.style.display = 'flex';
                document.body.style.overflow = 'hidden';
            } else {
                const lightboxHTML = `
                    <div id="image-lightbox" style="display:none; position:fixed; top:0; left:0; width:100%; height:100%; background:rgba(0,0,0,0.9); z-index:9999; align-items:center; justify-content:center; cursor:pointer;" onclick="closeLightbox()">
                        <img class="lightbox-image" src="${imageSrc}" style="max-width:90%; max-height:90%; object-fit:contain; border-radius:8px;">
                        <button style="position:absolute; top:20px; right:20px; background:white; border:none; border-radius:50%; width:40px; height:40px; font-size:24px; cursor:pointer;" onclick="closeLightbox()">&times;</button>
                    </div>
                `;
                document.body.insertAdjacentHTML('beforeend', lightboxHTML);
                setTimeout(() => {
                    document.getElementById('image-lightbox').style.display = 'flex';
                    document.body.style.overflow = 'hidden';
                }, 10);
            }
        }

        function closeLightbox() {
            const lightbox = document.getElementById('image-lightbox');
            if (lightbox) {
                lightbox.style.display = 'none';
                document.body.style.overflow = 'auto';
            }
        }

        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                closeLightbox();
            }
        });
    </script>
</body>

</html>

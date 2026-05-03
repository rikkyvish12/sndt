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
</head>

<body class="bg-gray-50 font-sans">
    <div class="min-h-screen flex flex-col">
        @include('partials.header')

        <div class="flex-grow">
            <!-- Hero Section -->
            <div class="relative bg-gradient-to-r from-purple-700 via-pink-600 to-orange-500">
                <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24 sm:py-32">
                    <div class="text-center">
                        <h1 class="text-4xl md:text-6xl font-bold text-white mb-6">
                            {{ $department->name }}
                        </h1>
                        <p class="text-xl md:text-2xl text-purple-100 mb-8 max-w-3xl mx-auto">
                            {{ $department->description }}
                        </p>
                    </div>
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
            <section id="{{ $section }}-section" class="{{ $sectionBackgrounds[$section] ?? 'bg-white' }} py-16">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    
                    {{-- About Section --}}
                    @if($section === 'about')
                    <div class="mb-8">
                        <h2 class="text-3xl font-bold text-gray-900 sm:text-4xl mb-6">About</h2>
                        <div class="bg-white rounded-2xl shadow-xl p-8">
                            <div class="prose max-w-none">
                                {!! $content->content !!}
                            </div>
                        </div>
                    </div>
                    
                    {{-- Stats --}}
                    <div class="bg-white rounded-2xl shadow-xl p-8">
                        <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
                            <div>
                                <div class="text-4xl font-bold bg-gradient-to-r from-purple-600 to-pink-500 bg-clip-text text-transparent">{{ $department->faculty->count() }}</div>
                                <div class="mt-2 text-gray-600 font-medium">Faculty Members</div>
                            </div>
                            <div>
                                <div class="text-4xl font-bold bg-gradient-to-r from-purple-600 to-pink-500 bg-clip-text text-transparent">{{ $department->courses->count() }}</div>
                                <div class="mt-2 text-gray-600 font-medium">Programs</div>
                            </div>
                            <div>
                                <div class="text-4xl font-bold bg-gradient-to-r from-purple-600 to-pink-500 bg-clip-text text-transparent">{{ $department->code }}</div>
                                <div class="mt-2 text-gray-600 font-medium">Department Code</div>
                            </div>
                            <div>
                                <div class="text-4xl font-bold bg-gradient-to-r from-purple-600 to-pink-500 bg-clip-text text-transparent">45+</div>
                                <div class="mt-2 text-gray-600 font-medium">Years Active</div>
                            </div>
                        </div>
                    </div>
                    @endif

                    {{-- Vision & Mission Section --}}
                    @if($section === 'vision')
                    <h2 class="text-3xl font-bold text-gray-900 sm:text-4xl mb-8 text-center">Vision & Mission</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div class="bg-white rounded-2xl p-8 shadow-lg">
                            <h3 class="text-2xl font-bold text-gray-900 mb-4">Our Vision</h3>
                            <div class="text-gray-700 text-lg prose max-w-none">
                                {!! $content->content !!}
                            </div>
                        </div>
                        @php
                        $extraData = is_array($content->extra_data) ? $content->extra_data : json_decode($content->extra_data, true) ?? [];
                        @endphp
                        @if(!empty($extraData['mission']))
                        <div class="bg-white rounded-2xl p-8 shadow-lg">
                            <h3 class="text-2xl font-bold text-gray-900 mb-4">Our Mission</h3>
                            <div class="text-gray-700 text-lg prose max-w-none">
                                {!! $extraData['mission'] !!}
                            </div>
                        </div>
                        @endif
                    </div>
                    @endif

                    {{-- PO/PSO/PEO Section --}}
                    @if($section === 'po')
                    <h2 class="text-3xl font-bold text-gray-900 sm:text-4xl mb-8 text-center">PO/PSO/PEO</h2>
                    <div class="bg-white rounded-2xl shadow-xl p-8">
                        <div class="prose max-w-none">
                            {!! $content->content !!}
                        </div>
                        @php
                        $poExtraData = is_array($content->extra_data) ? $content->extra_data : json_decode($content->extra_data, true) ?? [];
                        @endphp
                        @if(!empty($poExtraData['pso']))
                        <div class="mt-6">
                            <h3 class="text-xl font-semibold text-gray-900 mb-3">Program Specific Outcomes (PSO)</h3>
                            <div class="prose max-w-none">
                                {!! $poExtraData['pso'] !!}
                            </div>
                        </div>
                        @endif
                        @if(!empty($poExtraData['peo']))
                        <div class="mt-6">
                            <h3 class="text-xl font-semibold text-gray-900 mb-3">Program Educational Objectives (PEO)</h3>
                            <div class="prose max-w-none">
                                {!! $poExtraData['peo'] !!}
                            </div>
                        </div>
                        @endif
                    </div>
                    @endif

                    {{-- HOD's Desk Section --}}
                    @if($section === 'hod')
                    <h2 class="text-3xl font-bold text-gray-900 sm:text-4xl mb-8 text-center">HOD's Desk</h2>
                    <div class="bg-white rounded-2xl shadow-xl p-8">
                        <div class="prose max-w-none">
                            {!! $content->content !!}
                        </div>
                    </div>
                    @if($department->headOfDepartment)
                    <div class="mt-8 bg-white rounded-2xl p-8 shadow-lg">
                        <div class="flex flex-col md:flex-row items-center gap-6">
                            @if($department->headOfDepartment->photo)
                                <img src="{{ asset($department->headOfDepartment->photo) }}" alt="{{ $department->headOfDepartment->first_name }}" class="h-32 w-32 rounded-full object-cover">
                            @else
                                <div class="h-32 w-32 rounded-full bg-gradient-to-r from-purple-200 to-pink-200 flex items-center justify-center">
                                    <svg class="h-16 w-16 text-purple-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                    </svg>
                                </div>
                            @endif
                            <div class="text-center md:text-left">
                                <h3 class="text-2xl font-bold text-gray-900 mb-2">{{ $department->headOfDepartment->first_name }} {{ $department->headOfDepartment->last_name }}</h3>
                                <p class="text-purple-600 font-medium">Head of Department</p>
                            </div>
                        </div>
                    </div>
                    @endif
                    @endif

                    {{-- Committee Section --}}
                    @if($section === 'committee')
                    <h2 class="text-3xl font-bold text-gray-900 sm:text-4xl mb-8 text-center">Committee Members</h2>
                    <div class="bg-white rounded-2xl shadow-xl p-8">
                        <div class="prose max-w-none">
                            {!! $content->content !!}
                        </div>
                    </div>
                    @endif

                    {{-- Faculty Section --}}
                    @if($section === 'faculty')
                    <h2 class="text-3xl font-bold text-gray-900 sm:text-4xl mb-8 text-center">Our Faculty</h2>
                    @if($content->content)
                    <div class="bg-white rounded-2xl shadow-xl p-8 mb-8">
                        <div class="prose max-w-none">
                            {!! $content->content !!}
                        </div>
                    </div>
                    @endif
                    @if($department->faculty->count() > 0)
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach($department->faculty as $faculty)
                        <div class="bg-white rounded-2xl shadow-lg p-6">
                            <div class="flex items-center mb-4">
                                @if($faculty->photo)
                                    <img src="{{ asset($faculty->photo) }}" alt="{{ $faculty->first_name }}" class="h-16 w-16 rounded-full object-cover mr-4">
                                @else
                                    <div class="h-16 w-16 rounded-full bg-gradient-to-r from-purple-100 to-pink-100 flex items-center justify-center mr-4">
                                        <svg class="w-10 h-10 text-purple-600" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path>
                                        </svg>
                                    </div>
                                @endif
                                <div>
                                    <h3 class="text-xl font-bold text-gray-900">{{ $faculty->first_name }} {{ $faculty->last_name }}</h3>
                                    <p class="text-purple-600 font-medium">{{ $faculty->designation }}</p>
                                </div>
                            </div>
                            <p class="text-gray-600 text-sm mb-3">{{ Str::limit($faculty->qualification, 100) }}</p>
                            <div class="flex items-center text-sm text-gray-500">
                                <span>{{ $faculty->email }}</span>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @endif
                    @endif

                    {{-- Courses Section --}}
                    @if($section === 'courses')
                    <h2 class="text-3xl font-bold text-gray-900 sm:text-4xl mb-8 text-center">Programs Offered</h2>
                    @if($content->content)
                    <div class="bg-white rounded-2xl shadow-xl p-8 mb-8">
                        <div class="prose max-w-none">
                            {!! $content->content !!}
                        </div>
                    </div>
                    @endif
                    @if($department->courses->count() > 0)
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach($department->courses as $course)
                        <div class="bg-white rounded-2xl shadow-lg p-6">
                            <h3 class="text-lg font-bold text-gray-900 mb-2">{{ $course->name }}</h3>
                            <p class="text-green-600 font-medium mb-2">{{ $course->duration }}</p>
                            <p class="text-gray-600 text-sm mb-4">{{ Str::limit($course->description, 100) }}</p>
                            <div class="flex justify-between items-center">
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-800">
                                    {{ $course->code }}
                                </span>
                                <span class="text-lg font-bold text-green-600">₹{{ number_format($course->fees) }}</span>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @endif
                    @endif

                    {{-- Laboratory Section --}}
                    @if($section === 'laboratory')
                    <h2 class="text-3xl font-bold text-gray-900 sm:text-4xl mb-8 text-center">Laboratory</h2>
                    <div class="bg-white rounded-2xl shadow-xl p-8">
                        <div class="prose max-w-none">
                            {!! $content->content !!}
                        </div>
                    </div>
                    @endif

                    {{-- MOU Section --}}
                    @if($section === 'mou')
                    <h2 class="text-3xl font-bold text-gray-900 sm:text-4xl mb-8 text-center">MOU</h2>
                    <div class="bg-white rounded-2xl shadow-xl p-8">
                        <div class="prose max-w-none">
                            {!! $content->content !!}
                        </div>
                    </div>
                    @endif

                    {{-- Industry Visits Section --}}
                    @if($section === 'industry')
                    <h2 class="text-3xl font-bold text-gray-900 sm:text-4xl mb-8 text-center">Industry Visits</h2>
                    <div class="bg-white rounded-2xl shadow-xl p-8">
                        <div class="prose max-w-none">
                            {!! $content->content !!}
                        </div>
                    </div>
                    @endif

                    {{-- Gallery Section --}}
                    @if($section === 'gallery')
                    <h2 class="text-3xl font-bold text-gray-900 sm:text-4xl mb-8 text-center">Gallery</h2>
                    @php
                    $galleryExtraData = is_array($content->extra_data) ? $content->extra_data : json_decode($content->extra_data, true) ?? [];
                    @endphp
                    @if(!empty($galleryExtraData['images']))
                    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                        @foreach($galleryExtraData['images'] as $image)
                        <div class="overflow-hidden rounded-xl shadow-lg">
                            <img src="{{ asset($image) }}"
                                alt="Gallery Image"
                                class="w-full h-64 object-cover hover:scale-110 transition-transform duration-300 cursor-pointer"
                                onclick="openLightbox('{{ asset($image) }}')">
                        </div>
                        @endforeach
                    </div>
                    @endif
                    @if($content->content)
                    <div class="mt-8 bg-white rounded-2xl shadow-xl p-8">
                        <div class="prose max-w-none">
                            {!! $content->content !!}
                        </div>
                    </div>
                    @endif
                    @endif

                    {{-- Events Section --}}
                    @if($section === 'events')
                    <h2 class="text-3xl font-bold text-gray-900 sm:text-4xl mb-8 text-center">Events Organized</h2>
                    @if($content->content)
                    <div class="bg-white rounded-2xl shadow-xl p-8 mb-8">
                        <div class="prose max-w-none">
                            {!! $content->content !!}
                        </div>
                    </div>
                    @endif
                    @php
                    $eventsExtraData = is_array($content->extra_data) ? $content->extra_data : json_decode($content->extra_data, true) ?? [];
                    @endphp
                    @if(!empty($eventsExtraData['images']))
                    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                        @foreach($eventsExtraData['images'] as $image)
                        <div class="overflow-hidden rounded-xl shadow-lg">
                            <img src="{{ asset($image) }}"
                                alt="Event Image"
                                class="w-full h-64 object-cover hover:scale-110 transition-transform duration-300 cursor-pointer"
                                onclick="openLightbox('{{ asset($image) }}')">
                        </div>
                        @endforeach
                    </div>
                    @endif
                    @endif

                    {{-- Alumnae Section --}}
                    @if($section === 'alumnae')
                    <h2 class="text-3xl font-bold text-gray-900 sm:text-4xl mb-8 text-center">Alumnae</h2>
                    <div class="bg-white rounded-2xl shadow-xl p-8">
                        <div class="prose max-w-none">
                            {!! $content->content !!}
                        </div>
                    </div>
                    @endif

                    {{-- Social/Contact Section --}}
                    @if($section === 'social')
                    <div class="bg-gradient-to-r from-purple-700 via-pink-600 to-orange-500 rounded-2xl p-12 text-center text-white">
                        <h2 class="text-3xl font-bold mb-4">Get in Touch</h2>
                        <div class="prose max-w-none mx-auto text-white">
                            {!! $content->content !!}
                        </div>
                        <div class="mt-8">
                            <a href="{{ route('contact') }}" class="inline-flex items-center justify-center px-8 py-4 border-2 border-white text-base font-medium rounded-md text-white hover:bg-white hover:text-purple-600 transition-all duration-300">
                                Contact Us
                            </a>
                        </div>
                    </div>
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

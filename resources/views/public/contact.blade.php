<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Contact Us - SNDT Women's University</title>
    <meta name="description" content="Get in touch with SNDT Women's University. Contact our admissions office, faculty, or administrative departments.">
    
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
                    <a href="{{ route('contact') }}" class="text-primary-600 font-medium border-b-2 border-primary-600">Contact</a>
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/admin/dashboard') }}" class="bg-primary-600 text-white px-4 py-2 rounded-lg hover:bg-primary-700 font-medium">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}" class="bg-primary-600 text-white px-4 py-2 rounded-lg hover:bg-primary-700 font-medium">Login</a>
                        @endauth
                    @endif
                </div>
                <div class="md:hidden flex items-center">
                    <button id="mobile-menu-button" class="text-gray-700 hover:text-primary-600">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
        <div id="mobile-menu" class="md:hidden hidden">
            <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3 bg-white border-t">
                <a href="{{ route('welcome') }}" class="block px-3 py-2 text-gray-700 hover:text-primary-600 font-medium">Home</a>
                <a href="{{ route('about') }}" class="block px-3 py-2 text-gray-700 hover:text-primary-600 font-medium">About</a>
                <a href="{{ route('contact') }}" class="block px-3 py-2 text-primary-600 font-medium border-l-4 border-primary-600">Contact</a>
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
    <div class="relative bg-gradient-to-r from-primary-700 to-primary-900 py-24">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h1 class="text-4xl font-bold text-white sm:text-5xl md:text-6xl">
                    Contact Us
                </h1>
                <p class="mt-6 text-xl text-primary-100 max-w-3xl mx-auto">
                    We're here to help. Get in touch with our team for admissions, academic inquiries, or general information.
                </p>
            </div>
        </div>
    </div>

    <!-- Contact Section -->
    <div class="py-16 -mt-16 relative z-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
                <div class="grid grid-cols-1 lg:grid-cols-2">
                    <!-- Contact Form -->
                    <div class="p-8 sm:p-12">
                        <h2 class="text-2xl font-bold text-gray-900 mb-6">Send us a Message</h2>
                        <form class="space-y-6">
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                                <div>
                                    <label for="first_name" class="block text-sm font-medium text-gray-700 mb-1">First Name</label>
                                    <input type="text" id="first_name" name="first_name" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-transparent">
                                </div>
                                <div>
                                    <label for="last_name" class="block text-sm font-medium text-gray-700 mb-1">Last Name</label>
                                    <input type="text" id="last_name" name="last_name" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-transparent">
                                </div>
                            </div>
                            
                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email Address</label>
                                <input type="email" id="email" name="email" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-transparent">
                            </div>
                            
                            <div>
                                <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">Phone Number</label>
                                <input type="tel" id="phone" name="phone" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-transparent">
                            </div>
                            
                            <div>
                                <label for="subject" class="block text-sm font-medium text-gray-700 mb-1">Subject</label>
                                <select id="subject" name="subject" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-transparent">
                                    <option value="">Select a subject</option>
                                    <option value="admissions">Admissions</option>
                                    <option value="academic">Academic Inquiry</option>
                                    <option value="faculty">Faculty Information</option>
                                    <option value="general">General Information</option>
                                    <option value="support">Technical Support</option>
                                </select>
                            </div>
                            
                            <div>
                                <label for="message" class="block text-sm font-medium text-gray-700 mb-1">Message</label>
                                <textarea id="message" name="message" rows="5" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-transparent"></textarea>
                            </div>
                            
                            <div>
                                <button type="submit" class="w-full bg-primary-600 text-white py-3 px-6 rounded-lg hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:ring-offset-2 font-medium">
                                    Send Message
                                </button>
                            </div>
                        </form>
                    </div>
                    
                    <!-- Contact Information -->
                    <div class="bg-gray-50 p-8 sm:p-12">
                        <h2 class="text-2xl font-bold text-gray-900 mb-8">Contact Information</h2>
                        
                        <div class="space-y-8">
                            <!-- Address -->
                            <div class="flex items-start">
                                <div class="flex-shrink-0">
                                    <div class="h-12 w-12 rounded-lg bg-primary-100 flex items-center justify-center">
                                        <svg class="h-6 w-6 text-primary-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                        </svg>
                                    </div>
                                </div>
                                <div class="ml-4">
                                    <h3 class="text-lg font-medium text-gray-900">Address</h3>
                                    <p class="mt-2 text-gray-600">
                                        SNDT Women's University<br>
                                        University Campus<br>
                                        Mumbai, Maharashtra 400020<br>
                                        India
                                    </p>
                                </div>
                            </div>
                            
                            <!-- Phone -->
                            <div class="flex items-start">
                                <div class="flex-shrink-0">
                                    <div class="h-12 w-12 rounded-lg bg-primary-100 flex items-center justify-center">
                                        <svg class="h-6 w-6 text-primary-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                        </svg>
                                    </div>
                                </div>
                                <div class="ml-4">
                                    <h3 class="text-lg font-medium text-gray-900">Phone Numbers</h3>
                                    <div class="mt-2 space-y-1">
                                        <p class="text-gray-600">Admissions: <a href="tel:+912212345678" class="text-primary-600 hover:text-primary-800">+91 22 1234 5678</a></p>
                                        <p class="text-gray-600">General: <a href="tel:+912212345679" class="text-primary-600 hover:text-primary-800">+91 22 1234 5679</a></p>
                                        <p class="text-gray-600">Support: <a href="tel:+912212345680" class="text-primary-600 hover:text-primary-800">+91 22 1234 5680</a></p>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Email -->
                            <div class="flex items-start">
                                <div class="flex-shrink-0">
                                    <div class="h-12 w-12 rounded-lg bg-primary-100 flex items-center justify-center">
                                        <svg class="h-6 w-6 text-primary-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                        </svg>
                                    </div>
                                </div>
                                <div class="ml-4">
                                    <h3 class="text-lg font-medium text-gray-900">Email Addresses</h3>
                                    <div class="mt-2 space-y-1">
                                        <p class="text-gray-600">General: <a href="mailto:info@sndt.edu.in" class="text-primary-600 hover:text-primary-800">info@sndt.edu.in</a></p>
                                        <p class="text-gray-600">Admissions: <a href="mailto:admissions@sndt.edu.in" class="text-primary-600 hover:text-primary-800">admissions@sndt.edu.in</a></p>
                                        <p class="text-gray-600">Support: <a href="mailto:support@sndt.edu.in" class="text-primary-600 hover:text-primary-800">support@sndt.edu.in</a></p>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Office Hours -->
                            <div class="flex items-start">
                                <div class="flex-shrink-0">
                                    <div class="h-12 w-12 rounded-lg bg-primary-100 flex items-center justify-center">
                                        <svg class="h-6 w-6 text-primary-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    </div>
                                </div>
                                <div class="ml-4">
                                    <h3 class="text-lg font-medium text-gray-900">Office Hours</h3>
                                    <div class="mt-2 space-y-1">
                                        <p class="text-gray-600">Monday - Friday: 9:00 AM - 6:00 PM</p>
                                        <p class="text-gray-600">Saturday: 10:00 AM - 2:00 PM</p>
                                        <p class="text-gray-600">Sunday: Closed</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Social Media -->
                        <div class="mt-12 pt-8 border-t border-gray-200">
                            <h3 class="text-lg font-medium text-gray-900 mb-4">Follow Us</h3>
                            <div class="flex space-x-4">
                                <a href="#" class="h-10 w-10 rounded-full bg-primary-100 flex items-center justify-center hover:bg-primary-200 transition-colors">
                                    <svg class="h-5 w-5 text-primary-600" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/>
                                    </svg>
                                </a>
                                <a href="#" class="h-10 w-10 rounded-full bg-primary-100 flex items-center justify-center hover:bg-primary-200 transition-colors">
                                    <svg class="h-5 w-5 text-primary-600" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M22.46 6c-.77.35-1.6.58-2.46.69.88-.53 1.56-1.37 1.88-2.38-.83.5-1.75.85-2.72 1.05C18.37 4.5 17.26 4 16 4c-2.35 0-4.27 1.92-4.27 4.29 0 .34.04.67.11.98C8.28 9.09 5.11 7.38 3 4.79c-.37.63-.58 1.37-.58 2.15 0 1.49.75 2.81 1.91 3.56-.71 0-1.37-.2-1.95-.5v.03c0 2.08 1.48 3.82 3.44 4.21a4.22 4.22 0 0 1-1.93.07 4.28 4.28 0 0 0 4 2.98 8.521 8.521 0 0 1-5.33 1.84c-.34 0-.68-.02-1.02-.06C3.44 20.29 5.7 21 8.12 21 16 21 20.33 14.46 20.33 8.79c0-.19 0-.37-.01-.56.84-.6 1.56-1.36 2.14-2.23z"/>
                                    </svg>
                                </a>
                                <a href="#" class="h-10 w-10 rounded-full bg-primary-100 flex items-center justify-center hover:bg-primary-200 transition-colors">
                                    <svg class="h-5 w-5 text-primary-600" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M12.017 0C5.396 0 .029 5.367.029 11.987c0 5.079 3.158 9.417 7.618 11.174-.105-.949-.199-2.403.041-3.439.219-.937 1.406-5.957 1.406-5.957s-.359-.72-.359-1.781c0-1.663.967-2.911 2.168-2.911 1.024 0 1.518.769 1.518 1.688 0 1.029-.653 2.567-.992 3.992-.285 1.193.6 2.165 1.775 2.165 2.128 0 3.768-2.245 3.768-5.487 0-2.861-2.063-4.869-5.008-4.869-3.41 0-5.409 2.562-5.409 5.199 0 1.033.394 2.143.889 2.741.097.118.112.222.085.343-.09.375-.293 1.199-.334 1.363-.053.225-.172.271-.402.165-1.495-.69-2.433-2.878-2.433-4.646 0-3.776 2.748-7.252 7.92-7.252 4.158 0 7.392 2.967 7.392 6.923 0 4.135-2.607 7.462-6.233 7.462-1.214 0-2.357-.629-2.75-1.378l-.748 2.853c-.271 1.043-1.002 2.35-1.492 3.146C9.57 23.812 10.763 24.009 12.017 24.009c6.624 0 11.99-5.367 11.99-11.988C24.007 5.367 18.641.001 12.017.001z"/>
                                    </svg>
                                </a>
                                <a href="#" class="h-10 w-10 rounded-full bg-primary-100 flex items-center justify-center hover:bg-primary-200 transition-colors">
                                    <svg class="h-5 w-5 text-primary-600" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Map Section -->
    <div class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900 sm:text-4xl">Find Us</h2>
                <p class="mt-4 text-xl text-gray-600">Visit our campus and experience SNDT Women's University firsthand</p>
            </div>
            
            <div class="bg-gray-200 rounded-xl h-96 flex items-center justify-center">
                <div class="text-center text-gray-500">
                    <svg class="h-24 w-24 mx-auto mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    <p class="text-lg">Interactive Map Location</p>
                    <p class="mt-2">SNDT Women's University Campus<br>Mumbai, Maharashtra</p>
                </div>
            </div>
            
            <div class="mt-8 text-center">
                <p class="text-gray-600">Need directions? <a href="#" class="text-primary-600 hover:text-primary-800 font-medium">Get Directions</a></p>
            </div>
        </div>
    </div>

    <!-- FAQ Section -->
    <div class="py-16 bg-gray-50">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900 sm:text-4xl">Frequently Asked Questions</h2>
                <p class="mt-4 text-xl text-gray-600">Find answers to common questions</p>
            </div>
            
            <div class="space-y-6">
                <div class="bg-white rounded-lg shadow-sm">
                    <button class="w-full px-6 py-4 text-left flex justify-between items-center focus:outline-none">
                        <span class="text-lg font-medium text-gray-900">How do I apply for admission?</span>
                        <svg class="h-5 w-5 text-gray-500 transform transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div class="px-6 pb-4 text-gray-600">
                        <p>Applications can be submitted online through our admissions portal. Visit our admissions page for detailed information about the application process, requirements, and deadlines.</p>
                    </div>
                </div>
                
                <div class="bg-white rounded-lg shadow-sm">
                    <button class="w-full px-6 py-4 text-left flex justify-between items-center focus:outline-none">
                        <span class="text-lg font-medium text-gray-900">What are the tuition fees?</span>
                        <svg class="h-5 w-5 text-gray-500 transform transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div class="px-6 pb-4 text-gray-600">
                        <p>Tuition fees vary by program. Please check the specific course page for detailed fee structure. We also offer various scholarship opportunities for eligible students.</p>
                    </div>
                </div>
                
                <div class="bg-white rounded-lg shadow-sm">
                    <button class="w-full px-6 py-4 text-left flex justify-between items-center focus:outline-none">
                        <span class="text-lg font-medium text-gray-900">Do you offer campus housing?</span>
                        <svg class="h-5 w-5 text-gray-500 transform transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div class="px-6 pb-4 text-gray-600">
                        <p>Yes, we provide safe and comfortable accommodation options for students. Our campus hostels offer both single and shared accommodation with all necessary amenities.</p>
                    </div>
                </div>
            </div>
            
            <div class="mt-12 text-center">
                <p class="text-gray-600">Can't find what you're looking for?</p>
                <a href="mailto:info@sndt.edu.in" class="mt-2 inline-block bg-primary-600 text-white px-6 py-3 rounded-lg hover:bg-primary-700 font-medium">
                    Contact Us Directly
                </a>
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
        document.getElementById('mobile-menu-button').addEventListener('click', function() {
            const menu = document.getElementById('mobile-menu');
            menu.classList.toggle('hidden');
        });
        
        // FAQ accordion functionality
        document.querySelectorAll('.bg-white button').forEach(button => {
            button.addEventListener('click', function() {
                const content = this.nextElementSibling;
                const icon = this.querySelector('svg');
                
                if (content.classList.contains('hidden')) {
                    content.classList.remove('hidden');
                    icon.classList.add('rotate-180');
                } else {
                    content.classList.add('hidden');
                    icon.classList.remove('rotate-180');
                }
            });
        });
    </script>
</body>
</html>
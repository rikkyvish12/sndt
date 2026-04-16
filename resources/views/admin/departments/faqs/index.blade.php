@extends('admin.layout')

@section('content')
<div class="container mx-auto px-6 py-8">
    <!-- Header -->
    <div class="flex justify-between items-center mb-8">
        <div>
            <h1 class="text-3xl font-bold text-gray-800">Manage FAQs</h1>
            <p class="text-gray-600 mt-2">{{ $department->name }}</p>
        </div>
        <div class="flex gap-3">
            <a href="{{ route('admin.departments.contents.index', $department->id) }}" 
               class="px-4 py-2 bg-gray-600 text-white rounded-lg hover:bg-gray-700 transition">
                📄 Manage Content
            </a>
            <a href="{{ route('admin.departments.faqs.create', $department->id) }}" 
               class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
                ➕ Add New FAQ
            </a>
            <a href="{{ route('admin.departments.index') }}" 
               class="px-4 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600 transition">
                ← Back to Departments
            </a>
        </div>
    </div>

    <!-- Success Message -->
    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
            {{ session('success') }}
        </div>
    @endif

    <!-- FAQs List -->
    @if($faqs->isEmpty())
        <div class="bg-white rounded-lg shadow-md p-12 text-center">
            <div class="text-6xl mb-4">❓</div>
            <h3 class="text-xl font-semibold text-gray-700 mb-2">No FAQs Yet</h3>
            <p class="text-gray-500 mb-6">Start adding FAQs to help users learn about this department.</p>
            <a href="{{ route('admin.departments.faqs.create', $department->id) }}" 
               class="px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
                Add Your First FAQ
            </a>
        </div>
    @else
        <!-- Group FAQs by Category -->
        @php
            $groupedFaqs = $faqs->groupBy('category');
            $categoryLabels = [
                'general' => 'ℹ️ General Information',
                'course' => '📚 Course Details',
                'eligibility' => '✅ Eligibility',
                'admission' => '📝 Admission Process',
                'curriculum' => '📖 Curriculum & Learning',
                'facilities' => '🏛️ Facilities',
                'fees' => '💰 Fees & Scholarships',
                'career' => '💼 Career Options',
                'location' => '📍 Location & Hostel',
                'contact' => '📞 Contact Details',
                'social' => '🌐 Social Media',
            ];
        @endphp

        @foreach($groupedFaqs as $category => $categoryFaqs)
            <div class="mb-8">
                <h2 class="text-2xl font-bold text-gray-800 mb-4">
                    {{ $categoryLabels[$category] ?? ucfirst($category) }}
                    <span class="text-sm font-normal text-gray-500">({{ $categoryFaqs->count() }} FAQs)</span>
                </h2>
                
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    @foreach($categoryFaqs as $faq)
                        <div class="border-b border-gray-200 last:border-b-0 hover:bg-gray-50 transition">
                            <div class="p-6">
                                <div class="flex justify-between items-start">
                                    <div class="flex-1">
                                        <h3 class="text-lg font-semibold text-gray-800 mb-2">
                                            @if(!$faq->is_active)
                                                <span class="inline-block px-2 py-1 text-xs bg-gray-300 text-gray-700 rounded mr-2">Inactive</span>
                                            @endif
                                            {{ $faq->question }}
                                        </h3>
                                        <p class="text-gray-600 text-sm line-clamp-2">{{ Str::limit($faq->answer, 150) }}</p>
                                    </div>
                                    <div class="flex gap-2 ml-4">
                                        <a href="{{ route('admin.departments.faqs.show', [$department->id, $faq->id]) }}" 
                                           class="px-3 py-1 bg-blue-100 text-blue-700 rounded hover:bg-blue-200 transition text-sm">
                                            View
                                        </a>
                                        <a href="{{ route('admin.departments.faqs.edit', [$department->id, $faq->id]) }}" 
                                           class="px-3 py-1 bg-yellow-100 text-yellow-700 rounded hover:bg-yellow-200 transition text-sm">
                                            Edit
                                        </a>
                                        <form action="{{ route('admin.departments.faqs.destroy', [$department->id, $faq->id]) }}" 
                                              method="POST" 
                                              onsubmit="return confirm('Are you sure you want to delete this FAQ?');"
                                              class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="px-3 py-1 bg-red-100 text-red-700 rounded hover:bg-red-200 transition text-sm">
                                                Delete
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach
    @endif
</div>
@endsection

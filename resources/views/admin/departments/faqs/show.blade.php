@extends('admin.layout')

@section('content')
<div class="container mx-auto px-6 py-8">
    <!-- Header -->
    <div class="flex justify-between items-center mb-8">
        <div>
            <h1 class="text-3xl font-bold text-gray-800">FAQ Details</h1>
            <p class="text-gray-600 mt-2">{{ $department->name }}</p>
        </div>
        <div class="flex gap-3">
            <a href="{{ route('admin.departments.faqs.edit', [$department->id, $faq->id]) }}" 
               class="px-4 py-2 bg-yellow-600 text-white rounded-lg hover:bg-yellow-700 transition">
                ✏️ Edit
            </a>
            <a href="{{ route('admin.departments.faqs.index', $department->id) }}" 
               class="px-4 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600 transition">
                ← Back to FAQs
            </a>
        </div>
    </div>

    <!-- FAQ Details -->
    <div class="bg-white rounded-lg shadow-md p-8">
        <div class="mb-6">
            <h2 class="text-sm font-semibold text-gray-500 uppercase mb-2">Question</h2>
            <p class="text-xl font-semibold text-gray-800">{{ $faq->question }}</p>
        </div>

        <div class="mb-6">
            <h2 class="text-sm font-semibold text-gray-500 uppercase mb-2">Answer</h2>
            <div class="text-gray-700 whitespace-pre-line bg-gray-50 p-4 rounded-lg">
                {{ $faq->answer }}
            </div>
        </div>

        <div class="grid grid-cols-2 gap-6 mb-6">
            <div>
                <h2 class="text-sm font-semibold text-gray-500 uppercase mb-2">Category</h2>
                <p class="text-gray-700">{{ ucfirst($faq->category) }}</p>
            </div>
            <div>
                <h2 class="text-sm font-semibold text-gray-500 uppercase mb-2">Order</h2>
                <p class="text-gray-700">{{ $faq->order }}</p>
            </div>
        </div>

        <div class="mb-6">
            <h2 class="text-sm font-semibold text-gray-500 uppercase mb-2">Status</h2>
            <p>
                @if($faq->is_active)
                    <span class="px-3 py-1 bg-green-100 text-green-700 rounded-full text-sm font-semibold">✅ Active</span>
                @else
                    <span class="px-3 py-1 bg-gray-100 text-gray-700 rounded-full text-sm font-semibold">❌ Inactive</span>
                @endif
            </p>
        </div>

        <div class="flex gap-3 pt-6 border-t">
            <form action="{{ route('admin.departments.faqs.destroy', [$department->id, $faq->id]) }}" 
                  method="POST" 
                  onsubmit="return confirm('Are you sure you want to delete this FAQ?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="px-6 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition">
                    🗑️ Delete FAQ
                </button>
            </form>
        </div>
    </div>
</div>
@endsection

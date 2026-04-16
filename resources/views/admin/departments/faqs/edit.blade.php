@extends('admin.layout')

@section('content')
<div class="container mx-auto px-6 py-8">
    <!-- Header -->
    <div class="flex justify-between items-center mb-8">
        <div>
            <h1 class="text-3xl font-bold text-gray-800">Edit FAQ</h1>
            <p class="text-gray-600 mt-2">{{ $department->name }}</p>
        </div>
        <a href="{{ route('admin.departments.faqs.index', $department->id) }}" 
           class="px-4 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600 transition">
            ← Back to FAQs
        </a>
    </div>

    <!-- Form -->
    <div class="bg-white rounded-lg shadow-md p-8">
        <form action="{{ route('admin.departments.faqs.update', [$department->id, $faq->id]) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Question -->
            <div class="mb-6">
                <label for="question" class="block text-sm font-semibold text-gray-700 mb-2">
                    Question <span class="text-red-500">*</span>
                </label>
                <input type="text" 
                       name="question" 
                       id="question" 
                       value="{{ old('question', $faq->question) }}"
                       placeholder="e.g., What is the duration of the course?"
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('question') border-red-500 @enderror"
                       required>
                @error('question')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Answer -->
            <div class="mb-6">
                <label for="answer" class="block text-sm font-semibold text-gray-700 mb-2">
                    Answer <span class="text-red-500">*</span>
                </label>
                <textarea name="answer" 
                          id="answer" 
                          rows="8"
                          placeholder="Enter the answer"
                          class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('answer') border-red-500 @enderror"
                          required>{{ old('answer', $faq->answer) }}</textarea>
                @error('answer')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Category -->
            <div class="mb-6">
                <label for="category" class="block text-sm font-semibold text-gray-700 mb-2">
                    Category <span class="text-red-500">*</span>
                </label>
                <select name="category" 
                        id="category" 
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('category') border-red-500 @enderror"
                        required>
                    <option value="">Select a category</option>
                    @foreach($categories as $key => $label)
                        <option value="{{ $key }}" {{ old('category', $faq->category) == $key ? 'selected' : '' }}>
                            {{ $label }}
                        </option>
                    @endforeach
                </select>
                @error('category')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Order -->
            <div class="mb-6">
                <label for="order" class="block text-sm font-semibold text-gray-700 mb-2">
                    Order
                </label>
                <input type="number" 
                       name="order" 
                       id="order" 
                       value="{{ old('order', $faq->order) }}"
                       min="0"
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
            </div>

            <!-- Active Status -->
            <div class="mb-6">
                <label class="flex items-center">
                    <input type="hidden" name="is_active" value="0">
                    <input type="checkbox" 
                           name="is_active" 
                           value="1" 
                           {{ old('is_active', $faq->is_active) ? 'checked' : '' }}
                           class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                    <span class="ml-2 text-sm text-gray-700">Active</span>
                </label>
            </div>

            <!-- Submit Button -->
            <div class="flex gap-3">
                <button type="submit" 
                        class="px-6 py-2 bg-yellow-600 text-white rounded-lg hover:bg-yellow-700 transition font-semibold">
                    💾 Update FAQ
                </button>
                <a href="{{ route('admin.departments.faqs.index', $department->id) }}" 
                   class="px-6 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600 transition">
                    Cancel
                </a>
            </div>
        </form>
    </div>
</div>
@endsection

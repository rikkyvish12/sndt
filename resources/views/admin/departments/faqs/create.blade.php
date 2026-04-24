@extends('admin.layout')

@section('content')
<style>
    .form-section {
        background: white;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        padding: 30px;
        margin-bottom: 20px;
    }
    .form-label {
        font-weight: 600;
        color: #2c3e50;
        margin-bottom: 8px;
    }
    .form-control:focus, .form-select:focus {
        border-color: #1a237e;
        box-shadow: 0 0 0 0.2rem rgba(26, 35, 126, 0.25);
    }
    .help-text {
        font-size: 0.85rem;
        color: #6c757d;
        margin-top: 5px;
    }
    .form-icon {
        color: #1a237e;
        margin-right: 5px;
    }
</style>

<div class="container-fluid px-4 py-4">
    <!-- Page Header -->
    <div class="page-header d-flex justify-content-between align-items-center">
        <div>
            <h2 class="mb-1"><i class="material-icons">add_circle</i> Add New FAQ</h2>
            <p class="text-muted mb-0"><i class="material-icons" style="font-size: 16px;">business</i> {{ $department->name }}</p>
        </div>
        <a href="{{ route('admin.departments.faqs.index', $department->id) }}" 
           class="btn btn-outline-dark">
            <i class="material-icons">arrow_back</i> Back to FAQs
        </a>
    </div>

    <!-- Form -->
    <div class="form-section">
        <form action="{{ route('admin.departments.faqs.store', $department->id) }}" method="POST">
            @csrf

            <!-- Question -->
            <div class="mb-4">
                <label for="question" class="form-label">
                    <i class="material-icons form-icon">help</i> Question <span class="text-danger">*</span>
                </label>
                <input type="text" 
                       name="question" 
                       id="question" 
                       value="{{ old('question') }}"
                       placeholder="e.g., What is the duration of the course?"
                       class="form-control @error('question') is-invalid @enderror"
                       required>
                @error('question')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <div class="help-text">Enter a clear, concise question that users commonly ask</div>
            </div>

            <!-- Answer -->
            <div class="mb-4">
                <label for="answer" class="form-label">
                    <i class="material-icons form-icon">format_list_bulleted</i> Answer <span class="text-danger">*</span>
                </label>
                <textarea name="answer" 
                          id="answer" 
                          rows="10"
                          placeholder="Enter the detailed answer..."
                          class="form-control @error('answer') is-invalid @enderror"
                          required>{{ old('answer') }}</textarea>
                @error('answer')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <div class="help-text">
                    <i class="material-icons" style="font-size: 14px;">lightbulb</i> 
                    Tip: Use • for bullet points, press Enter for new lines. Be comprehensive but clear.
                </div>
            </div>

            <div class="row">
                <!-- Category -->
                <div class="col-md-6 mb-4">
                    <label for="category" class="form-label">
                        <i class="material-icons form-icon">category</i> Category <span class="text-danger">*</span>
                    </label>
                    <select name="category" 
                            id="category" 
                            class="form-select @error('category') is-invalid @enderror"
                            required>
                        <option value="">Select a category</option>
                        @foreach($categories as $key => $label)
                            <option value="{{ $key }}" {{ old('category') == $key ? 'selected' : '' }}>
                                {{ $label }}
                            </option>
                        @endforeach
                    </select>
                    @error('category')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <div class="help-text">Choose the most relevant category for this FAQ</div>
                </div>

                <!-- Order -->
                <div class="col-md-6 mb-4">
                    <label for="order" class="form-label">
                        <i class="material-icons form-icon">swap_vert</i> Order
                    </label>
                    <input type="number" 
                           name="order" 
                           id="order" 
                           value="{{ old('order', 0) }}"
                           min="0"
                           class="form-control">
                    <div class="help-text">Lower numbers appear first (default: 0)</div>
                </div>
            </div>

            <!-- Active Status -->
            <div class="mb-4">
                <div class="form-check form-switch">
                    <input type="hidden" name="is_active" value="0">
                    <input type="checkbox" 
                           name="is_active" 
                           value="1" 
                           id="is_active"
                           {{ old('is_active', true) ? 'checked' : '' }}
                           class="form-check-input">
                    <label class="form-check-label" for="is_active">
                        <i class="material-icons" style="font-size: 18px; vertical-align: middle;">check_circle</i>
                        <strong>Active</strong> - This FAQ will be displayed on the website
                    </label>
                </div>
            </div>

            <!-- Submit Button -->
            <div class="d-flex gap-2 pt-3 border-top">
                <button type="submit" 
                        class="btn btn-primary btn-lg">
                    <i class="material-icons">save</i> Create FAQ
                </button>
                <a href="{{ route('admin.departments.faqs.index', $department->id) }}" 
                   class="btn btn-secondary btn-lg">
                    <i class="material-icons">cancel</i> Cancel
                </a>
            </div>
        </form>
    </div>
</div>
@endsection

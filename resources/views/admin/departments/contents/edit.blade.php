@extends('admin.layout')

@section('title', 'Edit Content Section')

@section('content')
<div class="page-header">
    <h1><i class="material-icons">edit</i> Edit Content Section</h1>
    <p class="text-muted">{{ $department->name }} - {{ $department->code }}</p>
</div>

<form action="{{ route('admin.departments.contents.update', [$department->id, $content->id]) }}" method="POST">
    @csrf
    @method('PUT')
    
    <div class="card">
        <div class="card-body">
            <!-- Section Selection -->
            <div class="mb-4">
                <label for="section" class="form-label"><i class="material-icons">label</i> Section *</label>
                <select name="section" id="section" required
                        class="form-select @error('section') is-invalid @enderror">
                    @foreach($sections as $key => $label)
                        <option value="{{ $key }}" {{ $content->section === $key ? 'selected' : '' }}>
                            {{ $label }}
                        </option>
                    @endforeach
                </select>
                @error('section')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Content -->
            <div class="mb-4">
                <label for="content" class="form-label"><i class="material-icons">subject</i> Content</label>
                <small class="text-muted">You can use HTML tags for formatting (e.g., &lt;p&gt;, &lt;strong&gt;, &lt;ul&gt;, etc.)</small>
                <textarea name="content" id="content" rows="10"
                          class="form-control @error('content') is-invalid @enderror">{{ old('content', $content->content ?? '') }}</textarea>
                @error('content')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Order -->
            <div class="mb-4">
                <label for="order" class="form-label"><i class="material-icons">sort</i> Display Order</label>
                <input type="number" name="order" id="order" value="{{ old('order', $content->order ?? 0) }}" min="0"
                       class="form-control @error('order') is-invalid @enderror">
                <small class="text-muted">Lower numbers appear first</small>
            </div>

            <!-- Status -->
            <div class="mb-4">
                <div class="form-check form-switch">
                    <input type="checkbox" name="is_active" id="is_active" value="1" {{ old('is_active', $content->is_active) ? 'checked' : '' }}
                           class="form-check-input">
                    <label for="is_active" class="form-check-label">Active</label>
                </div>
                <small class="text-muted">Inactive sections won't be displayed on the public page</small>
            </div>
        </div>
        
        <div class="card-footer text-end">
            <a href="{{ route('admin.departments.contents.index', $department->id) }}"
               class="btn btn-secondary me-2">
                <i class="material-icons">cancel</i> Cancel
            </a>
            <button type="submit" class="btn btn-primary">
                <i class="material-icons">save</i> Update Section
            </button>
        </div>
    </div>
</form>
@endsection

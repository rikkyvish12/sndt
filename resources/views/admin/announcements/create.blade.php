@extends('admin.layout')

@section('title', 'Add Announcement')

@section('content')
<div class="page-header">
    <h2><i class="material-icons">add</i> Add New Announcement</h2>
    <p class="text-muted mb-0">Create a new announcement to display in the header marquee</p>
</div>

<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.announcements.store') }}" method="POST">
            @csrf
            
            <div class="mb-3">
                <label for="title" class="form-label">Title <span class="text-danger">*</span></label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" 
                       id="title" name="title" value="{{ old('title') }}" required>
                @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="content" class="form-label">Content <span class="text-danger">*</span></label>
                <textarea class="form-control @error('content') is-invalid @enderror" 
                          id="content" name="content" rows="4" required>{{ old('content') }}</textarea>
                @error('content')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <small class="text-muted">This text will be displayed in the marquee</small>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="link" class="form-label">Link URL (Optional)</label>
                    <input type="url" class="form-control @error('link') is-invalid @enderror" 
                           id="link" name="link" value="{{ old('link') }}" 
                           placeholder="https://example.com">
                    @error('link')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <small class="text-muted">Optional: Add a URL for users to click</small>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="link_text" class="form-label">Link Text (Optional)</label>
                    <input type="text" class="form-control @error('link_text') is-invalid @enderror" 
                           id="link_text" name="link_text" value="{{ old('link_text') }}" 
                           placeholder="Read More" maxlength="100">
                    @error('link_text')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="order" class="form-label">Display Order</label>
                    <input type="number" class="form-control @error('order') is-invalid @enderror" 
                           id="order" name="order" value="{{ old('order', 0) }}" min="0">
                    @error('order')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <small class="text-muted">Lower numbers appear first</small>
                </div>

                <div class="col-md-6 mb-3">
                    <div class="form-check mt-4">
                        <input type="checkbox" class="form-check-input" id="is_active" 
                               name="is_active" value="1" {{ old('is_active', true) ? 'checked' : '' }}>
                        <label class="form-check-label" for="is_active">Active</label>
                    </div>
                    <small class="text-muted d-block">Inactive announcements won't be displayed</small>
                </div>
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">
                    <i class="material-icons">save</i> Save Announcement
                </button>
                <a href="{{ route('admin.announcements.index') }}" class="btn btn-secondary">
                    <i class="material-icons">arrow_back</i> Cancel
                </a>
            </div>
        </form>
    </div>
</div>
@endsection

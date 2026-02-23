@extends('admin.layout')

@section('title', 'Edit Setting')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Edit Setting</h1>
        <a href="{{ route('admin.settings.index') }}" class="btn btn-secondary">Back to Settings</a>
    </div>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.settings.update', $setting->id) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="mb-3">
                    <label for="key" class="form-label">Setting Key *</label>
                    <input type="text" class="form-control" id="key" name="key" value="{{ old('key', $setting->key) }}" required maxlength="100">
                    <div class="form-text">Unique identifier for this setting (e.g., site_name, contact_email)</div>
                </div>

                <div class="mb-3">
                    <label for="value" class="form-label">Setting Value *</label>
                    <textarea class="form-control" id="value" name="value" rows="4" required>{{ old('value', $setting->value) }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" id="description" name="description" rows="2">{{ old('description', $setting->description) }}</textarea>
                    <div class="form-text">Optional description of what this setting does</div>
                </div>

                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary">Update Setting</button>
                    <a href="{{ route('admin.settings.index') }}" class="btn btn-secondary ms-2">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
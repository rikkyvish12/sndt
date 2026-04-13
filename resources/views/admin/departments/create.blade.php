@extends('admin.layout')

@section('title', 'Create Department')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Create Department</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="alert alert-info mb-0">
                <i class="fas fa-info-circle"></i> <small>After creating the department, you'll be able to manage its contents.</small>
            </div>
        </div>
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
            <form action="{{ route('admin.departments.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="name" class="form-label">Department Name *</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="code" class="form-label">Department Code *</label>
                            <input type="text" class="form-control" id="code" name="code" value="{{ old('code') }}" required>
                        </div>
                    </div>
                </div>
                
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" id="description" name="description" rows="3">{{ old('description') }}</textarea>
                </div>
                
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="head_of_department_id" class="form-label">Head of Department</label>
                            <select class="form-control" id="head_of_department_id" name="head_of_department_id">
                                <option value="">Select Faculty Member</option>
                                @foreach($facultyMembers as $faculty)
                                    <option value="{{ $faculty->id }}" {{ old('head_of_department_id') == $faculty->id ? 'selected' : '' }}>
                                        {{ $faculty->first_name }} {{ $faculty->last_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone') }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="location" class="form-label">Location</label>
                            <input type="text" class="form-control" id="location" name="location" value="{{ old('location') }}">
                        </div>
                    </div>
                </div>
                
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="is_active" name="is_active" value="1" {{ old('is_active', true) ? 'checked' : '' }}>
                    <label class="form-check-label" for="is_active">Active</label>
                </div>
                
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Create Department
                </button>
                <a href="{{ route('admin.departments.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
@endsection
@extends('admin.layout')

@section('title', 'Add New Course')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Add New Course</h1>
        <a href="{{ route('admin.courses.index') }}" class="btn btn-secondary">Back to Courses</a>
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
            <form action="{{ route('admin.courses.store') }}" method="POST">
                @csrf
                
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="code" class="form-label">Course Code *</label>
                            <input type="text" class="form-control" id="code" name="code" value="{{ old('code') }}" required maxlength="20">
                            <div class="form-text">Unique course code (e.g., CS101, EE201)</div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="name" class="form-label">Course Name *</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" id="description" name="description" rows="4">{{ old('description') }}</textarea>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="department_id" class="form-label">Department *</label>
                            <select class="form-control" id="department_id" name="department_id" required>
                                <option value="">Select Department</option>
                                @foreach($departments as $department)
                                    <option value="{{ $department->id }}" {{ old('department_id') == $department->id ? 'selected' : '' }}>
                                        {{ $department->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="course_type" class="form-label">Course Type</label>
                            <select class="form-control" id="course_type" name="course_type">
                                <option value="">Select Type</option>
                                <option value="undergraduate" {{ old('course_type') == 'undergraduate' ? 'selected' : '' }}>Undergraduate</option>
                                <option value="postgraduate" {{ old('course_type') == 'postgraduate' ? 'selected' : '' }}>Postgraduate</option>
                                <option value="diploma" {{ old('course_type') == 'diploma' ? 'selected' : '' }}>Diploma</option>
                                <option value="certificate" {{ old('course_type') == 'certificate' ? 'selected' : '' }}>Certificate</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label for="duration" class="form-label">Duration (years) *</label>
                            <input type="number" class="form-control" id="duration" name="duration" value="{{ old('duration', 4) }}" min="1" max="10" required>
                            <div class="form-text">Program duration in years</div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label for="fees" class="form-label">Fees (₹)</label>
                            <input type="number" class="form-control" id="fees" name="fees" value="{{ old('fees') }}" min="0" step="0.01">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label for="total_seats" class="form-label">Total Seats</label>
                            <input type="number" class="form-control" id="total_seats" name="total_seats" value="{{ old('total_seats', 60) }}" min="0">
                            <div class="form-text">Maximum seats available</div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label for="available_seats" class="form-label">Available Seats</label>
                            <input type="number" class="form-control" id="available_seats" name="available_seats" value="{{ old('available_seats', 60) }}" min="0">
                            <div class="form-text">Currently available seats</div>
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="is_active" class="form-label">Status</label>
                    <select class="form-control" id="is_active" name="is_active">
                        <option value="1" {{ old('is_active', 1) == 1 ? 'selected' : '' }}>Active</option>
                        <option value="0" {{ old('is_active', 1) == 0 ? 'selected' : '' }}>Inactive</option>
                    </select>
                </div>

                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary">Create Course</button>
                    <a href="{{ route('admin.courses.index') }}" class="btn btn-secondary ms-2">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
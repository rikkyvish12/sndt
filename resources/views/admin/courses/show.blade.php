@extends('admin.layout')

@section('title', 'View Course')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>View Course</h1>
        <div>
            <a href="{{ route('admin.courses.edit', $course->id) }}" class="btn btn-warning">Edit</a>
            <a href="{{ route('admin.courses.index') }}" class="btn btn-secondary">Back to Courses</a>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5>Course Details</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-3"><strong>Course Code:</strong></div>
                        <div class="col-sm-9">{{ $course->code }}</div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3"><strong>Course Name:</strong></div>
                        <div class="col-sm-9">{{ $course->name }}</div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3"><strong>Department:</strong></div>
                        <div class="col-sm-9">{{ $course->department->name ?? 'N/A' }}</div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3"><strong>Credits:</strong></div>
                        <div class="col-sm-9">{{ $course->credits }}</div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3"><strong>Duration:</strong></div>
                        <div class="col-sm-9">{{ $course->duration }} months</div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3"><strong>Status:</strong></div>
                        <div class="col-sm-9">
                            <span class="badge bg-{{ $course->is_active ? 'success' : 'secondary' }}">
                                {{ $course->is_active ? 'Active' : 'Inactive' }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card mt-4">
                <div class="card-header">
                    <h5>Description</h5>
                </div>
                <div class="card-body">
                    {{ $course->description ?? 'No description provided.' }}
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h5>System Information</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6"><strong>Created:</strong></div>
                        <div class="col-sm-6">{{ $course->created_at->format('M d, Y') }}</div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-6"><strong>Updated:</strong></div>
                        <div class="col-sm-6">{{ $course->updated_at->format('M d, Y') }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
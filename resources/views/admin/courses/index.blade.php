@extends('admin.layout')

@section('title', 'Course Management')

@section('content')
<div class="page-header">
    <h1><i class="material-icons">menu_book</i> Course Management</h1>
    <p class="text-muted">Manage courses and curriculum information</p>
</div>

<div class="card">
    <div class="card-header bg-light d-flex justify-content-between align-items-center">
        <h5 class="mb-0"><i class="material-icons">list_alt</i> Course List</h5>
        <a href="{{ route('admin.courses.create') }}" class="btn btn-primary">
            <i class="material-icons">add</i> Add New Course
        </a>
    </div>
    <div class="card-body">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="material-icons">check_circle</i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="table-responsive">
            <table class="table table-hover">
                <thead class="table-light">
                    <tr>
                        <th><i class="material-icons">badge</i> ID</th>
                        <th><i class="material-icons">book</i> Code</th>
                        <th><i class="material-icons">title</i> Name</th>
                        <th><i class="material-icons">business</i> Department</th>
                        <th><i class="material-icons">grading</i> Credits</th>
                        <th><i class="material-icons">schedule</i> Duration</th>
                        <th><i class="material-icons">toggle_on</i> Status</th>
                        <th><i class="material-icons">settings</i> Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($courses as $course)
                        <tr>
                            <td>{{ $course->id }}</td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <i class="material-icons text-muted me-2">book</i>
                                    {{ $course->code }}
                                </div>
                            </td>
                            <td>
                                <i class="material-icons text-muted me-2">title</i>
                                {{ $course->name }}
                            </td>
                            <td>
                                <i class="material-icons text-muted me-2">business</i>
                                {{ $course->department->name ?? 'N/A' }}
                            </td>
                            <td>
                                <i class="material-icons text-muted me-2">grading</i>
                                {{ $course->credits }}
                            </td>
                            <td>
                                <i class="material-icons text-muted me-2">schedule</i>
                                {{ $course->duration }} months
                            </td>
                            <td>
                                <span class="badge bg-{{ $course->is_active ? 'success' : 'secondary' }}">
                                    <i class="material-icons">toggle_{{ $course->is_active ? 'on' : 'off' }}</i>
                                    {{ $course->is_active ? 'Active' : 'Inactive' }}
                                </span>
                            </td>
                            <td>
                                <div class="btn-group" role="group">
                                    <a href="{{ route('admin.courses.show', $course->id) }}" 
                                       class="btn btn-sm btn-info" 
                                       title="View">
                                        <i class="material-icons">visibility</i>
                                    </a>
                                    <a href="{{ route('admin.courses.edit', $course->id) }}" 
                                       class="btn btn-sm btn-warning" 
                                       title="Edit">
                                        <i class="material-icons">edit</i>
                                    </a>
                                    <form action="{{ route('admin.courses.destroy', $course->id) }}" 
                                          method="POST" 
                                          class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                                class="btn btn-sm btn-danger" 
                                                title="Delete"
                                                onclick="return confirm('Are you sure you want to delete this course?')">
                                            <i class="material-icons">delete</i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center py-4">
                                <i class="material-icons text-muted" style="font-size: 64px;">sentiment_dissatisfied</i>
                                <p class="mt-2 text-muted">No courses found.</p>
                                <a href="{{ route('admin.courses.create') }}" class="btn btn-primary">
                                    <i class="material-icons">add</i> Add Your First Course
                                </a>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        <div class="mt-3">
            {{ $courses->links() }}
        </div>
    </div>
</div>
@endsection
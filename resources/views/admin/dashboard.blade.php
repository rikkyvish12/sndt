@extends('admin.layout')

@section('title', 'Dashboard')

@section('content')
<div class="page-header">
    <h1><i class="material-icons">dashboard</i> Dashboard</h1>
    <p class="text-muted">Welcome to the College Management System Admin Panel</p>
</div>

<!-- Stats Cards -->
<div class="row mb-4">
    <div class="col-md-3 mb-3">
        <div class="card bg-primary text-white">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <i class="material-icons md-36">business</i>
                        <h5 class="card-title mb-0">Departments</h5>
                    </div>
                    <h2 class="mb-0">{{ $departmentsCount }}</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3 mb-3">
        <div class="card bg-success text-white">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <i class="material-icons md-36">people</i>
                        <h5 class="card-title mb-0">Faculty</h5>
                    </div>
                    <h2 class="mb-0">{{ $facultyCount }}</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3 mb-3">
        <div class="card bg-warning text-white">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <i class="material-icons md-36">menu_book</i>
                        <h5 class="card-title mb-0">Courses</h5>
                    </div>
                    <h2 class="mb-0">{{ $coursesCount }}</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3 mb-3">
        <div class="card bg-info text-white">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <i class="material-icons md-36">settings</i>
                        <h5 class="card-title mb-0">Settings</h5>
                    </div>
                    <h2 class="mb-0">{{ $settingsCount }}</h2>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Recent Data -->
<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header bg-light">
                <h5 class="mb-0"><i class="material-icons">history</i> Recent Departments</h5>
            </div>
            <div class="card-body">
                @if($recentDepartments->count() > 0)
                    <div class="list-group list-group-flush">
                        @foreach($recentDepartments as $department)
                            <div class="list-group-item d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="mb-0">{{ $department->name }}</h6>
                                    <small class="text-muted">{{ $department->code }}</small>
                                </div>
                                <span class="badge bg-primary rounded-pill">{{ $department->courses_count ?? $department->courses->count() }} courses</span>
                            </div>
                        @endforeach
                    </div>
                @else
                    <p class="text-muted mb-0">No departments found.</p>
                @endif
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-header bg-light">
                <h5 class="mb-0"><i class="material-icons">history</i> Recent Faculty</h5>
            </div>
            <div class="card-body">
                @if($recentFaculty->count() > 0)
                    <div class="list-group list-group-flush">
                        @foreach($recentFaculty as $faculty)
                            <div class="list-group-item d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="mb-0">{{ $faculty->first_name }} {{ $faculty->last_name }}</h6>
                                    <small class="text-muted">{{ $faculty->email }}</small>
                                </div>
                                <span class="badge bg-success rounded-pill">{{ $faculty->department->name ?? 'N/A' }}</span>
                            </div>
                        @endforeach
                    </div>
                @else
                    <p class="text-muted mb-0">No faculty members found.</p>
                @endif
            </div>
        </div>
    </div>
</div>

<!-- Quick Actions -->
<div class="row mt-4">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header bg-light">
                <h5 class="mb-0"><i class="material-icons">bolt</i> Quick Actions</h5>
            </div>
            <div class="card-body">
                <div class="row text-center">
                    <div class="col-md-3 mb-3">
                        <a href="{{ route('admin.departments.create') }}" class="text-decoration-none">
                            <div class="card h-100 hover-card">
                                <div class="card-body">
                                    <i class="material-icons text-primary" style="font-size: 48px;">add_business</i>
                                    <h6 class="mt-2">Add Department</h6>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-3 mb-3">
                        <a href="{{ route('admin.faculty.create') }}" class="text-decoration-none">
                            <div class="card h-100 hover-card">
                                <div class="card-body">
                                    <i class="material-icons text-success" style="font-size: 48px;">person_add</i>
                                    <h6 class="mt-2">Add Faculty</h6>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-3 mb-3">
                        <a href="{{ route('admin.courses.create') }}" class="text-decoration-none">
                            <div class="card h-100 hover-card">
                                <div class="card-body">
                                    <i class="material-icons text-warning" style="font-size: 48px;">library_add</i>
                                    <h6 class="mt-2">Add Course</h6>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-3 mb-3">
                        <a href="{{ route('admin.settings.create') }}" class="text-decoration-none">
                            <div class="card h-100 hover-card">
                                <div class="card-body">
                                    <i class="material-icons text-info" style="font-size: 48px;">add_circle</i>
                                    <h6 class="mt-2">Add Setting</h6>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<style>
    .hover-card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        cursor: pointer;
    }
    .hover-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 15px rgba(0,0,0,0.1) !important;
    }
    .material-icons.md-36 {
        font-size: 36px;
        margin-bottom: 10px;
    }
</style>
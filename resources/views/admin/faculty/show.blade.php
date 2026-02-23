@extends('admin.layout')

@section('title', 'View Faculty')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>View Faculty</h1>
        <div>
            <a href="{{ route('admin.faculty.edit', $faculty->id) }}" class="btn btn-warning">Edit</a>
            <a href="{{ route('admin.faculty.index') }}" class="btn btn-secondary">Back to Faculty</a>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5>Faculty Details</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-3"><strong>Name:</strong></div>
                        <div class="col-sm-9">{{ $faculty->first_name }} {{ $faculty->last_name }}</div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3"><strong>Email:</strong></div>
                        <div class="col-sm-9">{{ $faculty->email }}</div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3"><strong>Phone:</strong></div>
                        <div class="col-sm-9">{{ $faculty->phone ?? 'N/A' }}</div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3"><strong>Employee ID:</strong></div>
                        <div class="col-sm-9">{{ $faculty->employee_id }}</div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3"><strong>Department:</strong></div>
                        <div class="col-sm-9">{{ $faculty->department->name ?? 'N/A' }}</div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3"><strong>Designation:</strong></div>
                        <div class="col-sm-9">{{ $faculty->designation ?? 'N/A' }}</div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3"><strong>Date of Birth:</strong></div>
                        <div class="col-sm-9">{{ $faculty->date_of_birth ? $faculty->date_of_birth->format('M d, Y') : 'N/A' }}</div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3"><strong>Joining Date:</strong></div>
                        <div class="col-sm-9">{{ $faculty->joining_date ? $faculty->joining_date->format('M d, Y') : 'N/A' }}</div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3"><strong>Status:</strong></div>
                        <div class="col-sm-9">
                            <span class="badge bg-{{ $faculty->is_active ? 'success' : 'secondary' }}">
                                {{ $faculty->is_active ? 'Active' : 'Inactive' }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card mt-4">
                <div class="card-header">
                    <h5>Qualification & Specialization</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-3"><strong>Qualification:</strong></div>
                        <div class="col-sm-9">{{ $faculty->qualification ?? 'N/A' }}</div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3"><strong>Specialization:</strong></div>
                        <div class="col-sm-9">{{ $faculty->specialization ?? 'N/A' }}</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h5>Address Information</h5>
                </div>
                <div class="card-body">
                    <address>
                        {{ $faculty->address ?? 'N/A' }}<br>
                        {{ $faculty->city ?? '' }}{{ $faculty->city && $faculty->state ? ', ' : '' }}{{ $faculty->state ?? '' }} {{ $faculty->postal_code ?? '' }}<br>
                        {{ $faculty->country ?? 'N/A' }}
                    </address>
                </div>
            </div>

            <div class="card mt-4">
                <div class="card-header">
                    <h5>System Information</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6"><strong>Created:</strong></div>
                        <div class="col-sm-6">{{ $faculty->created_at->format('M d, Y') }}</div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-6"><strong>Updated:</strong></div>
                        <div class="col-sm-6">{{ $faculty->updated_at->format('M d, Y') }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
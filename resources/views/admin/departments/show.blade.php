@extends('admin.layout')

@section('title', 'Department Details')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Department Details</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <a href="{{ route('admin.departments.edit', $department) }}" class="btn btn-warning me-2">
                <i class="fas fa-edit"></i> Edit
            </a>
            <a href="{{ route('admin.departments.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Back to Departments
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5>{{ $department->name }}</h5>
                </div>
                <div class="card-body">
                    <table class="table table-borderless">
                        <tr>
                            <th width="30%">Department Code:</th>
                            <td>{{ $department->code }}</td>
                        </tr>
                        <tr>
                            <th>Description:</th>
                            <td>{{ $department->description ?? 'N/A' }}</td>
                        </tr>
                        <tr>
                            <th>Head of Department:</th>
                            <td>{{ $department->head_name ?? 'N/A' }}</td>
                        </tr>
                        <tr>
                            <th>Email:</th>
                            <td>{{ $department->email ?? 'N/A' }}</td>
                        </tr>
                        <tr>
                            <th>Phone:</th>
                            <td>{{ $department->phone ?? 'N/A' }}</td>
                        </tr>
                        <tr>
                            <th>Location:</th>
                            <td>{{ $department->location ?? 'N/A' }}</td>
                        </tr>
                        <tr>
                            <th>Status:</th>
                            <td>
                                @if($department->is_active)
                                    <span class="badge bg-success">Active</span>
                                @else
                                    <span class="badge bg-secondary">Inactive</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Created At:</th>
                            <td>{{ $department->created_at->format('M d, Y H:i') }}</td>
                        </tr>
                        <tr>
                            <th>Updated At:</th>
                            <td>{{ $department->updated_at->format('M d, Y H:i') }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h5>Actions</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.departments.destroy', $department) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger w-100" onclick="return confirm('Are you sure you want to delete this department?')">
                            <i class="fas fa-trash"></i> Delete Department
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
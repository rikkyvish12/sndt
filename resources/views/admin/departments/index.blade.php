@extends('admin.layout')

@section('title', 'Departments')

@section('content')
<div class="page-header">
    <h1><i class="material-icons">business</i> Departments</h1>
    <p class="text-muted">Manage academic departments and their information</p>
</div>

<div class="card">
    <div class="card-header bg-light d-flex justify-content-between align-items-center">
        <h5 class="mb-0"><i class="material-icons">list</i> Department List</h5>
        <a href="{{ route('admin.departments.create') }}" class="btn btn-primary">
            <i class="material-icons">add</i> Add Department
        </a>
    </div>
    <div class="card-body">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="material-icons">check_circle</i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if($departments->count() > 0)
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="table-light">
                        <tr>
                            <th><i class="material-icons">title</i> Name</th>
                            <th><i class="material-icons">confirmation_number</i> Code</th>
                            <th><i class="material-icons">person</i> Head</th>
                            <th><i class="material-icons">email</i> Email</th>
                            <th><i class="material-icons">toggle_on</i> Status</th>
                            <th><i class="material-icons">settings</i> Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($departments as $department)
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <i class="material-icons text-muted me-2">title</i>
                                        {{ $department->name }}
                                    </div>
                                </td>
                                <td>
                                    <i class="material-icons text-muted me-2">confirmation_number</i>
                                    {{ $department->code }}
                                </td>
                                <td>
                                    <i class="material-icons text-muted me-2">person</i>
                                    {{ $department->head_name }}
                                </td>
                                <td>
                                    <i class="material-icons text-muted me-2">email</i>
                                    {{ $department->email }}
                                </td>
                                <td>
                                    <span class="badge bg-{{ $department->is_active ? 'success' : 'secondary' }}">
                                        <i class="material-icons">toggle_{{ $department->is_active ? 'on' : 'off' }}</i>
                                        {{ $department->is_active ? 'Active' : 'Inactive' }}
                                    </span>
                                </td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('admin.departments.show', $department) }}" 
                                           class="btn btn-sm btn-info" 
                                           title="View">
                                            <i class="material-icons">visibility</i>
                                        </a>
                                        <a href="{{ route('admin.departments.edit', $department) }}" 
                                           class="btn btn-sm btn-warning" 
                                           title="Edit">
                                            <i class="material-icons">edit</i>
                                        </a>
                                        <form action="{{ route('admin.departments.destroy', $department) }}" 
                                              method="POST" 
                                              class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" 
                                                    class="btn btn-sm btn-danger" 
                                                    title="Delete"
                                                    onclick="return confirm('Are you sure you want to delete this department?')">
                                                <i class="material-icons">delete</i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{ $departments->links() }}
        @else
            <div class="text-center py-4">
                <i class="material-icons text-muted" style="font-size: 64px;">business</i>
                <p class="mt-2 text-muted">No departments found.</p>
                <a href="{{ route('admin.departments.create') }}" class="btn btn-primary">
                    <i class="material-icons">add</i> Create Your First Department
                </a>
            </div>
        @endif
    </div>
</div>
@endsection
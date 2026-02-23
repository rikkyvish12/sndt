@extends('admin.layout')

@section('title', 'Faculty Management')

@section('content')
<div class="page-header">
    <h1><i class="material-icons">people</i> Faculty Management</h1>
    <p class="text-muted">Manage faculty members and their information</p>
</div>

<div class="card">
    <div class="card-header bg-light d-flex justify-content-between align-items-center">
        <h5 class="mb-0"><i class="material-icons">list</i> Faculty List</h5>
        <a href="{{ route('admin.faculty.create') }}" class="btn btn-primary">
            <i class="material-icons">add</i> Add New Faculty
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
                        <th><i class="material-icons">person</i> Name</th>
                        <th><i class="material-icons">email</i> Email</th>
                        <th><i class="material-icons">confirmation_number</i> Employee ID</th>
                        <th><i class="material-icons">business</i> Department</th>
                        <th><i class="material-icons">work</i> Designation</th>
                        <th><i class="material-icons">toggle_on</i> Status</th>
                        <th><i class="material-icons">settings</i> Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($faculty as $member)
                        <tr>
                            <td>{{ $member->id }}</td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <i class="material-icons text-muted me-2">person</i>
                                    {{ $member->first_name }} {{ $member->last_name }}
                                </div>
                            </td>
                            <td>
                                <i class="material-icons text-muted me-2">email</i>
                                {{ $member->email }}
                            </td>
                            <td>
                                <i class="material-icons text-muted me-2">confirmation_number</i>
                                {{ $member->employee_id }}
                            </td>
                            <td>
                                <i class="material-icons text-muted me-2">business</i>
                                {{ $member->department->name ?? 'N/A' }}
                            </td>
                            <td>
                                <i class="material-icons text-muted me-2">work</i>
                                {{ $member->designation ?? 'N/A' }}
                            </td>
                            <td>
                                <span class="badge bg-{{ $member->is_active ? 'success' : 'secondary' }}">
                                    <i class="material-icons">toggle_{{ $member->is_active ? 'on' : 'off' }}</i>
                                    {{ $member->is_active ? 'Active' : 'Inactive' }}
                                </span>
                            </td>
                            <td>
                                <div class="btn-group" role="group">
                                    <a href="{{ route('admin.faculty.show', $member->id) }}" 
                                       class="btn btn-sm btn-info" 
                                       title="View">
                                        <i class="material-icons">visibility</i>
                                    </a>
                                    <a href="{{ route('admin.faculty.edit', $member->id) }}" 
                                       class="btn btn-sm btn-warning" 
                                       title="Edit">
                                        <i class="material-icons">edit</i>
                                    </a>
                                    <form action="{{ route('admin.faculty.destroy', $member->id) }}" 
                                          method="POST" 
                                          class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                                class="btn btn-sm btn-danger" 
                                                title="Delete"
                                                onclick="return confirm('Are you sure you want to delete this faculty member?')">
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
                                <p class="mt-2 text-muted">No faculty members found.</p>
                                <a href="{{ route('admin.faculty.create') }}" class="btn btn-primary">
                                    <i class="material-icons">add</i> Add Your First Faculty
                                </a>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        <div class="mt-3">
            {{ $faculty->links() }}
        </div>
    </div>
</div>
@endsection
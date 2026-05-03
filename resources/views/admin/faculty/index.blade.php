@extends('admin.layout')

@section('title', 'Faculty Management')

@section('content')
<div class="page-header">
    <h1><i class="material-icons">people</i> Faculty Management</h1>
    <p class="text-muted">Manage faculty members and their information</p>
</div>

<div class="card">
    <div class="card-header bg-light d-flex justify-content-between align-items-center flex-wrap gap-2">
        <h5 class="mb-0"><i class="material-icons">list</i> Faculty List</h5>
        <a href="{{ route('admin.faculty.create') }}" class="btn btn-primary">
            <i class="material-icons">add</i> Add New Faculty
        </a>
    </div>

    {{-- Search Bar --}}
    <div class="card-body pb-0">
        <form method="GET" action="{{ route('admin.faculty.index') }}" class="row g-2 align-items-center mb-3">
            <div class="col-md-8 col-lg-6">
                <div class="input-group">
                    <span class="input-group-text bg-white">
                        <i class="material-icons" style="font-size:20px;">search</i>
                    </span>
                    <input
                        type="text"
                        class="form-control"
                        name="search"
                        value="{{ $search ?? '' }}"
                        placeholder="Search by name, email, employee ID, designation…"
                        id="facultySearch"
                    >
                    @if(!empty($search))
                        <a href="{{ route('admin.faculty.index') }}" class="btn btn-outline-secondary" title="Clear search">
                            <i class="material-icons" style="font-size:18px;">close</i>
                        </a>
                    @endif
                    <button class="btn btn-primary" type="submit">
                        Search
                    </button>
                </div>
            </div>
        </form>
    </div>

    <div class="card-body pt-0">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="material-icons">check_circle</i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if(!empty($search))
            <p class="text-muted mb-2">
                Showing results for: <strong>{{ $search }}</strong>
                &mdash; {{ $faculty->total() }} record(s) found.
            </p>
        @endif

        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th><i class="material-icons">badge</i> ID</th>
                        <th style="width:56px;">Photo</th>
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
                                @if($member->photo)
                                    <img src="{{ asset('public/' . $member->photo) }}"
                                         alt="{{ $member->first_name }}"
                                         class="rounded-circle"
                                         style="width:42px;height:42px;object-fit:cover;border:2px solid #dee2e6;">
                                @else
                                    <div class="rounded-circle bg-secondary d-flex align-items-center justify-content-center text-white"
                                         style="width:42px;height:42px;font-size:18px;">
                                        <i class="material-icons">person</i>
                                    </div>
                                @endif
                            </td>
                            <td>
                                <strong>{{ $member->first_name }} {{ $member->last_name }}</strong>
                            </td>
                            <td>{{ $member->email }}</td>
                            <td>{{ $member->employee_id }}</td>
                            <td>
                                @if(isset($member->departments) && $member->departments->count() > 0)
                                    @foreach($member->departments as $dept)
                                        <span class="badge bg-primary me-1">{{ $dept->name }}</span>
                                    @endforeach
                                @elseif($member->department)
                                    <span class="badge bg-primary">{{ $member->department->name }}</span>
                                @else
                                    N/A
                                @endif
                            </td>
                            <td>{{ $member->designation ?? 'N/A' }}</td>
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
                            <td colspan="9" class="text-center py-4">
                                <i class="material-icons text-muted" style="font-size: 64px;">
                                    {{ !empty($search) ? 'search_off' : 'sentiment_dissatisfied' }}
                                </i>
                                <p class="mt-2 text-muted">
                                    {{ !empty($search) ? 'No faculty members match your search.' : 'No faculty members found.' }}
                                </p>
                                @if(empty($search))
                                    <a href="{{ route('admin.faculty.create') }}" class="btn btn-primary">
                                        <i class="material-icons">add</i> Add Your First Faculty
                                    </a>
                                @else
                                    <a href="{{ route('admin.faculty.index') }}" class="btn btn-secondary">
                                        <i class="material-icons">clear</i> Clear Search
                                    </a>
                                @endif
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-3">
            {{ $faculty->links('pagination::bootstrap-5') }}
        </div>
    </div>
</div>
@endsection
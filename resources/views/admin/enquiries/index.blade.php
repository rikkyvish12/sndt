@extends('admin.layout')

@section('title', 'Enquiries')

@section('content')
<div class="page-header d-flex justify-content-between align-items-center">
    <h2 class="mb-0">
        <i class="material-icons">question_answer</i> Enquiries
    </h2>
    <span class="text-muted">Total: {{ $enquiries->total() }}</span>
</div>

@if(session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <i class="fas fa-check-circle"></i> {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
</div>
@endif

<div class="card">
    <div class="card-body">
        <!-- Filters -->
        <form method="GET" action="{{ route('admin.enquiries.index') }}" class="mb-4">
            <div class="row g-3">
                <div class="col-md-6">
                    <input type="text" name="search" class="form-control" 
                           placeholder="Search by name, phone, or email..." 
                           value="{{ request('search') }}">
                </div>
                <div class="col-md-4">
                    <select name="status" class="form-select">
                        <option value="">All Status</option>
                        <option value="new" {{ request('status') == 'new' ? 'selected' : '' }}>New</option>
                        <option value="contacted" {{ request('status') == 'contacted' ? 'selected' : '' }}>Contacted</option>
                        <option value="resolved" {{ request('status') == 'resolved' ? 'selected' : '' }}>Resolved</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-primary w-100">
                        <i class="fas fa-search"></i> Filter
                    </button>
                </div>
            </div>
        </form>

        <!-- Enquiries Table -->
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Message</th>
                        <th>Status</th>
                        <th>Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($enquiries as $enquiry)
                    <tr>
                        <td>{{ $enquiry->id }}</td>
                        <td>{{ $enquiry->name }}</td>
                        <td>{{ $enquiry->phone }}</td>
                        <td>{{ $enquiry->email ?? '-' }}</td>
                        <td>
                            {{ Str::limit($enquiry->message, 50) ?? '-' }}
                        </td>
                        <td>
                            <span class="badge {{ $enquiry->status_badge }}">
                                {{ ucfirst($enquiry->status) }}
                            </span>
                        </td>
                        <td>{{ $enquiry->created_at->format('M d, Y H:i') }}</td>
                        <td>
                            <a href="{{ route('admin.enquiries.edit', $enquiry->id) }}" 
                               class="btn btn-sm btn-primary">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <form action="{{ route('admin.enquiries.destroy', $enquiry->id) }}" 
                                  method="POST" class="d-inline"
                                  onsubmit="return confirm('Are you sure you want to delete this enquiry?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">
                                    <i class="fas fa-trash"></i> Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="text-center text-muted py-4">
                            <i class="fas fa-inbox fa-3x mb-3 d-block"></i>
                            No enquiries found
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="mt-3">
            {{ $enquiries->links('pagination::bootstrap-5') }}
        </div>
    </div>
</div>
@endsection

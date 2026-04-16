@extends('admin.layout')

@section('title', 'Edit Enquiry')

@section('content')
<div class="page-header">
    <h2 class="mb-0">
        <i class="material-icons">edit</i> Edit Enquiry #{{ $enquiry->id }}
    </h2>
</div>

<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('admin.enquiries.update', $enquiry->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label class="form-label">Status</label>
                        <select name="status" class="form-select" required>
                            <option value="new" {{ $enquiry->status == 'new' ? 'selected' : '' }}>New</option>
                            <option value="contacted" {{ $enquiry->status == 'contacted' ? 'selected' : '' }}>Contacted</option>
                            <option value="resolved" {{ $enquiry->status == 'resolved' ? 'selected' : '' }}>Resolved</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Admin Notes</label>
                        <textarea name="admin_notes" class="form-control" rows="5" 
                                  placeholder="Add your notes here...">{{ old('admin_notes', $enquiry->admin_notes) }}</textarea>
                        <small class="text-muted">Internal notes - not visible to the user</small>
                    </div>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i> Update Enquiry
                        </button>
                        <a href="{{ route('admin.enquiries.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i> Back
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0"><i class="fas fa-user"></i> Enquiry Details</h5>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <strong>Name:</strong>
                    <p class="mb-0">{{ $enquiry->name }}</p>
                </div>
                <hr>
                <div class="mb-3">
                    <strong>Phone:</strong>
                    <p class="mb-0">
                        <a href="tel:{{ $enquiry->phone }}">{{ $enquiry->phone }}</a>
                    </p>
                </div>
                <hr>
                <div class="mb-3">
                    <strong>Email:</strong>
                    <p class="mb-0">
                        @if($enquiry->email)
                            <a href="mailto:{{ $enquiry->email }}">{{ $enquiry->email }}</a>
                        @else
                            <span class="text-muted">Not provided</span>
                        @endif
                    </p>
                </div>
                <hr>
                <div class="mb-3">
                    <strong>Message:</strong>
                    <p class="mb-0">{{ $enquiry->message ?? 'No message provided' }}</p>
                </div>
                <hr>
                <div class="mb-3">
                    <strong>Submitted:</strong>
                    <p class="mb-0">{{ $enquiry->created_at->format('M d, Y h:i A') }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

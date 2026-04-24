@extends('admin.layout')

@section('title', 'Manage Announcements')

@section('content')
<div class="page-header">
    <div class="d-flex justify-content-between align-items-center">
        <div>
            <h2><i class="material-icons">campaign</i> Announcements</h2>
            <p class="text-muted mb-0">Manage header announcements and marquee messages</p>
        </div>
        <a href="{{ route('admin.announcements.create') }}" class="btn btn-primary">
            <i class="material-icons">add</i> Add Announcement
        </a>
    </div>
</div>

@if(session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <i class="material-icons">check_circle</i> {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
</div>
@endif

<div class="card">
    <div class="card-body">
        @if($announcements->count() > 0)
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th width="5%">#</th>
                        <th width="20%">Title</th>
                        <th width="30%">Content</th>
                        <th width="10%">Link</th>
                        <th width="8%">Order</th>
                        <th width="8%">Status</th>
                        <th width="19%" class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($announcements as $announcement)
                    <tr>
                        <td>{{ $announcement->id }}</td>
                        <td><strong>{{ Str::limit($announcement->title, 30) }}</strong></td>
                        <td>{{ Str::limit($announcement->content, 50) }}</td>
                        <td>
                            @if($announcement->link)
                                <a href="{{ $announcement->link }}" target="_blank" class="text-primary">
                                    <i class="material-icons" style="font-size: 16px;">open_in_new</i>
                                    {{ $announcement->link_text ?? 'Link' }}
                                </a>
                            @else
                                <span class="text-muted">-</span>
                            @endif
                        </td>
                        <td class="text-center">{{ $announcement->order }}</td>
                        <td>
                            @if($announcement->is_active)
                                <span class="badge bg-success">Active</span>
                            @else
                                <span class="badge bg-secondary">Inactive</span>
                            @endif
                        </td>
                        <td class="text-end">
                            <a href="{{ route('admin.announcements.edit', $announcement->id) }}" 
                               class="btn btn-sm btn-outline-primary">
                                <i class="material-icons">edit</i> Edit
                            </a>
                            <form action="{{ route('admin.announcements.destroy', $announcement->id) }}" 
                                  method="POST" class="d-inline" 
                                  onsubmit="return confirm('Are you sure you want to delete this announcement?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger">
                                    <i class="material-icons">delete</i> Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @else
        <div class="text-center py-5">
            <i class="material-icons" style="font-size: 64px; color: #ccc;">campaign</i>
            <h5 class="text-muted mt-3">No Announcements Yet</h5>
            <p class="text-muted">Click "Add Announcement" to create your first announcement.</p>
            <a href="{{ route('admin.announcements.create') }}" class="btn btn-primary mt-2">
                <i class="material-icons">add</i> Add First Announcement
            </a>
        </div>
        @endif
    </div>
</div>
@endsection

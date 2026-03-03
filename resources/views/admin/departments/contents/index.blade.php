@extends('admin.layout')

@section('title', 'Manage Department Content')

@section('content')
<div class="page-header">
    <h1><i class="material-icons">description</i> Manage Content - {{ $department->name }}</h1>
    <p class="text-muted">{{ $department->code }} - Customize tab content for public page</p>
</div>

<div class="card">
    <div class="card-header bg-light d-flex justify-content-between align-items-center">
        <h5 class="mb-0"><i class="material-icons">list</i> Content Sections</h5>
        <div>
            <a href="{{ route('admin.departments.index') }}" class="btn btn-secondary btn-sm">
                <i class="material-icons">arrow_back</i> Back to Departments
            </a>
            <a href="{{ route('admin.departments.contents.create', $department->id) }}" class="btn btn-primary btn-sm">
                <i class="material-icons">add</i> Add Content Section
            </a>
        </div>
    </div>
    <div class="card-body">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="material-icons">check_circle</i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="material-icons">error</i> {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if($contents->count() > 0)
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="table-light">
                        <tr>
                            <th><i class="material-icons">title</i> Section</th>
                            <th><i class="material-icons">subject</i> Content Preview</th>
                            <th><i class="material-icons">toggle_on</i> Status</th>
                            <th><i class="material-icons">sort</i> Order</th>
                            <th><i class="material-icons">access_time</i> Last Updated</th>
                            <th><i class="material-icons">settings</i> Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($contents as $content)
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <i class="material-icons text-muted me-2">label</i>
                                        <strong>{{ ucfirst($content->section) }}</strong>
                                    </div>
                                </td>
                                <td>
                                    <div class="text-truncate" style="max-width: 300px;">
                                        {{ Str::limit(strip_tags($content->content ?? ''), 80) }}
                                    </div>
                                </td>
                                <td>
                                    <span class="badge bg-{{ $content->is_active ? 'success' : 'secondary' }}">
                                        <i class="material-icons">toggle_{{ $content->is_active ? 'on' : 'off' }}</i>
                                        {{ $content->is_active ? 'Active' : 'Inactive' }}
                                    </span>
                                </td>
                                <td>
                                    <i class="material-icons text-muted">format_list_numbered</i>
                                    {{ $content->order }}
                                </td>
                                <td>
                                    <i class="material-icons text-muted">schedule</i>
                                    {{ $content->updated_at->diffForHumans() }}
                                </td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('admin.departments.contents.edit', [$department->id, $content->id]) }}" 
                                           class="btn btn-sm btn-warning" 
                                           title="Edit">
                                            <i class="material-icons">edit</i>
                                        </a>
                                        <form action="{{ route('admin.departments.contents.destroy', [$department->id, $content->id]) }}" 
                                              method="POST" 
                                              class="d-inline"
                                              onsubmit="return confirm('Are you sure you want to delete this content section?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">
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
        @else
            <div class="text-center py-5">
                <i class="material-icons" style="font-size: 64px; color: #ccc;">folder_open</i>
                <h5 class="mt-3 text-muted">No content sections yet</h5>
                <p class="text-muted">Get started by adding a new content section.</p>
                <a href="{{ route('admin.departments.contents.create', $department->id) }}" class="btn btn-primary">
                    <i class="material-icons">add</i> Add Content Section
                </a>
            </div>
        @endif
    </div>
</div>

<!-- Info Alert -->
<div class="alert alert-info mt-3">
    <i class="material-icons">info</i>
    <strong>Note:</strong> Each section can be customized with rich text content. Use HTML tags for formatting.
    The content will be displayed on the public department page tabs.
</div>
@endsection

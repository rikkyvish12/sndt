@extends('admin.layout')

@section('title', 'Settings Management')

@section('content')
<div class="page-header">
    <h1><i class="material-icons">settings</i> Settings Management</h1>
    <p class="text-muted">Configure system-wide settings and preferences</p>
</div>

<div class="card">
    <div class="card-header bg-light d-flex justify-content-between align-items-center">
        <h5 class="mb-0"><i class="material-icons">build</i> System Settings</h5>
        <a href="{{ route('admin.settings.create') }}" class="btn btn-primary">
            <i class="material-icons">add</i> Add New Setting
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
                        <th><i class="material-icons">tag</i> Key</th>
                        <th><i class="material-icons">text_fields</i> Value</th>
                        <th><i class="material-icons">description</i> Description</th>
                        <th><i class="material-icons">settings</i> Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($settings as $setting)
                        <tr>
                            <td>{{ $setting->id }}</td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <i class="material-icons text-muted me-2">tag</i>
                                    <code>{{ $setting->key }}</code>
                                </div>
                            </td>
                            <td>
                                <i class="material-icons text-muted me-2">text_fields</i>
                                {{ Str::limit($setting->value, 50) }}
                            </td>
                            <td>
                                <i class="material-icons text-muted me-2">description</i>
                                {{ $setting->description ?? 'N/A' }}
                            </td>
                            <td>
                                <div class="btn-group" role="group">
                                    <a href="{{ route('admin.settings.show', $setting->id) }}" 
                                       class="btn btn-sm btn-info" 
                                       title="View">
                                        <i class="material-icons">visibility</i>
                                    </a>
                                    <a href="{{ route('admin.settings.edit', $setting->id) }}" 
                                       class="btn btn-sm btn-warning" 
                                       title="Edit">
                                        <i class="material-icons">edit</i>
                                    </a>
                                    <form action="{{ route('admin.settings.destroy', $setting->id) }}" 
                                          method="POST" 
                                          class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                                class="btn btn-sm btn-danger" 
                                                title="Delete"
                                                onclick="return confirm('Are you sure you want to delete this setting?')">
                                            <i class="material-icons">delete</i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center py-4">
                                <i class="material-icons text-muted" style="font-size: 64px;">sentiment_dissatisfied</i>
                                <p class="mt-2 text-muted">No settings found.</p>
                                <a href="{{ route('admin.settings.create') }}" class="btn btn-primary">
                                    <i class="material-icons">add</i> Add Your First Setting
                                </a>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
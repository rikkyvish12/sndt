@extends('admin.layout')

@section('title', 'View Setting')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>View Setting</h1>
        <div>
            <a href="{{ route('admin.settings.edit', $setting->id) }}" class="btn btn-warning">Edit</a>
            <a href="{{ route('admin.settings.index') }}" class="btn btn-secondary">Back to Settings</a>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5>Setting Details</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-3"><strong>Key:</strong></div>
                        <div class="col-sm-9">{{ $setting->key }}</div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3"><strong>Description:</strong></div>
                        <div class="col-sm-9">{{ $setting->description ?? 'No description provided.' }}</div>
                    </div>
                </div>
            </div>

            <div class="card mt-4">
                <div class="card-header">
                    <h5>Value</h5>
                </div>
                <div class="card-body">
                    <pre class="bg-light p-3">{{ $setting->value }}</pre>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h5>System Information</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6"><strong>Created:</strong></div>
                        <div class="col-sm-6">{{ $setting->created_at->format('M d, Y') }}</div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-6"><strong>Updated:</strong></div>
                        <div class="col-sm-6">{{ $setting->updated_at->format('M d, Y') }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
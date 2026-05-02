@extends('admin.layout')

@section('title', 'Edit Faculty')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1><i class="material-icons">edit</i> Edit Faculty</h1>
        <a href="{{ route('admin.faculty.index') }}" class="btn btn-secondary">
            <i class="material-icons">arrow_back</i> Back to Faculty
        </a>
    </div>

    @if($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="material-icons">error_outline</i> Please fix the following errors:
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card">
        <div class="card-header bg-light">
            <h5 class="mb-0"><i class="material-icons">person</i> Faculty Information</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.faculty.update', $faculty->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                {{-- Photo Upload --}}
                <div class="mb-4">
                    <label class="form-label">
                        <i class="material-icons">photo_camera</i> Faculty Photo
                    </label>
                    <div class="d-flex align-items-center gap-3">
                        <div class="rounded-circle overflow-hidden bg-light border d-flex align-items-center justify-content-center"
                             style="width:100px;height:100px;flex-shrink:0;">
                            @if($faculty->photo)
                                <img id="photoPreview"
                                     src="{{ asset('storage/' . $faculty->photo) }}"
                                     alt="{{ $faculty->first_name }}"
                                     style="width:100%;height:100%;object-fit:cover;">
                            @else
                                <img id="photoPreview" src="" alt="Preview"
                                     style="width:100%;height:100%;object-fit:cover;display:none;">
                                <i class="material-icons text-muted" id="photoIcon" style="font-size:48px;">person</i>
                            @endif
                        </div>
                        <div>
                            <input type="file" class="form-control" id="photo" name="photo"
                                   accept="image/jpeg,image/png,image/gif,image/webp"
                                   onchange="previewPhoto(event)">
                            <small class="text-muted">
                                JPG, PNG, GIF or WebP. Max 2 MB.
                                @if($faculty->photo)
                                    <br>Upload a new image to replace the current one.
                                @endif
                            </small>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="first_name" class="form-label">First Name *</label>
                            <input type="text" class="form-control" id="first_name" name="first_name" value="{{ old('first_name', $faculty->first_name) }}" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="last_name" class="form-label">Last Name *</label>
                            <input type="text" class="form-control" id="last_name" name="last_name" value="{{ old('last_name', $faculty->last_name) }}" required>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="email" class="form-label">Email *</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $faculty->email) }}" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone', $faculty->phone) }}">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="employee_id" class="form-label">Employee ID *</label>
                            <input type="text" class="form-control" id="employee_id" name="employee_id" value="{{ old('employee_id', $faculty->employee_id) }}" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Departments *</label>
                            <div class="border rounded p-3" style="max-height: 200px; overflow-y: auto;">
                                @foreach($departments as $department)
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="department_ids[]" value="{{ $department->id }}" id="dept_{{ $department->id }}" {{ in_array($department->id, old('department_ids', $faculty->departments->pluck('id')->toArray())) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="dept_{{ $department->id }}">
                                            {{ $department->name }}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                            <small class="form-text text-muted">Select one or more departments</small>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="designation" class="form-label">Designation</label>
                            <input type="text" class="form-control" id="designation" name="designation" value="{{ old('designation', $faculty->designation) }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="date_of_birth" class="form-label">Date of Birth</label>
                            <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" value="{{ old('date_of_birth', $faculty->date_of_birth ? $faculty->date_of_birth->format('Y-m-d') : '') }}">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="joining_date" class="form-label">Joining Date</label>
                            <input type="date" class="form-control" id="joining_date" name="joining_date" value="{{ old('joining_date', $faculty->joining_date ? $faculty->joining_date->format('Y-m-d') : '') }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="is_active" class="form-label">Status</label>
                            <select class="form-control" id="is_active" name="is_active">
                                <option value="1" {{ old('is_active', $faculty->is_active) == 1 ? 'selected' : '' }}>Active</option>
                                <option value="0" {{ old('is_active', $faculty->is_active) == 0 ? 'selected' : '' }}>Inactive</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="qualification" class="form-label">Qualification</label>
                    <textarea class="form-control" id="qualification" name="qualification" rows="3">{{ old('qualification', $faculty->qualification) }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="specialization" class="form-label">Specialization</label>
                    <textarea class="form-control" id="specialization" name="specialization" rows="3">{{ old('specialization', $faculty->specialization) }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="address" class="form-label">Address</label>
                    <textarea class="form-control" id="address" name="address" rows="2">{{ old('address', $faculty->address) }}</textarea>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="city" class="form-label">City</label>
                            <input type="text" class="form-control" id="city" name="city" value="{{ old('city', $faculty->city) }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="state" class="form-label">State</label>
                            <input type="text" class="form-control" id="state" name="state" value="{{ old('state', $faculty->state) }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="postal_code" class="form-label">Postal Code</label>
                            <input type="text" class="form-control" id="postal_code" name="postal_code" value="{{ old('postal_code', $faculty->postal_code) }}">
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="country" class="form-label">Country</label>
                    <input type="text" class="form-control" id="country" name="country" value="{{ old('country', $faculty->country) }}">
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('admin.faculty.index') }}" class="btn btn-secondary">
                        <i class="material-icons">arrow_back</i> Cancel
                    </a>
                    <button type="submit" class="btn btn-primary">
                        <i class="material-icons">save</i> Update Faculty
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function previewPhoto(event) {
        const file = event.target.files[0];
        if (!file) return;
        const reader = new FileReader();
        reader.onload = function(e) {
            const img = document.getElementById('photoPreview');
            const icon = document.getElementById('photoIcon');
            img.src = e.target.result;
            img.style.display = 'block';
            if (icon) icon.style.display = 'none';
        };
        reader.readAsDataURL(file);
    }
</script>
@endsection
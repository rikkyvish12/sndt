@extends('admin.layout')

@section('title', 'Add New Faculty')

@section('content')
<div class="page-header">
    <h1><i class="material-icons">person_add</i> Add New Faculty</h1>
    <p class="text-muted">Enter faculty member details below</p>
</div>

<div class="card">
    <div class="card-header bg-light">
        <h5 class="mb-0"><i class="material-icons">person</i> Faculty Information</h5>
    </div>
    <div class="card-body">
        @if($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="material-icons">error_outline</i> Please fix the following errors:
                <ul class="mb-0 ps-3">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <form action="{{ route('admin.faculty.store') }}" method="POST">
            @csrf
            
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="first_name" class="form-label">
                            <i class="material-icons">person</i> First Name *
                        </label>
                        <input type="text" class="form-control" id="first_name" name="first_name" value="{{ old('first_name') }}" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="last_name" class="form-label">
                            <i class="material-icons">person</i> Last Name *
                        </label>
                        <input type="text" class="form-control" id="last_name" name="last_name" value="{{ old('last_name') }}" required>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="email" class="form-label">
                            <i class="material-icons">email</i> Email *
                        </label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="phone" class="form-label">
                            <i class="material-icons">phone</i> Phone
                        </label>
                        <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone') }}">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="employee_id" class="form-label">
                            <i class="material-icons">confirmation_number</i> Employee ID *
                        </label>
                        <input type="text" class="form-control" id="employee_id" name="employee_id" value="{{ old('employee_id') }}" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="department_id" class="form-label">
                            <i class="material-icons">business</i> Department *
                        </label>
                        <select class="form-select" id="department_id" name="department_id" required>
                            <option value="">Select Department</option>
                            @foreach($departments as $department)
                                <option value="{{ $department->id }}" {{ old('department_id') == $department->id ? 'selected' : '' }}>
                                    {{ $department->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="designation" class="form-label">
                            <i class="material-icons">work</i> Designation
                        </label>
                        <input type="text" class="form-control" id="designation" name="designation" value="{{ old('designation') }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="date_of_birth" class="form-label">
                            <i class="material-icons">cake</i> Date of Birth
                        </label>
                        <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" value="{{ old('date_of_birth') }}">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="joining_date" class="form-label">
                            <i class="material-icons">today</i> Joining Date
                        </label>
                        <input type="date" class="form-control" id="joining_date" name="joining_date" value="{{ old('joining_date') }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="is_active" class="form-label">
                            <i class="material-icons">toggle_on</i> Status
                        </label>
                        <select class="form-select" id="is_active" name="is_active">
                            <option value="1" {{ old('is_active', 1) == 1 ? 'selected' : '' }}>Active</option>
                            <option value="0" {{ old('is_active', 1) == 0 ? 'selected' : '' }}>Inactive</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label for="qualification" class="form-label">
                    <i class="material-icons">school</i> Qualification
                </label>
                <textarea class="form-control" id="qualification" name="qualification" rows="3">{{ old('qualification') }}</textarea>
            </div>

            <div class="mb-3">
                <label for="specialization" class="form-label">
                    <i class="material-icons">assignment</i> Specialization
                </label>
                <textarea class="form-control" id="specialization" name="specialization" rows="3">{{ old('specialization') }}</textarea>
            </div>

            <div class="mb-3">
                <label for="address" class="form-label">
                    <i class="material-icons">home</i> Address
                </label>
                <textarea class="form-control" id="address" name="address" rows="2">{{ old('address') }}</textarea>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="city" class="form-label">
                            <i class="material-icons">location_city</i> City
                        </label>
                        <input type="text" class="form-control" id="city" name="city" value="{{ old('city') }}">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="state" class="form-label">
                            <i class="material-icons">map</i> State
                        </label>
                        <input type="text" class="form-control" id="state" name="state" value="{{ old('state') }}">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="postal_code" class="form-label">
                            <i class="material-icons">markunread_mailbox</i> Postal Code
                        </label>
                        <input type="text" class="form-control" id="postal_code" name="postal_code" value="{{ old('postal_code') }}">
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label for="country" class="form-label">
                    <i class="material-icons">public</i> Country
                </label>
                <input type="text" class="form-control" id="country" name="country" value="{{ old('country', 'India') }}">
            </div>

            <div class="d-flex justify-content-between">
                <a href="{{ route('admin.faculty.index') }}" class="btn btn-secondary">
                    <i class="material-icons">arrow_back</i> Back to Faculty
                </a>
                <button type="submit" class="btn btn-primary">
                    <i class="material-icons">save</i> Create Faculty
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
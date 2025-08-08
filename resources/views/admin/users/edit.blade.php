@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        @include('layouts.admin')

        <!-- Smaller, centered form container -->
        <div class="col-md-6 col-lg-5 p-4 mx-auto">
            <div class="card shadow-sm">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Edit User</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.users.update', $customer->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label>Full Name</label>
                                <input type="text" name="customer_name" class="form-control" 
                                       value="{{ old('customer_name', $customer->customer_name) }}" required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label>Email Address</label>
                                <input type="email" name="email" class="form-control" 
                                       value="{{ old('email', $customer->email) }}" required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label>Phone Number</label>
                                <input type="text" name="phone_number" class="form-control" 
                                       value="{{ old('phone_number', $customer->phone_number) }}" required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label>Date of Birth</label>
                                <input type="date" name="date_of_birth" class="form-control" 
                                       value="{{ old('date_of_birth', $customer->date_of_birth) }}" required>
                            </div>

                            <div class="col-md-12 mb-3">
                                <label>Address</label>
                                <input type="text" name="address" class="form-control" 
                                       value="{{ old('address', $customer->address) }}" required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label>Nationality</label>
                                <input type="text" name="nationality" class="form-control" 
                                       value="{{ old('nationality', $customer->nationality) }}" required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label>Passport Number (optional)</label>
                                <input type="text" name="passport_number" class="form-control" 
                                       value="{{ old('passport_number', $customer->passport_number) }}">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label>Emergency Contact Name</label>
                                <input type="text" name="emergency_contact_name" class="form-control" 
                                       value="{{ old('emergency_contact_name', $customer->emergency_contact_name) }}" required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label>Emergency Contact Number</label>
                                <input type="text" name="emergency_contact_number" class="form-control" 
                                       value="{{ old('emergency_contact_number', $customer->emergency_contact_number) }}" required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label>Role</label>
                                <select name="role" class="form-select" required>
                                    <option value="Customer" {{ old('role', $customer->role) == 'Customer' ? 'selected' : '' }}>Customer</option>
                                    <option value="Driver" {{ old('role', $customer->role) == 'Driver' ? 'selected' : '' }}>Driver</option>
                                    <option value="Admin" {{ old('role', $customer->role) == 'Admin' ? 'selected' : '' }}>Admin</option>
                                </select>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label>Status</label>
                                <select name="status" class="form-select" required>
                                    <option value="active" {{ old('status', $customer->status) == 'active' ? 'selected' : '' }}>Active</option>
                                    <option value="inactive" {{ old('status', $customer->status) == 'inactive' ? 'selected' : '' }}>Inactive</option>
                                </select>
                            </div>

                            <div class="col-md-12 mb-3">
                                <label>Special Preference Notes</label>
                                <textarea name="special_preference_notes" class="form-control"
                                    placeholder="Dietary restrictions, accessibility needs, special requests...">{{ old('special_preference_notes', $customer->special_preference_notes) }}</textarea>
                            </div>

                            <div class="col-12 d-flex justify-content-end">
                                <a href="{{ route('admin.users.index') }}" class="btn btn-secondary me-2">Back</a>
                                <button type="submit" class="btn btn-primary">Update User</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div> <!-- end card -->
        </div>
    </div>
</div>
@endsection

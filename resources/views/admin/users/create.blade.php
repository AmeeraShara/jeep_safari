@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        @include('layouts.admin')

        <!-- Main Content - smaller, centered -->
        <div class="col-md-6 col-lg-5 p-4 mx-auto">
            <div class="card shadow-sm">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Add New User</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.users.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label>Full Name</label>
                                <input type="text" name="customer_name" class="form-control" required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label>Email Address</label>
                                <input type="email" name="email" class="form-control" required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label>Phone Number</label>
                                <input type="text" name="phone_number" class="form-control" required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label>Date of Birth</label>
                                <input type="date" name="date_of_birth" class="form-control" required>
                            </div>

                            <div class="col-md-12 mb-3">
                                <label>Address</label>
                                <input type="text" name="address" class="form-control" required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label>Nationality</label>
                                <input type="text" name="nationality" class="form-control" required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label>Passport Number (optional)</label>
                                <input type="text" name="passport_number" class="form-control">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label>Emergency Contact Name</label>
                                <input type="text" name="emergency_contact_name" class="form-control" required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label>Emergency Contact Number</label>
                                <input type="text" name="emergency_contact_number" class="form-control" required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label>Role</label>
                                <select name="role" class="form-select" required>
                                    <option value="Customer" selected>Customer</option>
                                    <option value="Driver">Driver</option>
                                    <option value="Admin">Admin</option>
                                </select>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label>Status</label>
                                <select name="status" class="form-select" required>
                                    <option value="active" selected>Active</option>
                                    <option value="inactive">Inactive</option>
                                </select>
                            </div>

                            <div class="col-md-12 mb-3">
                                <label>Special Preference Notes</label>
                                <textarea name="special_preference_notes" class="form-control"
                                    placeholder="Dietary restrictions, accessibility needs, special requests..."></textarea>
                            </div>

                            <div class="col-12 d-flex justify-content-end">
                                <a href="{{ route('admin.users.index') }}" class="btn btn-secondary me-2">Back</a>
                                <button type="submit" class="btn btn-success">Add User</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div> 
        </div>
    </div>
</div>
@endsection

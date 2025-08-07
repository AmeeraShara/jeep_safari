@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        @include('layouts.admin')

        <!-- Main Content -->
        <div class="col-md-9 col-lg-10 p-4">
            <h4>Add New User</h4>

            <form action="{{ route('admin.users.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label>Customer Name</label>
                        <input type="text" name="customer_name" class="form-control" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Email</label>
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

                    <div class="col-md-12 mb-3">
                        <label>Special Preference Notes </label>
                        <textarea name="special_preference_notes" class="form-control"></textarea>
                    </div>

                    <div class="col-12">
                        <button type="submit" class="btn btn-success">Add User</button>
                        <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">Back</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

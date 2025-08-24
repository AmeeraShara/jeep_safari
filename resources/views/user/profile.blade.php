@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">

        <!-- Sidebar -->
        @include('layouts.user')

        <!-- Main Content -->
        <div class="col-md-9 col-lg-10 p-4">
            <h3 class="mb-4">My Profile</h3>

            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <!-- Read-only Profile View -->
            <div id="profileView" class="card shadow-sm">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-4">
                        <div class="rounded-circle bg-light text-success d-flex align-items-center justify-content-center"
                             style="width:64px; height:64px; font-size:32px; font-weight:bold;">
                            <i class="bi bi-person" style="font-size:32px;"></i>
                        </div>
                        <div class="ms-3">
                            <h5 class="mb-0">{{ $customer->customer_name }}</h5>
                            <small class="text-muted">{{ $customer->email }}</small>
                        </div>
                        <button id="editProfileBtn" class="btn btn-success btn-sm ms-auto">
                            <i class="bi bi-pencil-square me-1"></i> Edit Profile
                        </button>
                    </div>

                    <p><strong>Phone:</strong> {{ $customer->phone_number }}</p>
                    <p><strong>Date of Birth:</strong> {{ $customer->date_of_birth }}</p>
                    <p><strong>Emergency Contact:</strong> {{ $customer->emergency_contact_name }} - {{ $customer->emergency_contact_number }}</p>
                    <p><strong>Address:</strong> {{ $customer->address }}</p>
                </div>
            </div>

            <!-- Edit Profile Form (hidden initially) -->
            <div id="profileFormContainer" class="card shadow-sm mt-3" style="display:none;">
                <div class="card-body">
                    <form id="profileForm" action="{{ route('user.profile.update', $customer->id) }}" method="POST">
                        @csrf
                        <div class="row g-3 mb-3">
                            <div class="col-md-6">
                                <label for="first_name" class="form-label">First Name</label>
                                <input type="text" id="first_name" name="first_name" class="form-control" 
                                       value="{{ explode(' ', $customer->customer_name)[0] ?? '' }}">
                            </div>
                            <div class="col-md-6">
                                <label for="last_name" class="form-label">Last Name</label>
                                <input type="text" id="last_name" name="last_name" class="form-control" 
                                       value="{{ explode(' ', $customer->customer_name)[1] ?? '' }}">
                            </div>
                        </div>

                        <div class="row g-3 mb-3">
                            <div class="col-md-6">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" id="email" name="email" class="form-control" 
                                       value="{{ $customer->email }}">
                            </div>
                            <div class="col-md-6">
                                <label for="phone" class="form-label">Phone</label>
                                <input type="text" id="phone" name="phone" class="form-control" 
                                       value="{{ $customer->phone_number }}">
                            </div>
                        </div>

                        <div class="row g-3 mb-3">
                            <div class="col-md-6">
                                <label for="dob" class="form-label">Date of Birth</label>
                                <input type="date" id="dob" name="dob" class="form-control" 
                                       value="{{ $customer->date_of_birth }}">
                            </div>
                            <div class="col-md-6">
                                <label for="emergency_name" class="form-label">Emergency Contact Name</label>
                                <input type="text" id="emergency_name" name="emergency_name" class="form-control" 
                                       value="{{ $customer->emergency_contact_name }}">
                                <label for="emergency_number" class="form-label mt-1">Emergency Contact Number</label>
                                <input type="text" id="emergency_number" name="emergency_number" class="form-control" 
                                       value="{{ $customer->emergency_contact_number }}">
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="address" class="form-label">Address</label>
                            <textarea id="address" name="address" class="form-control" rows="2">{{ $customer->address }}</textarea>
                        </div>

                        <button type="submit" class="btn btn-success">Save Changes</button>
                        <button type="button" id="cancelEdit" class="btn btn-secondary">Cancel</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- JS to toggle Edit/Cancel -->
<script>
document.getElementById('editProfileBtn').addEventListener('click', function() {
    document.getElementById('profileView').style.display = 'none';
    document.getElementById('profileFormContainer').style.display = 'block';
});

document.getElementById('cancelEdit').addEventListener('click', function() {
    document.getElementById('profileFormContainer').style.display = 'none';
    document.getElementById('profileView').style.display = 'block';
});
</script>

@endsection

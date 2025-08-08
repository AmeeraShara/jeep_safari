@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        @include('layouts.admin')

        <!-- Main Content: smaller centered column -->
        <div class="col-md-6 col-lg-5 p-4 mx-auto">
            <h2 class="mb-4">Customer Details</h2>

            <div class="card">
                <div class="card-body">
                    <p><strong>Name:</strong> {{ $customers->customer_name }}</p>
                    <p><strong>Email:</strong> {{ $customers->email }}</p>
                    <p><strong>Phone Number:</strong> {{ $customers->phone_number }}</p>
                    <p><strong>Date of Birth:</strong> {{ $customers->date_of_birth }}</p>
                    <p><strong>Address:</strong> {{ $customers->address }}</p>
                    <p><strong>Nationality:</strong> {{ $customers->nationality }}</p>
                    <p><strong>Passport Number:</strong> {{ $customers->passport_number ?? 'N/A' }}</p>
                    <p><strong>Emergency Contact Name:</strong> {{ $customers->emergency_contact_name }}</p>
                    <p><strong>Emergency Contact Number:</strong> {{ $customers->emergency_contact_number }}</p>
                    <p><strong>Status:</strong> 
                        @if($customers->status == 'active')
                            <span class="badge bg-success">Active</span>
                        @else
                            <span class="badge bg-danger">Inactive</span>
                        @endif
                    </p>
                    <p><strong>Special Preferences:</strong> {{ $customers->special_preference_notes ?? 'None' }}</p>
                </div>
            </div>

            <a href="{{ route('admin.users.index') }}" class="btn btn-secondary mt-3">Back to Customer List</a>
        </div>
    </div>
</div>
@endsection

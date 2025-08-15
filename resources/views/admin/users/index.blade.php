@extends('layouts.app')

@section('content')
<style>
    /* Blur background when modal is open */
    .modal-backdrop {
        backdrop-filter: blur(5px);
        background-color: rgba(0, 0, 0, 0.3);
    }
</style>

<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        @include('layouts.admin')

        <!-- Main Content -->
        <div class="col-md-9 col-lg-10 p-4">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h4>All Users</h4>
                <!-- Trigger Modal -->
                <button class="btn btn-outline-success btn-sm" data-bs-toggle="modal" data-bs-target="#addUserModal">
                    + Add New User
                </button>
            </div>

            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <!-- Filter Form -->
            <form method="GET" action="{{ route('admin.users.index') }}" class="d-flex justify-content-end align-items-center mb-3 gap-2 flex-nowrap">
                <select name="role" class="form-select form-select-sm" onchange="this.form.submit()" style="width: 120px;">
                    <option value="">All Roles</option>
                    <option value="customer" {{ request('role') == 'customer' ? 'selected' : '' }}>Customer</option>
                    <option value="admin" {{ request('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                    <option value="manager" {{ request('role') == 'manager' ? 'selected' : '' }}>Manager</option>
                </select>

                <select name="status" class="form-select form-select-sm" onchange="this.form.submit()" style="width: 120px;">
                    <option value="">All Statuses</option>
                    <option value="active" {{ request('status') == 'active' ? 'selected' : '' }}>Active</option>
                    <option value="inactive" {{ request('status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
                </select>
            </form>

            <!-- Users Table -->
            <table class="table table-bordered table-hover">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Role</th>
                        <th>Status</th>
                        <th>Join Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $key => $user)
                    <tr>
                        <td>{{ $key + 1 + ($users->currentPage() - 1) * $users->perPage() }}</td>
                        <td>{{ $user->customer_name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->phone_number }}</td>
                        <td>{{ ucfirst($user->role) }}</td>
                        <td>
                            <span class="badge {{ $user->status == 'active' ? 'bg-success bg-opacity-25 text-success' : 'bg-danger bg-opacity-25 text-danger' }}">
                                {{ ucfirst($user->status) }}
                            </span>
                        </td>
                        <td>{{ \Carbon\Carbon::parse($user->created_at)->format('Y-m-d') }}</td>
                        <td>
                            <a href="{{ route('admin.users.show', $user->id) }}" class="btn btn-sm me-1" title="View"><i class="fa-solid fa-eye"></i></a>
                            <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-sm me-1" title="Edit"><i class="fa-solid fa-pen-to-square"></i></a>
                            <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure to delete this user?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm" title="Delete"><i class="fa-solid fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach

                    @if($users->count() == 0)
                    <tr>
                        <td colspan="8" class="text-center">No users found.</td>
                    </tr>
                    @endif
                </tbody>
            </table>

            <!-- Pagination -->
            <div>
                {{ $users->links() }}
            </div>
        </div>
    </div>
</div>

<!-- Add User Modal -->
<div class="modal fade" id="addUserModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add New User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="{{ route('admin.users.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <!-- Full Name -->
                        <div class="col-md-6 mb-3">
                            <label>Full Name *</label>
                            <input type="text" name="customer_name" class="form-control" required>
                        </div>
                        <!-- Email -->
                        <div class="col-md-6 mb-3">
                            <label>Email Address *</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>
                        <!-- Phone -->
                        <div class="col-md-6 mb-3">
                            <label>Phone Number *</label>
                            <input type="text" name="phone_number" class="form-control" required>
                        </div>
                        <!-- DOB -->
                        <div class="col-md-6 mb-3">
                            <label>Date of Birth *</label>
                            <input type="date" name="date_of_birth" class="form-control" required>
                        </div>
                        <!-- Address -->
                        <div class="col-md-12 mb-3">
                            <label>Address *</label>
                            <input type="text" name="address" class="form-control" required>
                        </div>
                        <!-- Nationality -->
                        <div class="col-md-6 mb-3">
                            <label>Nationality *</label>
                            <input type="text" name="nationality" class="form-control" required>
                        </div>
                        <!-- Passport -->
                        <div class="col-md-6 mb-3">
                            <label>Passport Number</label>
                            <input type="text" name="passport_number" class="form-control">
                        </div>
                        <!-- Emergency Name -->
                        <div class="col-md-6 mb-3">
                            <label>Emergency Contact Name *</label>
                            <input type="text" name="emergency_contact_name" class="form-control" required>
                        </div>
                        <!-- Emergency Phone -->
                        <div class="col-md-6 mb-3">
                            <label>Emergency Contact Number *</label>
                            <input type="text" name="emergency_contact_number" class="form-control" required>
                        </div>
                        <!-- Role -->
                        <div class="col-md-6 mb-3">
                            <label>Role *</label>
                            <select name="role" class="form-select" required>
                                <option value="Customer" selected>Customer</option>
                                <option value="Driver">Driver</option>
                                <option value="Admin">Admin</option>
                            </select>
                        </div>
                        <!-- Status -->
                        <div class="col-md-6 mb-3">
                            <label>Status *</label>
                            <select name="status" class="form-select" required>
                                <option value="active" selected>Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
                        </div>
                        <!-- Notes -->
                        <div class="col-md-12 mb-3">
                            <label>Special Preference Notes</label>
                            <textarea name="special_preference_notes" class="form-control" placeholder="Dietary restrictions, accessibility needs, special requests..."></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-success">Add User</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

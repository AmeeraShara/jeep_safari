@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        @include('layouts.admin')

        <!-- Main Content -->
        <div class="col-md-9 col-lg-10 p-4">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h4>All Users</h4>
                <a href="{{ route('admin.users.create') }}" class="btn btn-outline-success btn-sm">
                    + Add New User
                </a>
            </div>

            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <!-- Filter Form aligned right -->
            <form method="GET" action="{{ route('admin.users.index') }}" 
                  class="d-flex justify-content-end align-items-center mb-3 gap-2 flex-nowrap" 
                  style="flex-wrap: nowrap;">

                <select name="role" class="form-select form-select-sm" onchange="this.form.submit()" 
                        style="width: 120px; font-size: 0.75rem; padding: 0.15rem 0.3rem;">
                    <option value="">All Roles</option>
                    <option value="customer" {{ request('role') == 'customer' ? 'selected' : '' }}>Customer</option>
                    <option value="admin" {{ request('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                    <option value="manager" {{ request('role') == 'manager' ? 'selected' : '' }}>Manager</option>
                </select>

                <select name="status" class="form-select form-select-sm" onchange="this.form.submit()" 
                        style="width: 120px; font-size: 0.75rem; padding: 0.15rem 0.3rem;">
                    <option value="">All Statuses</option>
                    <option value="active" {{ request('status') == 'active' ? 'selected' : '' }}>Active</option>
                    <option value="inactive" {{ request('status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
                </select>

                <button type="submit" class="btn btn-success btn-sm" 
                        style="width: 120px; font-size: 0.75rem; padding: 0.25rem 0.5rem;">
                    Filter
                </button>
            </form>

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
                            <a href="{{ route('admin.users.show', $user->id) }}" class="btn btn-sm me-1" title="View">
                                <i class="fa-solid fa-eye"></i>
                            </a>
                            <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-sm me-1" title="Edit">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a>
                            <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure to delete this user?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm" title="Delete">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
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
@endsection

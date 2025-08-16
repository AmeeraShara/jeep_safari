@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        @include('layouts.admin')

        <!-- Main Content -->
        <div class="col-md-9 col-lg-10 p-4">
            <h4>Admin Settings</h4>

            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <div class="card shadow-sm">
                <div class="card-body">
                    <form action="{{ route('admin.settings.update') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" name="name" id="name" class="form-control" 
                                   value="{{ $admin->name ?? '' }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" id="email" class="form-control" 
                                   value="{{ $admin->email ?? '' }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Password (leave blank to keep old)</label>
                            <input type="password" name="password" id="password" class="form-control">
                        </div>

                        <button type="submit" class="btn btn-success">Save Changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

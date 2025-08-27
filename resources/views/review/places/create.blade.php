@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">Add a New Place</h5>
                </div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    <form action="{{ route('places.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <!-- Place Name -->
                        <div class="mb-3">
                            <label for="name" class="form-label">Place Name *</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                            @error('name') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <!-- Location -->
                        <div class="mb-3">
                            <label for="location" class="form-label">Location</label>
                            <input type="text" class="form-control" id="location" name="location">
                            @error('location') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <!-- Description -->
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="4"></textarea>
                            @error('description') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <!-- Image Upload -->
                        <div class="mb-3">
                            <label for="image" class="form-label">Upload Image</label>
                            <input type="file" class="form-control" id="image" name="image" accept="image/*">
                            @error('image') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <button type="submit" class="btn btn-success">Save Place</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

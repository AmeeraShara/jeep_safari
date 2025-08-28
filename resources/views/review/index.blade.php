{{-- resources/views/reviews/index.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container" style="max-width: 900px;">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Traveler Reviews</h2>
        <a href="{{ route('review.create') }}" class="btn btn-primary">Write a Review</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if($reviews->isEmpty())
        <div class="text-center py-5">
            <h4>No reviews yet</h4>
            <p>Be the first to share your experience!</p>
            <a href="{{ route('review.create') }}" class="btn btn-success">Write First Review</a>
        </div>
    @else
        @foreach($reviews as $review)
            <div class="card mb-4 shadow-sm">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start">
                        <h5 class="card-title mb-2">{{ $review->title }}</h5>
                        <span class="badge bg-primary">{{ $review->rating }}/5</span>
                    </div>
                    
                    <div class="text-warning mb-2" style="font-size: 1.2rem;">
                        @for ($i = 1; $i <= 5; $i++)
                            @if($i <= $review->rating) ★ @else ☆ @endif
                        @endfor
                    </div>

                    <p class="card-text">{{ $review->comment }}</p>

                    <div class="mb-3">
                        <strong>Visited:</strong> {{ $review->visit_date->format('M d, Y') }} | 
                        <strong>With:</strong> {{ $review->companions }}
                    </div>

                    @if($review->photos && count($review->photos) > 0)
                        <div class="mt-3">
                            <h6>Photos:</h6>
                            <div class="d-flex flex-wrap gap-2">
                                @foreach($review->photos as $photo)
                                    <img src="{{ Storage::url($photo) }}" 
                                         alt="Review photo" 
                                         style="width: 100px; height: 100px; object-fit: cover;"
                                         class="rounded border">
                                @endforeach
                            </div>
                        </div>
                    @endif

                    <div class="d-flex justify-content-between align-items-center mt-3">
                        <small class="text-muted">
                            By {{ $review->username }} • 
                            {{ $review->created_at->diffForHumans() }}
                        </small>
                        <small class="text-muted">
                            Place: {{ $review->place->name }}
                        </small>
                    </div>
                </div>
            </div>
        @endforeach

        {{ $reviews->links() }}
    @endif
</div>
@endsection
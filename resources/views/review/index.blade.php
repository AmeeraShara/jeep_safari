@extends('layouts.app')

@section('content')
<div class="container" style="max-width: 900px;">
    <h2 class="mb-4">Traveler Reviews</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @foreach($reviews as $review)
        <div class="card mb-3 shadow-sm">
            <div class="card-body">
                <h5 class="mb-1">{{ $review->title }}</h5>
                <p class="text-warning" style="font-size:1.2rem;">
                    @for ($i=1; $i<=5; $i++)
                        @if($i <= $review->rating) ★ @else ☆ @endif
                    @endfor
                </p>
                <p>{{ $review->comment }}</p>
                <p><strong>Visited:</strong> {{ $review->visit_date->format('d M, Y') ?? '' }} | 
                   <strong>With:</strong> {{ $review->companions }}</p>

                @if($review->photos)
                    <div class="mt-2">
                        @foreach($review->photos as $photo)
                            <img src="{{ asset('storage/'.$photo) }}" style="max-width:100px; margin-right:5px;">
                        @endforeach
                    </div>
                @endif

                <small class="text-muted">By {{ $review->username }} at {{ $review->place->name }}</small>
            </div>
        </div>
    @endforeach
</div>
@endsection

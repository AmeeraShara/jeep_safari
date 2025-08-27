@extends('layouts.app')

@section('content')
<div class="container" style="max-width: 1100px;">
    <h2 class="mb-4">Write a Review</h2>

    <div class="row">
        <!-- LEFT: Place Search -->
        <div class="col-md-5">
            <label class="form-label">Search for a Place</label>
            <input type="text" id="placeSearch" class="form-control" placeholder="Type a place name...">
            <ul id="searchResults" class="list-group mt-2"></ul>

            <div id="selectedPlace" class="mt-4 d-none">
                <div class="card shadow-sm">
                    <img id="placeImage" src="" class="card-img-top" style="max-height:200px; object-fit:cover;">
                    <div class="card-body">
                        <h5 id="placeName"></h5>
                        <p id="placeDesc" class="text-muted"></p>
                        <input type="hidden" name="place_id" id="place_id">
                    </div>
                </div>
            </div>
        </div>

        <!-- RIGHT: Review Form -->
        <div class="col-md-7">
            <form action="{{ route('review.store') }}" method="POST" enctype="multipart/form-data" id="reviewForm" class="d-none">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Your Name</label>
                    <input type="text" name="username" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" required>
                </div>

                <!-- Star Rating -->
                <h4>Rate your experience</h4>
                <div id="starRating" class="mb-3">
                    @for($i=1; $i<=5; $i++)
                        <span class="star" data-value="{{ $i }}" style="font-size:2rem; cursor:pointer;">☆</span>
                    @endfor
                    <input type="hidden" name="rating" id="rating" required>
                </div>

                <!-- Visit Date -->
                <div class="mb-3">
                    <label class="form-label">When did you visit?</label>
                    <input type="date" name="visit_date" class="form-control" required>
                </div>

                <!-- Companions -->
                <div class="mb-3">
                    <label class="form-label">Who did you go with?</label>
                    <select name="companions" class="form-select" required>
                        <option value="">Select</option>
                        <option value="Friends">Friends</option>
                        <option value="Family">Family</option>
                        <option value="Couples">Couples</option>
                        <option value="Solo">Solo</option>
                        <option value="Business">Business</option>
                    </select>
                </div>

                <!-- Title & Comment -->
                <div class="mb-3">
                    <label class="form-label">Title</label>
                    <input type="text" name="title" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Comment</label>
                    <textarea name="comment" rows="5" class="form-control" required></textarea>
                </div>

                <!-- Photos -->
                <div class="mb-3">
                    <label class="form-label">Photos (optional)</label>
                    <input type="file" name="photos[]" class="form-control" multiple>
                    <div id="photoPreview" class="mt-2"></div>
                </div>

                <!-- Agreement -->
                <div class="form-check mb-3">
                    <input type="checkbox" name="agreement" class="form-check-input" required>
                    <label class="form-check-label">I confirm this is my genuine experience.</label>
                </div>

                <button class="btn btn-success">Submit Review</button>
            </form>
        </div>
    </div>
</div>

<script>
    // Place search
    document.getElementById('placeSearch').addEventListener('keyup', function() {
        let query = this.value;
        if(query.length < 2) return;

        fetch(`/review/search-place?q=` + query)
            .then(res => res.json())
            .then(data => {
                let results = document.getElementById('searchResults');
                results.innerHTML = '';
                data.forEach(place => {
                    let li = document.createElement('li');
                    li.className = 'list-group-item list-group-item-action';
                    li.innerHTML = place.name;
                    li.onclick = function() {
                        document.getElementById('selectedPlace').classList.remove('d-none');
                        document.getElementById('reviewForm').classList.remove('d-none');
                        document.getElementById('place_id').value = place.id;
                        document.getElementById('placeName').innerText = place.name;
                        document.getElementById('placeDesc').innerText = place.description ?? '';
                        document.getElementById('placeImage').src = place.image ?? 'https://via.placeholder.com/400x200';
                        results.innerHTML = '';
                        document.getElementById('placeSearch').value = place.name;
                    };
                    results.appendChild(li);
                });
            });
    });

    // Star rating
    document.querySelectorAll('#starRating .star').forEach(star => {
        star.addEventListener('click', function() {
            let value = this.dataset.value;
            document.getElementById('rating').value = value;
            document.querySelectorAll('#starRating .star').forEach(s => {
                s.textContent = s.dataset.value <= value ? '★' : '☆';
            });
        });
    });

    // Photo preview
    document.querySelector('input[name="photos[]"]').addEventListener('change', function() {
        let preview = document.getElementById('photoPreview');
        preview.innerHTML = '';
        Array.from(this.files).forEach(file => {
            let reader = new FileReader();
            reader.onload = function(e) {
                let img = document.createElement('img');
                img.src = e.target.result;
                img.style.maxWidth = '100px';
                img.style.marginRight = '5px';
                preview.appendChild(img);
            }
            reader.readAsDataURL(file);
        });
    });
</script>
@endsection

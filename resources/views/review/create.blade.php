<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Write a Review</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .star {
            font-size: 2rem;
            cursor: pointer;
            color: #ddd;
            transition: color 0.2s;
        }
        .star:hover, .star.active {
            color: #ffc107;
        }
        .photo-preview {
            max-width: 100px;
            height: 100px;
            object-fit: cover;
            margin-right: 10px;
            margin-bottom: 10px;
            border-radius: 4px;
        }
        .search-result-item:hover {
            background-color: #f8f9fa;
            cursor: pointer;
        }
        #selectedPlace {
            transition: opacity 0.3s ease;
        }
    </style>
</head>
<body>
    <div class="container py-4" style="max-width: 1100px;">
        <h2 class="mb-4">Write a Review</h2>
        
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="row">
            <!-- LEFT: Place Search -->
            <div class="col-md-5">
                <div class="mb-3">
                    <label class="form-label">Search for a Place</label>
                    <input type="text" id="placeSearch" class="form-control" placeholder="Type a place name...">
                    <div class="form-text">Start typing to search for places</div>
                    <div id="searchLoading" class="spinner-border text-primary mt-2 d-none" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                    <ul id="searchResults" class="list-group mt-2"></ul>
                </div>

                <div id="selectedPlace" class="mt-4 d-none">
                    <div class="card shadow-sm">
                        <img id="placeImage" src="" class="card-img-top" style="max-height:200px; object-fit:cover;">
                        <div class="card-body">
                            <h5 id="placeName"></h5>
                            <p id="placeAddress" class="text-muted small mb-1"></p>
                            <p id="placeDesc" class="text-muted"></p>
                            <input type="hidden" name="place_id" id="place_id">
                            <button type="button" id="changePlace" class="btn btn-sm btn-outline-secondary">Change Place</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- RIGHT: Review Form -->
            <div class="col-md-7">
                <form action="{{ route('review.store') }}" method="POST" enctype="multipart/form-data" id="reviewForm" class="d-none">
                    @csrf

                    <input type="hidden" name="place_id" id="formPlaceId">

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Your Name <span class="text-danger">*</span></label>
                                <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" 
                                    value="{{ old('username') }}" required>
                                @error('username')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Email <span class="text-danger">*</span></label>
                                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" 
                                    value="{{ old('email') }}" required>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Star Rating -->
                    <div class="mb-3">
                        <label class="form-label">Rate your experience <span class="text-danger">*</span></label>
                        <div id="starRating" class="d-flex align-items-center">
                            @for($i=1; $i<=5; $i++)
                                <span class="star me-1" data-value="{{ $i }}">☆</span>
                            @endfor
                            <span id="ratingText" class="ms-2 text-muted"></span>
                        </div>
                        <input type="hidden" name="rating" id="ratingInput" value="{{ old('rating', 0) }}" required>
                        @error('rating')
                            <div class="text-danger small">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Visit Date -->
                    <div class="mb-3">
                        <label class="form-label">When did you visit? <span class="text-danger">*</span></label>
                        <input type="date" name="visit_date" class="form-control @error('visit_date') is-invalid @enderror" 
                            value="{{ old('visit_date') }}" max="{{ date('Y-m-d') }}" required>
                        @error('visit_date')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Companions -->
                    <div class="mb-3">
                        <label class="form-label">Who did you go with? <span class="text-danger">*</span></label>
                        <select name="companions" class="form-select @error('companions') is-invalid @enderror" required>
                            <option value="">Select...</option>
                            <option value="Friends" {{ old('companions') == 'Friends' ? 'selected' : '' }}>Friends</option>
                            <option value="Family" {{ old('companions') == 'Family' ? 'selected' : '' }}>Family</option>
                            <option value="Couples" {{ old('companions') == 'Couples' ? 'selected' : '' }}>Couples</option>
                            <option value="Solo" {{ old('companions') == 'Solo' ? 'selected' : '' }}>Solo</option>
                            <option value="Business" {{ old('companions') == 'Business' ? 'selected' : '' }}>Business</option>
                        </select>
                        @error('companions')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Title & Comment -->
                    <div class="mb-3">
                        <label class="form-label">Title <span class="text-danger">*</span></label>
                        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" 
                            value="{{ old('title') }}" required>
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Comment <span class="text-danger">*</span></label>
                        <textarea name="comment" rows="5" class="form-control @error('comment') is-invalid @enderror" 
                            required>{{ old('comment') }}</textarea>
                        <div class="form-text">Minimum 10 characters</div>
                        @error('comment')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Photos -->
                    <div class="mb-3">
                        <label class="form-label">Photos (optional)</label>
                        <input type="file" name="photos[]" class="form-control @error('photos.*') is-invalid @enderror" 
                            multiple accept="image/jpeg,image/png">
                        <div class="form-text">Max 5 images. JPG or PNG only, max 2MB each.</div>
                        <div id="photoPreview" class="d-flex flex-wrap mt-2"></div>
                        @error('photos.*')
                            <div class="text-danger small">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Agreement -->
                    <div class="form-check mb-3">
                        <input type="checkbox" name="agreement" class="form-check-input @error('agreement') is-invalid @enderror" 
                            id="agreementCheck" {{ old('agreement') ? 'checked' : '' }} required>
                        <label class="form-check-label" for="agreementCheck">I confirm this is my genuine experience.</label>
                        @error('agreement')
                            <div class="text-danger small">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-success">Submit Review</button>
                </form>
                
                <div id="formPlaceholder" class="text-center p-4 border rounded bg-light">
                    <p class="mb-0">Please select a place to start your review</p>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Elements
            const placeSearch = document.getElementById('placeSearch');
            const searchResults = document.getElementById('searchResults');
            const searchLoading = document.getElementById('searchLoading');
            const selectedPlace = document.getElementById('selectedPlace');
            const reviewForm = document.getElementById('reviewForm');
            const formPlaceholder = document.getElementById('formPlaceholder');
            const changePlaceBtn = document.getElementById('changePlace');
            const formPlaceId = document.getElementById('formPlaceId');
            
            // Place search with debounce
            let searchTimeout;
            placeSearch.addEventListener('input', function() {
                clearTimeout(searchTimeout);
                const query = this.value.trim();
                
                if (query.length < 2) {
                    searchResults.innerHTML = '';
                    return;
                }
                
                searchLoading.classList.remove('d-none');
                
                searchTimeout = setTimeout(() => {
                    fetch(`/review/search-place?q=${encodeURIComponent(query)}`)
                        .then(res => {
                            if (!res.ok) throw new Error('Search failed');
                            return res.json();
                        })
                        .then(data => {
                            searchResults.innerHTML = '';
                            if (data.length === 0) {
                                const li = document.createElement('li');
                                li.className = 'list-group-item';
                                li.textContent = 'No places found';
                                searchResults.appendChild(li);
                                return;
                            }
                            
                            data.forEach(place => {
                                const li = document.createElement('li');
                                li.className = 'list-group-item search-result-item';
                                li.innerHTML = `
                                    <div class="fw-bold">${place.name}</div>
                                    <div class="small text-muted">${place.address || ''}</div>
                                `;
                                li.addEventListener('click', function() {
                                    selectPlace(place);
                                });
                                searchResults.appendChild(li);
                            });
                        })
                        .catch(error => {
                            console.error('Search error:', error);
                            searchResults.innerHTML = '';
                            const li = document.createElement('li');
                            li.className = 'list-group-item text-danger';
                            li.textContent = 'Error searching places. Please try again.';
                            searchResults.appendChild(li);
                        })
                        .finally(() => {
                            searchLoading.classList.add('d-none');
                        });
                }, 500);
            });
            
            // Select a place from search results
            function selectPlace(place) {
                selectedPlace.classList.remove('d-none');
                reviewForm.classList.remove('d-none');
                formPlaceholder.classList.add('d-none');
                formPlaceId.value = place.id;
                
                document.getElementById('place_id').value = place.id;
                document.getElementById('placeName').textContent = place.name;
                document.getElementById('placeAddress').textContent = place.address || '';
                document.getElementById('placeDesc').textContent = place.description || '';
                document.getElementById('placeImage').src = place.image || 'https://via.placeholder.com/400x200?text=No+Image';
                
                placeSearch.value = place.name;
                searchResults.innerHTML = '';
            }
            
            // Change place button
            changePlaceBtn.addEventListener('click', function() {
                selectedPlace.classList.add('d-none');
                reviewForm.classList.add('d-none');
                formPlaceholder.classList.remove('d-none');
                placeSearch.value = '';
                placeSearch.focus();
            });
            
            // Star rating functionality
            const stars = document.querySelectorAll('.star');
            const ratingInput = document.getElementById('ratingInput');
            const ratingText = document.getElementById('ratingText');
            
            const ratingLabels = {
                1: 'Poor',
                2: 'Fair',
                3: 'Good',
                4: 'Very Good',
                5: 'Excellent'
            };
            
            stars.forEach(star => {
                star.addEventListener('click', function() {
                    const value = parseInt(this.dataset.value);
                    ratingInput.value = value;
                    updateStars(value);
                    
                    if (ratingText) {
                        ratingText.textContent = ratingLabels[value] || '';
                    }
                });
                
                star.addEventListener('mouseover', function() {
                    const value = parseInt(this.dataset.value);
                    updateStars(value, true);
                });
                
                star.addEventListener('mouseout', function() {
                    const currentValue = parseInt(ratingInput.value);
                    updateStars(currentValue);
                });
            });
            
            function updateStars(value, isHover = false) {
                stars.forEach(star => {
                    const starValue = parseInt(star.dataset.value);
                    if (starValue <= value) {
                        star.textContent = '★';
                        star.classList.add('active');
                    } else {
                        star.textContent = '☆';
                        star.classList.remove('active');
                    }
                });
                
                if (ratingText && !isHover) {
                    ratingText.textContent = value > 0 ? ratingLabels[value] : '';
                }
            }
            
            // Initialize stars if there's an old value
            const oldRating = parseInt(ratingInput.value);
            if (oldRating > 0) {
                updateStars(oldRating);
            }
            
            // Photo preview functionality
            const photoInput = document.querySelector('input[name="photos[]"]');
            const photoPreview = document.getElementById('photoPreview');
            
            photoInput.addEventListener('change', function() {
                photoPreview.innerHTML = '';
                const files = this.files;
                
                if (files.length > 5) {
                    alert('Maximum 5 photos allowed. Only the first 5 will be uploaded.');
                }
                
                for (let i = 0; i < Math.min(files.length, 5); i++) {
                    const file = files[i];
                    if (!file.type.match('image/jpeg') && !file.type.match('image/png')) {
                        alert('Only JPG and PNG images are allowed.');
                        this.value = '';
                        photoPreview.innerHTML = '';
                        return;
                    }
                    
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        const img = document.createElement('img');
                        img.src = e.target.result;
                        img.className = 'photo-preview';
                        img.alt = 'Preview';
                        photoPreview.appendChild(img);
                    };
                    reader.readAsDataURL(file);
                }
            });
            
            // Form validation before submit
            reviewForm.addEventListener('submit', function(e) {
                if (!formPlaceId.value) {
                    e.preventDefault();
                    alert('Please select a place for your review.');
                    return;
                }
                
                const rating = parseInt(ratingInput.value);
                if (rating < 1 || rating > 5) {
                    e.preventDefault();
                    alert('Please provide a rating.');
                    return;
                }
            });
        });
    </script>
</body>
</html>
@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}"> <!-- Add CSRF token meta tag -->
    <title>Write a Review - JeepSafari Style</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --ta-green: #34E0A1;
            --ta-dark-green: #00aa6c;
            --ta-orange: #FF6200;
            --ta-dark: #2B2B2B;
            --ta-light: #F8F9FA;
            --ta-border: #e6e6e6;
        }
 
        body {
            background-color: #f4f4f4;
            color: var(--ta-dark);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        .container {
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            padding: 25px;
            margin-top: 20px;
            margin-bottom: 40px;
        }
        
        .header {
            border-bottom: 1px solid var(--ta-border);
            padding-bottom: 15px;
            margin-bottom: 25px;
        }
        
        .logo {
            color: var(--ta-green);
            font-weight: bold;
            font-size: 28px;
        }
        
        .logo span {
            color: var(--ta-dark-green);
        }
        
        h2 {
            font-weight: 700;
            color: var(--ta-dark);
            margin: 0;
        }
        
        .form-label {
            font-weight: 600;
            color: var(--ta-dark);
            margin-bottom: 8px;
        }
        
        .form-control, .form-select {
            border: 2px solid var(--ta-border);
            border-radius: 4px;
            padding: 10px 15px;
        }
        
        .form-control:focus, .form-select:focus {
            border-color: var(--ta-green);
            box-shadow: 0 0 0 0.25rem rgba(52, 224, 161, 0.25);
        }
        
        .star {
            font-size: 2rem;
            cursor: pointer;
            color: #ddd;
            transition: color 0.2s;
        }
        
        .star:hover, .star.active {
            color: var(--ta-orange);
        }
        
        .rating-text {
            font-weight: 600;
            margin-left: 15px;
        }
        
        .photo-preview {
            width: 100px;
            height: 100px;
            object-fit: cover;
            margin-right: 10px;
            margin-bottom: 10px;
            border-radius: 4px;
            border: 1px solid var(--ta-border);
        }
        
        .search-result-item:hover {
            background-color: #f8f9fa;
            cursor: pointer;
        }
        
        .btn-success {
            background-color: var(--ta-green);
            border-color: var(--ta-green);
            color: white;
            font-weight: 600;
            padding: 10px 20px;
            border-radius: 4px;
        }
        
        .btn-success:hover {
            background-color: var(--ta-dark-green);
            border-color: var(--ta-dark-green);
        }
        
        .btn-outline-secondary {
            border: 2px solid var(--ta-border);
            font-weight: 600;
            border-radius: 4px;
        }
        
        .place-card {
            border: 1px solid var(--ta-border);
            border-radius: 8px;
            overflow: hidden;
            transition: all 0.3s ease;
        }
        
        .place-card:hover {
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        
        .required-asterisk {
            color: var(--ta-orange);
        }
        
        .section-title {
            font-size: 18px;
            font-weight: 600;
            color: var(--ta-dark);
            padding-bottom: 8px;
            border-bottom: 2px solid var(--ta-green);
            margin-bottom: 20px;
        }
        
        .character-count {
            font-size: 12px;
            color: #6c757d;
            text-align: right;
        }
        
        .alert-danger {
            background-color: #ffebee;
            color: #c62828;
            border: 1px solid #ffcdd2;
            border-radius: 4px;
        }
        
        .form-text {
            color: #6c757d !important;
            font-size: 13px;
        }
        
        #photoPreview {
            min-height: 110px;
            padding: 10px;
            background: var(--ta-light);
            border-radius: 4px;
            border: 1px dashed var(--ta-border);
        }
        
        .companion-badge {
            display: inline-block;
            padding: 5px 15px;
            margin: 0 8px 8px 0;
            border: 2px solid var(--ta-border);
            border-radius: 30px;
            cursor: pointer;
            transition: all 0.2s;
        }
        
        .companion-badge.active {
            background-color: var(--ta-green);
            color: white;
            border-color: var(--ta-green);
        }
        
        #searchResults {
            max-height: 300px;
            overflow-y: auto;
            border: 2px solid var(--ta-border);
            border-radius: 4px;
        }
        
        .success-message {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
            border-radius: 4px;
            padding: 15px;
            margin-bottom: 20px;
        }
        
        .error-message {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
            border-radius: 4px;
            padding: 15px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container py-4" style="max-width: 1200px;">
        <div class="header d-flex justify-content-between align-items-center">
<div class="logo d-flex align-items-center">
    <img src="{{ asset('jeep.jpeg') }}" alt="Jeep Safari Logo" style="height:28px; margin-right:6px;">
    <span class="fw-bold">Jeep <span style="color:#28a745;">Safari</span></span>
</div>
            <h2><i class="fas fa-pencil-alt me-2"></i>Write a Review</h2>
        </div>
        
        <!-- Success/Error Messages -->
        <div id="successMessage" class="success-message d-none">
            <i class="fas fa-check-circle me-2"></i>
            <span id="successText"></span>
        </div>
        
        <div id="errorMessage" class="error-message d-none">
            <i class="fas fa-exclamation-circle me-2"></i>
            <span id="errorText"></span>
        </div>

        <div class="row">
            <!-- LEFT: Place Search -->
            <div class="col-lg-5">
                <div class="mb-4">
                    <div class="section-title">Find a place to review</div>
                    <label class="form-label">Search for a place <span class="required-asterisk">*</span></label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-search"></i></span>
                        <input type="text" id="placeSearch" class="form-control" placeholder="Type a place name...">
                    </div>
                    <div class="form-text">Start typing to search for places</div>
                    <div id="searchLoading" class="spinner-border text-primary mt-2 d-none" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                    <ul id="searchResults" class="list-group mt-2"></ul>
                </div>

                <div id="selectedPlace" class="mt-4 d-none">
                    <div class="section-title">Selected place</div>
                    <div class="card place-card">
                        <img id="placeImage" src="" class="card-img-top" style="height: 180px; object-fit: cover;">
                        <div class="card-body">
                            <h5 id="placeName" class="card-title"></h5>
                            <p id="placeAddress" class="text-muted small mb-1"></p>
                            <p id="placeDesc" class="card-text text-muted"></p>
                            <input type="hidden" name="place_id" id="place_id">
                            <button type="button" id="changePlace" class="btn btn-sm btn-outline-secondary">
                                <i class="fas fa-exchange-alt me-1"></i>Change Place
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- RIGHT: Review Form -->
            <div class="col-lg-7">
                <form action="{{ route('review.store') }}" method="POST" enctype="multipart/form-data" id="reviewForm" class="d-none">
                    @csrf

                    <input type="hidden" name="place_id" id="formPlaceId">

                    <div class="section-title">Your review details</div>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Your Name <span class="required-asterisk">*</span></label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                    <input type="text" name="username" class="form-control" 
                                        value="{{ old('username') }}" required>
                                </div>
                                <div class="invalid-feedback" id="usernameError"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Email <span class="required-asterisk">*</span></label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                    <input type="email" name="email" class="form-control" 
                                        value="{{ old('email') }}" required>
                                </div>
                                <div class="invalid-feedback" id="emailError"></div>
                            </div>
                        </div>
                    </div>

                    <!-- Star Rating -->
                    <div class="mb-4">
                        <label class="form-label">Rate your experience <span class="required-asterisk">*</span></label>
                        <div id="starRating" class="d-flex align-items-center">
                            @for($i=1; $i<=5; $i++)
                                <span class="star me-1" data-value="{{ $i }}">☆</span>
                            @endfor
                            <span id="ratingText" class="rating-text ms-3">Select your rating</span>
                        </div>
                        <input type="hidden" name="rating" id="ratingInput" value="{{ old('rating', 0) }}" required>
                        <div class="invalid-feedback" id="ratingError"></div>
                    </div>

                    <!-- Visit Date -->
                    <div class="mb-3">
                        <label class="form-label">When did you visit? <span class="required-asterisk">*</span></label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                            <input type="date" name="visit_date" class="form-control" 
                                value="{{ old('visit_date') }}" max="{{ date('Y-m-d') }}" required>
                        </div>
                        <div class="invalid-feedback" id="visitDateError"></div>
                    </div>

                    <!-- Companions -->
                    <div class="mb-4">
                        <label class="form-label">Who did you go with? <span class="required-asterisk">*</span></label>
                        <div class="d-flex flex-wrap">
                            <span class="companion-badge" data-value="Friends">Friends</span>
                            <span class="companion-badge" data-value="Family">Family</span>
                            <span class="companion-badge" data-value="Couples">Couples</span>
                            <span class="companion-badge" data-value="Solo">Solo</span>
                            <span class="companion-badge" data-value="Business">Business</span>
                        </div>
                        <select name="companions" class="form-select d-none" required>
                            <option value="">Select...</option>
                            <option value="Friends" {{ old('companions') == 'Friends' ? 'selected' : '' }}>Friends</option>
                            <option value="Family" {{ old('companions') == 'Family' ? 'selected' : '' }}>Family</option>
                            <option value="Couples" {{ old('companions') == 'Couples' ? 'selected' : '' }}>Couples</option>
                            <option value="Solo" {{ old('companions') == 'Solo' ? 'selected' : '' }}>Solo</option>
                            <option value="Business" {{ old('companions') == 'Business' ? 'selected' : '' }}>Business</option>
                        </select>
                        <div class="invalid-feedback" id="companionsError"></div>
                    </div>

                    <!-- Title & Comment -->
                    <div class="mb-3">
                        <label class="form-label">Review Title <span class="required-asterisk">*</span></label>
                        <input type="text" name="title" class="form-control" 
                            value="{{ old('title') }}" placeholder="Summarize your experience" required>
                        <div class="invalid-feedback" id="titleError"></div>
                    </div>
                    
                    <div class="mb-4">
                        <label class="form-label">Your Review <span class="required-asterisk">*</span></label>
                        <textarea name="comment" rows="5" class="form-control" 
                            placeholder="Share details of your experience at this place" required>{{ old('comment') }}</textarea>
                        <div class="d-flex justify-content-between">
                            <div class="form-text">Minimum 10 characters</div>
                            <div class="character-count"><span id="charCount">0</span>/2000 characters</div>
                        </div>
                        <div class="invalid-feedback" id="commentError"></div>
                    </div>

                    <!-- Photos -->
                    <div class="mb-4">
                        <label class="form-label">Add Photos (optional)</label>
                        <div class="input-group">
                            <input type="file" name="photos[]" class="form-control" 
                                multiple accept="image/jpeg,image/png" id="photoInput">
                            <label class="input-group-text" for="photoInput"><i class="fas fa-camera"></i></label>
                        </div>
                        <div class="form-text">Max 5 images. JPG or PNG only, max 2MB each.</div>
                        <div id="photoPreview" class="d-flex flex-wrap mt-2"></div>
                        <div class="invalid-feedback" id="photosError"></div>
                    </div>

                    <!-- Agreement -->
                    <div class="form-check mb-4">
                        <input type="checkbox" name="agreement" class="form-check-input" 
                            id="agreementCheck" {{ old('agreement') ? 'checked' : '' }} required>
                        <label class="form-check-label" for="agreementCheck">I confirm this is my genuine experience and I have no personal or business relationship with this establishment, and have not been offered any incentive or payment from the establishment to write this review.</label>
                        <div class="invalid-feedback" id="agreementError"></div>
                    </div>

                    <div class="d-grid">
                        <button type="submit" class="btn btn-success btn-lg">
                            <i class="fas fa-paper-plane me-2"></i>Submit Review
                        </button>
                    </div>
                </form>
                
                <div id="formPlaceholder" class="text-center p-5 border rounded bg-light">
                    <i class="fas fa-search fa-3x mb-3" style="color: #ccc;"></i>
                    <h4>Select a place to review</h4>
                    <p class="text-muted">Search for a place on the left to start your review</p>
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
            const companionBadges = document.querySelectorAll('.companion-badge');
            const companionsSelect = document.querySelector('select[name="companions"]');
            const commentTextarea = document.querySelector('textarea[name="comment"]');
            const charCount = document.getElementById('charCount');
            const successMessage = document.getElementById('successMessage');
            const errorMessage = document.getElementById('errorMessage');
            const successText = document.getElementById('successText');
            const errorText = document.getElementById('errorText');
            
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
                                    <div class="d-flex align-items-center">
                                        <img src="${place.image || 'https://via.placeholder.com/50?text=No+Image'}" 
                                            alt="${place.name}" style="width: 50px; height: 50px; object-fit: cover; border-radius: 4px;">
                                        <div class="ms-3">
                                            <div class="fw-bold">${place.name}</div>
                                            <div class="small text-muted">${place.address || ''}</div>
                                        </div>
                                    </div>
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
                1: 'Terrible',
                2: 'Poor',
                3: 'Average',
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
                    ratingText.textContent = value > 0 ? ratingLabels[value] : 'Select your rating';
                }
            }
            
            // Initialize stars if there's an old value
            const oldRating = parseInt(ratingInput.value);
            if (oldRating > 0) {
                updateStars(oldRating);
            }
            
            // Companion selection
            companionBadges.forEach(badge => {
                badge.addEventListener('click', function() {
                    companionBadges.forEach(b => b.classList.remove('active'));
                    this.classList.add('active');
                    companionsSelect.value = this.dataset.value;
                });
            });
            
            // Initialize companion selection if there's an old value
            if (companionsSelect.value) {
                document.querySelector(`.companion-badge[data-value="${companionsSelect.value}"]`).classList.add('active');
            }
            
            // Character count for comment
            commentTextarea.addEventListener('input', function() {
                const length = this.value.length;
                charCount.textContent = length;
                
                if (length > 2000) {
                    charCount.style.color = 'red';
                } else {
                    charCount.style.color = '#6c757d';
                }
            });
            
            // Initialize character count
            charCount.textContent = commentTextarea.value.length;
            
            // Photo preview functionality
            const photoInput = document.querySelector('input[name="photos[]"]');
            const photoPreview = document.getElementById('photoPreview');
            
            photoInput.addEventListener('change', function() {
                photoPreview.innerHTML = '';
                const files = this.files;
                
                if (files.length > 5) {
                    showError('Maximum 5 photos allowed. Only the first 5 will be uploaded.');
                    // Truncate to 5 files
                    this.files = Array.from(files).slice(0, 5);
                    return;
                }
                
                for (let i = 0; i < Math.min(files.length, 5); i++) {
                    const file = files[i];
                    if (!file.type.match('image/jpeg') && !file.type.match('image/png')) {
                        showError('Only JPG and PNG images are allowed.');
                        this.value = '';
                        photoPreview.innerHTML = '';
                        return;
                    }
                    
                    if (file.size > 2 * 1024 * 1024) {
                        showError('Image size must be less than 2MB.');
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
                        
                        const removeBtn = document.createElement('button');
                        removeBtn.className = 'position-absolute top-0 start-0 btn btn-sm btn-danger';
                        removeBtn.innerHTML = '&times;';
                        removeBtn.style.padding = '0.15rem 0.35rem';
                        removeBtn.style.fontSize = '0.7rem';
                        
                        const container = document.createElement('div');
                        container.className = 'position-relative me-2 mb-2';
                        container.appendChild(img);
                        container.appendChild(removeBtn);
                        
                        removeBtn.addEventListener('click', function(e) {
                            e.preventDefault();
                            container.remove();
                            
                            // Create a new FileList without the removed file
                            const dt = new DataTransfer();
                            for (let j = 0; j < files.length; j++) {
                                if (j !== i) dt.items.add(files[j]);
                            }
                            photoInput.files = dt.files;
                        });
                        
                        photoPreview.appendChild(container);
                    };
                    reader.readAsDataURL(file);
                }
            });
            
            // Form submission with AJAX
            reviewForm.addEventListener('submit', function(e) {
                e.preventDefault();
                
                // Basic validation
                if (!formPlaceId.value) {
                    showError('Please select a place for your review.');
                    return;
                }
                
                const rating = parseInt(ratingInput.value);
                if (rating < 1 || rating > 5) {
                    showError('Please provide a rating.');
                    return;
                }
                
                if (commentTextarea.value.length > 2000) {
                    showError('Your comment exceeds the maximum character limit of 2000.');
                    return;
                }
                
                // Hide any previous messages
                successMessage.classList.add('d-none');
                errorMessage.classList.add('d-none');
                
                // Create FormData object
                const formData = new FormData(this);
                
                // Submit form via AJAX
                fetch(this.action, {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    }
                })
                .then(response => {
                    if (!response.ok) {
                        return response.json().then(err => {
                            throw err;
                        });
                    }
                    return response.json();
                })
                .then(data => {
                    if (data.success) {
                        showSuccess(data.message || 'Review submitted successfully!');
                        // Reset form
                        this.reset();
                        // Reset stars
                        updateStars(0);
                        // Reset companions
                        companionBadges.forEach(b => b.classList.remove('active'));
                        // Reset photo preview
                        photoPreview.innerHTML = '';
                        // Reset character count
                        charCount.textContent = '0';
                        charCount.style.color = '#6c757d';
                        
                        // Redirect after 2 seconds if needed
                        setTimeout(() => {
                            if (data.redirect) {
                                window.location.href = data.redirect;
                            }
                        }, 2000);
                    } else {
                        // Show validation errors
                        if (data.errors) {
                            let errorHtml = '';
                            for (const [field, errors] of Object.entries(data.errors)) {
                                errorHtml += errors.join('<br>') + '<br>';
                            }
                            showError(errorHtml);
                        } else {
                            showError(data.message || 'An error occurred while submitting your review.');
                        }
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    if (error.errors) {
                        let errorHtml = '';
                        for (const [field, errors] of Object.entries(error.errors)) {
                            errorHtml += errors.join('<br>') + '<br>';
                        }
                        showError(errorHtml);
                    } else {
                        showError(error.message || 'An error occurred while submitting your review. Please try again.');
                    }
                });
            });
            
            // Helper functions to show messages
            function showSuccess(message) {
                successText.innerHTML = message;
                successMessage.classList.remove('d-none');
                errorMessage.classList.add('d-none');
                // Scroll to top to show message
                window.scrollTo({ top: 0, behavior: 'smooth' });
            }
            
            function showError(message) {
                errorText.innerHTML = message;
                errorMessage.classList.remove('d-none');
                successMessage.classList.add('d-none');
                // Scroll to top to show message
                window.scrollTo({ top: 0, behavior: 'smooth' });
            }
        });
    </script>
</body>
</html>
@endsection
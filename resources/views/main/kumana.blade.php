@extends('layouts.app') {{-- Assuming you have a main layout with navbar/footer --}}

@section('content')
<style>
    /* Header image with overlay text */
    .hero-section {
        position: relative;
        height: 60vh;
        background: url('{{ asset('images/kumana-banner.jpg') }}') center/cover no-repeat;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .hero-section h1 {
        color: white;
        font-size: 3rem;
        font-weight: bold;
        text-shadow: 2px 2px 5px rgba(0,0,0,0.7);
        animation: fadeInDown 1s ease-in-out;
    }
    @keyframes fadeInDown {
        from {opacity: 0; transform: translateY(-20px);}
        to {opacity: 1; transform: translateY(0);}
    }

    /* Booking box */
    .booking-box {
        border: 1px solid #ccc;
        border-radius: 10px;
        padding: 20px;
        background: white;
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        animation: fadeIn 1.2s ease-in-out;
    }
    @keyframes fadeIn {
        from {opacity: 0;}
        to {opacity: 1;}
    }

    /* Review cards */
    .review-card {
        border-radius: 10px;
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }
    .review-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 20px rgba(0,0,0,0.15);
    }
</style>

<!-- Hero Section -->
<div class="hero-section">
    <h1>KUMANA NATIONAL PARK</h1>
</div>

<!-- Content -->
<div class="container my-5">
    <h2 class="mb-4">Kumana National Park and Safari</h2>
    <div class="row g-4">
        
        <!-- Left Column -->
        <div class="col-lg-8">
            <div class="row g-4">
                <div class="col-md-6">
                    <img src="{{ asset('images/kumana-deer.jpg') }}" class="img-fluid rounded shadow" alt="Kumana Safari">
                </div>
                <div class="col-md-6">
                    <p><strong>Tour Start:</strong> 5.30 AM</p>
                    <p><strong>Meeting Point:</strong> Hotels in Yala</p>
                    <p>Free Pick up & Drop off from Yala</p>
                    <p><strong>Vehicle:</strong> Safari Jeep</p>
                    <p><strong>Duration:</strong> 7 Hours</p>
                </div>
            </div>

            <div class="mt-4">
                <h4>Description</h4>
                <p>
                    You will be welcomed by your private Jeep driver at your hotel or provided pick-up location, 
                    who will take you to Kumana National Park for a thrilling wildlife safari. 
                    Witness the majestic Asian Elephant, spot exotic bird species, and enjoy the beauty of untouched nature.
                </p>
                <ul>
                    <li>Private Safari Jeep</li>
                    <li>Professional Safari Driver</li>
                    <li>Entrance & Service Fees + Park VAT Tax</li>
                    <li>Free Hotel Pickup & Drop off (Yala)</li>
                    <li>English speaking guide</li>
                </ul>
            </div>
        </div>

        <!-- Right Column (Booking Form) -->
        <div class="col-lg-4">
            <div class="booking-box">
                <h5 class="text-success mb-3">Get A Free Quote & Book Online</h5>
                <form>
                    <div class="mb-3">
                        <label class="form-label">Safari for Adult</label>
                        <input type="number" class="form-control" placeholder="Number of Adults">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Safari for Child</label>
                        <input type="number" class="form-control" placeholder="Number of Children">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Hotel Pickup / Drop (Optional)</label>
                        <input type="text" class="form-control" placeholder="Enter hotel name">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Total</label>
                        <input type="text" class="form-control" value="Rs" readonly>
                    </div>
                    <button type="submit" class="btn btn-success w-100">Book Now</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Reviews Section -->
    <div class="mt-5">
        <h4>Jeep Driver Reviews</h4>
        <div class="review-card border p-3 mb-3">
            <strong>Mr. Herath (Solo driver)</strong> <span class="text-success">4.9 ★</span>
            <p class="mb-1"><small>2024-09-10</small></p>
            <p>"Great safari experience! The driver is very supportive for travel."</p>
        </div>
        <div class="review-card border p-3 mb-3">
            <strong>Mr. Sampath (Yala Travel Committee)</strong> <span class="text-warning">3.9 ★</span>
            <p class="mb-1"><small>2024-09-15</small></p>
            <p>"Friendly guide and a well-organized trip."</p>
        </div>
        <div class="review-card border p-3">
            <strong>Mr. Ravi (Game Club Driver)</strong> <span class="text-success">4.9 ★</span>
            <p class="mb-1"><small>2025-05-12</small></p>
            <p>"Amazing wildlife sightings and professional service!"</p>
        </div>
    </div>
</div>
@endsection

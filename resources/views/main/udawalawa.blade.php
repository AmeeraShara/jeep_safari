@extends('layouts.app')

@section('content')
<style>
    .hero-section {
        position: relative;
        height: 60vh;
        background: url('{{ asset('images/hero-elephant.jpg') }}') center/cover no-repeat;
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
    <h1>UDAWALAWE NATIONAL PARK</h1>
</div>

<!-- Content -->
<div class="container my-5">
    <h2 class="mb-4">Udawalawe National Park and Safari</h2>
    <div class="row g-4">
        
        <!-- Left Column -->
        <div class="col-lg-8">
            <div class="row g-4">
                <div class="col-md-6">
                    <img src="{{ asset('images/udawalawa-elephant.jpg') }}" class="img-fluid rounded shadow" alt="Udawalawe Safari">
                </div>
                <div class="col-md-6">
                    <p><strong>Tour Start:</strong> 6.00 AM / 2.30 PM</p>
                    <p><strong>Meeting Point:</strong> Hotels near Udawalawe</p>
                    <p>Free Pick up & Drop off from Udawalawe area</p>
                    <p><strong>Vehicle:</strong> Safari Jeep</p>
                    <p><strong>Duration:</strong> 3–4 Hours</p>
                </div>
            </div>

            <div class="mt-4">
                <h4>Description</h4>
                <p>
                    Explore Udawalawe, the best park to see elephants in Sri Lanka. A paradise for wildlife lovers with open grasslands and herds of gentle giants.
                    Perfect for families and photographers.
                </p>
                <ul>
                    <li>Guaranteed Elephant Sightings</li>
                    <li>Private Jeep & Experienced Driver</li>
                    <li>Entry & Park Fees Included</li>
                    <li>Pickup & Drop (Udawalawe area)</li>
                    <li>Binoculars and Water Included</li>
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
            <strong>Mr. Sunil (Elephant Trail)</strong> <span class="text-success">4.8 ★</span>
            <p class="mb-1"><small>2025-03-10</small></p>
            <p>"Lots of elephants and a very safe ride. Highly recommended for families."</p>
        </div>
        <div class="review-card border p-3 mb-3">
            <strong>Ms. Kaushi (Wild Trek Tours)</strong> <span class="text-warning">4.3 ★</span>
            <p class="mb-1"><small>2025-04-15</small></p>
            <p>"The guide was very knowledgeable. We saw elephants, deer, and birds."</p>
        </div>
        <div class="review-card border p-3">
            <strong>Mr. Dilan (Udawalawe Safaris)</strong> <span class="text-success">4.9 ★</span>
            <p class="mb-1"><small>2025-07-20</small></p>
            <p>"Clean jeep, friendly driver, and a great experience overall."</p>
        </div>
    </div>
</div>
@endsection

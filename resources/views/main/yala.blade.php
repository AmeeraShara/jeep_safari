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
    <h1>YALA NATIONAL PARK</h1>
</div>

<!-- Content -->
<div class="container my-5">
    <h2 class="mb-4">Yala National Park and Safari</h2>
    <div class="row g-4">
        
        <!-- Left Column -->
        <div class="col-lg-8">
            <div class="row g-4">
                <div class="col-md-6">
                    <img src="{{ asset('images/yala-leopards.jpg') }}" class="img-fluid rounded shadow" alt="Yala Safari">
                </div>
                <div class="col-md-6">
                    <p><strong>Tour Start:</strong> 5.30 AM</p>
                    <p><strong>Meeting Point:</strong> Hotels near Yala</p>
                    <p>Free Pick up & Drop off from Yala</p>
                    <p><strong>Vehicle:</strong> Safari Jeep</p>
                    <p><strong>Duration:</strong> 7 Hours</p>
                </div>
            </div>

            <div class="mt-4">
                <h4>Description</h4>
                <p>
                    Explore Yala National Park with an expert guide and a private jeep. This park is famous for leopard sightings,
                    elephants, crocodiles, and more. A truly wild experience for nature lovers.
                </p>
                <ul>
                    <li>Private Safari Jeep</li>
                    <li>Park Entry Fees Included</li>
                    <li>Experienced Guide</li>
                    <li>Hotel Pick-up & Drop from Yala</li>
                    <li>Free Water Bottles & Snacks</li>
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
            <strong>Mr. Anura (Leopard Trail)</strong> <span class="text-success">5.0 ★</span>
            <p class="mb-1"><small>2024-12-01</small></p>
            <p>"Saw 3 leopards in one morning! Great guide with deep park knowledge."</p>
        </div>
        <div class="review-card border p-3 mb-3">
            <strong>Ms. Nadeesha (Jungle Line Tours)</strong> <span class="text-warning">4.2 ★</span>
            <p class="mb-1"><small>2025-01-05</small></p>
            <p>"Very friendly driver and smooth booking process."</p>
        </div>
        <div class="review-card border p-3">
            <strong>Mr. Lal (Wild Wonder Jeep Tours)</strong> <span class="text-success">4.8 ★</span>
            <p class="mb-1"><small>2025-06-22</small></p>
            <p>"We saw elephants, sloth bears and many birds. Wonderful safari!"</p>
        </div>
    </div>
</div>
@endsection

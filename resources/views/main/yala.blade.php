@extends('layouts.app')

@section('content')
<style>
    .hero-section {
        position: relative;
        height: 60vh;
        background: url('{{ asset('images/yala-banner.jpg') }}') center/cover no-repeat;
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

<div class="hero-section">
    <h1>YALA NATIONAL PARK</h1>
</div>

<div class="container my-5">
    <h2 class="mb-4">Yala National Park and Safari</h2>
    <div class="row g-4">
        <div class="col-lg-8">
            <div class="row g-4">
                <div class="col-md-6">
                    <img src="{{ asset('images/yala-leopard.jpg') }}" class="img-fluid rounded shadow" alt="Yala Safari">
                </div>
                <div class="col-md-6">
                    <p><strong>Tour Start:</strong> 5.30 AM</p>
                    <p><strong>Meeting Point:</strong> Hotels in Yala</p>
                    <p>Free Pick up & Drop off from Yala</p>
                    <p><strong>Vehicle:</strong> Safari Jeep</p>
                    <p><strong>Duration:</strong> 6 Hours</p>
                </div>
            </div>

            <div class="mt-4">
                <h4>Description</h4>
                <p>
                    Experience the thrill of spotting the elusive Sri Lankan leopard, elephants, and diverse wildlife in Yala — Sri Lanka’s most famous national park. Perfect for nature lovers and photographers.
                </p>
                <ul>
                    <li>Private Safari Jeep</li>
                    <li>Experienced Wildlife Guide</li>
                    <li>Park Entry Fees & Taxes</li>
                    <li>Hotel Pickup & Drop off (Yala)</li>
                </ul>
            </div>
        </div>

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

    <div class="mt-5">
        <h4>Jeep Driver Reviews</h4>
        <div class="review-card border p-3 mb-3">
            <strong>Mr. Nimal (Yala Guide)</strong> <span class="text-success">4.8 ★</span>
            <p class="mb-1"><small>2024-10-10</small></p>
            <p>"Amazing leopard sightings and great commentary from the guide."</p>
        </div>
        <div class="review-card border p-3 mb-3">
            <strong>Mr. Sunil</strong> <span class="text-success">4.7 ★</span>
            <p class="mb-1"><small>2024-11-05</small></p>
            <p>"Professional driver and well-planned safari route."</p>
        </div>
    </div>
</div>
@endsection

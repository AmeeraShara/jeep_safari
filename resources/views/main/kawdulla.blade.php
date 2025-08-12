@extends('layouts.app')

@section('content')
<style>
    .hero-section {
        position: relative;
        height: 60vh;
        background: url('{{ asset('images/kaudulla-banner.jpg') }}') center/cover no-repeat;
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
    <h1>KAUDULLA NATIONAL PARK</h1>
</div>

<div class="container my-5">
    <h2 class="mb-4">Kaudulla National Park and Safari</h2>
    <div class="row g-4">
        <div class="col-lg-8">
            <div class="row g-4">
                <div class="col-md-6">
                    <img src="{{ asset('images/kaudulla-elephants.jpg') }}" class="img-fluid rounded shadow" alt="Kaudulla Safari">
                </div>
                <div class="col-md-6">
                    <p><strong>Tour Start:</strong> 2.00 PM</p>
                    <p><strong>Meeting Point:</strong> Hotels in Habarana</p>
                    <p>Free Pick up & Drop off from Habarana</p>
                    <p><strong>Vehicle:</strong> Safari Jeep</p>
                    <p><strong>Duration:</strong> 4 Hours</p>
                </div>
            </div>
            <div class="mt-4">
                <h4>Description</h4>
                <p>
                    Kaudulla National Park is one of Sri Lanka’s best locations to see large gatherings of wild Asian elephants.
                    Your private safari will take you through lush grasslands and around the Kaudulla reservoir,
                    where herds often gather to drink and socialize.
                </p>
                <ul>
                    <li>Private Safari Jeep</li>
                    <li>Professional Safari Driver</li>
                    <li>Entrance & Service Fees + Park VAT Tax</li>
                    <li>Free Hotel Pickup & Drop off (Habarana)</li>
                    <li>English speaking guide</li>
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
            <strong>Mr. Nimal (Kaudulla Specialist)</strong> <span class="text-success">4.8 ★</span>
            <p class="mb-1"><small>2024-11-02</small></p>
            <p>"Amazing to see over 100 elephants in one place. The driver was very knowledgeable."</p>
        </div>
        <div class="review-card border p-3 mb-3">
            <strong>Mr. Ruwan (Eco Tours)</strong> <span class="text-warning">4.2 ★</span>
            <p class="mb-1"><small>2025-01-20</small></p>
            <p>"Great service, and the jeep was very comfortable."</p>
        </div>
    </div>
</div>
@endsection

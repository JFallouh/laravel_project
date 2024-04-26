@extends('layouts.app')

@section('content')
    <!-- Hero Section -->
    <section class="hero bg-dark text-white py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <h1>Welcome to James FALLOUH Hotel</h1>
                    <p class="lead">Discover Your Perfect Stay</p>
                    <p>Experience luxury at our hotel located in the heart of Montreal. Whether you're visiting for business or leisure, we have everything you need for a comfortable stay.</p>
                    <a href="{{ url('/rooms') }}" class="btn btn-primary">Book Now</a>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section class="about py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h2>About Us</h2>
                    <p>Welcome to James FALLOUH Hotel, a premier destination for travelers seeking comfort, convenience, and luxury. Our hotel offers modern amenities, personalized service, and a prime location in the heart of Montreal.</p>
                    <p>With spacious and elegantly designed rooms, state-of-the-art facilities, and attentive staff, we strive to make your stay unforgettable. Whether you're here for business meetings, family vacations, or romantic getaways, we have everything you need for a memorable experience.</p>
                </div>
                <div class="col-md-6">
                    <img src="{{ asset('images/hotel.jpg') }}" class="img-fluid" alt="Hotel Image">
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="features bg-light py-5">
        <div class="container">
            <h2 class="text-center mb-4">Our Features</h2>
            <div class="row">
                <div class="col-md-4">
                    <div class="feature-item">
                        <i class="fas fa-wifi"></i>
                        <h4>Free Wi-Fi</h4>
                        <p>Stay connected with complimentary high-speed internet access throughout the hotel.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-item">
                        <i class="fas fa-utensils"></i>
                        <h4>Restaurant</h4>
                        <p>Indulge in delicious cuisine at our on-site restaurant, offering a diverse menu for breakfast, lunch, and dinner.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-item">
                        <i class="fas fa-concierge-bell"></i>
                        <h4>24/7 Concierge</h4>
                        <p>Our dedicated concierge team is available round the clock to assist you with any queries or requests.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

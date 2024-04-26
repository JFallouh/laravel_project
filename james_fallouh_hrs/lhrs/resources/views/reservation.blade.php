@extends('layouts.app')

@section('content')
<div class="container">
    <!-- Check if there is a success flash message -->
    @if(Session::has('success'))
    <div class="alert alert-success">
        {{ Session::get('success') }}
    </div>
    @endif
    <h1>Reservations</h1>
    <div class="row">
        @foreach($bookings as $booking)
        <div class="col-md-4 mb-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Booking ID: {{ $booking->id }}</h5>
                    <p class="card-text">Customer Name: {{ $booking->customer->name }}</p>
                    <p class="card-text">Room Number: {{ $booking->room->number }}</p>
                    <p class="card-text">Check-in Date: {{ $booking->check_in_date }}</p>
                    <p class="card-text">Check-out Date: {{ $booking->check_out_date }}</p>
                    <!-- Add more booking details as needed -->
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <!-- Pagination Links -->
    <div class="d-flex justify-content-center">
        {{ $bookings->links() }}
    </div>
</div>
@endsection

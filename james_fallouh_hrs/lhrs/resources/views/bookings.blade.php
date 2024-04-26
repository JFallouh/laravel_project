@extends('layouts.app')

@section('content')

<div class="container">
    <h1 class="text-center mb-4">Book a Room</h1>
    
    <!-- Booking Form -->
    <form action="{{ route('book.room', ['room_id' => $room->id]) }}" method="POST">
        @csrf
        
        <!-- Room Details -->
        <h3>Room Details</h3>
        <p><strong>Room Number:</strong> {{ $room->number }}</p>
        <p><strong>Capacity:</strong> {{ $room->capacity }}</p>
        <p><strong>Rate:</strong> ${{ $room->rate }}</p>
        <!-- Add more room details here -->
        
        <!-- Logged-in Customer Details -->
        <h3>Your Details</h3>
        <p><strong>Name:</strong> {{ auth()->user()->name }}</p>
        <p><strong>Email:</strong> {{ auth()->user()->email }}</p>
        <!-- Add more customer details here if needed -->
        
        <!-- Check-in Date -->
        <div class="form-group">
            <label for="check_in_date">Check-in Date</label>
            <input type="date" class="form-control" id="check_in_date" name="check_in_date" required>
        </div>

        <!-- Check-out Date -->
        <div class="form-group">
            <label for="check_out_date">Check-out Date</label>
            <input type="date" class="form-control" id="check_out_date" name="check_out_date" required>
        </div>
        
        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

@endsection

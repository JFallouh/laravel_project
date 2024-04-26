@extends('layouts.app')

@section('content')


<div class="container">
    <h1 ss="text-center mb-4" style="color: #333; font-family: 'Arial', sans-serif; font-weight: bold;">Rooms</h1>
    <div class="row">
        @foreach($rooms as $room)
        <div class="col-md-4 mb-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title" style="color: #333; font-weight: bold;">Room Number: {{ $room->number }}</h5>
                    <p class="card-text" style="color: #666; font-size: 16px;" >Capacity: {{ $room->capacity }}</p>
                    <p class="card-text" style="color: #666; font-size: 16px;">Rate: ${{ $room->rate }}</p>
                    <!--  end of room details  -->
                    
                    @auth <!-- Check if user is authenticated -->
                        <a href="{{ route('bookings.index', ['room_id' => $room->id]) }}" class="btn btn-primary" style="background-color: #007bff; border-color: #007bff;">Book Now</a>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-primary" style="background-color: #007bff; border-color: #007bff;">Login or Register to Book</a>
                        <!-- Flash message for non-authenticated users -->
                        <div class="alert alert-info mt-3" role="alert">
                            Please login or create an account to be able to book a room.
                        </div>
                    @endauth

               
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <!-- Pagination links -->
    <div class="d-flex justify-content-center">
        {{ $rooms->links() }}
    </div>
</div>
@endsection

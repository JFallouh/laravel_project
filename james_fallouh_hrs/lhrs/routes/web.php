<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HotelController;
use App\Models\Room; // Import the Room model
use App\Models\Booking;
use App\Models\Customer;
Route::get('/', function () {
    return view('welcome');
});
//Route::get('/rooms', [HotelController::class, 'index'])->name('rooms.index');
//Route::get('/rooms/{id}', [HotelController::class, 'showRoom'])->name('rooms.show');
//Route::post('/book-room', [HotelController::class, 'bookRoom'])->name('rooms.book');
//Route::post('/reservation', [HotelController::class, 'reservation'])->name('reservation.show');

Route::get('/rooms', function () {
   // Fetch all rooms from the database with pagination (6 rooms per page)
   $rooms = Room::paginate(6);
   // $rooms = Room::all(); //  Room is the model for rooms table

    // Pass the $rooms variable to the view
    return view('rooms', compact('rooms'));
});

// Contact Page Route
Route::get('/contact', function () {
    // Logic to display contact page
    return view('contact');
});

Route::get('/reservations', function () {
    // Retrieve all bookings from the database
    //$bookings = Booking::all();
    // Retrieve paginated bookings from the database (3 bookings per page)
    $bookings = Booking::paginate(6);


    // Pass the bookings data to the view
    return view('reservation', compact('bookings'));
});

// Login Route
Route::get('/login', function () {
    // Logic to display login form
    return view('auth.login');
})->name('login'); // Give a name to the route

// Registration Route
Route::get('/register', function () {
    // Logic to display registration form
    return view('auth.register');
})->name('register'); // Give a name to the route



/*
Route::get('/', function () {
    // Logic to display reservation page
    return view('reservation');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
});
*/
Route::get('/customers', [HotelController::class, 'customers'])->name('customers.index');

// Registration
Route::post('/register', [HotelController::class, 'register'])->name('register');

// Login
Route::post('/login', [HotelController::class, 'login'])->name('login');

// Logout
//Route::post('/logout', 'HotelController@logout')->name('logout');
Route::post('/logout', [HotelController::class, 'logout'])->name('logout');


// booking
Route::get('/bookings/{room_id}', [HotelController::class, 'bookRoom'])->name('bookings.index');
Route::post('/book-room/{room_id}', [HotelController::class, 'storeBooking'])->name('book.room');


//montreal
Route::get('/montreal', function () {
    // Logic to display contact page
    return view('montreal');
});
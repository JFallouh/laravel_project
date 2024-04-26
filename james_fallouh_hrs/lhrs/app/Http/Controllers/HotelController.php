<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Room;
use App\Models\Booking;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
class HotelController extends Controller
{
    /**
     * Display the home page.
     */
    public function index()
{
    $rooms = Room::all(); // Fetch all rooms from the database
    return view('rooms', compact('rooms'));
}

    public function showRooms($id)
    {
        $rooms = Room::all();
        return view('room_details', ['id' => $id]);
    }

    /**
     * Handle room reservation.
     */
    /*
    public function bookRoom(Request $request)
    {
        // Validate the form data
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'check_in_date' => 'required|date',
            'check_out_date' => 'required|date|after:check_in_date',
            'room_id' => 'required|exists:rooms,id',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Create customer
        $customer = Customer::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
        ]);

        // Create booking
        $booking = Booking::create([
            'customer_id' => $customer->id,
            'room_id' => $request->input('room_id'),
            'check_in_date' => $request->input('check_in_date'),
            'check_out_date' => $request->input('check_out_date'),
        ]);

        // You can add more logic here, like sending confirmation email to the customer

        return redirect()->route('reservation.confirmation');
    }
*/
    /**
     * Display the reservation confirmation page.
     */
    public function showConfirmation()
    {
        return view('reservation_confirmation');
    }

    public function reservation()
    {
        // Logic to display reservation page
        return view('reservation');
    }

    


    public function customers()
    {
        $customers = Customer::paginate(10); //  pagination
        return view('customers.index', compact('customers'));
    }


    public function register(Request $request)
{
    // Validate the form data
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255|unique:customers',
        'phone' => 'required|string|max:20',
        'password' => 'required|string|min:8|confirmed',
    ]);

    // Create a new user
    $user = Customer::create([
        'name' => $validatedData['name'],
        'email' => $validatedData['email'],
        'phone' => $validatedData['phone'],
        'password' =>$validatedData['password'],
        //'password' => Hash::make($validatedData['password']),
    ]);

    // Log in the user or redirect to a confirmation page
    
    Session::flash('success', 'You have successfully created your account please log in now.');
    // Redirect the user to the home page
    return redirect('/login');
}


/*
public function login(Request $request)
{
    $credentials = $request->only('email', 'password');
     
    // Decrypt the password before attempting authentication
    // $credentials['password'] = Customer::decryptPassword($credentials['password']);

    if (Auth::guard('web')->attempt($credentials)) {
        // Authentication passed...
        $user = Auth::guard('web')->user();
        session()->put('user_name', $user->name); // Store user's name in the session
        return redirect()->intended('/');
    }

    // Authentication failed...
    return redirect()->back()->withInput()->withErrors(['email' => 'Invalid email or password']);
}
*/

public function login(Request $request)
{
    $credentials = $request->only('email', 'password');

    // Retrieve the user by the email address
    $user = Customer::where('email', $credentials['email'])->first();

    // Check if a user was found and if the provided password matches
    if ($user && $user->password === $credentials['password']) {
        // Authentication passed...
        Auth::guard('web')->login($user);
        session()->put('user_name', $user->name); // Store user's name in the session
        return redirect()->intended('/');
    }

    // Authentication failed...
    return redirect()->back()->withInput()->withErrors(['email' => 'Invalid email or password']);
}





public function logout(Request $request)
{
    Auth::guard('web')->logout();
    $request->session()->invalidate();
    return redirect('/');
}

 

    public function bookRoom($room_id) {
        // Retrieve the room details based on the provided room_id
        $room = Room::findOrFail($room_id);
    
        // You can add any additional logic here, such as validating the room availability, etc.
    
        // Pass the room details to the booking form view
        return view('bookings', compact('room'));
    }
    


    public function storeBooking(Request $request, $room_id)
    {
        // Validate the form data
        $request->validate([
            'check_in_date' => 'required|date',
            'check_out_date' => 'required|date|after:check_in_date',
        ]);

        // Create booking
        Booking::create([
            'customer_id' => Auth::id(),
            'room_id' => $room_id,
            'check_in_date' => $request->input('check_in_date'),
            'check_out_date' => $request->input('check_out_date'),
            // Add more fields as needed
        ]);

         // Flash success message
    Session::flash('success', 'You have successfully submitted your reservation.');

    // Redirect to reservations page
    return redirect('/reservations');
    }


}
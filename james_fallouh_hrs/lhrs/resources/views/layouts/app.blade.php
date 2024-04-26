<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>James FALLOUH Hotel</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

    <style>
    /* Custom CSS for pagination arrow icons */
    .pagination .page-link {
        font-size: 16px; /* Adjust the font size as needed */
    }

    /* Custom styles */
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4; /* Light gray background */
    }

    .navbar {
        background-color: #007bff; /* Blue navbar */
    }

    .navbar-brand img {
        border-radius: 50%; /* Round logo image */
    }

    .navbar-nav .nav-link {
        color: #ffffff !important; /* White text color */
        margin-left: 20px; /* Add some space between navbar links */
    }

    .btn-outline-light {
        color: #007bff; /* Blue outline button text color */
        border-color: #007bff; /* Blue outline button border color */
    }

    .btn-outline-light:hover {
        background-color: #007bff; /* Change background color on hover */
        color: #ffffff; /* Change text color on hover */
    }

    .footer {
        background-color: #007bff; /* Blue footer */
        color: #ffffff; /* White text color */
    }
</style>

</head>
<body>
    <!-- Header Navbar -->
    <!--
    <header>
        <nav class="navbar navbar-expand-lg  text-white  bg-primary">
            <div class="container text-white ">
            <img class=" img-fluid navbar-brand rounded rounded-4" alt="logo" src="{{ asset('images/logo.png') }}" height="100" width="100">
-->
            <!-- <a class="navbar-brand text-white " href="#">JAMES FALLOUH Hotel</a>-->
               <!-- <button class="navbar-toggler text-white" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{url('/')}}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{url('/rooms')}}">Rooms</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ url('/reservation') }}">Reservation</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('login') }}">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('register') }}">Register</a>
                        </li>
                        
                    </ul>
                </div>
            </div>
        </nav>
    </header>-->
    <header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
        <img class=" img-fluid navbar-brand rounded rounded-4" alt="logo" src="{{ asset('images/logo.png') }}" height="50rem" width="50rem">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/rooms') }}">Rooms</a>
                    </li>

                    <li class="nav-item">
                            <a class="nav-link " href="{{ url('/reservations') }}">Reservations</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link " href="{{ url('/customers') }}">Customers</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link " href="{{ url('/montreal') }}">About Montreal</a>
                        </li>
                        
                   
                </ul>
            </div>
            
            <section >
            <ul class="navbar-nav ml-auto">
            @if(Auth::check())
            
                            <li class="nav-item">
                                <span class="nav-link">Welcome, {{ Session::get('user_name') }}</span>
                            </li>
                            <li class="nav-item">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="btn btn-outline-light mx-2  bg-warning text-white">Logout</button>
                                </form>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="btn btn-outline-light mx-2 bg-warning text-white" href="{{ route('login') }}">Login</a>
                            </li>
                        @endif
</ul>
</section>
           <section class="nav-item ">
                <!-- 
                        <a class="btn btn-outline-light mx-2 " href="{{ route('login') }}">Login</a> -->

                        <a class="btn btn-outline-light bg-success text-white " href="{{ route('register') }}">Register</a>
</section>
        </div>
    </nav>
</header>

    <!-- Main Content -->
    <main class="py-4">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="footer mt-auto py-3 bg-primary">
        <div class="container text-center ">
            <span class="text-white">Developed by James FALLOUH 6171620</span>
        </div>
    </footer>

    <!-- Bootstrap JS
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
     --><!-- Custom JS 
    <script src="{{ asset('js/custom.js') }}"></script>
    -->
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>

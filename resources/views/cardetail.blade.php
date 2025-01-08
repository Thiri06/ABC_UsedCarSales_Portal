<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Listing | EliteRides</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Spline+Sans+Mono&display=swap" rel="stylesheet">
    <style>
        html {
            height: 100%;
            box-sizing: border-box;
        }
        body {
            background-color: #010113;
            color: #dfe0fd;
            font-family: 'Spline Sans Mono', monospace;
            position: relative;
            margin: 0;
            min-height: 100%;
            padding-bottom: 40px;
            box-sizing: inherit;
        }

        .navbar-brand {
            font-size: 2rem;
            font-weight: bold;
            background: linear-gradient(45deg, #f36d33, #f9d423);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .navbar {
            background-color: #010113 !important;
            border-bottom: 1px solid #a5a7e2;
        }

        .navbar-nav .nav-link {
            color: #dfe0fd !important;
            font-size: 1.1rem;
            margin-right: 20px;
        }

        .navbar a:hover {
            color: #dbf320 !important;
        }

        .navbar-nav .login-link {
            background-color: #f36d33;
            color: #fff !important;
            border-radius: 5px;
            padding: 10px 15px;
        }

        .navbar-nav .register-link {
            background-color: #dbf320;
            color: #010113 !important;
            border-radius: 5px;
            padding: 10px 15px;
        }

        .navbar-nav .login-link:hover {
            background-color: #dbf320;
            color: #010113 !important;
        }

        .navbar-nav .register-link:hover {
            background-color: #f36d33;
            color: #fff !important;
        }

        footer {
            background-color: #010113;
            color: #dfe0fd;
            padding: 10px 10px;
            position: absolute;
            right: 0;
            left: 0;
            bottom: 0;
            width: 100%;
            margin-top: 20px;
            border-top: 1px solid #a5a7e2;
        }

        .btn-primary {
            background-color: #f36d33;
            border: none;
        }

        .btn-primary:hover {
            background-color: #dbf320;
            color: #010113;
        }

        .form-label {
            color: #dfe0fd;
        }

        .form-control {
            background-color: #23244d;
            color: #dfe0fd;
            border: 1px solid #787cf8;
        }

        .form-control:focus {
            background-color: #2d2f65;
            color: #dfe0fd;
            border-color: #f36d33;
            box-shadow: 0 0 5px rgba(243, 109, 51, 0.5);
        }

        .form-card {
            border-radius: 8px;
            padding: 20px;
            margin: 20px 0;
        }

        .form-card h2 {
            color: #dfe0fd;
        }

        .bid-form {
            border-radius: 8px;
            box-shadow: 0 0 20px  rgb(25, 26, 65);
        }

        .appointment-form {
            border-radius: 8px;
            box-shadow: 0 0 20px  rgb(25, 26, 65);
        }

        .row-cols-2 .col, .row-cols-md-3 .col {
            background-color: transparent;
            padding: 15px;
            border-radius: 8px;
            transition: transform 0.3s ease;
        }

        .row-cols-2 .col:hover, .row-cols-md-3 .col:hover {
            background-color: #383b7a;
            transform: scale(1.05);
        }

        .row-cols-2 .col i, .row-cols-md-3 .col i {
            color: #dbf320;
        }

        .row-cols-2 .col p, .row-cols-md-3 .col p {
            margin: 0;
            color: #dfe0fd;
            font-size: 14px;
        }

    </style>
</head>
<body>
    <!-- Navigation Bar Start -->
    <nav class="navbar navbar-expand-lg navbar-dark sticky-top">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">
                <i class="fas fa-car-side"></i>
                EliteRides</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item mt-1"><a class="nav-link" href="{{ route('home') }}">Home</a></li>
                    <li class="nav-item mt-1"><a class="nav-link" href="{{ route('sell.my.car') }}">Sell My Car</a></li>
                    <li class="nav-item mt-1"><a class="nav-link" href="{{ route('car.listing') }}">Buy Car</a></li>
                    <li class="nav-item mt-1"><a class="nav-link" href="{{ route('contact.us') }}">Contact Us</a></li>
                    @if (Route::has('login'))
                        @auth
                            <li class="nav-item mt-1"><a class="nav-link" href="{{ url('/dashboard') }}">Dashboard</a></li>
                        @else
                            <li class="nav-item mt-1"><a class="nav-link login-link" href="{{ route('login') }}">Login</a></li>
                            @if (Route::has('register'))
                                <li class="nav-item mt-1"><a class="nav-link register-link" href="{{ route('register') }}">Register</a></li>
                            @endif
                        @endauth
                    @endif
                </ul>
            </div>
        </div>
    </nav>
    <br>
    <!-- Navigation Bar End -->

    {{-- Back Button --}}
    <a href="{{ route('car.listing') }}" class="btn btn-dark ms-5 mb-4">
        <i class="fa fa-arrow-left"></i> Back
    </a>

    {{-- selected car detail area start --}}
    <div class="container">
        <div class="row justify-content-center g-5">
            {{-- Single large car image --}}
            <div class="col-12 col-md-7">
                <div class="form-card p-2">
                    <!-- Car Name at the Top -->
                    <h2 class="text-start my-2 mb-4"># {{ $car->make }} {{ $car->model }}</h2>
                    
                    <!-- Full-Width Image -->
                    <img src="{{ asset($car->img_path) }}" 
                        alt="{{ $car->make }} {{ $car->model }}" 
                        class="img-fluid w-100 rounded">

                    <h4 class="mt-4 mb-3">Description</h4>
                    {{-- Description Section --}}
                    <p class="mb-5">{{ $car->description }}</p>
                </div>
            </div>

            {{-- Bidding area, a form with two input fields, one is already filled with selected car's make and model while one is the input field for bidding amount with a placeholder of initial price --}}
            <div class="col-12 col-md-3">
                <br>
                <br>
                <div class="form-card bid-form mt-5">
                    <h4 class="mb-3">Place Your Bid</h4>
                    <p>Current Highest Bid: <strong>${{ $car->highest_bid }}</strong></p>
                    <form action="#" method="POST">
                    {{-- <form action="{{ route('place.bid', $car->id) }}" method="POST"> --}}
                        @csrf
                        <div class="mb-3">
                            <label for="bidAmount" class="form-label">Your Bid</label>
                            <input type="number" class="form-control" id="bidAmount" name="bid_amount" placeholder="Enter your bid" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Place Bid</button>
                    </form>
                </div>
            </div>
        </div>

        {{-- Details and Appointment Sections --}}
        <div class="row justify-content-center g-5">
            {{-- Detail Section --}}
            <div class="col-12 col-md-7 mb-5">
                <div class="form-card">
                    <h4 class="mb-5">Details</h4>
                    <div class="row row-cols-2 row-cols-md-3 g-4">
                        <div class="col text-center">
                            <i class="fa-solid fa-car-side fa-2x"></i>
                            <p class="mt-2 mb-1"><strong>Condition</strong></p>
                            <p>{{ $car->condition }}</p>
                        </div>
                        <div class="col text-center">
                            <i class="fa-solid fa-calendar-alt fa-2x"></i>
                            <p class="mt-2 mb-1"><strong>Registration Year</strong></p>
                            <p>{{ $car->registration_year }}</p>
                        </div>
                        <div class="col text-center">
                            <i class="fa-solid fa-tag fa-2x"></i>
                            <p class="mt-2 mb-1"><strong>Price</strong></p>
                            <p>${{ number_format($car->price) }}</p>
                        </div>
                        <div class="col text-center">
                            <i class="fa-solid fa-gas-pump fa-2x"></i>
                            <p class="mt-2 mb-1"><strong>Fuel Type</strong></p>
                            <p>{{ $car->fuel_type }}</p>
                        </div>
                        <div class="col text-center">
                            <i class="fa-solid fa-cogs fa-2x"></i>
                            <p class="mt-2 mb-1"><strong>Transmission</strong></p>
                            <p>{{ $car->transmission }}</p>
                        </div>
                        <div class="col text-center">
                            <i class="fa-solid fa-people-arrows fa-2x"></i>
                            <p class="mt-2 mb-1"><strong>Steering Position</strong></p>
                            <p>{{ $car->steering_position }}</p>
                        </div>
                        <div class="col text-center">
                            <i class="fa-solid fa-palette fa-2x"></i>
                            <p class="mt-2 mb-1"><strong>Color</strong></p>
                            <p>{{ $car->color }}</p>
                        </div>
                        <div class="col text-center">
                            <i class="fa-solid fa-bolt fa-2x"></i>
                            <p class="mt-2 mb-1"><strong>Engine Power</strong></p>
                            <p>{{ $car->engine_power }} cc</p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Appointment Taking Section --}}
            <div class="col-12 col-md-3 mb-5">
                <div class="form-card appointment-form">
                    <h4 class="mb-3">Schedule an Appointment</h4>
                    <form action="#" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="appointmentDate" class="form-label" aria-label="Select appointment date">Date</label>
                            <input type="date" class="form-control" id="appointmentDate" name="appointment_date" required>
                        </div>
                        <div class="mb-3">
                            <label for="appointmentTime" class="form-label" aria-label="Select appointment time">Time</label>
                            <input type="time" class="form-control" id="appointmentTime" name="appointment_time" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Request Appointment</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- selected car detail area end --}}

    <!-- Footer -->
    <footer class="text-center mt-5">
        <p class="mb-0">&copy; 2025 EliteRides. All rights reserved.</p>
    </footer>

    <script>
        document.getElementById('appointmentDate').min = new Date().toISOString().split("T")[0];
    </script>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

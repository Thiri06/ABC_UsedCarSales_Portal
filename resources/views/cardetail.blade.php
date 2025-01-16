<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Listing | ABC Cars </title>
    <!-- Bootstrap CSS -->
    <link rel="icon" href="{{ asset('images/car.png') }}" type="image/x-icon">
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
            font-size: 2.2rem;
            font-weight: bold;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .brand-text {
            background: linear-gradient(45deg, #f36d33 30%, #dbf320 70%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            letter-spacing: -1px;
        }

        .cars-text {
            font-weight: 500;
            font-size: 1.8rem;
        }

        .fa-car-side {
            color: #f36d33;
            margin-right: 5px;
        }

        .navbar {
            background-color: #010113 !important;
            border-bottom: 1px solid #a5a7e2;
        }

        .navbar-nav .nav-link {
            color: #dfe0fd !important;
            font-size: 1rem;
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
        .top-bar {
            text-align: center;
            background-color: #23244d;
            padding: 13px 13px;
            border-radius: 10px;
            color: #dbf320;
            font-weight: bold;
            text-shadow: 1px 1px 2px #000;
            margin-top: 20px;
            margin-right: 60px;
            margin-left: 60px;

        }
        .highlight-price {
            font-size: 2rem;
            color: #f36d33;
            font-weight: bold;
            text-shadow: 1px 1px 2px #000;
            background-color: #23244d;
            border-radius: 8px;
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
        .form-card {

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
        .text-danger {
            color: #f36d33;
            font-size: 0.85rem;
        }
        .d-none {
            display: none;
        }
        .desc {
            color: #a5a7e2;
            font-size: 13px;
        }
        .contact-owner-section {
            border-left: 8px solid #f36d33;
            background-color: #010113;

        }

        .contact-owner-section h5 {
            font-weight: bold;
            text-transform: uppercase;
        }

        .contact-owner-section p {
            font-size: 0.8rem;
            color:#a5a7e2;
        }

        .contact-owner-section p i {
            color: #dbf320;
        }


    </style>
</head>
<body>
    <!-- Navigation Bar Start -->
    <nav class="navbar navbar-expand-lg navbar-dark sticky-top">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">
                <i class="fas fa-car-side"></i>
                <span class="brand-text">ABC</span><span class="cars-text">cars</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item mt-1"><a class="nav-link" href="{{ route('home') }}">Home</a></li>
                    <li class="nav-item mt-1"><a class="nav-link" href="{{ route('about.us') }}">About Us</a></li>
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

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
            </ul>
        </div>
    @endif

    {{-- Back Button --}}
    <a href="{{ route('car.listing') }}" class="btn btn-dark ms-5 mb-4">
        <i class="fa fa-arrow-left"></i> Back
    </a>

    {{-- selected car detail area start --}}
    <div class="container">
        <div class="row justify-content-center g-5">
            <div class="col-12 col-md-12">
                <div class="top-bar">
                    <!-- Car Name at the Top -->
                    <h1 class="mt-1 mb-2"> {{ $car->make }} {{ $car->model }}</h1>
                    <span class="badge highlight-price fs-5 py-3">
                        <i class="fa-solid fa-tag"></i> ${{ number_format($car->price, 2) }}
                    </span>
                </div>
            </div>

            <div class="col-12 col-md-7">
                <div class="form-card p-0">
                    <!-- Full-Width Image -->
                    <img src="{{ asset('storage/' . $car->img_path) }}" 
                        alt="{{ $car->make }} {{ $car->model }}" 
                        class="img-fluid w-100 rounded mt-2">

                    <h4 class="mt-4 mb-1">Description</h4>
                    {{-- Description Section --}}
                    <p class="mb-5 desc">{{ $car->description }}</p>
                </div>
            </div>

            {{-- Bidding area, a form with two input fields, one is already filled with selected car's make and model while one is the input field for bidding amount with a placeholder of initial price --}}
            <div class="col-12 col-md-4">
                <div class="contact-owner-section mt-4 p-3 rounded shadow-sm">
                    <h5 class="text-primary mb-3">Contact the Owner</h5>
                    <div class="d-flex align-items-center">
                        <!-- Owner Details -->
                        <div>
                            <h6 class="mb-2"><strong> {{ $car->user->name }}</strong></h6>
                            <p class="mb-2">
                                <i class="fa-solid fa-envelope me-2"></i><strong> {{ $car->user->email }}</strong>
                            </p>
                            <p class="mb-2">
                                <i class="fa-solid fa-phone me-2"></i><strong> {{ $car->user->phone ?? 'Not Available' }}</strong>
                            </p>
                            <p class="mb-2">
                                <i class="fa-solid fa-location-dot me-2"></i><strong> {{ $car->user->address ?? 'Not Provided' }}</strong>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="form-card bid-form">
                    <h5 class="mb-3">Place Your Bid</h5>
                    <p style="font-size: 14px;">Current Highest Bid: <strong id="currentBid">${{ $car->highest_bid }}</strong></p>
                    <form action="{{ route('place.bid', $car->id) }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="bidAmount" class="form-label">Your Bid</label>
                            <input 
                                type="number" 
                                class="form-control" 
                                id="bidAmount" 
                                name="bid_amount" 
                                placeholder="Enter a bid higher than ${{ $car->highest_bid }}" 
                                required
                                min="{{ $car->highest_bid + 1 }}"
                            >
                            <small id="bidFeedback" class="text-danger d-none">Your bid must be higher than ${{ $car->highest_bid }}</small>
                        </div>
                        <button type="submit" class="btn btn-primary" id="placeBidBtn">Submit</button>
                    </form>
                    <!-- Dropdown for Bid History -->
                    <div class="mt-4">
                        <button 
                            class="btn btn-link text-decoration-none" 
                            type="button" 
                            data-bs-toggle="collapse" 
                            data-bs-target="#bidHistoryDropdown" 
                            aria-expanded="false" 
                            aria-controls="bidHistoryDropdown"
                        >
                            <i class="bi bi-clock-history fas fa-history"></i> View Bid History
                        </button>

                        <div class="collapse mt-2" id="bidHistoryDropdown">
                            <ul class="list-group" style="background-color: transparent;">
                                @forelse($bids as $bid)
                                    <li class="list-group-item border-0 p-1" style="background-color: transparent; font-size: 0.85rem; color:#dfe0fd;">
                                        <div>
                                            <strong>${{ $bid->bid_amount }}</strong> by {{ $bid->user->name }} 
                                            on {{ $bid->created_at->format('d M, Y h:i A') }}
                                        </div>
                                        <hr class="my-1" style="border-color: #c0c1de;" />
                                    </li>
                                @empty
                                    <li class="list-group-item border-0 p-1" style="background-color: transparent; font-size: 0.85rem;">
                                        No bids yet.
                                    </li>
                                @endforelse
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Details and Appointment Sections --}}
        <div class="row justify-content-center g-5">
            {{-- Detail Section --}}
            <div class="col-12 col-md-7 mb-5">
                <div class="form-card p-0">
                    <h4 class="mb-5 text-start">Details</h4>
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
            <div class="col-12 col-md-4 mb-5">
                <div class="form-card appointment-form">
                    <h4 class="mb-3">Schedule an Appointment</h4>
                    <form action="{{ route('request.appointment', $car->id) }}" method="POST" id="appointmentForm">
                        @csrf
                        <div class="mb-3">
                            <label for="appointmentDate" class="form-label" aria-label="Select appointment date">Date</label>
                             <input 
                                type="date" 
                                class="form-control" 
                                id="appointmentDate" 
                                name="appointment_date" 
                                min="{{ date('Y-m-d') }}" 
                                required>
                            <small id="dateFeedback" class="text-danger d-none">Selected date is unavailable.</small>
                        </div>
                        <div class="mb-3">
                            <label for="appointmentTime" class="form-label" aria-label="Select appointment time">Time</label>
                            <input 
                                type="time" 
                                class="form-control" 
                                id="appointmentTime" 
                                name="appointment_time" 
                                required>
                            <small id="timeFeedback" class="text-danger d-none">Selected time is unavailable.</small>
                        </div>
                        <button type="submit" class="btn btn-primary" id="requestAppointmentBtn">Request Appointment</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- selected car detail area end --}}

    <!-- Footer -->
    <footer class="text-center mt-5">
        <p class="mb-0">&copy; 2025 ABC Cars . All rights reserved.</p>
    </footer>

    <script>
        document.getElementById('bidAmount').addEventListener('input', function () {
            const currentBid = parseFloat(document.getElementById('currentBid').innerText.replace('$', ''));
            const bidAmount = parseFloat(this.value);
            const feedback = document.getElementById('bidFeedback');
            
            if (bidAmount <= currentBid) {
                feedback.classList.remove('d-none');
                document.getElementById('placeBidBtn').disabled = true;
            } else {
                feedback.classList.add('d-none');
                document.getElementById('placeBidBtn').disabled = false;
            }
        });

        const unavailableDates = ['2025-01-15', '2025-01-18']; // Example unavailable dates
        const unavailableTimes = ['13:00', '14:00']; // Example unavailable times

        document.getElementById('appointmentDate').addEventListener('input', function () {
            const selectedDate = this.value;
            const feedback = document.getElementById('dateFeedback');
            
            if (unavailableDates.includes(selectedDate)) {
                feedback.classList.remove('d-none');
                document.getElementById('requestAppointmentBtn').disabled = true;
            } else {
                feedback.classList.add('d-none');
                document.getElementById('requestAppointmentBtn').disabled = false;
            }
        });

        document.getElementById('appointmentTime').addEventListener('input', function () {
            const selectedTime = this.value;
            const feedback = document.getElementById('timeFeedback');
            
            if (unavailableTimes.includes(selectedTime)) {
                feedback.classList.remove('d-none');
                document.getElementById('requestAppointmentBtn').disabled = true;
            } else {
                feedback.classList.add('d-none');
                document.getElementById('requestAppointmentBtn').disabled = false;
            }
        });

    </script>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

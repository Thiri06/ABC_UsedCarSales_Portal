<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EliteRides - Homepage</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Spline+Sans+Mono&display=swap" rel="stylesheet">
    <style>
        body {
            background-color: #010113;
            font-family: 'Spline Sans Mono', monospace;
        }
        .navbar-brand {
            font-size: 2rem;
            font-weight: bold;
            background: linear-gradient(45deg, #f36d33, #f9d423);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .navbar {
            background-color: #787cf8 !important;
        }

        .navbar-nav .nav-link {
            color: #dfe0fd !important;
            margin-right: 20px; /* Adjust the value to your liking */
        }

        .navbar a:hover {
            color: #dbf320 !important;
        }

        /* Custom styles for Login and Register links */
        .navbar-nav .login-link {
            background-color: #f36d33;
            color: #fff !important;
            border-radius: 5px;
            padding: 5px 10px;
        }

        .navbar-nav .register-link {
            background-color: #dbf320;
            color: #010113 !important;
            border-radius: 5px;
            padding: 5px 10px;
        }

        /* Hover effects for Login and Register links */
        .navbar-nav .login-link:hover {
            background-color: #dbf320;
            color: #010113 !important;
        }

        .navbar-nav .register-link:hover {
            background-color: #f36d33;
            color: #fff !important;
        }

        .hero-section {
            background-color: #010113;
            padding: 60px 20px;
        }

        .hero-text h1 {
            font-size: 2.5rem;
            font-weight: bold;
            color: #dbf320;
        }

        .hero-text p {
            font-size: 1.25rem;
        }
        .hero-image {
            width: 100%;
            max-width: 580px;
            height: auto;
        }

        .btn-dark {
            background-color: #963108;
            border: none;
        }

        .btn-dark:hover {
            background-color: #dbf320;
            color: #010113;
        }

        .btn-outline-dark {
            border-color: #dbf320;
            color: #dbf320;
        }

        .btn-outline-dark:hover {
            background-color: #dbf320;
            color: #010113;
        }

        .how-it-works {
            background-color: #010113;
            padding: 40px 20px;
            text-align: center;
        }

        .card {
            background-color: #787cf8;
            color: #dfe0fd;
            padding: 1px;
        }

        .highlight-name {
            color: #dbf320; /* Bright yellow */
            font-weight: bold;
            text-shadow: 1px 1px 2px #000; /* Add some shadow for emphasis */
        }

        .highlight-price {
            color: #f36d33; /* Bright orange */
            font-size: 1.25rem; /* Slightly larger font size */
            font-weight: bold;
            text-shadow: 1px 1px 2px #000; /* Shadow for contrast */
            padding: 2px 5px; /* Add some padding around the price */
        }

        .card-img-top {
            height: 150px; 
            object-fit: cover; 
            border-radius: 3px;
        }

        .card .btn-primary {
            background-color: #963108;
            border: none;
        }

        .card .btn-primary:hover {
            background-color: #dbf320;
            color: #010113;
        }

        footer {
            background: #333;
            color: white;
            padding: 20px 0;
        }
    </style>
</head>
<body>
    {{-- Nav Bar Start --}}
    <nav class="navbar navbar-expand-lg navbar-dark sticky-top">
        <div class="container">
            <a class="navbar-brand" href="#">EliteRides</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="#">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Sell My Car</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Buy Car</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Contact Us</a></li>
                    @if (Route::has('login'))
                        @auth
                            <li class="nav-item"><a class="nav-link" href="{{ url('/dashboard') }}">Dashboard</a></li>
                        @else
                            <li class="nav-item"><a class="nav-link login-link" href="{{ route('login') }}">Login</a></li>
                            @if (Route::has('register'))
                                <li class="nav-item"><a class="nav-link register-link" href="{{ route('register') }}">Register</a></li>
                            @endif
                        @endauth
                    @endif
                </ul>
            </div>
        </div>
    </nav>
    {{-- Nav Bar End --}}

    {{-- Hero Section Start --}}
    <div class="container">
        <div class="row">
            <div class="col-md-5 hero-text mx-3">
                <h1>Find Your Perfect Ride, New or Used!</h1>
                <p>Sell, Buy, or Discover the car of your dreams—all in one place.</p>
                <div>
                    <button class="btn btn-dark me-2">Sell My Car</button>
                    <button class="btn btn-outline-dark">Buy Car</button>
                </div>
            </div>
            <div class="col-md-5 hero-image mt-4 mt-md-0">
                <img src="{{ asset('images/hero.jpg') }}"  alt="Hero Image" class="img-fluid rounded">
            </div>
        </div>
    </div>
    {{-- Hero Section End --}}

    {{-- Top Deals Start --}}
    <div class="container py-5">
        <h2 class="text-center mb-4">Top Deals</h2>
        <div class="row top-deals">
            <!-- Example Deal -->
            <div class="col-md-4">
                <div class="card">
                    <img src="{{ asset('images/car1.jpg') }}" class="card-img-top" alt="Car Image">
                    <div class="card-body">
                        <h5 class="card-title">Luxury Sedan</h5>
                        <p class="card-text">$25,000 - Well maintained</p>
                        <a href="#" class="btn btn-dark">View Details</a>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="card">
                    <img src="{{ asset('images/car1.jpg') }}" class="card-img-top" alt="Car Image">
                    <div class="card-body">
                        <h5 class="card-title">Luxury Sedan</h5>
                        <p class="card-text">$25,000 - Well maintained</p>
                        <a href="#" class="btn btn-dark">View Details</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <img src="{{ asset('images/car1.jpg') }}" class="card-img-top" alt="Car Image">
                    <div class="card-body">
                        <h5 class="card-title">Luxury Sedan</h5>
                        <p class="card-text">$25,000 - Well maintained</p>
                        <a href="#" class="btn btn-dark">View Details</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <img src="{{ asset('images/car1.jpg') }}" class="card-img-top" alt="Car Image">
                    <div class="card-body">
                        <h5 class="card-title">Luxury Sedan</h5>
                        <p class="card-text">$25,000 - Well maintained</p>
                        <a href="#" class="btn btn-dark">View Details</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Top Deals End --}}

    {{-- How It Works Start --}}
    <div class="container py-5">
        <h2 class="text-center mb-4">How It Works</h2>
        <div class="row how-it-works">
            <div class="col-md-4 step">
                <i class="fas fa-search fa-3x mb-3"></i>
                <h5>Find Your Car</h5>
                <p>Search through our listings to find your perfect match.</p>
            </div>
            <div class="col-md-4 step">
                <i class="fas fa-money-check-alt fa-3x mb-3"></i>
                <h5>Secure Payment</h5>
                <p>Complete your transaction safely and securely.</p>
            </div>
            <div class="col-md-4 step">
                <i class="fas fa-car-side fa-3x mb-3"></i>
                <h5>Drive Away</h5>
                <p>Take your car home and enjoy the ride!</p>
            </div>
        </div>
    </div>
    {{-- How It Works End --}}

    {{-- FAQs Start --}}
    <div class="container">
        <div class="row">

        </div>
    </div>
    {{-- FAQs End --}}

    {{-- Footer Start --}}
    <footer>
        <div class="container-fluid text-center">
            <p>&copy; 2025 EliteRides. All rights reserved.</p>
        </div>
    </footer>
    {{-- Footer End --}}



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

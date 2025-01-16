<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ABC Cars  - Homepage</title>
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
            max-width: 600px;
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

        .top-deals {
            background-color: #0c0c1f;
            padding: 40px 40px;
            border-radius: 8px;
        }

        .card {
            background-color: #080830;
            color: #dfe0fd;
            padding: 1px;
        }

        .highlight-owner {
            color: #dbf320;
            font-weight: bold;
            text-shadow: 1px 1px 2px #000;
        }

        .highlight-price {
            color: #f36d33;
            font-size: 1.25rem;
            font-weight: bold;
            text-shadow: 1px 1px 2px #000;
            padding: 2px 5px;
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

        .how-it-works {
            background-color: #100612;
            padding: 40px 40px;
            text-align: center;
            border-radius: 8px;
        }

        .small-text {
            font-size: 0.875rem;
            color: #6c757d;
        }

        .accordion-button {
            background-color: #220a01 !important;
            color: white !important;
            border: none;
        }

        .accordion-button:focus {
            box-shadow: none !important;
        }

        .accordion-button:not(.collapsed) {
            color: #dbf320 !important;
        }

        .accordion-button::after {
            color: #dbf320 !important;
        }

        .accordion-button:not(.collapsed)::after {
            color: #dbf320 !important;
        }

        .accordion-body {
            background-color: #220a01;
            color: white;
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
    <!-- Navigation Bar End -->

    <!-- Hero Section Start -->
    <div class="container section-spacing">
        <div class="row align-items-center hero-section">
            <div class="col-md-6 hero-text mt-5">
                <h1>Find Your Perfect Ride, Second Hand or Third Hand!</h1>
                <p>Sell, Buy, or Discover the car of your dreams—all in one place.</p>
                <a href="{{ route('register') }}">
                    <button class="btn btn-dark me-2">Sell My Car</button>
                </a>
                <a href="{{ route('car.listing') }}">
                    <button class="btn btn-outline-dark ms-2">Buy Car</button>
                </a>
            </div>
            <div class="col-md-6 text-center mt-5">
                <img src="{{ asset('images/hero.jpg') }}" alt="Hero Image" class="hero-image rounded">
            </div>
        </div>
    </div>
    <!-- Hero Section End -->

    <!-- Top Deals Section Start -->
    <div class="container top-deals section-spacing">
        <h2 class="text-center mb-5" style="color: #dddefd">Top Deals on ABC Cars :</h2>
        <div class="row g-4">
            @foreach ($topCars as $car)
            <div class="col-md-3 mt-5 mb-5">
                <div class="card">
                    <img src="{{ asset('storage/' . $car->img_path) }}" class="card-img-top" alt="Car Image">
                    <div class="card-body">
                        <h5 class="card-title">{{ $car->make }} {{ $car->model }}</h5>
                        <p class="card-text highlight-owner">{{ $car->user->name }}</p> <!-- Display user name -->
                        <p class="highlight-price">${{ number_format($car->price, 2) }}</p> <!-- Display car price -->
                        <a href="{{ route('car.detail', $car->id) }}" class="btn btn-primary">View Details</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <!-- Top Deals Section End -->

    {{-- How It Works Start --}}
    <div class="container section-spacing mt-5 mb-5">
        <div class="row how-it-works">
            <h2 style="color: #dbf320;">How It Works</h2>
            <div class="row text-center mt-5">
                <div class="col-md-4 mb-4">
                    <img src="{{ asset('images/one.png') }}" alt="Step 1" class="img-fluid step-number">
                    <h5 class="mt-4">Register and Login</h5>
                    <p class="small-text mt-3">Sign up on ABC Cars  by providing your details. After registering, log in to access a wide range of features for buying, selling, and managing your car listings.</p>
                </div>
                <div class="col-md-4 mb-4">
                    <img src="{{ asset('images/two.png') }}" alt="Step 2" class="img-fluid step-number">
                    <h5 class="mt-4">Sell or Buy A Car</h5>
                    <p class="small-text mt-3">Browse through our extensive listings of used cars. Sellers can list their vehicles, and buyers can place bids, book test drives, or directly purchase cars.</p>
                </div>
                <div class="col-md-4 mb-4">
                    <img src="{{ asset('images/three.png') }}" alt="Step 3" class="img-fluid step-number">
                    <h5 class="mt-4">Drive Away Happy!</h5>
                    <p class="small-text mt-3">Once the deal is done, schedule a test drive or pick up your interested car. We ensure a smooth and safe transaction, so you can enjoy your ride with confidence!</p>
                </div>
            </div>
        </div>
    </div>
    {{-- How It Works End --}}

    {{-- FAQs Section Start --}}
    <div class="container section-spacing mt-5 mb-5">
        <div class="row faq-section">
            <div class="col-md-5 mt-5">
                <h2 style="color: #dbf320;">FAQs</h2>
                <p>Get answers to all your questions about buying, selling, and using ABC Cars </p>
            </div>
            <div class="col-md-7 mt-5">
                <div class="accordion" id="faqAccordion">
                    <div class="accordion-item mb-3">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                What is ABC Cars ?
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#faqAccordion">
                            <div class="accordion-body" style="background-color: #220a01;">
                                ABC Cars  is an online platform that connects car buyers and sellers. Whether you're looking to sell your car, buy a used one, or bid on a vehicle, we provide an easy and secure experience.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item mb-3">
                        <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                How does ABC Cars  work?
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#faqAccordion">
                            <div class="accordion-body" style="background-color: #220a01;">
                                Sellers can list their cars for sale, upload photos, and set prices. Buyers can browse car listings, place bids, and book test drives. Administrators manage the platform to ensure smooth operations.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item mb-3">
                        <h2 class="accordion-header" id="headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                Is ABC Cars  free to use?
                            </button>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#faqAccordion">
                            <div class="accordion-body" style="background-color: #220a01;">
                                Registering and browsing car listings is free. However, some premium features like highlighting your car listing may incur charges.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item mb-3">
                        <h2 class="accordion-header" id="headingFour">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                How do I post a car for sale?
                            </button>
                        </h2>
                        <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#faqAccordion">
                            <div class="accordion-body" style="background-color: #220a01;">
                                <ol>
                                    <li>Register in ABC Cars </li>
                                    <li>Log in to your account</li>
                                    <li>Click on "Sell My Car"</li>
                                    <li>Fill in details about your car, upload pictures, and set a price</li>
                                    <li>Submit your listing for approval</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item mb-3">
                        <h2 class="accordion-header" id="headingFive">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                Can I edit or delete my car listing?
                            </button>
                        </h2>
                        <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#faqAccordion">
                            <div class="accordion-body" style="background-color: #220a01;">
                                Yes, log in to your account, go to "My Listings," and choose the "Edit" or "Delete" option for the respective car.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item mb-3">
                        <h2 class="accordion-header" id="headingSix">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                How do I deactivate my car listing after it’s sold?
                            </button>
                        </h2>
                        <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix" data-bs-parent="#faqAccordion">
                            <div class="accordion-body" style="background-color: #220a01;">
                                Navigate to "My Listings" in your dashboard, select the car, and click on the "Deactivate" option to mark it as sold.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item mb-3">
                        <h2 class="accordion-header" id="headingSeven">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                                How do I book a test drive?
                            </button>
                        </h2>
                        <div id="collapseSeven" class="accordion-collapse collapse" aria-labelledby="headingSeven" data-bs-parent="#faqAccordion">
                            <div class="accordion-body" style="background-color: #220a01;">
                                <ol>
                                    <li>Log in to your account</li>
                                    <li>Browse the car listings and click on the car you’re interested in</li>
                                    <li>Use the "Book Test Drive" button to select a date and time</li>
                                    <li>You will receive a confirmation email once the seller approves your request</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item mb-3">
                        <h2 class="accordion-header" id="headingEight">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
                                What is the bidding process?
                            </button>
                        </h2>
                        <div id="collapseEight" class="accordion-collapse collapse" aria-labelledby="headingEight" data-bs-parent="#faqAccordion">
                            <div class="accordion-body" style="background-color: #220a01;">
                                <ol>
                                    <li>Go to the car listing you’re interested in</li>
                                    <li>Enter your bid amount and submit it</li>
                                    <li>The seller will review all bids and decide to accept or reject offers</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item mb-3">
                        <h2 class="accordion-header" id="headingNine">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseNine" aria-expanded="false" aria-controls="collapseNine">
                                Can I buy a car without bidding?
                            </button>
                        </h2>
                        <div id="collapseNine" class="accordion-collapse collapse" aria-labelledby="headingNine" data-bs-parent="#faqAccordion">
                            <div class="accordion-body" style="background-color: #220a01;">
                                Yes, if the seller has set a fixed price, you can proceed with a direct purchase.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item mb-3">
                        <h2 class="accordion-header" id="headingTen">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTen" aria-expanded="false" aria-controls="collapseTen">
                                Who do I contact if I face an issue?
                            </button>
                        </h2>
                        <div id="collapseTen" class="accordion-collapse collapse" aria-labelledby="headingTen" data-bs-parent="#faqAccordion">
                            <div class="accordion-body" style="background-color: #220a01;">
                                You can reach out to our support team through the "Contact Us" page or email us at support@ABC Cars .com.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item mb-3">
                        <h2 class="accordion-header" id="headingEleven">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseEleven" aria-expanded="false" aria-controls="collapseEleven">
                                Is my data secure on ABC Cars ?
                            </button>
                        </h2>
                        <div id="collapseEleven" class="accordion-collapse collapse" aria-labelledby="headingEleven" data-bs-parent="#faqAccordion">
                            <div class="accordion-body" style="background-color: #220a01;">
                                Yes, we prioritize data security and use encryption to protect all user information.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- FAQs Section End --}}

    <!-- Footer Start -->
    <footer class="text-center mt-5">
        <p class="mb-0">&copy; 2025 ABC Cars . All rights reserved.</p>
    </footer>
    {{-- Footer End --}}

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>


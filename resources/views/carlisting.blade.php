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

        .form-container {
            display: flex;
            justify-content: center;
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

        .content-area {
            margin-bottom: 70px;
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
            box-shadow: 0 8px 12px rgb(25, 26, 65);
            padding: 20px;
            margin: 20px 0;
        }

        .form-card h2 {
            color: #dfe0fd;
            font-weight: bold;
        }

        .owner-name {
            color: #f36d33;
            font-weight: bold;
        }

        .status {
            color: #22b02c;
        }

        .pagination .page-link {
            color: #f36d33;
            background-color: #23244d;
            border: 1px solid #787cf8;
        }

        .pagination .page-item.active .page-link {
            background-color: #f36d33;
            border-color: #f36d33;
            color: #fff;
        }

        .pagination .page-link:hover {
            background-color: #dbf320;
            color: #010113;
            border-color: #dbf320;
        }

        .pagination .page-item.disabled .page-link {
            color: #a5a7e2;
            background-color: #23244d;
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

    <!-- Content Start --> 
    <div class="container content-area mt-4">
        <div class="row justify-content-center g-5">
            <!-- Filters Section -->
            <div class="col-md-3">
                <h5>Filters</h5>
                <br>
                <form method="GET" action="{{ route('car.listing') }}">
                    {{-- Condition --}}
                    <div class="mb-3">
                        <label for="condition" class="form-label">Condition</label>
                        <select name="condition" id="condition" class="form-control">
                            <option value="all">All</option>
                            <option value="New">New</option>
                            <option value="Used">Used</option>
                        </select>
                    </div>

                    {{-- Make --}}
                    <div class="mb-3">
                        <label for="make" class="form-label">Make</label>
                        <select name="make" id="make" class="form-control">
                            <option value="">Choose</option>
                            @foreach($makes as $make)
                                <option value="{{ $make }}">{{ $make }}</option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Model --}}
                    <div class="mb-3">
                        <label for="model" class="form-label">Model</label>
                        <select name="model" id="model" class="form-control">
                            <option value="">Choose</option>
                            @foreach($models as $model)
                                <option value="{{ $model }}">{{ $model }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="d-flex mt-5 mb-5">
                        <button type="submit" class="btn btn-primary me-2">Go</button>
                        <a href="{{ route('car.listing') }}" class="btn btn-secondary">Reset</a>
                    </div>

                    {{-- Price --}}
                    <div class="mb-3">
                        <label for="price_min" class="form-label">Price (in dollars)</label>
                        <div class="d-flex">
                            <input type="number" name="price_min" id="price_min" class="form-control me-1" placeholder="Min">
                            -
                            <input type="number" name="price_max" id="price_max" class="form-control ms-1" placeholder="Max">
                        </div>
                    </div>

                    {{-- Registration Year --}}
                    <div class="mb-3">
                        <label for="year_min" class="form-label">Registration Year</label>
                        <div class="d-flex">
                            <input type="number" name="registration_year_min" id="year_min" class="form-control me-1" placeholder="Min">
                            -
                            <input type="number" name="registration_year_max" id="year_max" class="form-control ms-1" placeholder="Max">
                        </div>
                    </div>

                    {{-- Transmission --}}
                    <div class="mb-3">
                        <label for="transmission" class="form-label">Transmission</label>
                        <select name="transmission" id="transmission" class="form-control">
                            <option value="">Choose</option>
                            <option value="Automatic">Automatic</option>
                            <option value="Manual">Manual</option>
                        </select>
                    </div>

                    {{-- Fuel Type --}}
                    <div class="mb-3">
                        <label for="fuel_type" class="form-label">Fuel Type</label>
                        <select name="fuel_type" id="fuel_type" class="form-control">
                            <option value="">Choose</option>
                            <option value="Petrol">Petrol</option>
                            <option value="Diesel">Diesel</option>
                            <option value="Electric">Electric</option>
                            <option value="Hybrid">Hybrid</option>
                        </select>
                    </div>

                    {{-- Color --}}
                    <div class="mb-3">
                        <label for="color" class="form-label">Color</label>
                        <select name="color" id="color" class="form-control">
                            <option value="">Choose</option>
                            @foreach($colors as $color)
                                <option value="{{ $color }}">{{ $color }}</option>
                            @endforeach
                        </select>
                    </div>
                </form>
            </div>

            <!-- Car Listing Section -->
            <div class="col-md-7">
                <h5>Car Listings - <span>{{ $carPosts->count() }} car listing(s) found</span></h5>
                <br>
                <form method="GET" action="{{ route('car.listing') }}" class="mb-3">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control" placeholder="Search by make or model" value="{{ request('search') }}">
                        <button type="submit" class="btn btn-primary">Search</button>
                        <a href="{{ route('car.listing') }}" class="btn btn-danger">&times;</a>
                    </div>
                </form>

                <br>
                <div class="row">
                    @forelse($carPosts as $car)
                    <div class="col-md-12 mb-4">
                        <div class="card">
                            <div class="row g-0">
                                <div class="col-md-4">
                                    <img src="{{ asset($car->img_path) }}" class="img-fluid rounded-start" alt="{{ $car->make }} {{ $car->model }}">
                                    {{-- in my table, I have user id. I want to display the user name right below this image and also the status --}}
                                    
                                    {{-- Fetch user details using the user_id (assuming you have the relationship set up in your Car model) --}}
                                    <div class="user-info mt-3">
                                        <p class="owner-name ms-2">Owner: {{ $car->user->name }}</p>
                                        <p class="status ms-2">Status: {{ $car->status }}</p>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title"><strong>{{ $car->make }} {{ $car->model }}</strong></h5>
                                        <div class="details-container d-flex flex-wrap mt-3 gap-2">
                                            <p class="card-text flex-fill text-start">Price: ${{ $car->price }}</p>
                                            <p class="card-text flex-fill text-end">Condition: {{ $car->condition }}</p>
                                            <p class="card-text flex-fill text-start">Registered: {{ $car->registration_year }}</p>
                                            <p class="card-text flex-fill text-end">Transmission: {{ $car->transmission }}</p>
                                            <p class="card-text flex-fill text-start">Fuel Type: {{ $car->fuel_type }}</p>
                                            <p class="card-text flex-fill text-end">Color: {{ $car->color }}</p>
                                        </div>
                                        
                                        <a href="{{ route('car.detail', $car->id) }}" class="btn btn-primary text-end">View Detail</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                    <p>No car posts found.</p>
                    @endforelse
                </div>

                <!-- Pagination -->
                <div class="d-flex justify-content-center mt-4">
                    {{ $carPosts->onEachSide(1)->links('pagination::custom') }}
                </div>
            </div>
        </div>
    </div>
    {{-- Content End --}}

    <!-- Footer -->
    <footer class="text-center mt-5">
        <p class="mb-0">&copy; 2025 EliteRides. All rights reserved.</p>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

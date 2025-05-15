<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us | ABC Cars </title>
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
            color: #dfe0fd;
            background-color: #2d2f65;
            border-color: #f36d33;
            box-shadow: 0 0 5px rgba(243, 109, 51, 0.5);
        }
        .form-control::placeholder {
            color: #dfe0fd;
            opacity: 0.7;
        }

        .form-card {
            border-radius: 8px;
            padding: 20px;
            margin: 50px 50px;
        }

        .form-card h2 {
            color: #dfe0fd;
        }

        .contact-section {
            background-color: #23244d;
            padding: 30px;
            text-align: center;
        }
        .contact-title {
            color:#f36d33;
            font-weight: bold;
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

    {{-- Alert Session --}}
    <div class="container">
        <!-- Alert Message -->
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show mt-4" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

            {{-- Contact Us --}}
            <div class="row mt-5 mb-5 justify-content-center">
                <div class="contact-section mb-5">
                    <h2 class="mb-4">Contact Us</h2>
                    <p class="mb-3">
                        Have questions or need assistance? We’re here to help! Feel free to reach out to us via:
                    </p>
                    <div class="mb-4">
                        <p><strong>Phone:</strong> +1 234 567 890</p>
                        <p><strong>Email:</strong> <a href="mailto:support@ABC Cars .com" class="text-primary">support@ABC Cars .com</a></p>
                    </div>
                    <p class="mb-4">
                            You can also explore our <a href="{{ route('home') }}" class="text-primary fw-bold">FAQs</a> on the homepage for quick answers to common questions.
                    </p>
                </div>
                <!-- Left Column for Image -->
                <div class="p-0 col-sm-10 col-md-7 col-lg-7">
                    <img src="{{ asset('images/help.png') }}" alt="Contact Us" class="img-fluid w-100">
                </div>

                <!-- Right Column for Form -->
                <div class="p-0 col-sm-10 col-md-4 col-lg-5">
                    <h4 class="text-center contact-title">Reach Out To Us!</h4>
                    <div class="form-card mt-3">
                        <form action="{{ route('contact.submit') }}" method="POST">
                            @csrf
                            <!-- Name Field -->
                            <div class="mb-3">
                                <label for="name" class="form-label">Your Name</label>
                                <input type="text" name="name" id="name" class="form-control" placeholder="Enter your name" required>
                            </div>
                            <!-- Email Field -->
                            <div class="mb-3">
                                <label for="name" class="form-label">Your Email</label>
                                <input type="email" name="email" id="email" class="form-control" placeholder="Enter your email" required>
                            </div>
                            <!-- Message Field -->
                            <div class="mb-3">
                                <label for="message" class="form-label">Your Message</label>
                                <textarea name="message" id="message" rows="4" class="form-control" placeholder="Describe your issue..." required></textarea>
                            </div>
                            <!-- Submit Button -->
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Footer -->
    <footer class="text-center mt-5">
        <p class="mb-0">&copy; 2025 ABC Cars . All rights reserved.</p>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

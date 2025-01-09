<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us | EliteRides</title>
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

        .fs-5 {
            color: #a5a7e2;
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

        /* Section Heading Style */
        h1.display-4, h2 {
            background: linear-gradient(45deg, #f36d33, #dbf320);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            font-weight: bold;
        }

        /* Card-like Design for Content */
        .about-section {
            background-color: #1c1f2a;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin-bottom: 30px;
            transition: transform 0.3s ease;
        }

        .about-section:hover {
            transform: translateY(-10px);
        }

        .about-section h2 {
            color: #f36d33;
        }

        .about-section p {
            color: #a5a7e2;
            line-height: 1.8;
        }

        .about-item {
            background-color: #2a2e42;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            margin-bottom: 20px;
            transition: transform 0.3s ease;
        }

        .about-item:hover {
            transform: translateY(-5px);
        }

        .about-item strong {
            color: #f36d33;
        }

        .cta-button {
            background-color: #f36d33;
            color: #010113;
            border-radius: 5px;
            padding: 15px 30px;
            text-transform: uppercase;
            letter-spacing: 1px;
            transition: background-color 0.3s ease;
            text-decoration: none;
        }

        .cta-button:hover {
            background-color: #dbf320;
            color: #010113;
        }

        /* Responsive Button */
        @media (max-width: 576px) {
            .cta-button {
                padding: 12px 25px;
                font-size: 14px;
            }
        }

        footer p {
            margin: 0;
            font-size: 0.9rem;
        }
    </style>
</head>
<body>
    <!-- Navigation Bar Start -->
    <nav class="navbar navbar-expand-lg navbar-dark sticky-top">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">
                <i class="fas fa-car-side"></i> EliteRides
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item mt-1"><a class="nav-link" href="{{ route('home') }}">Home</a></li>
                    <li class="nav-item mt-1"><a class="nav-link" href="{{ route('about.us') }}">About Us</a></li>
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
    <!-- Navigation Bar End -->

    {{-- About Us Content Area Start --}}
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12 text-center">
                <h1 class="display-4 mb-3">About Us</h1>
                <p class="fs-5">
                    Discover the story behind EliteRides and why we are the trusted platform for buying and selling cars.
                </p>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-md-8 mx-auto">
                <div class="about-section">
                    <h2>Who We Are</h2>
                    <p>At EliteRides, we are passionate about simplifying the car buying and selling experience for everyone. Our platform bridges the gap between car buyers and sellers with a focus on trust, efficiency, and transparency. Whether you're upgrading to a brand-new car or selling your trusted ride, EliteRides ensures a seamless experience tailored to your needs.</p>
                    <p>Founded with the belief that every car tells a story, we strive to make every transaction not just a deal but a journey. Our team is committed to connecting people and vehicles, empowering dreams of mobility while maintaining trust at every step.</p>
                </div>

                <div class="about-section">
                    <h2>Why Choose Us</h2>
                    <div class="about-item">
                        <strong>Ease of Use:</strong> Our intuitive platform ensures that even first-time users can navigate with confidence.
                    </div>
                    <div class="about-item">
                        <strong>Verified Listings:</strong> Transparency is our priority. Every car listing undergoes strict verification.
                    </div>
                    <div class="about-item">
                        <strong>Advanced Search Filters:</strong> Easily find your dream car using customizable filters for make, model, price, and more.
                    </div>
                    <div class="about-item">
                        <strong>Secure Transactions:</strong> Our secure payment system ensures safe and hassle-free transactions.
                    </div>
                    <div class="about-item">
                        <strong>Dedicated Support:</strong> Our support team is always ready to assist, ensuring a smooth experience for buyers and sellers alike.
                    </div>
                </div>

                <div class="text-center">
                    <a href="{{ route('contact.us') }}" class="cta-button mt-3">
                        Contact Us for More Information
                    </a>
                </div>
            </div>
        </div>
    </div>
    {{-- About Us Content Area End --}}

    <!-- Footer -->
    <footer class="text-center mt-5">
        <p>&copy; 2025 EliteRides. All rights reserved.</p>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

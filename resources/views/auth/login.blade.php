<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | EliteRides</title>
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
            flex-grow: 1;
        }

        footer {
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
        }
    </style>
</head>
<body>
    <!-- Navigation Bar Start -->
    <nav class="navbar navbar-expand-lg navbar-dark sticky-top">
        <div class="container">
            <a class="navbar-brand" href="#">EliteRides</a>
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

    <!-- Login Form --> 
    <div class="container">
        <div class="row mt-5 mb-5 justify-content-center">
            <div class="col-sm-10 col-md-6 col-lg-4">
                <div class="form-card">
                    <h2 class="mb-4 text-center">Login</h2>

                    <!-- Session Status -->
                    <x-auth-session-status class="mb-4" :status="session('status')" />

                    <!-- Error Message -->
                    @session('error')
                        <p class="error-message text-danger">{{$value}}</p>
                    @endsession

                    <!-- Login Form Starts Here -->
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <!-- Email Address -->
                        <div class="mb-3">
                            <x-input-label for="email" :value="__('Email')" />
                            <x-text-input id="email" class="form-control" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <!-- Password -->
                        <div class="mt-4 mb-3">
                            <x-input-label for="password" :value="__('Password')" />
                            <x-text-input id="password" class="form-control" type="password" name="password" required autocomplete="current-password" />
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>

                        <!-- Remember Me -->
                        <div class="mb-3">
                            <label for="remember_me" class="inline-flex items-center">
                                <input id="remember_me" type="checkbox" class="form-check-input" name="remember">
                                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                            </label>
                        </div>

                        <div class="d-flex justify-content-between align-items-center">
                            @if (Route::has('password.request'))
                                <a class="text-sm text-gray-600" href="{{ route('password.request') }}">
                                    {{ __('Forgot your password?') }}
                                </a>
                            @endif

                            <x-primary-button class="btn btn-primary">
                                {{ __('Log in') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="text-center mt-5">
        <p class="mb-0">&copy; 2025 EliteRides. All rights reserved.</p>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

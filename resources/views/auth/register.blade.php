<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | ABC Cars </title>
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
        }
        .text-danger {
            font-size: 12px;
        }
        .password-suggestion {
            position: relative;
            z-index: 1000;
            color: #dfe0fd;
            font-size: 0.9rem;
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

    <!-- Registration Form -->
    <div class="container">
        <div class="row mt-5 mb-5 justify-content-center">
            <div class="col-sm-10 col-md-6 col-lg-4">
                <div class="form-card">
                    <h2 class="mb-4 text-center">Register</h2>
                    <form method="POST" action="{{ route('register') }}"  autocomplete="on">
                        @csrf
                        <!-- Name -->
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" id="name" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
                            @error('name') <div class="text-danger mt-1">{{ $message }}</div> @enderror
                        </div>

                        <!-- Email Address -->
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" id="email" class="form-control" name="email" value="{{ old('email') }}" required>
                            @error('email') <div class="text-danger mt-1">{{ $message }}</div> @enderror
                        </div>

                        <!-- Password -->
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" id="password" class="form-control" name="password" required>
                            @error('password') 
                                <div class="text-danger mt-1">
                                    <i class="fas fa-exclamation-circle"></i> {{ $message }}
                                </div> 
                            @enderror
                        </div>

                        <!-- Confirm Password -->
                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">Confirm Password</label>
                            <input type="password" id="password_confirmation" class="form-control" name="password_confirmation" required>
                            @error('password') 
                                <div class="text-danger mt-1">
                                    <i class="fas fa-exclamation-circle"></i> {{ $message }}
                                </div> 
                            @enderror                        </div>

                        <!-- Phone -->
                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="text" id="phone" class="form-control" name="phone" value="{{ old('phone') }}" required>
                            @error('phone') <div class="text-danger mt-1">{{ $message }}</div> @enderror
                        </div>

                        <!-- Address -->
                        <div class="mb-3">
                            <label for="address" class="form-label">Address</label>
                            <input type="text" id="address" class="form-control" name="address" value="{{ old('address') }}" required>
                            @error('address') <div class="text-danger mt-1">{{ $message }}</div> @enderror
                        </div>

                        <!-- Submit Button -->
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary mt-3">Register</button>
                        </div>
                        <div class="mt-3 text-center">
                            <a href="{{ route('login') }}" class="text-light">Already registered?</a>
                        </div>
                    </form>
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

    <script>
        function generateStrongPassword() {
            const length = 12;
            const charset = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*";
            let password = "";
            
            // Ensure at least one of each required character type
            password += "ABCDEFGHIJKLMNOPQRSTUVWXYZ"[Math.floor(Math.random() * 26)];
            password += "abcdefghijklmnopqrstuvwxyz"[Math.floor(Math.random() * 26)];
            password += "0123456789"[Math.floor(Math.random() * 10)];
            password += "!@#$%^&*"[Math.floor(Math.random() * 8)];
            
            // Fill remaining length with random characters
            for (let i = password.length; i < length; i++) {
                password += charset[Math.floor(Math.random() * charset.length)];
            }
            
            return password;
        }

        document.getElementById('password').addEventListener('focus', function() {
            if (!document.getElementById('passwordSuggestion')) {
                const suggestionBox = document.createElement('div');
                suggestionBox.id = 'passwordSuggestion';
                suggestionBox.className = 'password-suggestion p-2 mt-2 rounded';
                suggestionBox.style.backgroundColor = '#161632';
                suggestionBox.style.border = '1px solid #787cf8';
                
                const suggestedPassword = generateStrongPassword();
                suggestionBox.innerHTML = `
                    <div class="d-flex justify-content-between align-items-center">
                        <span>Suggested: ${suggestedPassword}</span>
                        <button class="btn btn-sm btn-outline-primary ms-2" onclick="usePassword('${suggestedPassword}')">Use This</button>
                        <button class="btn btn-sm btn-outline-danger" onclick="closePasswordSuggestion()">✕</button>
                    </div>
                `;
                
                this.parentNode.appendChild(suggestionBox);
            }
        });

        function usePassword(password) {
            document.getElementById('password').value = password;
            document.getElementById('password_confirmation').value = password;
            document.getElementById('passwordSuggestion').remove();
        }
        function closePasswordSuggestion() {
            const suggestionBox = document.getElementById('passwordSuggestion');
            if (suggestionBox) {
                suggestionBox.remove();
            }
        }
    </script>

</body>
</html>

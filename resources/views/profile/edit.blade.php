<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | ABC Cars </title>
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
            text-align: center;
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
        /* Dropdown Menu Styling */
        .dropdown-menu {
            background-color: #010113; 
            border: 1px solid #161632; 
            border-radius: 5px; 
            padding: 5px 0; 
        }

        /* Dropdown Item Styling */
        .dropdown-item {
            color: #dfe0fd; 
            padding: 10px 20px; 
            font-size: 0.9rem; 
            text-decoration: none; 
            transition: background-color 0.3s, color 0.3s;
        }
        section {
            background-color: #191a41;
            padding: 45px;
            border-radius: 10px;
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
    <!-- Navigation -->
    @include('layouts.navigation')

    <div class="container mt-1">
        <!-- Session Messages -->
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        {{-- Update Profile Form --}}
        <div class="row justify-content-center">
            <div class="col-12 col-md-6 mt-5 mb-5">
                <section class="mt-5 mb-5">
                    <header class="mb-4">
                        <h2 class="text-lg font-medium text-gray-900 text-white">
                            {{ __('Profile Information') }}
                        </h2>
                        <p class="mt-1 text-sm text-gray-600 text-white">
                            {{ __("Update your account's profile information and email address.") }}
                        </p>
                    </header>

                    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
                        @csrf
                    </form>

                    <form method="post" action="{{ route('profile.update') }}" class="mt-4">
                        @csrf
                        @method('patch')

                        <div class="mb-3">
                            <label for="name" class="form-label">{{ __('Name') }}</label>
                            <input id="name" name="name" type="text" class="form-control" value="{{ htmlspecialchars(old('name', $user->name)) }}" required autofocus autocomplete="name">
                            @error('name') <div class="text-danger mt-1">{{ $message }}</div> @enderror
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">{{ __('Email') }}</label>
                            <input id="email" name="email" type="email" class="form-control" value="{{ old('email', $user->email) }}" required autocomplete="username">
                            @error('email') <div class="text-danger mt-1">{{ $message }}</div> @enderror

                            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                                <div class="mt-3">
                                    <p class="text-warning">
                                        {{ __('Your email address is unverified.') }}
                                        <button form="send-verification" class="btn btn-link">
                                            {{ __('Click here to re-send the verification email.') }}
                                        </button>
                                    </p>
                                </div>
                            @endif
                        </div>

                        <div class="mb-3">
                            <label for="phone" class="form-label">{{ __('Phone') }}</label>
                            <input id="phone" name="phone" type="text" class="form-control" value="{{ old('phone', $user->phone) }}" required autocomplete="phone">
                            @error('phone') <div class="text-danger mt-1">{{ $message }}</div> @enderror
                        </div>

                        <div class="mb-3">
                            <label for="address" class="form-label">{{ __('Address') }}</label>
                            <input id="address" name="address" type="text" class="form-control" value="{{ old('address', $user->address) }}" required autocomplete="address">
                            @error('address') <div class="text-danger mt-1">{{ $message }}</div> @enderror
                        </div>

                        <div class="d-flex justify-content-between align-items-center">
                            <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
                            @if (session('status') === 'profile-updated')
                                <p class="text-success mb-0">{{ __('Saved.') }}</p>
                            @endif
                        </div>
                    </form>
                </section>

                {{-- Update Password Form --}}
                <section class="mt-5 mb-5">
                    <header class="mb-4">
                        <h2 class="text-lg font-medium text-gray-900 text-white">
                            {{ __('Update Password') }}
                        </h2>
                        <p class="mt-1 text-sm text-gray-600 text-white">
                            {{ __('Ensure your account is using a long, random password to stay secure.') }}
                        </p>
                    </header>

                    <form method="post" action="{{ route('password.update') }}">
                        @csrf
                        @method('put')

                        <div class="mb-3">
                            <label for="update_password_current_password" class="form-label">{{ __('Current Password') }}</label>
                            <input id="update_password_current_password" name="current_password" type="password" class="form-control">
                            @error('current_password') <div class="text-danger mt-1">{{ $message }}</div> @enderror
                        </div>

                        <div class="mb-3">
                            <label for="update_password_password" class="form-label">{{ __('New Password') }}</label>
                            <input id="update_password_password" name="password" type="password" class="form-control">
                            @error('password') <div class="text-danger mt-1">{{ $message }}</div> @enderror
                        </div>

                        <div class="mb-3">
                            <label for="update_password_password_confirmation" class="form-label">{{ __('Confirm Password') }}</label>
                            <input id="update_password_password_confirmation" name="password_confirmation" type="password" class="form-control">
                            @error('password_confirmation') <div class="text-danger mt-1">{{ $message }}</div> @enderror
                        </div>

                        <div class="d-flex justify-content-between align-items-center">
                            <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
                        </div>
                    </form>
                </section>

                {{-- Delete User Form --}}
                <section class="mt-5 mb-5">
                    <header class="mb-4">
                        <h2 class="text-lg font-medium text-gray-900 text-white">
                            {{ __('Delete Account') }}
                        </h2>
                        <p class="mt-1 text-sm text-gray-600 text-white">
                            {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
                        </p>
                    </header>

                    <form method="post" action="{{ route('profile.destroy') }}">
                        @csrf
                        @method('delete')

                        <div class="mb-3">
                            <label for="password" class="form-label">{{ __('Confirm Password') }}</label>
                            <input id="password" name="password" type="password" class="form-control">
                            @error('password') <div class="text-danger mt-1">{{ $message }}</div> @enderror
                        </div>

                        <div class="d-flex justify-content-between align-items-center">
                            <button type="submit" class="btn btn-danger">{{ __('Delete Account') }}</button>
                            <a href="#" class="btn btn-secondary">{{ __('Cancel') }}</a>
                        </div>
                    </form>
                </section>
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

        document.getElementById('update_password_password').addEventListener('focus', function() {
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
                        <div>
                            <button type="button" class="btn btn-sm btn-outline-primary ms-2" onclick="usePassword('${suggestedPassword}')">Use This</button>
                            <button type="button" class="btn btn-sm btn-outline-danger" onclick="closePasswordSuggestion()">✕</button>
                        </div>
                    </div>
                `;
                
                this.parentNode.appendChild(suggestionBox);
            }
        });

        function usePassword(password) {
            document.getElementById('update_password_password').value = password;
            document.getElementById('update_password_password_confirmation').value = password;
            document.getElementById('passwordSuggestion').remove();
        }
        function closePasswordSuggestion() {
            const suggestionBox = document.getElementById('passwordSuggestion');
            if (suggestionBox) {
                suggestionBox.remove();
            }
        }
        document.getElementById('update_password_password').addEventListener('input', function() {
            const password = this.value;
            const validations = {
                length: password.length >= 8,
                uppercase: /[A-Z]/.test(password),
                lowercase: /[a-z]/.test(password),
                number: /[0-9]/.test(password),
                special: /[!@#$%^&*]/.test(password)
            };

            let validationFeedback = document.getElementById('validationFeedback');
            if (!validationFeedback) {
                validationFeedback = document.createElement('div');
                validationFeedback.id = 'validationFeedback';
                validationFeedback.className = 'mt-2';
                this.parentNode.appendChild(validationFeedback);
            }

            validationFeedback.innerHTML = `
                <ul class="list-unstyled">
                    <li class="${validations.length ? 'text-success' : 'text-danger'}">
                        <i class="fas ${validations.length ? 'fa-check' : 'fa-times'}"></i> 8+ characters
                    </li>
                    <li class="${validations.uppercase ? 'text-success' : 'text-danger'}">
                        <i class="fas ${validations.uppercase ? 'fa-check' : 'fa-times'}"></i> Uppercase letter
                    </li>
                    <li class="${validations.lowercase ? 'text-success' : 'text-danger'}">
                        <i class="fas ${validations.lowercase ? 'fa-check' : 'fa-times'}"></i> Lowercase letter
                    </li>
                    <li class="${validations.number ? 'text-success' : 'text-danger'}">
                        <i class="fas ${validations.number ? 'fa-check' : 'fa-times'}"></i> Number
                    </li>
                    <li class="${validations.special ? 'text-success' : 'text-danger'}">
                        <i class="fas ${validations.special ? 'fa-check' : 'fa-times'}"></i> Special character
                    </li>
                </ul>
            `;
        });
    </script>
</body>
</html>

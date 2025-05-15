<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'ABC cars') }}</title>
        <link rel="icon" href="{{ asset('images/car.png') }}" type="image/x-icon">
        <!-- Fonts -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
        <link href="https://fonts.googleapis.com/css2?family=Spline+Sans+Mono&display=swap" rel="stylesheet">
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>
            html {
                height: 100%;
                box-sizing: border-box;
            }
            body {
                background-color: #010113;
                color: #dfe0fd !important;
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
                color: aliceblue;
            }

            .fa-car-side {
                color: #f36d33;
                margin-right: 5px;
            }
            .form-label {
                color: #f1f1f9;
            }

            .form-control {
                background-color: #23244d;
                color: #f6f6f9;
                border: 1px solid #787cf8;
            }

            .form-control:focus {
                background-color: #2d2f65;
                color: #dfe0fd;
                border-color: #f36d33;
                box-shadow: 0 0 5px rgba(243, 109, 51, 0.5);
            }
            form-card {
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
    <body class="font-sans antialiased">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0">
            <div>
                <a class="navbar-brand" href="{{ route('home') }}">
                    <i class="fas fa-car-side"></i>
                    <span class="brand-text">ABC</span><span class="cars-text">cars</span>
                </a>
            </div>

            <div class="w-full sm:max-w-md mt-6 px-6 py-4 shadow-md overflow-hidden sm:rounded-lg">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>

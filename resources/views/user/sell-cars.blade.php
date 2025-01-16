<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | ABC Cars </title>
    <link rel="icon" href="{{ asset('images/car.png') }}" type="image/x-icon">
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

        .dashboard-container {
            color: #010113;
            background-color: transparent;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        .title-bar {
            background-color: #161632;
            color: #dfe0fd;
            padding: 25px;
            display: block;
            border-radius: 10px;
            
        }

        /* .content-area {
            padding: 15px;
        } */
        /* Side Navigation Bar */
        .side-nav {
            background-color: #0c0c1f;
            color: #dfe0fd;
            height: 100%;
            position: sticky;
            top: 0;
            padding: 25px;
            border-radius: 10px;
            height: 330px;
        }

        .side-nav a {
            color: #dfe0fd;
            text-decoration: none;
            padding: 15px;
            display: block;
            font-size: 1rem;
        }

        .side-nav a:hover {
            background-color: #161632;
            color: #f36d33;
        }

        .side-nav a.active {
            background-color: #161632;
            color: #f36d33;
        }
        .form-container {
            display: flex;
            justify-content: center;
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
        .form-control::placeholder {
            color: #dfe0fd;
            font-size: 0.8rem;
            opacity: 0.7;
        }

        select.form-control {
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' fill='%23dfe0fd' viewBox='0 0 16 16'%3E%3Cpath d='M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 0.75rem center;
            background-size: 12px;
            padding-right: 2rem;
            appearance: none;
            background-color: #23244d;
        }

        select.form-control:focus {
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' fill='%23f36d33' viewBox='0 0 16 16'%3E%3Cpath d='M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z'/%3E%3C/svg%3E");
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
    <!-- Navigation -->
    @include('layouts.navigation')

    <div class="container-fluid">
        <div class="row justify-content-around mt-5 mb-5">
            {{-- Side Navigation Bar --}}
            <div class="col-md-3 mb-5">
                {{-- Use the SideNav component --}}
                <x-side-nav :is-admin="auth()->user()->is_admin" />
            </div>

            {{-- Content Area --}}
            <div class="col-md-9 mb-5">
                <h4 class="mb-4 title-bar">Sell Your Car</h4>
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <div class="dashboard-container">
                    {{-- Your Sell Car Start --}}
                    <div class="row justify-content-center mt-5 mb-5">
                        <div class="col-md-8">
                            <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <!-- Condition -->
                                    <div class="col-md-6 mb-3">
                                        <label for="condition" class="form-label">Condition</label>
                                        <select id="condition" name="condition" class="form-select" required>
                                            <option value="Second Hand">Second Hand</option>
                                            <option value="Third Hand">Third Hand</option>
                                        </select>
                                    </div>
                                    <!-- Make -->
                                    <div class="col-md-6 mb-3">
                                        <label for="make" class="form-label">Make (Brand)</label>
                                        <input type="text" id="make" name="make" class="form-control" placeholder="e.g., Toyota" required>
                                    </div>
                                    <!-- Model -->
                                    <div class="col-md-6 mb-3">
                                        <label for="model" class="form-label">Model</label>
                                        <input type="text" id="model" name="model" class="form-control" placeholder="e.g., Corolla" required>
                                    </div>
                                    <!-- Registration Year -->
                                    <div class="col-md-6 mb-3">
                                        <label for="registration_year" class="form-label">Registration Year</label>
                                        <input type="number" id="registration_year" name="registration_year" class="form-control" min="1900" max="{{ date('Y') }}" placeholder="e.g., 2016" required>
                                    </div>
                                    <!-- Price -->
                                    <div class="col-md-6 mb-3">
                                        <label for="price" class="form-label">Price ($)</label>
                                        <input type="number" id="price" name="price" class="form-control" step="0.01" placeholder="e.g., 30000" required>
                                    </div>
                                    <!-- Engine Power -->
                                    <div class="col-md-6 mb-3">
                                        <label for="engine_power" class="form-label">Engine Power</label>
                                        <input type="text" id="engine_power" name="engine_power" class="form-control" placeholder="e.g., 150 HP" required>
                                    </div>
                                    <!-- Steering Position -->
                                    <div class="col-md-6 mb-3">
                                        <label for="steering_position" class="form-label">Steering Position</label>
                                        <select id="steering_position" name="steering_position" class="form-select" required>
                                            <option value="Left">Left</option>
                                            <option value="Right">Right</option>
                                        </select>
                                    </div>
                                    <!-- Transmission -->
                                    <div class="col-md-6 mb-3">
                                        <label for="transmission" class="form-label">Transmission</label>
                                        <select id="transmission" name="transmission" class="form-select" required>
                                            <option value="Automatic">Automatic</option>
                                            <option value="Manual">Manual</option>
                                        </select>
                                    </div>
                                    <!-- Fuel Type -->
                                    <div class="col-md-6 mb-3">
                                        <label for="fuel_type" class="form-label">Fuel Type</label>
                                        <select id="fuel_type" name="fuel_type" class="form-select" required>
                                            <option value="Petrol">Petrol</option>
                                            <option value="Diesel">Diesel</option>
                                            <option value="Electric">Electric</option>
                                            <option value="Hybrid">Hybrid</option>
                                        </select>
                                    </div>
                                    <!-- Color -->
                                    <div class="col-md-6 mb-3">
                                        <label for="color" class="form-label">Color</label>
                                        <input type="text" id="color" name="color" class="form-control" placeholder="e.g., Red" required>
                                    </div>
                                    <!-- Description -->
                                    <div class="col-md-12 mb-3">
                                        <label for="description" class="form-label">Description</label>
                                        <textarea id="description" name="description" class="form-control" rows="4" placeholder="Describe your car in detail..." required></textarea>
                                    </div>
                                    <!-- Image Upload -->
                                    <div class="col-md-12 mb-3">
                                        <label for="img_path" class="form-label">Upload Car Image</label>
                                        <input type="file" id="img_path" name="img_path" class="form-control" accept="image/*" required>
                                    </div>
                                </div>
                                <!-- Submit Button -->
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary">Post Your Car</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    {{-- Your Sell Car End --}}
                </div>
            </div>
        </div>
    </div>
    {{-- Dashboard Content Ebd --}}

    {{--  Footer  --}}
    <footer>
        <p>&copy; 2025 ABC Cars . All rights reserved.</p>
    </footer>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
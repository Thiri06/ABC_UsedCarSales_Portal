<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sell Car | EliteRides</title>
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
            color: #dfe0fd;
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
    <!-- Navigation -->
    @include('layouts.navigation')

    <!-- Sell Car Form --> 
    <div class="container">
        <div class="row justify-content-center mt-5 mb-5">
            <div class="col-md-8">
                <h2 class="text-center mb-5">Sell Your Car</h2>
                @if(session('success'))
                    <div class="alert alert-success text-center">
                        {{ session('success') }}
                    </div>
                @endif

                <form action="{{ route('car.post.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <!-- Condition -->
                        <div class="col-md-6 mb-3">
                            <label for="condition" class="form-label">Condition</label>
                            <select id="condition" name="condition" class="form-select" required>
                                <option value="New">New</option>
                                <option value="Used">Used</option>
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
                            <input type="number" id="registration_year" name="registration_year" class="form-control" min="1900" max="{{ date('Y') }}" required>
                        </div>
                        <!-- Price -->
                        <div class="col-md-6 mb-3">
                            <label for="price" class="form-label">Price ($)</label>
                            <input type="number" id="price" name="price" class="form-control" step="0.01" required>
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
    </div>
    {{-- Sell Car Form End --}}

    <!-- Footer -->
    <footer class="text-center mt-5">
        <p class="mb-0">&copy; 2025 EliteRides. All rights reserved.</p>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

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

        .dashboard-container {
            color: #010113;
            border-radius: 10px;
            padding: 20px;
        }

        .title-bar {
            background-color: #161632;
            color: #dfe0fd;
            padding: 25px;
            display: block;
            border-radius: 10px;
            
        }

        /* Side Navigation Bar */
        .side-nav {
            background-color: #0c0c1f;
            color: #dfe0fd;
            height: 100%;
            position: sticky;
            top: 0;
            padding: 25px;
            border-radius: 10px;
            height: 230px;
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
        .card {
            border: 1px solid #ddd;
            border-radius: 10px;
            padding: 15px;
            overflow: hidden;
        }
        .card-title {
            font-size: 1.5rem;
            font-weight: bold;
            color: #007bff;
        }
        .card-text {
            margin-top: 10px;
            font-size: 14px;
        }
        .description {
            margin-top: 10px;
            font-size: 13px;
            color: #010113;
        }
        .car-image {
            max-height: 250px;
            object-fit: cover;
        }
        .button-group button {
            min-width: 100px;
        }
        .gap-2 > * {
            margin-right: 10px;
        }

        .btn {
            font-size: 0.8rem;
        }

        .btn-sm {
            padding: 5px 10px;
        }

        .modal-header {
            background-color: #161632; 
            color: #dfe0fd;
        }
        .modal-body {
            background-color: #1a1b2f; 
            color: #dfe0fd;
        }
        input {
            background-color: #22244a; 
            color: #dfe0fd; 
            border: 1px solid #3f3f72;
        }
        .modal-footer {
            background-color: #161632;
        }
        .save-btn {
            background-color: #f36d33; 
            border-color: #f36d33;
        }

    </style>
</head>
<body>
    <!-- Navigation -->
    @include('layouts.navigation')

    <!-- Dashboard Content Start with side menu bar and content -->
    
    <div class="container-fluid">
        <div class="row mt-5 mb-5">
            {{-- Side Navigation Bar --}}
            <div class="col-md-3">
                {{-- Use the SideNav component --}}
                <x-side-nav :is-admin="auth()->user()->is_admin" />
            </div>

            {{-- Content Area --}}

            <div class="col-md-9 content-area">
                <h4 class="mb-4 title-bar">Manage Car Listings</h4>
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                
                <div class="dashboard-container">
                    <div class="row g-4">
                        @foreach($carPosts as $carPost)
                            <div class="col-12">
                                <div class="card h-100 shadow-sm">
                                    <div class="row g-0">
                                        <!-- Image Section -->
                                        <div class="col-md-4">
                                            <img src="{{ asset('storage/' . $carPost->img_path) }}" 
                                                class="card-img-top rounded-start h-100 object-fit-cover car-image" 
                                                alt="Car Image">
                                        </div>
                                        <!-- Details Section -->
                                        <div class="col-md-8">
                                            <div class="card-body d-flex flex-column">
                                                <!-- Title -->
                                                <h4 class="card-title text-primary mb-3">
                                                    {{ $carPost->make }} {{ $carPost->model }}
                                                    <span class="text-muted small description">by {{ $carPost->user->name }}</span>
                                                </h4>
                                                <!-- Details -->
                                                <div class="row mb-3">
                                                    <div class="col-md-4 card-text"><strong>Condition:</strong> {{ $carPost->condition }}</div>
                                                    <div class="col-md-4 card-text"><strong>Year:</strong> {{ $carPost->registration_year }}</div>
                                                    <div class="col-md-4 card-text"><strong>Fuel:</strong> {{ $carPost->fuel_type }}</div>
                                                </div>
                                                <div class="row mb-3">
                                                    <div class="col-md-4 card-text"><strong>Transmission:</strong> {{ $carPost->transmission }}</div>
                                                    <div class="col-md-4 card-text"><strong>Engine Power:</strong> {{ $carPost->engine_power }}</div>
                                                    <div class="col-md-4 card-text"><strong>Steering:</strong> {{ $carPost->steering_position }}</div>
                                                </div>
                                                <div class="row mb-3">
                                                    <div class="col-md-4 card-text"><strong>Color:</strong> {{ $carPost->color }}</div>
                                                    <div class="col-md-4 card-text"><strong>Price:</strong> ${{ number_format($carPost->price, 2) }}</div>
                                                    <div class="col-md-4 card-text">
                                                        <strong>Status:</strong>
                                                        <span class="badge {{ $carPost->status === 'available' ? 'bg-success' : 'bg-secondary' }}">
                                                            {{ ucfirst($carPost->status) }}
                                                        </span>
                                                    </div>
                                                </div>                                                <!-- Description -->
                                                <p class="text-muted small description">
                                                    <strong>Description:</strong> {{ $carPost->description ?? 'No description available.' }}
                                                </p>

                                                <!-- Buttons -->
                                                <div class="mt-auto button-group">
                                                    @if($carPost->status === 'available')
                                                        <form action="{{ route('admin.deactivateCarPost', $carPost->id) }}" method="POST" class="d-flex gap-2">
                                                            @csrf
                                                            @method('PUT')
                                                            <button type="button" 
                                                                    class="btn btn-outline-primary btn-sm" 
                                                                    data-bs-toggle="modal" 
                                                                    data-bs-target="#updateCarModal" 
                                                                    onclick="openEditModal(
                                                                        {{ $carPost->id }},
                                                                        '{{ $carPost->condition }}',
                                                                        '{{ $carPost->make }}',
                                                                        '{{ $carPost->model }}',
                                                                        '{{ $carPost->registration_year }}',
                                                                        '{{ $carPost->price }}',
                                                                        '{{ $carPost->engine_power }}',
                                                                        '{{ $carPost->steering_position }}',
                                                                        '{{ $carPost->transmission }}',
                                                                        '{{ $carPost->fuel_type }}',
                                                                        '{{ $carPost->color }}',
                                                                        '{{ $carPost->description }}',
                                                                        '{{ $carPost->status }}',
                                                                        '{{ $carPost->img_path }}',
                                                                     )">
                                                                Edit
                                                            </button>
                                                            <button type="submit" 
                                                                    class="btn btn-warning btn-sm" 
                                                                    onclick="return confirm('Are you sure you want to deactivate this post?')">
                                                                Deactivate
                                                            </button>
                                                        </form>
                                                    @else
                                                        <form action="{{ route('admin.activateCarPost', $carPost->id) }}" method="POST" class="d-flex gap-2">
                                                            @csrf
                                                            @method('PUT')
                                                            <button type="submit" 
                                                                    class="btn btn-success btn-sm" 
                                                                    onclick="return confirm('Are you sure you want to activate this post?')">
                                                                Activate
                                                            </button>
                                                        </form>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Dashboard Content End --}}

    {{-- Modal for Updating Car Posts --}}
    <div class="modal fade" id="updateCarModal" tabindex="-1" aria-labelledby="updateCarModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateCarModalLabel">Update Car Post</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="updateCarForm" method="POST" action="{{ route('admin.updateCarPost', ['id' => $carPost->id]) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    
                    <div class="modal-body">
                        <input type="hidden" name="id" id="carPostId">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="condition" class="form-label">Condition</label>
                                <select id="condition" name="condition" class="form-select">
                                    <option value="Second Hand">Second Hand</option>
                                    <option value="Third Hand">Third Hand</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="make" class="form-label">Make (Brand)</label>
                                <input type="text" name="make" id="make" class="form-control" placeholder="e.g., Toyota">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="model" class="form-label">Model</label>
                                <input type="text" name="model" id="model" class="form-control" placeholder="e.g., Corolla">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="registration_year" class="form-label">Registration Year</label>
                                <input type="number" name="registration_year" id="registration_year" class="form-control" min="1900" max="{{ date('Y') }}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="price" class="form-label">Price</label>
                                <input type="text" name="price" id="price" class="form-control" step="0.01">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="engine_power" class="form-label">Engine Power</label>
                                <input type="text" name="engine_power" id="engine_power" class="form-control" placeholder="e.g., 150 HP">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="steering_position" class="form-label">Steering Position</label>
                                <select id="steering_position" name="steering_position" class="form-select" required>
                                    <option value="Left">Left</option>
                                    <option value="Right">Right</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="transmission" class="form-label">Transmission</label>
                                <select id="transmission" name="transmission" class="form-select" required>
                                    <option value="Automatic">Automatic</option>
                                    <option value="Manual">Manual</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="fuel_type" class="form-label">Fuel Type</label>
                                <select id="fuel_type" name="fuel_type" class="form-select" required>
                                    <option value="Petrol">Petrol</option>
                                    <option value="Diesel">Diesel</option>
                                    <option value="Electric">Electric</option>
                                    <option value="Hybrid">Hybrid</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="color" class="form-label">Color</label>
                                <input type="text" name="color" id="color" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea name="description" id="description" class="form-control" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="status" class="form-label">Status</label>
                                <select class="form-select" id="status" name="status">
                                    <option value="available">Available</option>
                                    <option value="sold">Sold</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="img_path" class="form-label">Image</label>
                                <input type="file" name="img_path" id="img_path" class="form-control">
                                <img id="previewImage" src="#" alt="Image Preview" class="img-fluid mt-2" style="max-height: 150px;">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn save-btn">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!-- Footer -->
    <footer>
        <p>&copy; 2025 ABC Cars . All rights reserved.</p>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        function openEditModal(id, condition, make, model, registration_year, price, engine_power, steering_position, transmission, fuel_type, color, description, status, img_path) {
            document.getElementById('carPostId').value = id;
            document.getElementById('condition').value = condition;
            document.getElementById('make').value = make;
            document.getElementById('model').value = model;
            document.getElementById('registration_year').value = registration_year;
            document.getElementById('price').value = price;
            document.getElementById('engine_power').value = engine_power;
            document.getElementById('steering_position').value = steering_position;
            document.getElementById('transmission').value = transmission;
            document.getElementById('fuel_type').value = fuel_type;
            document.getElementById('color').value = color;
            document.getElementById('description').value = description;
            document.getElementById('status').value = status;

            // Show image preview
            const previewImage = document.getElementById('previewImage');
            previewImage.src = `/storage/${img_path}`;

        }

        document.getElementById('updateCarForm').addEventListener('submit', function (e) {
            e.preventDefault();

            const formData = new FormData(this);
            const carPostId = formData.get('id');

            fetch(`/admin/car-posts/${carPostId}`, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: formData
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                if (data.success) {
                    alert(data.message);
                    location.reload(); // Refresh page to show updated data
                } else {
                    alert(data.message);
                }
            })
            .catch(error => console.error('Error:', error));
        });

    </script>

</body>
</html>

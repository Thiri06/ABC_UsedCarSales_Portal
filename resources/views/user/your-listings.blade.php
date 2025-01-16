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
            background-color: #d9e6f2;
            padding: 20px;
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
        /* New class for stat card */
        .stat-card {
            margin-top: 20px;
            background-color: #161632;
            color: #dfe0fd;
            border-radius: 10px;
            padding: 10px;
            transition: transform 0.3s ease-in-out;
        }

        .stat-card:hover {
            transform: scale(1.05);
            background-color: #222552;
        }

        .stat-card .stat-value {
            font-size: 12px;
            font-weight: bold;
        }
        .stat-card img {
            max-width: 100%;
            height: 210px;
            border-radius: 10px;
        }
        .modal img {
            max-width: 100%;
            max-height: 300px;
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
        .detail-texts {
            font-size: 13px;
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
                <h4 class="mb-4 title-bar">Your Posted Cars</h4>
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <div class="dashboard-container text-center">
                    {{-- Your Car Listing Start --}}
                    <div class="row">
                        @if($carPosts->isEmpty())
                            <div class="col-12">
                                <p>No car listings found. <a href="{{ route('user.create') }}">Click here to post a car</a>.</p>
                            </div>
                        @else
                            @foreach($carPosts as $post)
                            <div class="col-md-4 mb-4">
                                <div class="stat-card">
                                    <img src="{{ asset('storage/' . $post->img_path) }}" alt="Car Image" class="img-fluid width-100 height-100 rounded mb-3" style="object-fit: cover;">
                                    <h5>{{ $post->make }} {{ $post->model }}</h5>
                                    <p><strong>Price:</strong> ${{ number_format($post->price, 2) }}</p>
                                    <p>
                                        <strong>Status:</strong> 
                                        <span 
                                            class="badge {{ $post->status === 'available' ? 'bg-success' : 'bg-secondary' }}">
                                            {{ ucfirst($post->status) }}
                                        </span>
                                    </p>
                                    <button 
                                        class="btn btn-info btn-sm view-details-btn mb-4" 
                                        data-id="{{ $post->id }}"
                                        data-condition="{{ $post->condition }}"
                                        data-make="{{ $post->make }}"
                                        data-model="{{ $post->model }}"
                                        data-year="{{ $post->registration_year }}"
                                        data-price="{{ $post->price }}"
                                        data-engine="{{ $post->engine_power }}"
                                        data-steering="{{ $post->steering_position }}"
                                        data-transmission="{{ $post->transmission }}"
                                        data-fuel="{{ $post->fuel_type }}"
                                        data-color="{{ $post->color }}"
                                        data-description="{{ $post->description }}"
                                        data-status="{{ $post->status }}"
                                        data-image="{{ asset('storage/' . $post->img_path) }}">
                                        <i class="fas fa-eye"></i> View Details
                                    </button>
                                    @if($post->status === 'available')
                                        <form action="{{ route('user.deactivateCarPost', $post->id) }}" method="POST" style="display: inline;">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="btn btn-danger btn-sm mb-4"
                                            onclick="return confirm('Are you sure you want to deactivate this post?')">
                                                <i class="fas fa-trash-alt"></i> Deactivate
                                            </button>
                                        </form>
                                    @else
                                        <form action="{{ route('user.activateCarPost', $post->id) }}" method="POST" style="display: inline;">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="btn btn-success btn-sm mb-4"
                                            onclick="return confirm('Are you sure you want to activate this post?')">
                                                <i class="fas fa-check"></i> Activate
                                            </button>
                                        </form>
                                    @endif
                                </div>
                            </div>
                            {{-- View Detail Modal --}}
                            <div class="modal fade" id="viewDetailsModal" tabindex="-1" aria-labelledby="viewDetailsLabel" aria-hidden="true">
                                <div class="modal-dialog modal-md">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="viewDetailsLabel">Car Details</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <!-- Loading Spinner -->
                                            <div id="loadingSpinner" class="text-center my-3" style="display: none;">
                                                <div class="spinner-border text-primary" role="status">
                                                    <span class="visually-hidden">Loading...</span>
                                                </div>
                                            </div>
                                            <div id="carDetailsContent">
                                                <div class="text-center">
                                                    <img id="carImage" src="" alt="Car Image" class="img-fluid rounded mb-3" style="max-height: 300px; object-fit: cover;">
                                                </div>
                                                <!-- First Row -->
                                                <div class="row">
                                                    <div class="col text-start">
                                                        <p><strong style="color:#f36d33;">Condition:</strong> <span id="carCondition" class="detail-texts"></span></p>
                                                    </div>
                                                    <div class="col text-start">
                                                        <p><strong style="color:#f36d33;">Registration:</strong> <span id="carYear" class="detail-texts"></span></p>
                                                    </div>
                                                </div>

                                                <!-- Second Row -->
                                                <div class="row">
                                                    <div class="col  text-start">
                                                        <p><strong style="color:#f36d33;">Make:</strong> <span id="carMake" class="detail-texts"></span></p>
                                                    </div>
                                                    <div class="col text-start">
                                                        <p><strong style="color:#f36d33;">Model:</strong> <span id="carModel" class="detail-texts"></span></p>
                                                    </div>
                                                </div>

                                                <!-- Third Row -->
                                                <div class="row">
                                                    <div class="col text-start">
                                                        <p><strong style="color:#f36d33;">Price:</strong> $<span id="carPrice" class="detail-texts"></span></p>
                                                    </div>
                                                    <div class="col text-start">
                                                        <p><strong style="color:#f36d33;">Engine Power:</strong> <span id="carEngine" class="detail-texts"></span></p>
                                                    </div>
                                                </div>

                                                <!-- Fourth Row -->
                                                <div class="row">
                                                    <div class="col text-start">
                                                        <p><strong style="color:#f36d33;">Steering Position:</strong> <span id="carSteering" class="detail-texts"></span></p>
                                                    </div>
                                                    <div class="col text-start">
                                                        <p><strong style="color:#f36d33;">Transmission:</strong> <span id="carTransmission" class="detail-texts"></span></p>
                                                    </div>
                                                </div>

                                                <!-- Fifth Row -->
                                                <div class="row">
                                                    <div class="col text-start">
                                                        <p><strong style="color:#f36d33;">Fuel Type:</strong> <span id="carFuel" class="detail-texts"></span></p>
                                                    </div>
                                                    <div class="col text-start">
                                                        <p><strong style="color:#f36d33;">Color:</strong> <span id="carColor" class="detail-texts"></span></p>
                                                    </div>
                                                </div>

                                                <!-- Sixth Row -->
                                                <div class="row mt-2 mb-2">
                                                    <div class="col text-start">
                                                        <p><strong style="color:#f36d33;">Description:</strong> <span id="carDescription"  class="detail-texts"></span></p>
                                                    </div>
                                                </div>
                                                <!-- Seventh Row -->
                                                <div class="row">
                                                    <div class="col text-start">
                                                        <p><strong style="color:#f36d33;">Status:</strong> <span id="carStatus" class="detail-texts"></span></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary mb-3" data-bs-dismiss="modal">Close</button>
                                            <button type="button" 
                                                id="editCarBtn"
                                                class="btn btn-outline-primary mb-3" 
                                                data-bs-toggle="modal" 
                                                data-bs-target="#updateCarModal" 
                                                onclick="openEditModal(
                                                    {{ $post->id }},
                                                    '{{ $post->condition }}',
                                                    '{{ $post->make }}',
                                                    '{{ $post->model }}',
                                                    '{{ $post->registration_year }}',
                                                    '{{ $post->price }}',
                                                    '{{ $post->engine_power }}',
                                                    '{{ $post->steering_position }}',
                                                    '{{ $post->transmission }}',
                                                    '{{ $post->fuel_type }}',
                                                    '{{ $post->color }}',
                                                    '{{ $post->description }}',
                                                    '{{ $post->status }}',
                                                    '{{ $post->img_path }}',
                                                )">
                                                Edit
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- Modal for Updating Car Posts --}}
                            <div class="modal fade" id="updateCarModal" tabindex="-1" aria-labelledby="updateCarModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="updateCarModalLabel">Update Car Post</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form id="updateCarForm" method="POST" action="{{ route('user.updateCarPost', ['id' => $post->id]) }}" enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            
                                            <div class="modal-body">
                                                <input type="hidden" name="id" id="carPostId">
                                                <div class="row">
                                                    <div class="col-md-12 mb-3">
                                                        <img id="previewImage" src="#" alt="Image Preview" class="img-fluid mt-2 mb-4" style="max-width: 200px; max-height: 150px;"><br>
                                                        <br>
                                                        <label for="img_path" class="form-label">Image</label>
                                                        <input type="file" name="img_path" id="img_path" class="form-control">
                                                    </div>
                                                </div>
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
                                                            <option value="unavailable">Unavailable</option>
                                                        </select>
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
                            @endforeach
                        @endif
                    </div>
                    {{-- Your Car Listing End --}}
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
    <script>
        // Handle view details button clicks
        document.querySelectorAll('.view-details-btn').forEach(button => {
            button.addEventListener('click', function () {
                const carId = this.getAttribute('data-id');
                const modal = document.getElementById('viewDetailsModal');
                const loadingSpinner = document.getElementById('loadingSpinner');
                const carDetailsContent = document.getElementById('carDetailsContent');

                loadingSpinner.style.display = 'block';
                carDetailsContent.style.display = 'none';

                fetch(`/user/car-posts/${carId}`)
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            document.getElementById('carImage').src = data.car.img_path;
                            document.getElementById('carCondition').textContent = data.car.condition;
                            document.getElementById('carMake').textContent = data.car.make;
                            document.getElementById('carModel').textContent = data.car.model;
                            document.getElementById('carYear').textContent = data.car.registration_year;
                            document.getElementById('carPrice').textContent = data.car.price;
                            document.getElementById('carEngine').textContent = data.car.engine_power;
                            document.getElementById('carSteering').textContent = data.car.steering_position;
                            document.getElementById('carTransmission').textContent = data.car.transmission;
                            document.getElementById('carFuel').textContent = data.car.fuel_type;
                            document.getElementById('carColor').textContent = data.car.color;
                            document.getElementById('carDescription').textContent = data.car.description;
                            document.getElementById('carStatus').textContent = data.car.status;

                            loadingSpinner.style.display = 'none';
                            carDetailsContent.style.display = 'block';

                            const viewDetailsModal = new bootstrap.Modal(modal);
                            viewDetailsModal.show();
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        loadingSpinner.style.display = 'none';
                    });
            });
        });
        // Handle status update forms
        document.querySelectorAll('form').forEach(form => {
            if (form.action.includes('activateCarPost') || form.action.includes('deactivateCarPost')) {
                form.addEventListener('submit', function(e) {
                    e.preventDefault();
                    
                    if (!confirm('Are you sure you want to change the status of this post?')) {
                        return;
                    }

                    fetch(this.action, {
                        method: 'POST',
                        body: new FormData(this),
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        if(data.success) {
                            const carId = this.closest('.stat-card').querySelector('.view-details-btn').dataset.id;
                            const viewDetailsBtn = document.querySelector(`[data-id="${carId}"]`);
                            viewDetailsBtn.dataset.status = data.status;
                            
                            if(document.getElementById('viewDetailsModal').classList.contains('show')) {
                                document.getElementById('carStatus').textContent = data.status;
                            }
                            
                            location.reload();
                        }
                    })
                    .catch(error => console.error('Error:', error));
                });
            }
        });

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
            formData.append('status', document.getElementById('status').value);
            const carPostId = formData.get('id');

            fetch(`/user/car-posts/${carPostId}`, {
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
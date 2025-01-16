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
            border-radius: 10px;
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
        .table th, 
        .table td {
            font-size: 14px; 
            vertical-align: middle; 
            padding: 10px; 
        }

        .table th {
            font-weight: bold;
            background-color: #f8f9fa; 

        }
        .table td {
            font-size: 13px; 
        }

        .table-secondary {
            background-color: #f2f2f2; /* Gray out banned users */
            color: #a0a0a0;
        }
        .table-secondary td, .table-secondary th {
            text-decoration: line-through;
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
                {{-- Session Message --}}
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <h4 class="mb-4 title-bar">Manage Users</h4>

                <div class="dashboard-container">
                    <div class="table-responsive" style="overflow-x: auto;">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Address</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                <tr class="{{ $user->banned_at ? 'table-secondary' : '' }}"> <!-- Grays out banned rows -->
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->phone }}</td>
                                    <td>{{ $user->address }}</td>
                                    <td>
                                        @if($user->banned_at)
                                            <span class="text-danger">Banned</span>
                                        @else
                                            <span class="text-success">Active</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($user->banned_at)
                                            <!-- Show Unban Button for Banned Users -->
                                            <form action="{{ route('admin.unBanUser', $user->id) }}" method="POST" style="display:inline-block;">
                                                @csrf
                                                @method('PUT')
                                                <button class="btn btn-success btn-sm" onclick="return confirm('Are you sure?')">Activate</button>
                                            </form>
                                        @else
                                            <!-- Show Edit and Ban Buttons for Active Users -->
                                            <a href="#" class="btn btn-primary btn-sm btn-edit" data-user-id="{{ $user->id }}">Edit</a>
                                            <form action="{{ route('admin.banUser', $user->id) }}" method="POST" style="display:inline-block;">
                                                @csrf
                                                @method('PUT')
                                                <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to deactivate this user account?')">Deactivate</button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- Modal for Editing User -->
    <div class="modal fade" id="editUserModal" tabindex="-1" aria-labelledby="editUserModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #161632; color: #dfe0fd;">
                    <h5 class="modal-title" id="editUserModalLabel">Edit User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" style="background-color: #1a1b2f; color: #dfe0fd;">
                    <form id="editUserForm" method="POST" action="">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name" required style="background-color: #22244a; color: #dfe0fd; border: 1px solid #3f3f72;">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required style="background-color: #22244a; color: #dfe0fd; border: 1px solid #3f3f72;">
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="text" class="form-control" id="phone" name="phone" style="background-color: #22244a; color: #dfe0fd; border: 1px solid #3f3f72;">
                        </div>
                        <div class="mb-3">
                            <label for="address" class="form-label">Address</label>
                            <input type="text" class="form-control" id="address" name="address" style="background-color: #22244a; color: #dfe0fd; border: 1px solid #3f3f72;">
                        </div>

                        <div class="modal-footer" style="background-color: #161632;">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary" style="background-color: #f36d33; border-color: #f36d33;">Save Changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>



    
    
    {{-- Dashboard Content End --}}

    <!-- Footer -->
    <footer>
        <p>&copy; 2025 ABC Cars . All rights reserved.</p>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Add event listener for the Edit buttons
        document.querySelectorAll('.btn-edit').forEach(button => {
            button.addEventListener('click', function () {
                const userId = this.dataset.userId; // Get user ID from the button's data attribute

                // Fetch user data from the server (AJAX request)
                fetch(`/admin/users/${userId}/edit`)
                    .then(response => response.json())
                    .then(data => {
                        // Populate the modal with user data
                        document.getElementById('name').value = data.name;
                        document.getElementById('email').value = data.email;
                        document.getElementById('phone').value = data.phone;
                        document.getElementById('address').value = data.address;

                        // Update the form action to send PUT request to update the user
                        const form = document.getElementById('editUserForm');
                        form.action = `/admin/users/${userId}/edit`; // Set the correct action URL

                        // Show the modal
                        new bootstrap.Modal(document.getElementById('editUserModal')).show();
                    })
                    .catch(error => {
                        console.error('Error fetching user data:', error);
                    });
            });
        });

    </script>

</body>
</html>
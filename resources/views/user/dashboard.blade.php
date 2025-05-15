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
            background-color: transparent;
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

        /* Custom grid for cards */
        /* .stat-cards-container {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
        } */

        .stat-card .stat-value {
            font-size: 12px;
            font-weight: bold;
        }

        /* New chart container */
        .chart-container {
            margin-top: 40px;
            display: flex;
        }

        .chart {
            border-radius: 10px;
            padding: 10px;
        }

        .chart h5 {
            color:#f36d33;
            margin-bottom: 20px;
            font-weight: bold;
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
                <h4 class="mb-4 title-bar">User Dashboard</h4>
                <div class="dashboard-container text-center">
                    {{-- Notifications from Bid Status --}}
                    @if(Auth::user()->unreadNotifications->isNotEmpty())
                        @foreach(Auth::user()->unreadNotifications as $notification)
                            <div id="notification-{{ str_replace('-', '_', $notification->id) }}" 
                                class="alert alert-info alert-dismissible fade show" role="alert">
                                <strong>{{ $notification->data['message'] }}</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" 
                                        onclick="dismissNotification('{{ $notification->id }}')"></button>
                            </div>
                        @endforeach
                    @else
                        <div class="alert alert-secondary" role="alert">
                            No new notifications.
                        </div>
                    @endif

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
        function dismissNotification(notificationId) {
            const domId = `notification-${notificationId.replace(/-/g, '_')}`;
            fetch(`{{ route('user.notifications.dismiss', '') }}/${notificationId}`, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Content-Type': 'application/json'
                }
            }).then(response => {
                if (response.ok) {
                    const element = document.getElementById(domId);
                    if (element) {
                        element.remove();
                    } else {
                        console.error(`Element with ID ${domId} not found.`);
                    }
                } else {
                    console.error('Failed to dismiss notification');
                }
            }).catch(error => {
                console.error('Error:', error);
            });
        }
    </script>

</body>
</html>
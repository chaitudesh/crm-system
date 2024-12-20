<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard')</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Include FontAwesome Icons (for icons like users, tasks, etc.) -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    
    <style>
        /* Navbar Styling */
        .navbar {
            background-color: #2c3e50;
            border-bottom: 2px solid #34495e;
        }

        .navbar-brand {
            font-size: 1.5rem;
            font-weight: bold;
            color: #ecf0f1 !important;
        }

        .navbar-nav .nav-link {
            color: #ecf0f1 !important;
        }

        .navbar-nav .nav-link:hover {
            color: #1abc9c !important;
        }

        .navbar .badge {
            font-size: 0.8rem;
            padding: 4px 6px;
        }

        .dropdown-menu {
            background-color: #34495e;
            border: none;
        }

        .dropdown-menu .dropdown-item {
            color: #ecf0f1;
        }

        .dropdown-menu .dropdown-item:hover {
            background-color: #1abc9c;
            color: #fff;
        }

        .navbar .rounded-circle {
            width: 40px;
            height: 40px;
            object-fit: cover;
        }
    </style>

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow">
        <div class="container-fluid">
            <!-- Brand Logo -->
            <a class="navbar-brand d-flex align-items-center" href="/">
                <i class="fas fa-users me-2"></i> CRM System

            </a>

            <!-- Toggle Button for Mobile View -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Navbar Content -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <!-- Search Bar -->
                    @if(session('user_name'))

                   

                    <!-- Profile Dropdown -->
                   
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="profileDropdown"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png" class="rounded-circle me-2" alt="Profile">
                                <span>{{session('user_name');}} </span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profileDropdown">
                                <li><a class="dropdown-item" href="#">Profile</a></li>
                                <li><a class="dropdown-item" href="#">Settings</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item text-danger" href="{{Route('logout')}}">Logout</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <!-- Main Content -->
        @yield('content')
    </div>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- FontAwesome for icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

    <!-- Bootstrap JS and Popper -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
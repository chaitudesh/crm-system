@extends('layouts.dashboard')

@section('content')


<style>
    /* Sidebar Styling */
    .sidebar {
        height: 100%;
        /* Full height */
        width: 100%;
        /* Full width of the column */
        background-color: #343a40;
        /* Dark background color */
        padding-top: 20px;
        /* Padding at the top */
    }

    .sidebar h3 {
        font-size: 1.5rem;
        font-weight: bold;
        color: #ffffff;
        margin-bottom: 20px;
    }

    .sidebar .nav-item {
        margin: 10px 0;
    }

    .sidebar .nav-link {
        font-size: 1rem;
        padding: 10px 15px;
        border-radius: 5px;
        color: #ffffff;
        transition: background-color 0.3s ease, color 0.3s ease;
    }

    .sidebar .nav-link:hover {
        background-color: #495057;
        color: #ffffff;
        text-decoration: none;
    }

    .sidebar .nav-link i {
        margin-right: 10px;
        /* Space between the icon and text */
    }

    .position-fixed {
        position: fixed;
        /* Keep the sidebar fixed on the left */
        top: 0;
        bottom: 0;
        left: 0;
    }

    body {
        margin-left: 250px;
        /* Ensure content does not overlap the sidebar */
    }

    @media (max-width: 768px) {
        .sidebar {
            position: relative;
            width: 100%;
        }

        .position-fixed {
            position: static;
            /* Allow sidebar to move in smaller screens */
        }

        body {
            margin-left: 0;
        }
    }

    /* Card Styling */
    .card {
        border-radius: 10px;
    }

    .progress-bar {
        border-radius: 20px;
        height: 15px;
    }

    /* Adjusting Grid for Responsiveness */
    @media (max-width: 576px) {
        .col-md-6 {
            flex: 0 0 100%;
            /* Full-width for small devices */
            max-width: 100%;
        }
    }
</style>

<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        <div class="col-md-3 col-lg-2 bg-dark text-white vh-100 position-fixed start-0">
            <div class="sidebar">
                <h3 class="text-center py-3">CRM System</h3>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('dashboard') }}">
                            <i class="fas fa-tachometer-alt me-2"></i> Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('customers.index') }}">
                            <i class="fas fa-users me-2"></i> Customers
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('contacts.index') }}">
                            <i class="fas fa-address-book me-2"></i> Contacts
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('leads.index') }}">
                            <i class="fas fa-bullseye me-2"></i> Leads
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('tasks.index') }}">
                            <i class="fas fa-tasks me-2"></i> Tasks
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('opportunities.index') }}">
                            <i class="fas fa-chart-line me-2"></i> Opportunity
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#">
                            <i class="fas fa-cog me-2"></i> Settings
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{Route('logout')}}">
                            <i class="fas fa-sign-out-alt me-2"></i> Logout
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Main Content -->
        <div class="col-md-9 col-lg-10 offset-md-3 offset-lg-2">
            <div class="row mt-4">
                <!-- Finance Progress -->
                <div class="col-md-6 col-lg-6">
                    <div class="card bg-secondary text-white mb-3">
                        <div class="card-body">
                            <h3>Your Finance Target</h3>
                            <div class="progress">
                                <div class="progress-bar bg-primary" style="width: 78%"></div>
                            </div>
                            <p class="mt-2">Achieved well and smoothly</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recent Data (Tasks, Customers) -->
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Recent Customers</h3>
                        </div>
                        <div class="card-body">
                            <ul>
                                @foreach ($recentCustomers as $customer)
                                    <li>{{ $customer->name }} - {{ $customer->email }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Recent Tasks</h3>
                        </div>
                        <div class="card-body">
                            <ul>
                                @foreach ($recentTasks as $task)
                                    <li>{{ $task->title }} - {{ $task->due_date }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
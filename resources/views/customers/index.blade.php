@extends('layouts.dashboard')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
                    <h3 class="card-title">Customer List</h3>
                    <!-- Add Customer Button -->
                    <a href="{{ route('customers.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus me-2"></i> Add Customer
                    </a>
                </div>
                <div class="card-body">
                    <!-- Customer List -->
                    <ul class="list-group">
                        @foreach ($customers as $customer)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <div>
                                    <h5 class="mb-1">{{ $customer->name }}</h5>
                                    <p class="mb-0 text-muted">{{ $customer->email }}</p>
                                </div>
                                <div>
                                    <a href="{{ route('customers.show', $customer->id) }}" class="btn btn-info btn-sm">
                                        <i class="fas fa-eye me-2"></i> View
                                    </a>
                                    <a href="{{ route('customers.edit', $customer->id) }}" class="btn btn-warning btn-sm">
                                        <i class="fas fa-edit me-2"></i> Edit
                                    </a>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
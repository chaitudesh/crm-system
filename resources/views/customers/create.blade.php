@extends('layouts.dashboard')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-dark text-white">
                    <h3 class="card-title">Add Customer</h3>
                </div>
                <div class="card-body">
                    <!-- Customer Creation Form -->
                    <form action="{{ route('customers.store') }}" method="POST">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="name" class="form-label">Customer Name</label>
                            <input type="text" class="form-control" name="name" id="name"
                                placeholder="Enter customer name" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="email" class="form-label">Customer Email</label>
                            <input type="email" class="form-control" name="email" id="email"
                                placeholder="Enter customer email" required>
                        </div>

                        <button type="submit" class="btn btn-primary mt-3">
                            <i class="fas fa-save me-2"></i> Add Customer
                        </button>
                        <a href="{{ route('customers.index') }}" class="btn btn-secondary mt-3 ms-2">
                            <i class="fas fa-arrow-left me-2"></i> Back to List
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
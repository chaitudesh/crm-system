@extends('layouts.dashboard')

@section('content')
<style>
    .form-container {
        background-color: #f8f9fa;
        border-radius: 10px;
        padding: 20px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .form-container h3 {
        font-weight: bold;
        color: #343a40;
        margin-bottom: 20px;
    }

    .form-control {
        border-radius: 5px;
    }

    .btn-primary {
        background-color: #3f8ad4;
        border: none;
    }

    .btn-primary:hover {
        background-color: #357ab8;
    }
</style>

<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="form-container">
                <h3>Add New Lead</h3>
                <form action="{{ route('leads.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="Enter name" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="Enter email"
                            required>
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="text" name="phone" id="phone" class="form-control" placeholder="Enter phone number"
                            required>
                    </div>
                    <div class="mb-3">
                        <label for="source" class="form-label">Source</label>
                        <select name="source" id="source" class="form-control" required>
                            <option value="">Select Source</option>
                            <option value="Website">Website</option>
                            <option value="Referral">Referral</option>
                            <option value="Advertisement">Advertisement</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select name="status" id="status" class="form-control" required>
                            <option value="">Select Status</option>
                            <option value="New">New</option>
                            <option value="In Progress">In Progress</option>
                            <option value="Closed">Closed</option>
                        </select>
                    </div>
                    <div class="text-end">
                        <button type="submit" class="btn btn-primary">Save Lead</button>
                        <a href="{{ route('leads.index') }}" class="btn btn-secondary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
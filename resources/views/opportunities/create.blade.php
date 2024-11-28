@extends('layouts.dashboard')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-dark text-white">
                    <h3 class="card-title">Add Opportunity</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('opportunities.store') }}" method="POST">
                        @csrf
                        <!-- Name Field -->
                        <div class="form-group mb-3">
                            <label for="name" class="form-label">Opportunity Name</label>
                            <input type="text" class="form-control" id="name" name="name"
                                placeholder="Enter opportunity name" required>
                        </div>

                        <!-- Stage Field -->
                        <div class="form-group mb-3">
                            <label for="stage" class="form-label">Stage</label>
                            <select class="form-select" id="stage" name="stage" required>
                                <option value="">Select Stage</option>
                                <option value="Prospecting">Prospecting</option>
                                <option value="Qualification">Qualification</option>
                                <option value="Proposal">Proposal</option>
                                <option value="Negotiation">Negotiation</option>
                                <option value="Closed Won">Closed Won</option>
                                <option value="Closed Lost">Closed Lost</option>
                            </select>
                        </div>

                        <!-- Value Field -->
                        <div class="form-group mb-3">
                            <label for="value" class="form-label">Value</label>
                            <input type="number" class="form-control" id="value" name="value"
                                placeholder="Enter opportunity value" required>
                        </div>

                        <!-- Expected Close Date -->
                        <div class="form-group mb-3">
                            <label for="expected_close_date" class="form-label">Expected Close Date</label>
                            <input type="date" class="form-control" id="expected_close_date" name="expected_close_date"
                                required>
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-2"></i> Save Opportunity
                        </button>
                        <a href="{{ route('opportunities.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left me-2"></i> Back to List
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
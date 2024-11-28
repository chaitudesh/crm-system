@extends('layouts.dashboard')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-dark text-white">
                    <h3 class="card-title">Edit Lead</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('leads.update', $lead->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <!-- Name Field -->
                        <div class="form-group mb-3">
                            <label for="name" class="form-label">Lead Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $lead->name }}"
                                required>
                        </div>

                        <!-- Email Field -->
                        <div class="form-group mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ $lead->email }}"
                                required>
                        </div>

                        <!-- Phone Field -->
                        <div class="form-group mb-3">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="text" class="form-control" id="phone" name="phone" value="{{ $lead->phone }}"
                                required>
                        </div>

                        <!-- Source Field -->
                        <div class="form-group mb-3">
                            <label for="source" class="form-label">Source</label>
                            <select class="form-select" id="source" name="source" required>
                                <option value="">Select Source</option>
                                <option value="Referral" {{ $lead->source == 'Referral' ? 'selected' : '' }}>Referral
                                </option>
                                <option value="Website" {{ $lead->source == 'Website' ? 'selected' : '' }}>Website
                                </option>
                                <option value="Advertisement" {{ $lead->source == 'Advertisement' ? 'selected' : '' }}>
                                    Advertisement</option>
                                <option value="Social Media" {{ $lead->source == 'Social Media' ? 'selected' : '' }}>
                                    Social Media</option>
                                <option value="Email" {{ $lead->source == 'Email' ? 'selected' : '' }}>Email</option>
                                <option value="Other" {{ $lead->source == 'Other' ? 'selected' : '' }}>Other</option>
                            </select>
                        </div>


                        <!-- Submit Button -->
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-2"></i> Update Lead
                        </button>
                        <a href="{{ route('leads.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left me-2"></i> Back to List
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
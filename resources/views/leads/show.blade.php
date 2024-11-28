@extends('layouts.dashboard')

@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="card">
                <div class="card-header bg-dark text-white">
                    <h3 class="card-title">Lead Details</h3>
                </div>
                <div class="card-body">
                    <h4 class="mb-3">Lead Information</h4>
                    <ul class="list-group">
                        <li class="list-group-item"><strong>Name:</strong> {{ $lead->name }}</li>
                        <li class="list-group-item"><strong>Email:</strong> {{ $lead->email }}</li>
                        <li class="list-group-item"><strong>Phone:</strong> {{ $lead->phone }}</li>
                        <li class="list-group-item"><strong>Source:</strong> {{ $lead->source }}</li>
                        <li class="list-group-item"><strong>Status:</strong> {{ $lead->status }}</li>
                    </ul>
                    <a href="{{ route('leads.index') }}" class="btn btn-secondary mt-3">Back to Leads</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
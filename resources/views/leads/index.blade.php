@extends('layouts.dashboard')

@section('content')
<style>
    .page-title {
        font-size: 1.8rem;
        font-weight: bold;
        color: #333;
        margin-bottom: 20px;
    }

    .add-lead-btn {
        float: right;
        font-size: 1rem;
        font-weight: 500;
        border-radius: 20px;
        padding: 8px 20px;
    }

    .card {
        border-radius: 10px;
    }

    .table-container {
        background-color: #ffffff;
        border-radius: 10px;
        padding: 20px;
        box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
    }

    /* Change thead and th text color to black */
    .table thead th {
        color: #000;
        /* Black text */
        background-color: #f8f9fa;
        /* Light background for better contrast */
        text-align: center;
        vertical-align: middle;
        font-weight: bold;
    }


    .table th {
        background-color: #007bff;
        color: #ffffff;
        text-align: center;
        vertical-align: middle;
    }

    .table td {
        text-align: center;
        vertical-align: middle;
    }

    .table tbody tr:hover {
        background-color: #f9f9f9;
    }

    .badge {
        font-size: 0.85rem;
        padding: 5px 10px;
        border-radius: 20px;
    }

    .badge-primary {
        background-color: #007bff;
    }

    .badge-warning {
        background-color: #ffc107;
        color: #000;
    }

    .badge-success {
        background-color: #28a745;
    }

    .badge-secondary {
        background-color: #6c757d;
    }

    .btn-actions .btn {
        margin-right: 5px;
    }

    @media (max-width: 768px) {
        .table {
            font-size: 0.9rem;
        }

        .page-title {
            font-size: 1.5rem;
        }

        .add-lead-btn {
            width: 100%;
            margin-top: 10px;
            text-align: center;
        }
    }
</style>

<div class="container-fluid">
    <div class="row mb-4">
        <div class="col-12">
            <h1 class="page-title">Leads</h1>
            <!-- Add Lead Button -->
            <a href="{{ route('leads.create') }}" class="btn btn-primary add-lead-btn">
                <i class="fas fa-plus-circle me-2"></i> Add Lead
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="table-container">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Source</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($leads as $lead)
                            <tr>
                                <td>{{ $lead->id }}</td>
                                <td>{{ $lead->name }}</td>
                                <td>{{ $lead->email }}</td>
                                <td>{{ $lead->phone }}</td>
                                <td>{{ $lead->source }}</td>
                                <td>
                                    <span class="badge 
                                                                                                    @if($lead->status === 'New') badge-primary 
                                                                                                    @elseif($lead->status === 'In Progress') badge-warning 
                                                                                                    @elseif($lead->status === 'Closed') badge-success 
                                                                                                        @else badge-secondary 
                                                                                                    @endif">
                                        {{ $lead->status }}
                                    </span>
                                </td>
                                <td class="btn-actions">
                                    <a href="{{ route('leads.show', $lead->id) }}" class="btn btn-primary btn-sm">
                                        <i class="fas fa-eye"></i> View
                                    </a>
                                    <a href="{{ route('leads.edit', $lead->id) }}" class="btn btn-secondary btn-sm">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    <form action="{{ route('leads.destroy', $lead->id) }}" method="POST"
                                        style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"
                                            onclick="return confirm('Do you Really want to Delete this ?')">
                                            <i class="fas fa-trash"></i> Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
@extends('layouts.dashboard')

@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-dark text-white">
                    <h3 class="card-title">Opportunities</h3>
                    <a href="{{ route('opportunities.create') }}" class="btn btn-primary float-end">
                        <i class="fas fa-plus-circle"></i> Add Opportunity
                    </a>
                </div>
                <div class="card-body">
                    @if ($opportunities->isEmpty())
                        <p class="text-muted">No opportunities found. Click "Add Opportunity" to create one.</p>
                    @else
                        <table class="table table-striped table-bordered">
                            <thead class="table-dark">
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Stage</th>
                                    <th>Value</th>
                                    <th>Expected Close Date</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($opportunities as $opportunity)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $opportunity->name }}</td>
                                        <td>{{ $opportunity->stage }}</td>
                                        <td>{{ $opportunity->value }}</td>
                                        <td>{{ $opportunity->expected_close_date }}</td>
                                        <td>
                                            <a href="{{ route('opportunities.show', $opportunity->id) }}"
                                                class="btn btn-info btn-sm">View</a>
                                            <a href="{{ route('opportunities.edit', $opportunity->id) }}"
                                                class="btn btn-warning btn-sm">Edit</a>
                                            <form action="{{ route('opportunities.destroy', $opportunity->id) }}" method="POST"
                                                class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
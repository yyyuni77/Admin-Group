@extends('layouts.app', ['pageSlug' => 'passenger-management'])

@section('content')

<!-- Passenger Management Title -->
<div class="row">
    <div class="col-12 text-center mb-5">
        <h1 class="display-2 text-white">{{ __('PASSENGER MANAGEMENT') }}</h1>
    </div>
</div>

<!-- Flash Message for Success -->
@if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<!-- Add Passenger Button -->
<div class="mb-3">
    <a href="{{ route('passengers.create') }}" class="btn btn-success">Add New Passenger</a>
</div>

<!-- Passenger Table -->
<table class="table">
    <thead>
        <tr>
            <th>No.</th>
            <th>Full Name</th>
            <th>Gender</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Student ID</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @isset($passengers)
            @forelse ($passengers as $key => $passenger)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $passenger->fullname }}</td>
                    <td>{{ $passenger->gender }}</td>
                    <td>{{ $passenger->email }}</td>
                    <td>{{ $passenger->phone }}</td>
                    <td>{{ $passenger->student_id }}</td>
                    <td>
                        <!-- Edit Button -->
                        <a href="{{ route('passengers.edit', $passenger->id) }}" class="btn btn-primary btn-sm">Edit</a>
                        
                        <!-- View Button -->
                        <a href="{{ route('passengers.show', $passenger->id) }}" class="btn btn-info btn-sm">View</a>

                        <!-- Verify Identity Button -->
                        <form action="{{ route('passengers.verify', $passenger->id) }}" method="POST" style="display:inline;">
                            @csrf
                            <button type="submit" class="btn btn-warning btn-sm">Verify Identity</button>
                        </form>

                        <!-- Suspend Account Button -->
                        <form action="{{ route('passengers.suspend', $passenger->id) }}" method="POST" style="display:inline;">
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm">Suspend Account</button>
                        </form>

                        <!-- Delete Button -->
                        <form action="{{ route('passengers.destroy', $passenger->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this passenger?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center">No passengers found.</td>
                </tr>
            @endforelse
        @endisset
    </tbody>
</table>

@endsection

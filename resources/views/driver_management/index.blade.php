@extends('layouts.app', ['pageSlug' => 'driver-management'])

@section('content')

<!-- Driver Management Title -->
<div class="row">
    <div class="col-12 text-center mb-5">
        <h1 class="display-2 text-white">{{ __('DRIVER MANAGEMENT') }}</h1>
    </div>
</div>

<a href="{{ route('drivers.create') }}" class="btn btn-primary">Add New Driver</a>


@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table">
    <thead>
        <tr>
            <th>Full Name</th>
            <th>Gender</th>
            <th>Student ID</th>
            <th>Email</th>
            <th>Phone Number</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($drivers as $driver)
        <tr>
            <td>{{ $driver->fullname }}</td>
            <td>{{ $driver->gender }}</td>
            <td>{{ $driver->student_id }}</td>
            <td>{{ $driver->email }}</td>
            <td>{{ $driver->phone }}</td>
            <td>
                <!-- Buttons arranged horizontally with spacing -->
                <div class="d-flex flex-wrap gap-2">
                    <a href="{{ route('drivers.show', $driver->id) }}" class="btn btn-info btn-sm">View</a>
                    <a href="{{ route('drivers.edit', $driver->id) }}" class="btn btn-warning btn-sm">Edit</a>

                    <form action="{{ route('drivers.suspend', $driver->id) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="btn btn-secondary btn-sm" 
                            onclick="return confirm('Are you sure you want to {{ $driver->status === 'active' ? 'suspend' : 'activate' }} this account?')">
                            {{ $driver->status === 'active' ? 'Suspend' : 'Activate' }}
                        </button>
                    </form>

                    <form action="{{ route('drivers.destroy', $driver->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>

                    @if (!$driver->license_verified)
                        <form action="{{ route('drivers.verify-license', $driver->id) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="btn btn-success btn-sm">Verify License</button>
                        </form>
                    @else
                        <span class="badge bg-success p-2">Verified</span>
                    @endif
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

</div>

@endsection

@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Driver Details</h2>
    <table class="table table-bordered">
        <tr>
            <th>Full Name</th>
            <td>{{ $driver->fullname }}</td>
        </tr>
        <tr>
            <th>Gender</th>
            <td>{{ ucfirst($driver->gender) }}</td>
        </tr>
        <tr>
            <th>Student ID</th>
            <td>{{ $driver->student_id }}</td>
        </tr>
        <tr>
            <th>Email</th>
            <td>{{ $driver->email }}</td>
        </tr>
        <tr>
            <th>Phone</th>
            <td>{{ $driver->phone }}</td>
        </tr>
    </table>
    <a href="{{ route('drivers.index') }}" class="btn btn-secondary">Back</a>
</div>
@endsection

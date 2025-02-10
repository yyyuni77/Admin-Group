@extends('layouts.app', ['pageSlug' => 'user-management'])

@section('content')

<!-- User Management Title -->
<div class="row">
    <div class="col-12 text-center mb-5">
        <h1 class="display-2 text-white">{{ __('USER MANAGEMENT') }}</h1>
    </div>
</div>


<div class="row">
    <!-- Driver Management Button -->
    <div class="col-lg-3 col-md-6">
        <div class="card card-body text-center">
            <img src="{{ asset('black/img/driver.png') }}" alt="Driver Management" class="img-fluid mb-3" style="width: 200px; height: 200px;">
            <a href="{{ route('driver.management') }}" class="btn btn-primary btn-sm">DRIVER MANAGEMENT</a>
        </div>
    </div>

    <!-- Passenger Management Button -->
    <div class="col-lg-3 col-md-6">
        <div class="card card-body text-center">
            <img src="{{ asset('black/img/passenger.png') }}" alt="Passenger Management" class="img-fluid mb-3" style="width: 200px; height: 200px;">
            <a href="{{ route('passenger.management') }}" class="btn btn-primary btn-sm">PASSENGER MANAGEMENT</a>
        </div>
    </div>
</div>

@endsection

@extends('layouts.app')

@section('content')
<div class="container text-center mt-5">
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <h2>Welcome, {{ Auth::guard('driver')->user()->name }}</h2>
    <p>This is your dashboard</p>
    <form method="POST" action="{{ route('driver.logout') }}">
        @csrf
        <button type="submit" class="btn btn-danger">Logout</button>
    </form>
</div>
@endsection

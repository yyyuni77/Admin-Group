<!-- resources/views/admin-login-register.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="header py-7 py-lg-8">
        <div class="container">
            <div class="header-body text-center mb-7">
                <div class="row justify-content-center">
                    <div class="col-lg-5 col-md-6">
                        <h1 class="text-white display-2">{{ __('Welcome Admin!'') }}</h1>
                        <p class="text-lead text-light display-4">
                            {{ __('Please choose your action below.') }}
                        </p>
                        <!-- Buttons for Admin Login and Register -->
                        <div class="d-flex justify-content-center gap-5 mt-4">
                            <a href="{{ route('admin.login') }}" class="btn btn-primary btn-lg">
                                {{ __('Login') }}
                            </a>
                            <a href="{{ route('admin.register') }}" class="btn btn-success btn-lg">
                                {{ __('Register') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

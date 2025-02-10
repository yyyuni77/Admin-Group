@extends('layouts.app')

@section('content')
    <div class="header py-7 py-lg-8">
        <div class="container text-center"> <!-- Add text-center to container -->
            <div class="header-body mb-7">
                <div class="row justify-content-center">
                    <div class="col-lg-5 col-md-6">
                        <!-- Sentence "by The ATiNa" above the RideMate text -->
                        <p class="text-white display-6">{{ __('by The ATiNa') }}</p>
                        
                        <!-- Larger Welcome Text -->
                        <h1 class="text-white" style="font-size: 6rem;">{{ __('RideMate') }}</h1>
                        
                        <p class="text-white text-light display-4">
                            {{ __('STUDENTS E-HAILING SERVICES') }}
                        </p>
                        
                        <!-- "GET STARTED" Button to redirect to new page -->
                        <div class="d-flex justify-content-center gap-5 mt-4">
                            <a href="{{ route('get.started') }}" class="btn btn-primary btn-lg">
                                {{ __('GET STARTED') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

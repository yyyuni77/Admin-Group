@extends('layouts.app', ['pageSlug' => 'RideMate'])

@section('content')
<!-- Dashboard Title -->
<div class="row">
    <div class="col-12 text-center mb-5">
        <h1 class="display-2 text-white">{{ __('DASHBOARD') }}</h1>
        <p class="text-white display-6">{{ __('ADMINISTRATOR PAGE') }}</p>
    </div>
</div>

<div class="row">
        <!-- User Management Button -->
        <div class="col-lg-3 col-md-6">
            <div class="card card-body text-center">
                <img src="{{ asset('black/img/mng.png') }}" alt="User Management" class="img-fluid mb-3" style="width: 200px; height: 200px;">
                <a href="{{ route('user.management') }}" class="btn btn-primary btn-sm">USER MANAGEMENT</a>
            </div>
        </div>

        <!-- Ride Management Button -->
        <div class="col-lg-3 col-md-6">
            <div class="card card-body text-center">
                <img src="{{ asset('black/img/map.png') }}" alt="Ride Management" class="img-fluid mb-3" style="width: 200px; height: 200px;">
                <a href="{{ route('ride.management') }}" class="btn btn-primary btn-sm">RIDE MANAGEMENT</a>
            </div>
        </div>

        <!-- Report & Analytic Button -->
        <div class="col-lg-3 col-md-6">
            <div class="card card-body text-center">
                <img src="{{ asset('black/img/dashboard.png') }}" alt="Report & Analytic" class="img-fluid mb-3" style="width: 200px; height: 200px;">
                <a href="{{ route('report.analytic') }}" class="btn btn-primary btn-sm">REPORT & ANALYTIC</a>
            </div>
        </div>

        <!-- User Feedback Button -->
        <div class="col-lg-3 col-md-6">
            <div class="card card-body text-center">
                <img src="{{ asset('black/img/feedback.png') }}" alt="User Feedback" class="img-fluid mb-3" style="width: 200px; height: 200px;">
                <a href="{{ route('user.feedback') }}" class="btn btn-primary btn-sm">USER FEEDBACK</a>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script src="{{ asset('white') }}/js/plugins/chartjs.min.js"></script>
    <script>
        $(document).ready(function() {
          demo.initDashboardPageCharts();
        });
    </script>
@endpush

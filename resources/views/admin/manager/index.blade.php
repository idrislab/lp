@extends('layouts.admin')

@section('title', 'Dashboard')

@push('styles')
<link rel="stylesheet" href="{{ mix('css/admin.css') }}">
@endpush

@push('scripts')
<script src="{{ mix('js/admin.js') }}"></script>
@endpush

@section('content')
    <!-- top tiles -->
    <div class="row tile_count">
        <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
            <span class="count_top"><i class="fa fa-users"></i> Clientes</span>
            <div class="count">{{ \LandingPages\User::clients()->count() }}</div>
        </div>

        <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
            <span class="count_top"><i class="fa fa-paper-plane-o"></i> Landing Pages</span>
            <div class="count">{{ \LandingPages\LandingPage::count() }}</div>
        </div>

        <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
            <span class="count_top"><i class="fa fa-user"></i> Subscrições</span>
            <div class="count">{{ \LandingPages\Subscriber::count() }}</div>
        </div>

        <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
            <span class="count_top"><i class="fa fa-users"></i> Managers</span>
            <div class="count">{{ \LandingPages\User::managers()->count() }}</div>
        </div>
    </div>
    <!-- /top tiles -->
@endsection

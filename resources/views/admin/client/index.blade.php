@extends('layouts.admin')

@section('title', 'Dashboard')

@push('styles')
<link rel="stylesheet" href="{{ mix('css/client.css') }}">
@endpush

@push('scripts')
<script src="{{ mix('js/client.js') }}"></script>
@endpush

@section('content')
    <!-- top tiles -->
    <div class="row tile_count">
        <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
            <span class="count_top"><i class="fa fa-users"></i> Subscrições</span>
            <div class="count"></div>
        </div>

        <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
            <span class="count_top"><i class="fa fa-paper-plane-o"></i> Landing Pages</span>
            <div class="count">{{ \LandingPages\LandingPage::where('user_id', auth()->user()->id)->count() }}</div>
        </div>
    </div>
    <!-- /top tiles -->
@endsection

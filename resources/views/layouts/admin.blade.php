<!doctype html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    @stack('styles')
</head>
<body class="nav-md">
<div class="container body">
    <div class="main_container">
        @section('header')
            @include('admin.sections.navigation')
            @include('admin.sections.header')
        @show

        <div class="right_col" role="main">
            @yield('content')
        </div>

        <footer>
            @include('admin.sections.footer')
        </footer>
    </div>
</div>
<script src="{{ mix('js/app.js') }}"></script>
@stack('scripts')
</body>
</html>

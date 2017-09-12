<!doctype html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    @stack('styles')
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
</head>
<body>
<div class="container-fluid">
    @yield('content')
</div>
<script src="{{ mix('js/app.js') }}"></script>
@stack('scripts')
</body>
</html>

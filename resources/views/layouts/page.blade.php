<!doctype html>
<html lang="{{ config('app.locale') }}">
<head>
    <title>@yield('title')</title>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="{{ mix('css/landingPage.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ css() }}">

    @stack('styles')
</head>
<body>
    <div class="container-fluid">
        @yield('content')
    </div>
    <script src="{{ mix('js/landingPage.js') }}"></script>
    <script src="{{ js() }}"></script>
    <script src="https://www.google.com/recaptcha/api.js"></script>
    @stack('scripts')
</body>
</html>


<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Dummy Med') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/bs-enhance/bs-enhance.min.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">

    <link rel="shortcut icon" href="{{ asset('img/favicon/icon.ico') }}" type="image/x-icon"/>
</head>
<body>
<div id="app">
    <div class="row">
    </div>
    @yield('content')
</div>

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('lib/animatelo/dist/animatelo.min.js') }}"></script>
<script src="{{ asset('js/index.min.js') }}"></script>

</body>
</html>

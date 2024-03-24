<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'LCN') }}</title>
    <link rel="icon" href="{{ asset('assets/icons/logo.png') }}" />

    <!-- Fonts -->
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap-5/bootstrap.min.css') }}">
    <link href="{{ asset('font-awesome-4.7.0/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
</head>
<body>
    <div id="app">

        <main>
            @yield('content')
        </main>
    </div>
    <script src="{{asset('assets/js/script.js')}}"></script>   
    <script src="{{ asset('assets/css/bootstrap-5/popper.js') }}"></script>
    <script src="{{ asset('assets/css/bootstrap-5/bootstrap.min.js') }}"></script> 
</body>
</html>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Step') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        @include('layouts.header')

        <main class="b-wrapper">
            @yield('content')
        </main>
        @include('layouts.footer')
    </div>

<!-- Scripts -->
{{-- vueを用いるためこの位置 --}}
<script src="{{ mix('js/app.js') }}" defer></script>
@include('sweetalert::alert')
</body>
</html>

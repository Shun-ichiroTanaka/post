<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script>window.Laravel = { csrf-token: '{{ csrf_token() }}' }</script>

    <title>{{ config('app.name', 'Step') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    {{-- markdownライブラリ --}}
    <link rel="stylesheet" href="github-markdown.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.css">

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <div class="container">

            @include('layouts.header')

            <div class="b-wrapper">
                @yield('content')
                <router-view></router-view>
            </div>

            @include('layouts.footer')

        </div>
        {{-- <router-view></router-view> --}}
    </div>


    @include('sweetalert::alert')

    {{-- vueを用いるためこの位置 --}}
    <script src=" {{ mix('js/app.js') }} "></script>
</body>
</html>

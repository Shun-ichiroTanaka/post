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
<link rel="stylesheet" href="{{ asset('css/lib/jquery-steps.css') }}">
    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <div class="container">

            @include('layouts.header')

            <!-- フラッシュメッセージ -->
            @if (session('flash_message'))
                <div class="u-other__alert" role="alert">
                    {{ session('flash_message') }}
                </div>
            @endif

            <div class="b-wrapper">
                @yield('content')
                <router-view></router-view>
            </div>

            @include('layouts.footer')

        </div>
        {{-- <router-view></router-view> --}}
    </div>


    @include('sweetalert::alert')


    <script src="http://code.jquery.com/jquery-latest.min.js"></script>
    <script src="{{ asset('js/lib/jquery-steps.js') }}"></script>
    <script>
    var steps = $('#demo').steps({
      onFinish: function () {
        alert('Wizard Completed');
      }
    });
    steps_api = steps.data('plugin_Steps');

    $('#btnPrev').on('click', function () {
      steps_api.prev();
		});

    $('#btnNext').on('click', function () {
      steps_api.next();
		});

    $('#btnFinish').on('click', function () {
      steps_api.finish();
		});
  </script>

    {{-- vueを用いるためこの位置 --}}
    <script src=" {{ mix('js/app.js') }} "></script>
</body>
</html>

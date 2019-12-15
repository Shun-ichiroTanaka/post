<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('layouts.head')
<body>
    <div id="app">
        <div class="container">

            @include('layouts.header')
            @include('parts.spnav')

            <!-- フラッシュメッセージ -->
            @if (session('flash_message'))
            <div class="u-other__alert" role="alert">
                {{ session('flash_message') }}
            </div>
            @endif

            <div class="b-wrapper">
                @yield('content')
            </div>

            @include('layouts.footer')
        </div>
    {{-- <router-view></router-view> --}}
    </div>

    @include('layouts.script')
</body>
</html>

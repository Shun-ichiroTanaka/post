<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('layouts.head')
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
                <div class="cursor"></div>
            </div>

            @include('layouts.footer')
        </div>
    </div>
    <router-view></router-view>
    @include('layouts.script')
</body>
</html>

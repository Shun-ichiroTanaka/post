@extends('layouts.app')

@section('content')
<div class="p-auth__title"><h1>Login</h1></div>
<div class="p-auth__form">
  <div class="p-auth__form-thumbnail"><img src="/img/auth/p-auth__login-bg.svg"/></div>
  <form method="post" action="{{ route('login') }}">
      @csrf
    <div class="p-auth__form-login">
        <input id="email" type="email" placeholder="{{ __('email') }}" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="p-auth__form-login">
        <input id="password" type="password" placeholder="{{ __('password') }}" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
        @error('password')
            <span class="" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="p-auth__form-check">
        <input class="p-auth__form-check-box" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

        <label class="p-auth__form-check-title" for="remember">
            {{ __('Remember Me') }}
        </label>
    </div>


    <button type="submit">{{ __('Login') }}</button>
    @if (Route::has('password.request'))
        <a class="p-auth__form-question__link u-space__a__pt-10 btn btn-link" href="{{ route('password.request') }}">
            {{ __('Forgot Your Password?') }}
        </a>
    @endif
    <p class="p-auth__form-question">{{ __('Not registered?') }} <a class="p-auth__form-question__link" href="/register">{{ __('Create an account') }}</a></p>
  </form>
</div>
@endsection




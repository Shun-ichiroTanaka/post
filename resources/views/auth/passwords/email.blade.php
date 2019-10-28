@extends('layouts.app')

@section('content')

<div class="p-auth__title"><h1>{{ __('Reset Password') }}</h1></div>
<div class="p-auth__form">
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <div class="p-auth__form-login">
            <input id="email" type="email"placeholder="{{ __('E-Mail Address') }}" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <button type="submit">{{ __('Send Password Reset Link') }}</button>
    </form>
</div>

@endsection

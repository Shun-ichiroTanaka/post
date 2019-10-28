@extends('layouts.app')

@section('content')
<div class="p-auth__title"><h1>{{ __('Reset Password') }}</h1></div>

<div class="p-auth__form">
    <form method="POST" action="{{ route('password.update') }}">
        @csrf

        <input type="hidden" name="token" value="{{ $token }}">

        <div class="p-auth__form-reset">
            <input id="email" placeholder="{{ __('E-Mail Address') }}" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="p-auth__form-reset">
            <input id="password" placeholder="{{ __('Password') }}" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        {{-- パスワード確認 --}}
        <div class="p-auth__form-reset">
           <input id="password-confirm" placeholder="{{ __('Password') }}" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
        </div>

        {{-- 　送信ボタン　　 --}}
        <button type="submit">{{ __('Reset Password') }}</button>

    </form>
</div>

@endsection

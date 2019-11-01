@extends('layouts.app')

@section('content')

<div class="p-auth__title"><h1>{{ __('Register') }}</h1></div>
<div class="p-auth__form">
  <div class="p-auth__form-thumbnail"><img src="/img/auth/p-auth__register-bg.svg"/></div>
  <form class="p-auth__form-register" method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
  @csrf

　　{{-- 　名前　　 --}}
<div>
    <input id="name" placeholder="{{ __('name') }}"　type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
    @error('name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>


　　 {{-- 　メールアドレス　　 --}}
<div>
    <input id="email" placeholder="{{ __('email address') }}"　type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
    @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

　　 {{-- 　ユーザー画像　　 --}}
{{-- <div>
    <label for="avatar">{{ __('user image') }}</label>
    <input id="avatar" type="file" class="form-control @error('avatar') is-invalid @enderror" name="avatar">
    @error('avatar')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div> --}}



　　{{-- パスワード --}}
<div>
    <input id="password" type="password" placeholder="{{ __('password') }}" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
    @error('password')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>


    {{-- パスワード確認 --}}
    <input id="password-confirm"  placeholder="{{ __('confirm password') }}" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">

　　{{-- 　登録ボタン　　 --}}
    <button type="submit">{{ __('Register') }}</button>

    <p class="p-auth__form-question">Already registered? <a class="p-auth__form-question__link" href="/login">Sign In</a></p>
  </form>
</div>


@endsection

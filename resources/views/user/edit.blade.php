{{--

＊UserController.phpが管轄
/edit
/update
/delete

 --}}

@extends('layouts.app')

@section('content')

<div class="p-auth__title"><h1>{{ __('Update Profile') }}</h1></div>
<div class="p-auth__form">
  <form class="p-auth__form-register" method="POST" action="{{ route('user.update') }}" enctype="multipart/form-data">
  @csrf

  {{-- usercontrollerで変更処理が完了し、リダイレクトした際に、
  フラッシュメッセージを表示する　--}}
  @if (session('flash_message'))
    <div class="flash_message">
        {{ session('flash_message') }}
    </div>
  @endif

　　{{-- 　名前　　 --}}
<div>
    <label for="avatar">{{ __('name') }}</label>
    <input id="name" value="{{ $user['name'] }}"　type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autocomplete="name" autofocus>
    @error('name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>


　　 {{-- 　メールアドレス　　 --}}
<div>
    <label for="avatar">{{ __('email') }}</label>
    <input id="email" value="{{ $user['email'] }}"　type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
    @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

　　{{-- パスワード --}}
{{-- <div>
    <input id="password" type="password" placeholder="{{ __('new password') }}" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
    @error('password')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div> --}}


    {{-- パスワード確認 --}}
    {{-- <input id="password-confirm"  placeholder="{{ __('confirm password') }}" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password"> --}}

　　{{-- 　登録ボタン　　 --}}
    <button type="submit">{{ __('Update Details') }}</button>

  </form>
</div>


@endsection

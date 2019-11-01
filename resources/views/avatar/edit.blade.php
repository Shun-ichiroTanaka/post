{{--

＊UserController.phpが管轄
avatar/edit
avatar/update

 --}}

@extends('layouts.app')

@section('content')

<div class="p-auth__title"><h1>{{ __('Update Avatar') }}</h1></div>
<div class="p-auth__form">
  <form class="p-auth__form-register" method="POST" action="{{ route('avatar.update') }}" enctype="multipart/form-data">
  @csrf

  {{-- avatarcontrollerで変更処理が完了し、リダイレクトした際に、フラッシュメッセージを表示　--}}
  @if (session('flash_message'))
    <div class="flash_message">
        {{ session('flash_message') }}
    </div>
  @endif

  @foreach ($errors->all() as $error)
    <div>{{ $error }}</div>
  @endforeach

　　 {{-- 　ユーザー画像　　 --}}
<div>
    {{-- 現在のイメージ画像 --}}
    <label for="avatar">{{ __('current image') }}</label>
    <div class="p-auth__form-thumbnail__update"><img src="{{ asset('/img/avatar/'.$user['avatar']) }}"/></div>

    {{-- 新しいイメージ画像 --}}
    <label for="avatar">{{ __('new image') }}</label>
    <input id="avatar" value="{{ $user['avatar'] }}" type="file" class="form-control @error('avatar') is-invalid @enderror" name="avatar">
    @error('avatar')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>


　　{{-- 　登録ボタン　　 --}}
    <button type="submit">{{ __('Update Avatar') }}</button>

  </form>
</div>


@endsection

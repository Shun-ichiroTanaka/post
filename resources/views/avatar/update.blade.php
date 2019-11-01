{{--

＊UserController.phpが管轄
/edit
/update
/delete

 --}}

@extends('layouts.app')

@section('content')

<div class="p-auth__title"><h1>{{ __('Update Avatar') }}</h1></div>
<div class="p-auth__form">
  <form class="p-auth__form-register" method="POST" action="{{ route('avatar.update') }}" enctype="multipart/form-data">
  @csrf

　　 {{-- 　ユーザー画像　　 --}}
<div>
    {{-- 現在のイメージ画像 --}}
    <label for="avatar">{{ __('current image') }}</label>
    <div class="p-auth__form-thumbnail__update"><img src="{{ asset('/img/avatar/'.Auth::user()->avatar) }}"/></div>

    {{-- 新しいイメージ画像 --}}
    <label for="avatar">{{ __('new image') }}</label>
    <input id="avatar" value="{{ asset('/img/avatar/'.Auth::user()->avatar) }}" type="file" class="form-control @error('avatar') is-invalid @enderror" name="avatar">
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

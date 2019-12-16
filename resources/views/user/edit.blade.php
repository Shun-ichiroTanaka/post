{{--

＃ プロフィール編集画面
＃ UserController.php管轄
/edit
/update
/delete

 --}}

@extends('layouts.app')
@section('content')
<div class="p-auth__title">
</div>
<div class="p-auth__form">
    <form class="p-auth__form-register" method="POST" action="{{ route('user.update') }}" enctype="multipart/form-data">
        @csrf

        {{-- usercontrollerで変更処理が完了し、リダイレクトした際、フラッシュメッセージを表示　--}}
        @if (session('flash_message'))
        <div class="flash_message">
            {{ session('flash_message') }}
        </div>
        @endif

        {{-- 　名前　　 --}}
        <div>
            <label for="name">{{ __('お名前') }}</label>
            <input id="name" value="{{ $user['name'] }}" 　type="text"
                class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}"
                autocomplete="name" autofocus>
            @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div>
            {{-- 現在のイメージ画像 --}}
            <label for="avatar">{{ __('現在の画像') }}</label>
            <div class="p-auth__form-thumbnail__update">
              @if (empty($user->avatar))
                  <img src="{{ asset('/img/avatar/user.svg') }}" alt="avatar" />
              @else
                  <img src="{{ asset('/img/avatar/'.Auth::user()->avatar) }}" alt="avatar">
              @endif
            </div>
        
            {{-- 新しいイメージ画像 --}}
            <label for="avatar">{{ __('新しい画像を選択') }}</label>
            <input id="avatar" value="{{ $user['avatar'] }}" type="file" class="form-control @error('avatar') is-invalid @enderror" name="avatar">
            @error('avatar')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        {{-- 自己紹介 --}}
        <div>
            <label for="user-info">自己紹介文</label>
            @if (empty(Auth::user()->info))
                <textarea
                id="info" value="{{ $user['info'] }}" type="text" class="form-control"
                style="width: 290px; height:150px; text-decoration: none; font-size:1rem; padding:5px; border: none; background: #eff0f1; resize: none;"
                @error('info') is-invalid @enderror name="info"　placeholder="自分について130文字以内で書こう！"></textarea>
            @else
                <textarea
                id="info" value="{{ $user['info'] }}" type="text" class="form-control"
                style="width: 290px; height:150px; text-decoration: none; font-size:1rem; padding:5px; border: none; background: #eff0f1; resize: none;"
                @error('info') is-invalid @enderror name="info">{{ Auth::user()->info }}</textarea>                
            @endif

            @error('info')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

　　{{-- 　登録ボタン　　 --}}
    <button type="submit">{{ __('Update Details') }}</button>

  </form>
</div>


@endsection
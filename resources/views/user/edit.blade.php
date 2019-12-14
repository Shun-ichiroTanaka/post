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
    <h1>{{ __('Update Profile') }}</h1>
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
            <label for="name">{{ __('name') }}</label>
            <input id="name" value="{{ $user['name'] }}" 　type="text"
                class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}"
                autocomplete="name" autofocus>
            @error('name')
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
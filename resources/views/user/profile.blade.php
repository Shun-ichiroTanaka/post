{{--

    マイページ
    componentで投稿一覧を表示
    左のサイドバーで検索機能・カテゴリー機能
    右のサイドバーで

    --}}

@extends('layouts.app')
@section('content')
<div id="app">
    <div class="p-mypage">
        <div class="p-mypage__bg"></div>
        <div class="p-mypage__user">
            <div class="p-mypage__user-img">
                @if (empty($user->avatar))
                <img src="/img/avatar/user.svg" alt="avatar" style="">
                @else
                <img src="{{ asset('/img/avatar/'.$user->avatar) }}" alt="avatar" style="">
                @endif
            </div>
            <h1 class="p-mypage__user-name">{{ $user['name'] }}</h1>
            @if ($user = $ownuser)
                <a class="p-mypage__user-change__img" href="{{ route('avatar.edit') }}"><i class="fas fa-images"></i></a>
                <div class="p-mypage__user-info">{{ $user['info'] }}</div>
                <a class="p-mypage__user-change__info" href="{{ route('user.edit') }}">プロフィール編集</a>    
            @else
                <a class="p-mypage__user-change__info">{{ $user['info'] }}</a>
            @endif
        </div>
        {{-- プロフィールのタブ部分 --}}
        <div class="p-mypage__tab">
            @include('parts.profileTab')
        </div>
    </div>


</div>
</div>
@endsection

<script type="text/javascript">
    document.title = `{{ $user['name'] }}'のプロフィール`
</script>
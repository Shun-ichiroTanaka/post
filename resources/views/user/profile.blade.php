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
                        <img
                        src="/img/avatar/user.svg"
                        alt="avatar"
                        style="
                        display: block;
                        margin: 0 auto;
                        width: 150px;
                        height: 150px;
                        border-radius: 50%;
                        border: solid 5px #fff;
                        background: #fff;"
                        border-radius="50%">
                    @else
                        <img
                        src="{{ asset('/img/avatar/'.Auth::user()->avatar) }}"
                        alt="avatar"
                        style="
                        display: block;
                        margin: 0 auto;
                        width: 150px;
                        height: 150px;
                        border-radius: 50%;
                        border: solid 5px #fff;
                        background: #fff;"
                        border-radius="50%">
                    @endif
                </div>
                <h1 class="p-mypage__user-name">{{ $user['name'] }}</h1>
                @if (Auth::check())
                    <a class="p-mypage__user-change__img" href="{{ route('avatar.edit') }}"><i class="fas fa-images"></i></a>
                    <div class="p-mypage__user-info">{{ $user['info'] }}</div>
                    <a class="p-mypage__user-change__info" href="{{ route('user.edit') }}">プロフィール編集</a>
                @else
                    <div>{{ $user['info'] }}</div>
                @endif
            </div>
        </div>
        <div class="">
            <h3>登録してるSTEP</h3>
            <h3>チャレンジ中のSTEP</h3>
        </div>
    </div>
</div>
@endsection

<script type="text/javascript">
    document.title = `{{ $user['name'] }}'のプロフィール`
</script>

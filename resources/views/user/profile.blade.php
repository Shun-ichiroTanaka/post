{{--

マイページ

componentで投稿一覧を表示
左のサイドバーで検索機能・カテゴリー機能
右のサイドバーで

 --}}

@extends('layouts.app')

@section('content')
<div id="app">
    <div class="l-container">
        <div class="l-container__left-mypage">
            <h1>{{ $user['name'] }}</h1>
            <a href="{{ route('avatar.edit') }}"><img src="{{ Auth::user()->avatar }}" alt="" style="width:50px; height:50px; border-radius:50%" border-radius="50%"></a>
        </div>
        <main class="l-container__main-mypage">
            {{-- userの投稿一覧 --}}
              <userposts-component>
                  userの投稿一覧、編集、削除
              </userposts-component>
        </main>
        <div class="l-container__right-mypage">
            <h3>登録してるSTEP</h3>
            <h3>チャレンジ中のSTEP</h3>
        </div>
    </div>
</div>
@endsection

<script type="text/javascript">
    document.title = `{{ $user['name'] }}'s profile`
</script>

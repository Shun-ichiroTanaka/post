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
            {{-- <h3><a href="{{ route('user.store') }}">{{ 'edit profile' }}</a></h3> --}}
            {{-- <h3><a href="{{ route('user.edit') }}">{{ 'edit profile' }}</a></h3> --}}
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

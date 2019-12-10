{{--

＊トップページ

post-componentで投稿一覧を表示
左のサイドバーで検索機能・カテゴリー機能
右のサイドバーで人気ユーザーランキング表示

--}}

@extends('layouts.app')
@section('content')
<div id="app">
    <div class="l-container">
        <div class="l-container__left">
            <h3>カテゴリーから探す</h3>
        </div>
        <div class="l-container__main">
            {{-- <allposts></allposts> --}}
            @include('posts.allPosts')


        </div>
        <div class="l-container__right">
            <div class="l-container__right-profile">
            </div>
        </div>
    </div>
</div>
@endsection

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
            <div class="c-post__detail">
                全ての投稿一覧
            </div>
            {{-- <allposts
            :article-id="{{ json_encode($articles->id) }}"
            :user-name="{{ json_encode($articles->name) }}"
            :user-Avatar="{{ json_encode($articles->avatar) }}"
            :article-Createdtime="{{ json_encode($articles->created_at) }}"
            ></allposts> --}}
            @include('posts.allPosts')
        </div>
        <div class="l-container__right">
            <div class="l-container__right-profile">
            </div>
        </div>
    </div>
</div>
@endsection

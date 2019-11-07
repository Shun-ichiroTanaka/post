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
                {{-- <posts></posts> --}}

                @foreach ($articles as $article)
                <div class="article-box">
                    {{-- <div class="article-box-left"></div> --}}
                    <div class="article-box-left">
                        @if (empty(Auth::user()->avatar))
                            <img src="/img/avatar/user.svg" alt="avatar" style="width:40px; height:40px; border-radius:50%?vertical-align: middle;">
                        @else
                            <img src="{{ asset('/img/avatar/'.Auth::user()->avatar) }}" alt="avatar" style="width:40px; height:40px; border-radius:50%" border-radius="50%">
                        @endif
                    </div>
                    <div class="article-box-right">
                        <a class="article-title" href="/post/{{$article->id}}">{{ $article->title }}</a>
                        <div class="article-details">
                            <div class="article-date">{{ $article->created_at }}</div>
                        </div>
                    </div>
                </div>
                @endforeach


                {{-- @foreach ($posts as $post)
                    <div class="">
                        <h3 class="">{{ $post->title }}</h3>
                        <a href="#" class="btn">{{ __('Go Practice')  }}</a>
                    </div>
                    @endforeach --}}
                </div>
                <div class="l-container__right">
                    <div class="l-container__right-profile">
                    </div>
                </div>
            </div>
        </div>
        @endsection

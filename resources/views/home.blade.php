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
            {{-- <ul>
                @foreach ($categories as $category)
                    <li class="{{ setActiveCategory($category->slug) }}">
                        <a href="{{ route('shop.index', ['category' => $category->slug]) }}"">{{ $category->name }}</a>
                    </li>
                @endforeach
            </ul> --}}
        </div>
        <main class="l-container__main">
            {{-- 全ての投稿一覧 --}}
              <allposts-component>
                  全ての投稿一覧
              </allposts-component>
        </main>
        <div class="l-container__right"></div>
    </div>
</div>
@endsection

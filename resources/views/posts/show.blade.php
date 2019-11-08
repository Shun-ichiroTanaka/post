@extends('layouts.app')
@section('content')
<div class="c-post__show">
    <div class="c-post__show-left"></div>
    <div class="c-post__show-main">
        <div class="c-post__show-main__header">
            <div class="c-post__show-main__header-date">{{$article->created_at}}</div>
        </div>
        <div class="c-post__show-title">{{$article->title}}</div>

        <div class="c-post__show-tags">
            <div class="c-post__show-tags__item">{{$article->tag1}}</div>
            @if ($article->tag2)
            <div class="c-post__show-tags__item">{{$article->tag2}}</div>
            @endif
            @if ($article->tag3)
            <div class="c-post__show-tags__item">{{$article->tag3}}</div>
            @endif
            @if ($article->tag4)
            <div class="c-post__show-tags__item">{{$article->tag4}}</div>
            @endif
            @if ($article->tag5)
            <div class="c-post__show-tags__item">{{$article->tag5}}</div>
            @endif
        </div>

        <div class="c-post__show-body">{{$article->body}}</div>
    </div>
    <div class="c-post__show-right">
        <div class="c-post__show-right__inner">
            <ul>
                <li><a href="">メニュー</a>
                    <ul>
                        <li><a href="">小メニュー</a></li>
                        <li><a href="">小メニュー</a></li>
                        <li><a href="">小メニュー</a></li>
                        <li><a href="">小メニュー</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>
@endsection

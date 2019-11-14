@extends('layouts.app')
@section('content')
<div class="c-post__show">
    <div class="c-post__show-left">
        <a href=""><img src="{{ asset('/img/social/twitter.svg') }}" alt="twitter"></a>
    </div>
    <div class="c-post__show-main">
        <div class="c-post__show-main__header">
            <div class="c-post__show-main__header-date">{{$step->created_at}}</div>
        </div>
        <div class="c-post__show-title">{{$step->title}}</div>

        <div class="c-post__show-tags">
            <div class="c-post__show-tags__item">{{$step->tag1}}</div>
            @if ($step->tag2)
            <div class="c-post__show-tags__item">{{$step->tag2}}</div>
            @endif
            @if ($step->tag3)
            <div class="c-post__show-tags__item">{{$step->tag3}}</div>
            @endif
            @if ($step->tag4)
            <div class="c-post__show-tags__item">{{$step->tag4}}</div>
            @endif
            @if ($step->tag5)
            <div class="c-post__show-tags__item">{{$step->tag5}}</div>
            @endif
        </div>

        <div class="c-post__show-body">{{$step->step1}}</div>
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
            <p>このStepにチャレンジ</p>
        </div>
    </div>
</div>
@endsection

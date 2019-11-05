@extends('layouts.app')
@section('content')
<div class="c-post__show">
    <div class="c-post__show-box">
        <div class="c-post__show-box__header">
            <div class="c-post__show-box__header-date">{{$article->created_at}}</div>
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
</div>
@endsection

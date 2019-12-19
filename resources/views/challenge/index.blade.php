@extends('layouts.app')
@section('content')
<div id="app">
    <div class="p-challenge__show">
        {{-- <div id="demo"> --}}
            <div class="p-challenge">
                <div class="p-challenge__left">
                </div>

                <div class="p-challenge__right">
                    <div class="p-challenge__show-main__header">
                        <div class="p-challenge__show-main__header-list">
                            <div>
                                <a href="/user/{{$post->user_id}}">
                                    @if (empty($post->user->avatar))
                                    <img src="/img/avatar/user.svg" alt="avatar">
                                    @else
                                    <img src="{{ asset('/img/avatar/'.$post->user->avatar) }}" alt="avatar">
                                    @endif
                                </a>
                            </div>
                            <div class="p-challenge__show-main__header-list__name"> <a href="/user/{{$post->user_id}}">{{ $post->user->name }}</a></div>
                            <div class="p-challenge__show-main__header-list__date">{{ $post->created_at }}に投稿</div>
                            @if ($post->time)
                                <div class="p-challenge__show-main__header-list__time">目標時間 : {{ $post->time }}</div>
                            @endif
                        </div>
                    </div>
                    {{-- タイトル --}}
                    <div class="p-challenge__show-title">{{$post->title}}</div>
                    {{-- タグ --}}
                    <div class="p-challenge__show-tags">
                        <div class="p-challenge__show-tags__item">{{$post->tag1}}</div>
                        @if ($post->tag2)
                        <div class="p-challenge__show-tags__item">{{$post->tag2}}</div>
                        @endif
                        @if ($post->tag3)
                        <div class="p-challenge__show-tags__item">{{$post->tag3}}</div>
                        @endif
                        @if ($post->tag4)
                        <div class="p-challenge__show-tags__item">{{$post->tag4}}</div>
                        @endif
                        @if ($post->tag5)
                        <div class="p-challenge__show-tags__item">{{$post->tag5}}</div>
                        @endif
                    </div>
                    {{-- Vue-Editor プラグイン --}}
                    <div class="step-content">
                        <div class="step-tab-panel" id="step1">{!! $post->step1 !!}</div>
                        <div class="step-tab-panel" id="step2">{!! $post->step2 !!}</div>
                        <div class="step-tab-panel" id="step3">{!! $post->step3 !!}</div>
                        <div class="step-tab-panel" id="step4">{!! $post->step4 !!}</div>
                    </div>
                </div>

            </div>
        </div>
    {{-- </div> --}}
</div>
@endsection

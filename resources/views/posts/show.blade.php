@extends('layouts.app')
@section('content')
<div id="app">
    <div class="c-post__show">
        <div id="demo">
            <div class="c-step">
                <div class="c-post__show-left">
                    <div class="c-button__show-social">
                        @if (Auth::check())
                        <like
                            :post-id="{{ json_encode($step->id) }}"
                            :user-id="{{ json_encode($userAuth->id) }}"
                            :default-Liked="{{ json_encode($defaultLiked) }}"
                            :defaultlike-Count="{{ json_encode($defaultlikeCount) }}"
                        ></like>
                        <stock
                            :post-id="{{ json_encode($step->id) }}"
                            :user-id="{{ json_encode($userAuth->id) }}"
                            :default-Stocked="{{ json_encode($defaultStocked) }}"
                            :defaultstock-Count="{{ json_encode($defaultstockCount) }}"
                        ></stock>
                        @else
                        <a href="/login">
                            <like :defaultlike-Count="{{ json_encode($defaultlikeCount) }}"></like>
                            <stock :defaultstock-Count="{{ json_encode($defaultstockCount) }}"></stock>
                        </a>
                        @endif
                        {{-- <a href="#" class="c-button__show-social__twitter"><img src="{{ asset('/img/social/twitter.svg') }}" alt="twitter"></a> --}}
                    </div>
                </div>

                <div class="c-post__show-main">
                    <div class="c-post__show-main__header">
                        <div class="c-post__show-main__header-list">
                            <div>
                                <a href="/user/{{$step->user_id}}">
                                    @if (empty($step->user->avatar))
                                    <img
                                        src="/img/avatar/user.svg"
                                        alt="avatar"
                                        style="display: flex;
                                        overflow: hidden;
                                        border-radius: .2em;
                                        width: 32px;
                                        height: 32px;
                                        margin-right: 8px;"
                                        border-radius="50%"
                                    >
                                    @else
                                    <img
                                        src="{{ asset('/img/avatar/'.$step->user->avatar) }}"
                                        alt="avatar"
                                        style="display: flex;
                                        overflow: hidden;
                                        border-radius: .2em;
                                        width: 32px;
                                        height: 32px;
                                        margin-right: 8px;"
                                        border-radius="50%"
                                    >
                                    @endif
                                </a>
                            </div>
                            <div class="c-post__show-main__header-list__name"> <a href="/user/{{$step->user_id}}">{{ $step->user->name }}</a></div>
                            <div class="c-post__show-main__header-list__date">{{ $step->created_at }}に投稿</div>
                            @if ($step->time)
                                <div class="c-post__show-main__header-list__time">目標時間 : {{ $step->time }}</div>
                            @endif
                        </div>
                    </div>
                    {{-- タイトル --}}
                    <div class="c-post__show-title">{{$step->title}}</div>
                    {{-- タグ --}}
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
                    {{-- Vue-Editor プラグイン --}}
                    <div class="step-content">
                        <div class="step-tab-panel" id="step1">{!! $step->step1 !!}</div>
                        <div class="step-tab-panel" id="step2">{!! $step->step2 !!}</div>
                        <div class="step-tab-panel" id="step3">{!! $step->step3 !!}</div>
                        <div class="step-tab-panel" id="step4">{!! $step->step4 !!}</div>
                    </div>
                </div>

                <div class="c-post__show-right">
                    <div><a href="" class="c-button__show-challange">このStepにチャレンジ</a></div>
                    <div class="step-app-side c-step__side">
                        {{-- 目次 --}}
                        <p>ステップ</p>
                        <div class="toc" data-toc="h1"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- <script type="text/javascript">
    document.title = `{{ $step['title'] }}`
</script> --}}
@endsection

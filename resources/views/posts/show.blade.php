@extends('layouts.app')
@section('content')
<div id="app">
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

            <div id="demo">
                <div class="step-app">
                    <div class="step-app-side">
                        <ul class="step-steps">
                            <li><a href="#step1">{{ $step->subtitle1 }}</a></li>
                            @if ($step->subtitle2)
                            <li><a href="#step2">{{ $step->subtitle2 }}</a></li>
                            @endif
                            @if ($step->subtitle3)
                            <li><a href="#step3">{{ $step->subtitle3 }}</a></li>
                            @endif
                            @if ($step->subtitle4)
                            <li><a href="#step4">{{ $step->subtitle4 }}</a></li>
                            @endif
                        </ul>
                    </div>
                    <div class="step-content">
                        <div class="step-tab-panel" id="step1">{{ $step->step1 }}</div>
                        <div class="step-tab-panel" id="step2">{{ $step->step2 }}</div>
                        <div class="step-tab-panel" id="step3">{{ $step->step3 }}</div>
                        <div class="step-tab-panel" id="step4">{{ $step->step4 }}</div>
                    </div>
                </div>
            </div>

        </div>
        <div class="c-post__show-right">
            <div class="c-post__show-right__inner">
                <ul class="step-steps">
                    <li>目標時間 : {{ $step->time }}時間</li>
                </ul>
                <p>このStepにチャレンジ</p>
            </div>
        </div>
    </div>
</div>

@endsection

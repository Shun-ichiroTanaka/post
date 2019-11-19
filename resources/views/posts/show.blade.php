@extends('layouts.app')
@section('content')
<div id="app">
    <div class="c-post__show">
        <div id="demo">
            <div class="c-step">
                <div class="c-post__show-left">
                    <div class="c-button__show-social">
                        <a href="" class="c-button__show-social__like"><i class="fas fa-heart"></i></a>
                        <a href="" class="c-button__show-social__stock"><i class="fas fa-folder-open"></i></a>
                        <a href="" class="c-button__show-social__twitter"><img src="{{ asset('/img/social/twitter.svg') }}" alt="twitter"></a>
                    </div>
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

                        <like></like>
                        <example-component></example-component>


                    <div class="step-content">
                        <div class="step-tab-panel" id="step1">{!! $step->step1 !!}</div>
                        <div class="step-tab-panel" id="step2">{!! $step->step2 !!}</div>
                        <div class="step-tab-panel" id="step3">{!! $step->step3 !!}</div>
                        <div class="step-tab-panel" id="step4">{!! $step->step4 !!}</div>
                    </div>


                </div>
                <div class="c-post__show-right">
                    <p>目標時間 : {{ $step->time }}時間</p>
                    <p>このStepにチャレンジ</p>
                    <div class="step-app-side c-step__side">
                        <ul class="step-steps c-step__step">
                            <li><a href="#step1">Step1. {{ $step->subtitle1 }}</a></li>
                            @if ($step->subtitle2)
                            <li><a href="#step2">2. {{ $step->subtitle2 }}</a></li>
                            @endif
                            @if ($step->subtitle3)
                            <li><a href="#step3">3. {{ $step->subtitle3 }}</a></li>
                            @endif
                            @if ($step->subtitle4)
                            <li><a href="#step4">4. {{ $step->subtitle4 }}</a></li>
                            @endif
                            <li></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@extends('layouts.app')
@section('content')
<div id="app">
    <div class="c-post__show">
        {{-- <div id="demo"> --}}
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
                                    <img src="/img/avatar/user.svg" alt="avatar">
                                    @else
                                    <img src="{{ asset('/img/avatar/'.$step->user->avatar) }}" alt="avatar">
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
                        <div class="c-tabs__showdetails">
                            {{-- @if (Auth::check()) --}}
                            {{-- タブのタイトル --}}
                            @if (!empty($step->step1))
                                <input id="step1" type="radio" name="tab_item" checked>
                                <label class="c-tabs__showdetails-item" for="step1">{!! $step->subtitle1 !!}</label>
                            @endif
                            
                            @if (!empty($step->step2))
                                <input id="step2" type="radio" name="tab_item">
                                <label class="c-tabs__showdetails-item" for="step2">{!! $step->subtitle2 !!}</label>
                            @endif
    
                            @if (!empty($step->step3))
                                <input id="step3" type="radio" name="tab_item">
                                <label class="c-tabs__showdetails-item" for="step3">{!! $step->subtitle3 !!}</label>
                            @endif
    
                            @if (!empty($step->step4))
                                <input id="step4" type="radio" name="tab_item">
                                <label class="c-tabs__showdetails-item" for="step4">{!! $step->subtitle4 !!}</label>
                            @endif
                                  
                            {{-- タブの中身 --}}
                            @if (!empty($step->step1))
                                <div class="c-tabs__showdetails-content" id="step1_content">
                                    {!! $step->step1 !!}
                                </div>
                            @endif
                            
                            @if (!empty($step->step2))
                                <div class="c-tabs__showdetails-content" id="step2_content">
                                    {!! $step->step2 !!}
                                </div>
                            @endif
    
                            @if (!empty($step->step3))
                                <div class="c-tabs__showdetails-content" id="step3_content">
                                    {!! $step->step3 !!}
                                </div>
                            @endif
    
                            @if (!empty($step->step4))
                                <div class="c-tabs__showdetails-content" id="step4_content">
                                    {!! $step->step4 !!}
                                </div>
                            @endif
                            {{-- @else
                            @endif --}}
                        </div>
                    </div>
                </div>

                <div class="c-post__show-right">
                    @if (Auth::check())
                        <challenge
                            :post-id="{{ json_encode($step->id) }}"
                            :user-id="{{ json_encode($userAuth->id) }}"
                            :default-Challenged="{{ json_encode($defaultStocked) }}"
                            :defaultchallenge-Count="{{ json_encode($defaultstockCount) }}"
                        ></challenge>                       
                    @else
                        <a href="/login">
                            <challenge :defaultchallenge-Count="{{ json_encode($defaultlikeCount) }}"></challenge>
                        </a>
                    @endif
                    <div class="step-app-side c-step__side">
                        {{-- 目次 --}}
                        <p>目次</p>
                        <div class="toc" data-toc="h1"></div>
                    </div>
                </div>
            </div>
        </div>
    {{-- </div> --}}
</div>
@endsection

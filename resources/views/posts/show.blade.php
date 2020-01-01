@extends('layouts.app')
@section('content')
<div id="app">
@yield('addtionalMeta')

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
                        <div class="c-button__show-social__twitter">
                            <a href="javascript:window.open('http://twitter.com/share?text='+encodeURIComponent(document.title)+'&url='+encodeURIComponent(location.href),'sharewindow','width=550, height=450, personalbar=0, toolbar=0, scrollbars=1, resizable=!');"><img src="/img/social/twitter.svg" alt="Twitterでシェアをする"></a>
                        </div>
                        @else
                        <a href="/login">
                            <like :defaultlike-Count="{{ json_encode($defaultlikeCount) }}"></like>
                            <stock :defaultstock-Count="{{ json_encode($defaultstockCount) }}"></stock>
                        </a>
                        <div class="c-button__show-social__twitter">
                           <a href="javascript:window.open('http://twitter.com/share?text='+encodeURIComponent(document.title)+'&url='+encodeURIComponent(location.href),'sharewindow','width=550, height=450, personalbar=0, toolbar=0, scrollbars=1, resizable=!');"><img src="/img/social/twitter.svg" alt="Twitterでシェアをする"></a>
                        </div>
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


                    <div class="c-post__show-markdown">   
                        <h2>{{ $step->subtitle1 }}</h2>                            
                        {!! $step->step1 !!}

                        <h2>{{ $step->subtitle2 }}</h2>   
                        {!! $step->step2 !!}

                        <h2>{{ $step->subtitle1 }}</h2>   
                        {!! $step->step3 !!}

                        <h2>{{ $step->subtitle1 }}</h2>   
                        {!! $step->step4 !!}
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
                        <p>STEP一覧</p>
                        <div class="toc" data-toc="h2"></div>
                    </div>
                </div>
            </div>
        </div>
    {{-- </div> --}}
</div>
@endsection

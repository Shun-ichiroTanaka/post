@extends('layouts.app')
@section('content')
<div id="app">
    <div class="p-challenge__show">
        {{-- <div id="demo"> --}}
        <div class="p-challenge">
            <div class="p-challenge__left">
                <div>
                    {{-- タイトル --}}
                    <div class="p-challenge__left-title">{{$post->title}}</div>
                    <div class="p-challenge__left-clear">
                        <p>％完了</p>    
                    </div>
                </div>


                <ul>
                    <li>{{ $post->subtitle1 }}</li>
                    <li>{{ $post->subtitle2 }}</li>
                    <li>{{ $post->subtitle3 }}</li>
                    <li>{{ $post->subtitle4 }}</li>
                </ul>
            </div>

            <div class="p-challenge__right">
                <div class="c-tabs__showdetails">
                    {{-- @if (Auth::check()) --}}
                    {{-- タブのタイトル --}}
                    @if (!empty($post->step1))
                    <input id="step1" type="radio" name="tab_item" checked>
                    <label class="c-tabs__showdetails-item" for="step1">{!! $post->subtitle1 !!}</label>
                    @endif

                    @if (!empty($post->step2))
                    <input id="step2" type="radio" name="tab_item">
                    <label class="c-tabs__showdetails-item" for="step2">{!! $post->subtitle2 !!}</label>
                    @endif

                    @if (!empty($post->step3))
                    <input id="step3" type="radio" name="tab_item">
                    <label class="c-tabs__showdetails-item" for="step3">{!! $post->subtitle3 !!}</label>
                    @endif

                    @if (!empty($post->step4))
                    <input id="step4" type="radio" name="tab_item">
                    <label class="c-tabs__showdetails-item" for="step4">{!! $post->subtitle4 !!}</label>
                    @endif

                    {{-- タブの中身 --}}
                    @if (!empty($post->step1))
                    <div class="c-tabs__showdetails-content" id="step1_content">
                        {!! $post->step1 !!}
                        <button type="button" class="c-button__show-social__challange">
                            <span>
                                <div>このステップを完了する</div>
                            </span>
                            <p class="u-other__fukidashi-challenge">このステップを完了します</p>
                        </button>
                    </div>
                    @endif

                    @if (!empty($post->step2))
                    <div class="c-tabs__showdetails-content" id="step2_content">
                        {!! $post->step2 !!}
                        <button type="button" class="c-button__show-social__challange">
                            <span>
                                <div>このステップを完了する</div>
                            </span>
                            <p class="u-other__fukidashi-challenge">このステップを完了します</p>
                        </button>
                    </div>
                    @endif

                    @if (!empty($post->step3))
                    <div class="c-tabs__showdetails-content" id="step3_content">
                        {!! $post->step3 !!}
                        <button type="button" class="c-button__show-social__challange">
                            <span>
                                <div>このステップを完了する</div>
                            </span>
                            <p class="u-other__fukidashi-challenge">このステップを完了します</p>
                        </button>
                    </div>
                    @endif

                    @if (!empty($post->step4))
                    <div class="c-tabs__showdetails-content" id="step4_content">
                        {!! $post->step4 !!}
                        <button type="button" class="c-button__show-social__challange">
                            <span>
                                <div>このステップを完了する</div>
                            </span>
                            <p class="u-other__fukidashi-challenge">このステップを完了します</p>
                        </button>
                    </div>
                    @endif
                    {{-- @else
                        @endif --}}
                </div>
            </div>
        </div>
    </div>
    {{-- </div> --}}
</div>
@endsection

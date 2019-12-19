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
                                  <button type="button" class="c-button__show-social__challange">
                                    <span>
                                         <div>このステップを完了する</div>
                                    </span>
                                     <p class="u-other__fukidashi-challenge">このステップを完了します</p>
                                  </button>
                                  完了する
                              </div>
                          @endif
                          
                          @if (!empty($step->step2))
                              <div class="c-tabs__showdetails-content" id="step2_content">
                                  {!! $step->step2 !!}
                                  <button type="button" class="c-button__show-social__challange">
                                    <span>
                                         <div>このステップを完了する</div>
                                    </span>
                                     <p class="u-other__fukidashi-challenge">このステップを完了します</p>
                                  </button>
                              </div>
                          @endif
  
                          @if (!empty($step->step3))
                              <div class="c-tabs__showdetails-content" id="step3_content">
                                  {!! $step->step3 !!}
                                  <button type="button" class="c-button__show-social__challange">
                                    <span>
                                         <div>このステップを完了する</div>
                                    </span>
                                     <p class="u-other__fukidashi-challenge">このステップを完了します</p>
                                  </button>
                              </div>
                          @endif
  
                          @if (!empty($step->step4))
                              <div class="c-tabs__showdetails-content" id="step4_content">
                                  {!! $step->step4 !!}
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
        </div>
    {{-- </div> --}}
</div>
@endsection

<form-wizard color="#B79B5B" transition="bounce" back-button-text="戻る" next-button-text="ステップを追加.." finish-button-text="これ以上追加できません">
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
        <tab-content title="Step1">
          <div class="step-tab-panel" id="step1">{!! $step->step1 !!}</div>
        </tab-content>
        <tab-content title="Step2">
          <div class="step-tab-panel" id="step2">{!! $step->step2 !!}</div>
        </tab-content>
        <tab-content title="Step3">
          <div class="step-tab-panel" id="step3">{!! $step->step3 !!}</div>
        </tab-content>
        <tab-content title="Step4" id="step4">
          <div class="step-tab-panel" id="step4">{!! $step->step4 !!}</div>
        </tab-content>
    </div>
  </div>

</form-wizard>
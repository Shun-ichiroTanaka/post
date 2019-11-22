@extends('layouts.app')
@section('content')
<div id="app">
    <div class="c-post">
        <div class="c-post__new">
            <form method="post" action="{{ route('post.newpost') }}">
            @csrf
                @if($errors->first('title'))
                <div class="validation">{{ $errors->first('title') }}</div>
                @endif
                <div class="c-post__new-title">
                    <input id="title" placeholder=" {{ __('タイトル（例：「1日5分!マクロ経済のオススメ勉強法」）') }}"　type="text" class="form-control" name="title" value="{{ old('title') }}" required autocomplete="title">
                </div>

                @if($errors->first('tags'))
                <div class="validation">{{ $errors->first('tags') }}</div>
                @endif
                <div class="c-post__new-tags">
                    <input id="tags" placeholder=" {{ __('タグを半角スペース区切りで5つまで入力できます') }}"　type="text" class="form-control" name="tags" value="{{ old('tags') }}" required autocomplete="tags">
                </div>

                <div id="demo">

                    <div class="step-app">

                        <div class="step-app-side">
                            <ul class="step-steps">
                                <li><a href="#step1">Step 1</a></li>
                                <li><a href="#step2">Step 2</a></li>
                                <li><a href="#step3">Step 3</a></li>
                                <li><a href="#step4">Step 4</a></li>
                                {{-- <a href="#" class="addStep"><i class="fas fa-plus"></i></a>
                                <a href="#" class="removeStep"><i class="far fa-trash-alt"></i></a> --}}
                            </ul>
                            <div class="step-footer">
                                <button data-direction="prev">Previous</button>
                                <button data-direction="next">Next</button>
                                <button data-direction="finish">Finish</button>
                            </div>

                            <p>目標時間</p>
                            @if($errors->first('time'))
                            <div class="validation">{{ $errors->first('time') }}</div>
                            @endif
                            <input id="time" placeholder=" {{ __(' 例：1.5 ') }}"　type="text" class="form-control" name="time" value="{{ old('time') }}" required autocomplete="time">時間
                        </div>

                        <div class="step-content">
                            <div class="step-tab-panel" id="step1">
                                <div class="c-post__new-subtitle">
                                    @if($errors->first('subtitle1'))
                                    <div class="validation">{{ $errors->first('subtitle1') }}</div>
                                    @endif
                                    <div class="c-post__new-subtitle">
                                        <input id="subtitle1" placeholder=" {{ __('（例：「STEP1：まずはマクロ経済をザックリ理解しよう」）') }}"　type="text" class="form-control" name="subtitle1" value="{{ old('subtitle1') }}" required autocomplete="subtitle1">
                                    </div>
                                </div>
                                <div class="c-post__new-editor">
                                    <div class="c-post__new-editor__markdown">
                                        <textarea name="step1" class="form-control" id="markdown_editor_textarea" placeholder=" {{ __('ここにはStepの内容について書いてください。Markdown記法で書いてみましょう！') }}"></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="step-tab-panel" id="step2">
                                <div class="c-post__new-subtitle">
                                    @if($errors->first('subtitle2'))
                                    <div class="validation">{{ $errors->first('subtitle2') }}</div>
                                    @endif
                                    <div class="c-post__new-subtitle">
                                        <input id="subtitle2" placeholder=" {{ __('（例：「STEP2：次に必須の公式を押さえよう」）') }}"　type="text" class="form-control" name="subtitle2" value="{{ old('subtitle2') }}" autocomplete="subtitle2">
                                    </div>
                                </div>
                                <div class="c-post__new-editor">
                                    <div class="c-post__new-editor__markdown">
                                        <textarea name="step2" id="markdown_editor_textarea2" placeholder=" {{ __('ここにはStepの内容について書いてください。Markdown記法で書いてみましょう！') }}" class="form-control"></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="step-tab-panel" id="step3">
                                <div class="c-post__new-subtitle">
                                    @if($errors->first('subtitle3'))
                                    <div class="validation">{{ $errors->first('subtitle3') }}</div>
                                    @endif
                                    <div class="c-post__new-subtitle">
                                        <input id="subtitle3" placeholder=" {{ __('（例：「STEP3：頻出の問題系統を押さえよう」）') }}"　type="text" class="form-control" name="subtitle3" value="{{ old('subtitle3') }}" autocomplete="subtitle3">
                                    </div>
                                </div>
                                <div class="c-post__new-editor">
                                    <div class="c-post__new-editor__markdown">
                                        <textarea name="step3" id="markdown_editor_textarea3" placeholder=" {{ __('ここにはStepの内容について書いてください。Markdown記法で書いてみましょう！') }}" class="form-control"></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="step-tab-panel" id="step4">
                                <div class="c-post__new-subtitle">
                                    @if($errors->first('subtitle4'))
                                    <div class="validation">{{ $errors->first('subtitle4') }}</div>
                                    @endif
                                    <div class="c-post__new-subtitle">
                                        <input id="subtitle4" placeholder=" {{ __('（例：「STEP4：期末試験までにこなしておきたい参考書」）') }}"　type="text" class="form-control" name="subtitle4" value="{{ old('subtitle4') }}" autocomplete="subtitle4">
                                    </div>
                                </div>
                                <div class="c-post__new-editor">
                                    <div class="c-post__new-editor__markdown">
                                        <textarea name="step4" id="markdown_editor_textarea4" placeholder=" {{ __('ここにはStepの内容について書いてください。Markdown記法で書いてみましょう！') }}" class="form-control"></textarea>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>

                </div>

                <div class="c-post__new-submit">
                    <button type="submit" value="Stepに投稿">{{ __('Stepに投稿') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

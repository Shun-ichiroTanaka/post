@extends('layouts.app')
@section('content')
<div id="app">
    <div class="c-post">
        <form method="post" action="{{ route('post.newpost') }}">
            @csrf
            <div class="c-post__new">

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

                @if($errors->first('body'))
                <div class="validation">{{ $errors->first('article') }}</div>
                @endif
                <div id="demo">
                    <div class="step-app">
                        <div class="step-app-side">
                            <ul class="step-steps">
                                <li><a href="#step1">Step 1</a></li>
                                <li><a href="#step2">Step 2</a></li>
                                <li><a href="#step3">Step 3</a></li>
                                <li><a href="#step4">Step 4</a></li>
                            </ul>
                            <div class="step-footer">
                                <button data-direction="prev">Previous</button>
                                <button data-direction="next">Next</button>
                                <button data-direction="finish">Finish</button>
                            </div>
                            <p>目標時間</p>
                            <input type="text" value="">
                        </div>
                        <div class="step-content">
                            <div class="step-tab-panel" id="step1">
                                <div class="c-post__new-title">
                                    <input id="title" placeholder=" {{ __('（例：「STEP1：まずはマクロ経済をザックリ理解しよう」）') }}"　type="text" class="form-control" name="title" value="{{ old('title') }}" required autocomplete="title">
                                </div>
                                <div class="c-post__new-editor">
                                    {{-- <div id="" name="content" autocomplete="content"></div> --}}
                                    <div class="c-post__new-editor__markdown">
                                        <textarea name="article" id="markdown_editor_textarea" placeholder=" {{ __('ここにはStepの内容について書いてください。Markdown記法で書いてみましょう！') }}" cols="30" rows="10" class="form-control"></textarea>
                                    </div>
                                    <div class="c-post__new-editor__markdown">
                                        <div id="markdown_preview"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="step-tab-panel" id="step2">
                                <div class="c-post__new-title">
                                    <input id="title" placeholder=" {{ __('（例：「STEP2：次に必須の公式を押さえよう」）') }}"　type="text" class="form-control" name="title" value="{{ old('title') }}" required autocomplete="title">
                                </div>
                                <div class="c-post__new-editor">
                                    {{-- <div id="" name="content" autocomplete="content"></div> --}}
                                    <div class="c-post__new-editor__markdown">
                                        <textarea name="article" id="markdown_editor_textarea" placeholder=" {{ __('ここにはStepの内容について書いてください。Markdown記法で書いてみましょう！') }}" cols="30" rows="10" class="form-control"></textarea>
                                    </div>
                                    <div class="c-post__new-editor__markdown">
                                        <div id="markdown_preview"></div>
                                    </div>
                            </div>
                            </div>
                            <div class="step-tab-panel" id="step3">
                                <div class="c-post__new-title">
                                    <input id="title" placeholder=" {{ __('（例：「STEP3：頻出の問題系統を押さえよう」）') }}"　type="text" class="form-control" name="title" value="{{ old('title') }}" required autocomplete="title">
                                </div>
                                <div class="c-post__new-editor">
                                    {{-- <div id="" name="content" autocomplete="content"></div> --}}
                                    <div class="c-post__new-editor__markdown">
                                        <textarea name="article" id="markdown_editor_textarea" placeholder=" {{ __('ここにはStepの内容について書いてください。Markdown記法で書いてみましょう！') }}" cols="30" rows="10" class="form-control"></textarea>
                                    </div>
                                    <div class="c-post__new-editor__markdown">
                                    <div id="markdown_preview"></div>
                                </div>
                            </div>
                            </div>
                            <div class="step-tab-panel" id="step4">
                                <div class="c-post__new-title">
                                    <input id="title" placeholder=" {{ __('（例：「STEP4：期末試験までにこなしておきたい参考書」）') }}"　type="text" class="form-control" name="title" value="{{ old('title') }}" required autocomplete="title">
                                </div>
                                <div class="c-post__new-editor">
                                    {{-- <div id="" name="content" autocomplete="content"></div> --}}
                                    <div class="c-post__new-editor__markdown">
                                        <textarea name="article" id="markdown_editor_textarea" placeholder=" {{ __('ここにはStepの内容について書いてください。Markdown記法で書いてみましょう！') }}" cols="30" rows="10" class="form-control"></textarea>
                                    </div>
                                    <div class="c-post__new-editor__markdown">
                                        <div id="markdown_preview"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="c-post__new-submit">
                    <button type="submit" value="Stepに投稿">{{ __('Stepに投稿') }}</button>
                </div>
            </div>
        </form>
    </div>
</div>


@endsection

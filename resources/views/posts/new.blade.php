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
                    <input id="title" placeholder=" {{ __('自分の「STEP」タイトルを登録する（例：「最短で学んだ私の英語学習方法」）') }}"　type="text" class="form-control" name="title" value="{{ old('title') }}" required autocomplete="title">
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
                <div class="c-post__new-editor">
                    {{-- <div id="" name="content" autocomplete="content"></div> --}}
                    <div class="c-post__new-editor__markdown">
                        <textarea name="article" id="markdown_editor_textarea" placeholder=" {{ __('ここにはStepの内容について書いてください。Markdown記法で書いてみましょう！') }}" cols="30" rows="10" class="form-control"></textarea>
                    </div>
                    <div class="c-post__new-editor__markdown">
                        <div id="markdown_preview"></div>
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

@extends('layouts.app')
@section('content')
<div id="app">
    <form method="post" action="post.update">
        @csrf
        <div class="c-post__new">

            <!-- ①タイトル　-->
            <div class="c-post__new-title">
                <input name="title" placeholder=" タイトル（例：「1日5分!マクロ経済のオススメ勉強法」）" value="{{ $post['title'] }}" type="text" required>
            </div>
            <!-- ①タイトル　-->

            <!-- ②、③タグ、目標時間　-->
            <div class="c-post__new-box">
                <div class="c-post__new-box__tags">
                        <label for="tags">
                            タグ
                        </label>
                        <input
                            id="tags"
                            name="tags"
                            class="form-control {{ $errors->has('tags') ? 'is-invalid' : '' }}"
                            value="{{ $post['tag'] }}"
                            type="text"
                        >
                        @if ($errors->has('tags'))
                            <div class="invalid-feedback">
                                {{ $errors->first('tags') }}
                            </div>
                        @endif
                </div>
                <div class="c-post__new-box__time">目標時間:
                    <select name="clearTime" value="{{ $post['clearTime'] }}">
                        <option selected value="指定しない">指定しない</option>
                        <option value="30分">30分</option>
                        <option value="1時間">1時間</option>
                        <option value="1時間30分">1時間30分</option>
                        <option value="2時間">2時間</option>
                        <option value="2時間30分">2時間30分</option>
                        <option value="3時間">3時間</option>
                        <option value="3時間30分">3時間30分</option>
                        <option value="4時間">4時間</option>
                        <option value="4時間30分">4時間30分</option>
                        <option value="5時間">5時間</option>
                        <option value="それ以上">それ以上</option>
                    </select>
                </div>
            </div>
            <!-- ②、③タグ、目標時間　-->

            <!-- ④　各ステップタイトルとコンテンツ　-->
            <div class="c-post__new-table">
                <table class="table table-bordered" id="postTable">
                    <tr class="c-post__new-table__step">
                        <td>ステップタイトル</td>
                        <td>本文</td>
                    </tr>
                    {{-- @if (is_array($post->steps)) --}}
                        @foreach ($post->steps as $step)
                            <tr class="c-post__new-table__step">
                                <td><input name="step_name[]" value="{{ $step['name'] }}" placeholder="例：まずは全体をザックリ理解しよう" type="text"></td>
                                <td><textarea name="step_body[]">{{ $step['body'] }}</textarea></td>
                            </tr>
                        @endforeach
                    {{-- @endif --}}
                </table>
            </div>
            <!-- ④　各ステップタイトルとコンテンツ　-->


            <!-- ⑤　送信　-->
            <div class="c-post__new-submit">
                <button type="submit" value="Stepに投稿">{{ __('Stepに投稿') }}</button>
            </div>
            <!-- ⑤　送信　-->
            </td>
    </form>
</div>
@endsection
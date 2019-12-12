{{--

    マイページ
    componentで投稿一覧を表示
    左のサイドバーで検索機能・カテゴリー機能
    右のサイドバーで

    --}}

@extends('layouts.app')
@section('content')
<div id="app">
    <div class="p-mypage">
        <div class="p-mypage__bg"></div>
        <div class="p-mypage__user">
            <div class="p-mypage__user-img">
                @if (empty($user->avatar))
                    <img src="/img/avatar/user.svg" alt="avatar" style="
                        display: block;
                        margin: 0 auto;
                        width: 150px;
                        height: 150px;
                        border-radius: 50%;
                        border: solid 5px #fff;
                        background: #fff;" border-radius="50%">
                @else
                    <img src="{{ asset('/img/avatar/'.$user->avatar) }}" alt="avatar" style="
                        display: block;
                        margin: 0 auto;
                        width: 150px;
                        height: 150px;
                        border-radius: 50%;
                        border: solid 5px #fff;
                        background: #fff;" border-radius="50%">
                @endif
            </div>
            <h1 class="p-mypage__user-name">{{ $user['name'] }}</h1>
            @if (Auth::user() === $user->id)
            <a class="p-mypage__user-change__img" href="{{ route('avatar.edit') }}"><i class="fas fa-images"></i></a>
            <div class="p-mypage__user-info">{{ $user['info'] }}</div>
            <a class="p-mypage__user-change__info" href="{{ route('user.edit') }}">プロフィール編集</a>
            @else
            <div>{{ $user['info'] }}</div>
            @endif
        </div>
    </div>

    <div class="tabs">
        {{-- @if (Auth::check()) --}}
        {{-- タブのタイトル --}}
            <input id="ownpost" type="radio" name="tab_item" checked>
            <label class="tab_item" for="ownpost">投稿一覧</label>

            <input id="like" type="radio" name="tab_item">
            <label class="tab_item" for="like">いいねをした</label>

            <input id="tyarenzi-step" type="radio" name="tab_item">
            <label class="tab_item" for="tyarenzi-step">チャレンジ中</label>

            <input id="stock" type="radio" name="tab_item">
            <label class="tab_item" for="stock">登録をした</label>

        {{-- タブの中身 --}}
            <div class="tab_content" id="ownpost_content">
                @foreach ($articles as $article)
                    @if (!empty($article->id))
                        <div class="article-box">
                            <div class="article-box-left">
                                <a href="/user/{{$article->user_id}}">
                                    @if (empty($article->user->avatar))
                                    <img src="/img/avatar/user.svg" alt="avatar"
                                        style="width:40px; height:40px; border-radius:50%?vertical-align: middle;">
                                    @else
                                    <img src="{{ asset('/img/avatar/'.$article->user->avatar) }}" alt="avatar"
                                        style="width:40px; height:40px; border-radius:50%" border-radius="50%">
                                    @endif
                                </a>
                            </div>
                            <div class="article-box-right">
                                <a class="article-title" href="/post/{{$article->id}}">{{ $article->title }}</a>
                                <div class="article-details">
                                    <div class="article-date">{{ $article->created_at }}</div>
                                </div>
                            </div>
                        </div>
                    @else
                        まだ投稿がありません
                    @endif
                @endforeach                 
            </div>
            <div class="tab_content" id="like_content">
                @foreach ($likes as $like)
                    @if (!empty($like->id))
                        <div class="article-box">
                            <div class="article-box-left">
                                <a href="/user/{{$like->user_id}}">
                                    @if (empty($like->user->avatar))
                                    <img src="/img/avatar/user.svg" alt="avatar"
                                        style="width:40px; height:40px; border-radius:50%?vertical-align: middle;">
                                    @else
                                    <img src="{{ asset('/img/avatar/'.$like->user->avatar) }}" alt="avatar"
                                        style="width:40px; height:40px; border-radius:50%" border-radius="50%">
                                    @endif
                                </a>
                            </div>
                            <div class="article-box-right">
                                <a class="article-title" href="/post/{{$like->post->id}}">{{ $like->post->title }}</a>
                                <div class="article-details">
                                    <div class="article-date">{{ $like->created_at }}</div>
                                </div>
                            </div>
                        </div>
                    @else
                        <p>まだいいねをしていません</p>
                    @endif
                @endforeach
            </div>
            <div class="tab_content" id="tyarenzi-step_content">
                @foreach ($articles as $article)
                    @if (!empty($article->id))
                        <div class="article-box">
                            <div class="article-box-left">
                                <a href="/user/{{$article->user_id}}">
                                    @if (empty($article->user->avatar))
                                    <img src="/img/avatar/user.svg" alt="avatar"
                                        style="width:40px; height:40px; border-radius:50%?vertical-align: middle;">
                                    @else
                                    <img src="{{ asset('/img/avatar/'.$article->user->avatar) }}" alt="avatar"
                                        style="width:40px; height:40px; border-radius:50%" border-radius="50%">
                                    @endif
                                </a>
                            </div>
                            <div class="article-box-right">
                                <a class="article-title" href="/post/{{$article->id}}">{{ $article->title }}</a>
                                <div class="article-details">
                                    <div class="article-date">{{ $article->created_at }}</div>
                                </div>
                            </div>
                        </div>
                    @else
                        まだ投稿がありません
                    @endif
                @endforeach  
            </div>
            <div class="tab_content" id="stock_content">
                @foreach ($articles as $article)
                    @if (!empty($article->id))
                        <div class="article-box">
                            <div class="article-box-left">
                                <a href="/user/{{$article->user_id}}">
                                    @if (empty($article->user->avatar))
                                    <img src="/img/avatar/user.svg" alt="avatar"
                                        style="width:40px; height:40px; border-radius:50%?vertical-align: middle;">
                                    @else
                                    <img src="{{ asset('/img/avatar/'.$article->user->avatar) }}" alt="avatar"
                                        style="width:40px; height:40px; border-radius:50%" border-radius="50%">
                                    @endif
                                </a>
                            </div>
                            <div class="article-box-right">
                                <a class="article-title" href="/post/{{$article->id}}">{{ $article->title }}</a>
                                <div class="article-details">
                                    <div class="article-date">{{ $article->created_at }}</div>
                                </div>
                            </div>
                        </div>
                    @else
                        まだ投稿がありません
                    @endif
                @endforeach  
            </div>
        {{-- @else
        @endif --}}
    </div>

    <div>


        <!-- ページネーション -->
        {{-- <div class="u-pagenation">
                {{ $articles->links() }}
    </div> --}}
    {{-- {!! $articles->render() !!}
            // ページャー --}}
</div>
</div>
</div>
@endsection

<script type="text/javascript">
    document.title = `{{ $user['name'] }}'のプロフィール`
</script>
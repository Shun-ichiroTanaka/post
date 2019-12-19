<div class="tabs">
    {{-- @if (Auth::check()) --}}
    {{-- タブのタイトル --}}
    <input id="ownpost" type="radio" name="tab_item" checked>
    <label class="tab_item" for="ownpost">投稿</label>

    <input id="like" type="radio" name="tab_item">
    <label class="tab_item" for="like">いいね</label>

    <input id="tyarenzi-step" type="radio" name="tab_item">
    <label class="tab_item" for="tyarenzi-step">チャレンジ中</label>

    <input id="stock" type="radio" name="tab_item">
    <label class="tab_item" for="stock">登録中</label>

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
                <div>
                    <a class="article-title" href="/post/{{$article->id}}">{{ $article->title }}</a>
                    <div class="article-details">
                        <div class="article-date">{{ $article->created_at }}</div>
                    </div>
                </div>
                <div>
                    @if (Auth::check())
                        @if(Auth::user()->id === $article->user_id)
                        <div class="u-flex">
                            {{-- 削除ボタン --}}
                            <form method="post" action="/user/delete/{{$article->id}}">
                                {{ csrf_field() }}
                                <button id="c-button_post-delete" type="submit" onclick='return confirm("記事を削除しますか？");'>削除</button>
                            </form>
                            {{-- 編集ボタン --}}
                            <form method="post" action="/user/edit/{{$article->id}}">
                                {{ csrf_field() }}
                                <button id="c-button_post-edit" type="submit">編集</button>
                            </form>
                        </div>
                        @endif                      
                    @endif

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
                <a href="/user/{{$like->post->user_id}}">
                    @if (empty($like->post->user->avatar))
                    <img src="/img/avatar/user.svg" alt="avatar"
                        style="width:40px; height:40px; border-radius:50%?vertical-align: middle;">
                    @else
                    <img src="{{ asset('/img/avatar/'.$like->post->user->avatar) }}" alt="avatar"
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
        まだ投稿がありません
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
        @foreach ($stocks as $stock)
        @if (!empty($stock->id))
        <div class="article-box">
            <div class="article-box-left">
                <a href="/user/{{$stock->post->user_id}}">
                    @if (empty($stock->post->user->avatar))
                    <img src="/img/avatar/user.svg" alt="avatar"
                        style="width:40px; height:40px; border-radius:50%?vertical-align: middle;">
                    @else
                    <img src="{{ asset('/img/avatar/'.$stock->post->user->avatar) }}" alt="avatar"
                        style="width:40px; height:40px; border-radius:50%" border-radius="50%">
                    @endif
                </a>
            </div>
            <div class="article-box-right">
                <a class="article-title" href="/post/{{$stock->post->id}}">{{ $stock->post->title }}</a>
                <div class="article-details">
                    <div class="article-date">{{ $stock->created_at }}</div>
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
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
        <div class="c-post__article-box">
            <div class="c-post__article-box-left">
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
            <div class="c-post__article-box-right">
                <div>
                    <a class="c-post__article-box-right__title" href="/post/{{$article->id}}">{{ $article->title }}</a>
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
        <div class="c-post__article-box">
            <div class="c-post__article-box-left">
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
            <div class="c-post__article-box-right">
                <a class="c-post__article-box-right__title" href="/post/{{$like->post->id}}">{{ $like->post->title }}</a>
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
        @foreach ($challenges as $challenge)
        @if (!empty($challenge->id))
        <div class="c-post__article-box">
            <div class="c-post__article-box-left">
                <a href="/user/{{$challenge->post->user_id}}">
                    @if (empty($challenge->post->user->avatar))
                    <img src="/img/avatar/user.svg" alt="avatar"
                        style="width:40px; height:40px; border-radius:50%?vertical-align: middle;">
                    @else
                    <img src="{{ asset('/img/avatar/'.$challenge->post->user->avatar) }}" alt="avatar"
                        style="width:40px; height:40px; border-radius:50%" border-radius="50%">
                    @endif
                </a>
            </div>
            <div class="c-post__article-box-right">
                <a class="c-post__article-box-right__title" href="/challenge/{{$challenge->post->id}}">{{ $challenge->post->title }}</a>
                <div class="c-post__article-box-right__progress">
                    <p>完了度</p>
                    <div>80%</div>
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
        <div class="c-post__article-box">
            <div class="c-post__article-box-left">
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
            <div class="c-post__article-box-right">
                <a class="c-post__article-box-right__title" href="/post/{{$stock->post->id}}">{{ $stock->post->title }}</a>
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
@foreach ($articles as $article)
<div class="c-post__article-box">
    <div class="c-post__article-box-left">
        <a href="/user/{{$article->user_id}}">
            @if (empty($article->user->avatar))
            <img src="/img/avatar/user.svg" alt="avatar" style="width:40px; height:40px; border-radius:50%?vertical-align: middle;">
            @else
            <img src="{{ asset('/img/avatar/'.$article->user->avatar) }}" alt="avatar" style="width:40px; height:40px; border-radius:50%" border-radius="50%">
            @endif        
        </a>
    </div>
    <div class="c-post__article-box-right">
        <a class="c-post__article-box-right__title" href="/post/{{$article->id}}">{{ $article->title }}</a>
        <div class="article-details">
            <div class="c-post__article-box-right__date">{{ $article->created_at }}</div>
        </div>
    </div>
</div>
@endforeach

<!-- ページネーション -->
<div class="u-pagenation">
    {{ $articles->links() }}
</div>
{{-- {!! $articles->render() !!}
// ページャー --}}

@section('additionalMeta')
    <meta property="og:image" content="{{ config('app.url') }}/post/{{ $post->id }}/twitter_card.svg">
    <meta name="twitter:card" content="summary">
    <meta name="twitter:image" content="{{ config('app.url') }}/post/{{ $post->id }}/twitter_card.svg">
@endsection
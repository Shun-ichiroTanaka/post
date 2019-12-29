<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Step') }}</title>

    {{--  --}}
    <meta name="twiiter:card" content="summary_large_image">
    {{-- <meta name="twitter:site" content="@filmbiyori"> --}}
    {{-- <meta property="og:url" content="{{ config('app.url') }}posts/{{ $post->id }}"> --}}
    <meta property="og:title" content="STEP">
    {{-- <meta property="og:description" content="{{ $post->title }}"> --}}
    {{-- <meta property="og:iamge" content="{{ config('app.url') }}storage/post_images/{{ $post->photo }}.jpg"> --}}


    {{-- fontawesome CDN --}}
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.css">
<script src="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

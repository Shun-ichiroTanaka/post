<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script>window.Laravel = { csrf-token: '{{ csrf_token() }}' }</script>

    <title>{{ config('app.name', 'Step') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    {{-- markdownライブラリ --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/simplemde@latest/dist/simplemde.min.css">

<<<<<<< HEAD
    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
<body>
<header class="l-header">
		<h1 class="l-header__title"><a href="{{ url('/') }}"> {{ config('app.name', 'Step') }}</a></h1>
		<nav class="l-header__nav">
			<ul>
                @guest
                <li>
                    <a class="l-header__signin" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                <li>
                @if (Route::has('register'))
                    <li>
                        <a class="l-header__signup" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                @endif
                @else
                    <li>
                        <a href="{{ route('post.new') }}">Post</a>
                        {{-- <a href="{{ route('post.index') }}"></a> --}}
                    </li>
                    <li class="l-header-dropdown">
                        <ul>
                            <li class="l-header-dropdown__child">
                                <div href="#" class="l-header-dropdown__child-user">
                                    {{-- {{ Auth::user()->name }} --}}
                                    @if (empty(Auth::user()->avatar))
                                        <img src="/img/avatar/user.svg" alt="avatar" style="width:40px; height:40px; border-radius:50%" border-radius="50%">
                                    @else
                                        {{-- <p>{{ Auth::user()->name }}</p> --}}
                                        <img src="{{ asset('/img/avatar/'.Auth::user()->avatar) }}" alt="avatar" style="width:40px; height:40px; border-radius:50%" border-radius="50%">
                                    @endif
                                    {{-- <img class="l-header-dropdown__child-user__img" src="{{ asset('/img/avatar/'.Auth::user()->avatar) }}" alt="user-image" style="width:40px; height:40px; border-radius:50%"> --}}
                                    <span class="l-header-dropdown__child-user__arrow">â–¼</span>
                                </div>
                                <ul>
                                    {{-- <li><a href="{{ route('mypage.index') }}">{{ __('Mypage') }}</a> --}}
                                    <li><a href="{{ route('user.profile', Auth::user()->id ) }}">{{ __('Profile') }}</a></li>
                                    <li><a href="{{ route('user.edit', Auth::user()->id ) }}">{{ __('Edit Profiles') }}</a></li>
                                    {{-- <li><a href="{{ route('setting.index') }}">{{ __('Setting') }}</a></li> --}}
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <div>
                            <a class="l-header__signup" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>
                        </div>
                    </li>
                @endguest
			</ul>
		</nav>

</header>

<div id="app">
=======
    @section('content')

>>>>>>> a3a2e95861ece3afe091f5046449f8ee0cdd34f8
    <div class="container">
        <div class="card-header">{{ __('Post Register') }}</div>
        <div class="card-body">
            <form method="post" action="{{ route('post.create') }}" enctype="multipart/form-data">
                @csrf
                <div class="form">
                    <div class="">
                        <label for="title">{{ __('Title') }}</label>
                        <input id="title" placeholder="{{ __('title') }}"　type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" required autocomplete="title" autofocus>
                        @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="">
                        <label for="category">{{ __('category') }}</label>
                        <input id="category" placeholder="{{ __('category') }}"　type="text" class="form-control @error('category') is-invalid @enderror" name="category" value="{{ old('category') }}" required autocomplete="category" autofocus>
                        @error('category')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>



                    <div class="">
                        <label for="content">{{ __('Content') }}</label>
                        <textarea id="editor" name="name" rows="10" cols="50">
                        </textarea>
                        <script src="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.js"></script>
                        <script>
                            var simplemde = new SimpleMDE({ element: document.getElementById("editor") });
                        </script>
                        {{-- <textarea class=""  cols="50" rows="10"></textarea> --}}
                        {{-- <div id="markdown" name="content">{{ old('content') }} --}}
                            {{-- <mavon-editor v-model="value" language="en" :toolbars="toolbars" /> --}}
                            {{-- </div> --}}
<<<<<<< HEAD
                            <textarea id="editor" name="name" rows="10" cols="50">
                            </textarea>
=======
                            {{-- <textarea id="markdown" name="content"></textarea> --}}
>>>>>>> a3a2e95861ece3afe091f5046449f8ee0cdd34f8


                        </div>

                        <div class="">
                            <button type="submit">{{ __('Register') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
<<<<<<< HEAD
    </div>
    <script src="https://cdn.jsdelivr.net/npm/simplemde@latest/dist/simplemde.min.js"></script>
    <script>
    // const markdown = new SimpleMDE({
        //     element: document.getElementById("markdown")
        // });
        // Most options demonstrate the non-default behavior
        const simplemde = new SimpleMDE({
            element: document.getElementById("editor"),
            autosave: {
                enabled: true,
                delay: 1000,
            },
            forceSync: true,
            parsingConfig: {
                allowAtxHeaderWithoutSpace: true,
                strikethrough: true,
                underscoresBreakWords: true,
            },
            placeholder: "Markdown記法で書いてみよう",
            spellChecker: false,
            tabSize: 4,
        });
    </script>
</body>
</html>
=======
        {{-- <script src="https://cdn.jsdelivr.net/npm/simplemde@latest/dist/simplemde.min.js"></script> --}}
        {{-- <script>
            // const markdown = new SimpleMDE({
                //     element: document.getElementById("markdown")
                // });
                // Most options demonstrate the non-default behavior
                const simplemde = new SimpleMDE({
                    element: document.getElementById("markdown"),
                    autosave: {
                        enabled: true,
                        delay: 1000,
                    },
                    placeholder: "Markdown記法で書いてみよう",
                    spellChecker: false,
                    tabSize: 4,
                });
            </script> --}}
            @endsection
>>>>>>> a3a2e95861ece3afe091f5046449f8ee0cdd34f8

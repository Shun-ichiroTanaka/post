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
    <script src="https://cdn.jsdelivr.net/npm/simplemde@latest/dist/simplemde.min.js"></script>

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <div class="container">

            @include('layouts.header')

            <div class="b-wrapper">
                @yield('content')
                <router-view></router-view>
            </div>

            @include('layouts.footer')

        </div>
        {{-- <router-view></router-view> --}}
    </div>


    @include('sweetalert::alert')
    <script>
        // const markdown = new SimpleMDE({
        //     element: document.getElementById("markdown")
        // });
        // Most options demonstrate the non-default behavior
        const simplemde = new SimpleMDE({
            element: document.getElementById("markdown"),
            autofocus: true,
            autosave: {
                enabled: true,
                delay: 1000,
            },
            forceSync: true,
            hideIcons: ["guide", "heading"],
            indentWithTabs: true,
            insertTexts: {
                horizontalRule: ["", "\n\n-----\n\n"],
                image: ["![](http://", ")"],
                link: ["[", "](http://)"],
                table: ["", "\n\n| Column 1 | Column 2 | Column 3 |\n| -------- | -------- | -------- |\n| Text     | Text      | Text     |\n\n"],
            },
            lineWrapping: true,
            parsingConfig: {
                allowAtxHeaderWithoutSpace: true,
                strikethrough: true,
                underscoresBreakWords: true,
            },
            placeholder: "Markdown記法で書いてみよう",
            previewRender: function(plainText) {
                return customMarkdownParser(plainText); // Returns HTML from a custom parser
            },
            previewRender: function(plainText, preview) { // Async method
                setTimeout(function(){
                    preview.innerHTML = customMarkdownParser(plainText);
                }, 250);

                return "Loading...";
            },
            promptURLs: true,
            renderingConfig: {
                singleLineBreaks: true,
                codeSyntaxHighlighting: true,
            },
            shortcuts: {
                drawTable: "Cmd-Alt-T"
            },
            showIcons: ["code", "table"],
            spellChecker: true,
            status: true,
            status: ["autosave", "lines", "words", "cursor"], // Optional usage
            status: ["autosave", "lines", "words", "cursor", {
                className: "keystrokes",
                defaultValue: function(el) {
                    this.keystrokes = 0;
                    el.innerHTML = "0 Keystrokes";
                },
                onUpdate: function(el) {
                    el.innerHTML = ++this.keystrokes + " Keystrokes";
                }
            }], // Another optional usage, with a custom status bar item that counts keystrokes
            styleSelectedText: true,
            tabSize: 4,
        });
    </script>
    {{-- vueを用いるためこの位置 --}}
    <script src=" {{ mix('js/app.js') }} "></script>
</body>
</html>

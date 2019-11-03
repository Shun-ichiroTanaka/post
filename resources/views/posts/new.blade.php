{{--

    新規投稿画面


    --}}

    @extends('layouts.app')

    @section('content')
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
                        {{-- <textarea class=""  cols="50" rows="10"></textarea> --}}
                        {{-- <div id="markdown" name="content">{{ old('content') }} --}}
                            {{-- <mavon-editor v-model="value" language="en" :toolbars="toolbars" /> --}}
                        {{-- </div> --}}
                        <textarea id="markdown" name="content"></textarea>

                    </div>

                    <div class="">
                        <button type="submit">{{ __('Register') }}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    @endsection

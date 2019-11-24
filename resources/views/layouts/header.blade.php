 {{-- @include('layouts.header') --}}
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
                    <a href="{{ route('post.new') }}">{{ __('Post') }}</a>
                    {{-- <a href="{{ route('post.index') }}"></a> --}}
                </li>
                <li class="l-header-dropdown">
                    <ul>
                        <li class="l-header-dropdown__child">
                            <div href="#" class="l-header-dropdown__child-user">
                                @if (empty(Auth::user()->avatar))
                                <img src="/img/avatar/user.svg" alt="avatar" style="width:40px; height:40px; border-radius:50%; vertical-align:middle; cursor:pointer; background-size: cover;">
                                @else
                                <img src="{{ asset('/img/avatar/'.Auth::user()->avatar) }}" alt="avatar" style="width:40px; height:40px; border-radius:50%; cursor:pointer; background-size: cover;">
                                @endif
                            </div>
                            <ul>
                                {{-- <li><a href="{{ route('mypage.index') }}">{{ __('Mypage') }}</a> --}}
                                    <li><a href="{{ route('user.profile', Auth::user()->id ) }}">{{ __('Mypage') }}</a></li>
                                    <li><a href="{{ route('user.edit', Auth::user()->id ) }}">{{ __('Edit Profile') }}</a></li>
                                    <li>
                                        <div>
                                            <a class="" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                            </a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>
                                        </div>
                                    </li>
                                {{-- <li><a href="{{ route('setting.index') }}">{{ __('Setting') }}</a></li> --}}
                            </ul>
                        </li>
                    </ul>
                </li>
                @endguest
            </ul>
        </nav>
    </header>


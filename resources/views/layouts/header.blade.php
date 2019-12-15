<header class="l-header">
    <div class="">
        <p class="l-header__title"><a href="{{ url('/') }}">R2 β</a></p>
        <nav class="l-header__nav">
            <ul>
                @guest
                    <li>
                        <a class="l-header__signin" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                @if (Route::has('register'))
                    <li>
                        <a class="l-header__signup" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                @endif
                @else
                    <li class="l-header-dropdown">
                        <ul>
                            <li class="l-header-dropdown__child">
                                <div href="#" class="l-header-dropdown__child-user">
                                    <div class="">
                                        @if (empty(Auth::user()->avatar))
                                        <img src="/img/avatar/user.svg" alt="avatar"
                                            style="width:35px; height:35px; border-radius:50%; vertical-align:middle; cursor:pointer; background-size: cover;">
                                        @else
                                        <img src="{{ asset('/img/avatar/'.Auth::user()->avatar) }}" alt="avatar"
                                            style="width:35px; height:35px; border-radius:50%; vertical-align:middle; cursor:pointer; background-size: cover;">
                                        @endif
                                    </div>
                                    <p class="">{{ Auth::user()->name }}</p>
                                </div>
                                <ul>
                                    <li><a href="{{ route('user.profile', Auth::user()->id ) }}">{{ __('Mypage') }}</a></li>
                                    <div>
                                        <a class="" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            style="display: none;">@csrf</form>
                                    </div>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class="c-button-header__post">
                        <a href="{{ route('post.new') }}">{{ __('Post') }}</a>
                    </li>
                    <div class="l-header__spnav">
                        <input type="radio" id="one" name="buttons" checked>
                        <label for="one" class="icons home"><a href="/"><span class="fas fa-home"></span></a></label>
                        <input type="radio" id="two" name="buttons">
                        <label for="two" class="icons heart">
                            <a href="{{ route('user.profile', Auth::user()->id ) }}">
                                @if (empty(Auth::user()->avatar))
                                <img src="/img/avatar/user.svg" alt="avatar"
                                    style="width:35px; height:35px; border-radius:50%; vertical-align:middle; cursor:pointer; background-size: cover;">
                                @else
                                <img src="{{ asset('/img/avatar/'.Auth::user()->avatar) }}" alt="avatar"
                                    style="width:35px; height:35px; border-radius:50%; vertical-align:middle; cursor:pointer; background-size: cover;">
                                @endif
                            </a>
                        </label>
                        <input type="radio" id="three" name="buttons">
                        <label for="three" class="icons search"><a href=""><span class="fas fa-search"></span></a></label>
                        <input type="radio" id="four" name="buttons">
                        <label for="four" class="icons bell"><a href="{{ route('post.new') }}"><span class="fas fa-pen-fancy"></span></label>
                        <div id="box">
                        </div>
                    </div>
                @endguest
            </ul>
        </nav>
    </div>
</header>
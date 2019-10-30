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
                    <li><a href="{{ route('post.index') }}">Post</a></li>
                    <li class="l-header-dropdown">
                        <ul>
                            <li class="l-header-dropdown__child">
                                <p href="#" class="l-header-dropdown__child-user">
                                    <img class="l-header-dropdown__child-user__img" src="{{ Auth::user()->avatar }}" alt="user-image" style="width:40px; height:40px; border-radius:50%">
                                    <span class="l-header-dropdown__child-user__arrow">▼</span>
                                </p>
                                <ul>
                                    <li>{{ Auth::user()->name }}</li>
                                    <li><a href="{{ route('mypage.index') }}">Mypage</a>
                                    <li><a href="{{ route('profile.index') }}">Profile</a></li>
                                    <li><a href="{{ route('setting.index') }}">Setting</a></li>
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


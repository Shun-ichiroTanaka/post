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
                    <li>{{ Auth::user()->name }}</li>
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


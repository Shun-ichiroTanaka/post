@if (Auth::user())
{{-- スマホ用メニュー --}}
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
@else
@endif
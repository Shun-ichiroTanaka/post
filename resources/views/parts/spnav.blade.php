        @if (Auth::user())
            {{-- スマホ用メニュー --}}
            <div class="l-header__spnav">
                <input type="radio" id="one" name="buttons" checked>
                <label for="one" class="icons home"><a href="/"><span class="fas fa-home"></span></a></label>

                <input type="radio" id="two" name="buttons">
                <label for="two" class="icons search"><a href="/"><span class="fas fa-search"></span></a></label>

                <input type="radio" id="three" name="buttons">
                <label for="three" class="icons bell"><a href=""><span class="fas fa-bell"></span></a></label>

                <input type="radio" id="four" name="buttons">
                <label for="four" class="icons pen"><a href=""><span class="fas fa-pen-fancy"></span></label>

                <div id="box">
                </div>
            </div>
        @else
        @endif
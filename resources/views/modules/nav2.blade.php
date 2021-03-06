<div id="sidebar" class="flexbox-col">
    <div><img id="logo" src="{{ asset('images/catanicons.jpg') }}" alt='logo'></div>
    <div class="name"><h1 class="name">THE GATHERING</h1></div>
    <div class="navlink">
        @foreach(config('app.nav') as $link => $label)
            <div class="link">
                @if(Request::is(substr($link, 1)))
                    <a class="menu-link active" href="{{ $link }}">{{ $label }}</a>
                @else
                    <a class='menu-link' href="{{ $link }}">{{ $label }}</a>
                @endif
            </div>
        @endforeach
    </div>
</div>

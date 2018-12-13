<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="utf-8">
    @stack('title')
    @stack('styles')
</head>
<body>
<div id="mainWrapper" class="flexbox">
    @if(session('alert'))
        <div class='alert'>{{ session('alert') }}</div>
    @endif
    @include('modules.nav2')

    @stack('body')
</div>
</body>
</html>
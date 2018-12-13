<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    @stack('title')
    @stack('styles')
</head>
<body>
<header>
    @include('modules.nav')
</header>
<body>
@stack('body')
</body>
</html>
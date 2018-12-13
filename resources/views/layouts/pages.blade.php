<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
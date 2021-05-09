<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    @yield('css')
</head>
<body>
    @yield('nav-bar')

    @yield('content')

    <center>
    <footer>Copyright© 2021-<?php echo date("Y");?></footer>
    </center>
</body>
</html>

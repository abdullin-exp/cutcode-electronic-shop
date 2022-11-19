<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', env('APP_NAME'))</title>

    @vite(['resources/css/app.css', 'resources/sass/main.sass', 'resources/js/app.js'])
</head>
<body class="antialiased">
@auth
    <form method="post" action="{{ route('logOut') }}">
        @csrf
        @method('DELETE')
        <button type="submit">выйти</button>
    </form>
@endauth
</body>
</html>

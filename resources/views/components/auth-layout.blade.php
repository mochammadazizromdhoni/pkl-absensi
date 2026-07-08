<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Login | Gintara.Net</title>

    <link
    rel="icon"
    type="image/png"
    href="{{ asset('assets/components/gintara-favicon.png') }}?v=3"
>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=plus-jakarta-sans:400,500,600,700,800&display=swap" rel="stylesheet">

    <!-- App assets -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Auth page assets -->
    @vite(['resources/css/auth/login.css', 'resources/js/auth/login.js'])
</head>
<body class="antialiased">
    {{ $slot }}
</body>
</html>
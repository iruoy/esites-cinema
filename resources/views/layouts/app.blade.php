<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta name="description" content="E-sites code challenge backend">

    @vite(['resources/css/app.css'])
    @livewireStyles
</head>
<body class="font-sans antialiased">
<div class="min-h-screen bg-gray-100">
    <main class="container mx-auto px-4 sm:px-6 lg:px-8">
        {{ $slot }}
    </main>

    @livewireScripts
</div>
</body>
</html>

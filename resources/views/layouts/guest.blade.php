<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ asset('images/logo.png') }}">

    <title>{{ config('app.name', 'ICOSSCOPER') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-gray-100">

    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0">
        
        <!-- Logo ICOSSCOPER -->
        <div class="flex flex-col items-center">
            <a href="/" class="flex flex-col items-center">
                <img src="{{ asset('images/logo.png') }}" alt="ICOSSCOPER Logo" class="w-9 h-9 mb-2">
                <h1 class="text-xl font-bold text-sky-700 tracking-wide">ICOSSCOPER</h1>
            </a>
            <p class="mt-2 text-gray-600 text-sm text-center">
                Create your account to join <span class="font-semibold">ICOSSCOPER</span>
            </p>
        </div>

        <!-- Card Container -->
        <div class="w-full sm:max-w-md mt-6 px-6 py-6 bg-white shadow-lg rounded-lg border border-gray-200">
            {{ $slot }}
        </div>
    </div>

</body>
</html>

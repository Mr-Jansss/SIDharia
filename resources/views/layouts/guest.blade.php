<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>
        <link rel="icon" type="image/png" href="{{ asset('storage/logo/logonegeriharia.png') }}">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="flex flex-col sm:justify-center items-center bg-gray-100 pt-6 sm:pt-0 min-h-screen">
            <div>
                <a href="/" class="flex justify-center">
                    <img src="{{ asset('storage/logo/logonegeriharia.png') }}" alt="Logo Negeri Haria" class="w-20 h-20 object-contain">
                </a>
            </div>

            <div class="bg-white shadow-md mt-6 px-6 py-4 sm:rounded-lg w-full sm:max-w-md overflow-hidden">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>

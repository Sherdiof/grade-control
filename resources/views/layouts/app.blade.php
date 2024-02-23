<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <!-- Icon -->
        <link rel="shortcut icon" href="{{ asset('images/icon-logo.png') }}">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <!-- Incluye jQuery si es necesario -->
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-indigo-50">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="opacity-75 rounded-2xl bg-gray-50 shadow-md fixed w-full z-10 top-20 start-0 border border-b-indigo-400">
                    <div class="max-w-7xl mx-auto py-4 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main class="pt-32">
                {{ $slot }}
            </main>
        </div>
    </body>
</html>

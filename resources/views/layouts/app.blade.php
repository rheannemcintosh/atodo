<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Atodo') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased bg-gray-50">
        <div class="min-h-screen flex flex-col">
            <!-- Navigation -->
            <nav class="bg-white shadow-md">
                <div class="container mx-auto px-4 lg:px-8 py-4 flex items-center justify-between">
                    <!-- Logo -->
                    <div class="text-coral-500 font-bold text-xl">Atodo</div>
                    <!-- Navigation Links -->
                    <div>
                        <a href="/" class="text-gray-600 hover:text-coral-500 transition">Home</a>
                    </div>
                </div>
            </nav>

            <!-- Page Content -->
            <main class="flex-grow flex justify-center items-start mt-8">
                <div class="w-full max-w-4xl bg-white shadow-md rounded-lg p-6">
                    {{ $slot }}
                </div>
            </main>
        </div>
    </body>
</html>

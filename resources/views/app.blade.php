<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel with Inertia</title>

        <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet">

        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @inertiaHead
    </head>

    <body class="">
    <!-- Navigation -->
    <nav class="bg-white shadow-md">
        <div class="container mx-auto px-4 lg:px-8 py-4 flex items-center justify-between">
            <!-- Logo -->
            <div class="font-atodo text-rose-600 font-bold text-xl">
                <a href="/home">
                Atodo
                </a>
            </div>
        </div>
    </nav>

    <div class="font-sans antialiased bg-rose-600 h-screen">
        @inertia
    </div>
    </body>
</html>

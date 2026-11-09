<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600|instrument-serif:400,400i" rel="stylesheet">
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <x-inertia::head />
    </head>
    <body class="font-sans text-ink antialiased">
        <x-inertia::app />
    </body>
</html>

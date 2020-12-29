<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'SokoNdogo') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="../../_tailwind-headers-footers/tailwind-headers-footers.css" />
        <link rel="stylesheet" href="{{ asset('css/custom.css') }}">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.0/jquery.min.js"></script>

        @livewireStyles
        @livewireScripts

        <!-- Scripts -->
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.0/dist/alpine.js" defer></script>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-white flex flex-col justify-between">

            @livewire('navigation-dropdown')

            <!-- Page Content -->
            <main class>
                <div class="mx-auto mt-20 py-12 antialiased font-sans">
                    {{ $slot }}
                </div>
            </main>

            <x-global-footer />
        </div>
        @stack('modals')
    </body>
</html>

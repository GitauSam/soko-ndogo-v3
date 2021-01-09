<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'SokoNdogo') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
        <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
        <link rel="stylesheet" href="../../_tailwind-headers-footers/tailwind-headers-footers.css" />

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.0/jquery.min.js"></script>

        <!-- Graphs & Charts  -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.min.js" integrity="sha256-XF29CBwU1MWLaGEnsELogU6Y6rcc5nCkhhx89nFMIDQ=" crossorigin="anonymous"></script>

        @livewireStyles
        @livewireScripts

        <!-- Scripts -->
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.0/dist/alpine.js" defer></script>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen" x-data="{ sidebarOpen: false }">

            @livewire('navigation-dropdown')
            <div class="fixed left-4 sm:left-8 bottom-12 cursor-pointer z-20" @click="sidebarOpen = true">
                <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" class="h-6 w-6 sm:h-8 sm:w-8 fill-current text-green-800" x="0px" y="0px"
                    viewBox="0 0 492.004 492.004" style="enable-background:new 0 0 492.004 492.004;" xml:space="preserve">
                    <g>
                        <g>
                            <path d="M484.14,226.886L306.46,49.202c-5.072-5.072-11.832-7.856-19.04-7.856c-7.216,0-13.972,2.788-19.044,7.856l-16.132,16.136
                                c-5.068,5.064-7.86,11.828-7.86,19.04c0,7.208,2.792,14.2,7.86,19.264L355.9,207.526H26.58C11.732,207.526,0,219.15,0,234.002
                                v22.812c0,14.852,11.732,27.648,26.58,27.648h330.496L252.248,388.926c-5.068,5.072-7.86,11.652-7.86,18.864
                                c0,7.204,2.792,13.88,7.86,18.948l16.132,16.084c5.072,5.072,11.828,7.836,19.044,7.836c7.208,0,13.968-2.8,19.04-7.872
                                l177.68-177.68c5.084-5.088,7.88-11.88,7.86-19.1C492.02,238.762,489.228,231.966,484.14,226.886z"/>
                        </g>
                    </g>
                    <g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g>
                </svg>
            </div>
            <main class="h-full flex flex-row">
                <!-- start dashboard -->
                <div class="flex bg-gray-100">
                    <div :class="sidebarOpen ? 'block' : 'hidden'" @click="sidebarOpen = false" class="fixed z-20 inset-0 bg-black opacity-50 transition-opacity">
                    </div>
                    <div :class="sidebarOpen ? 'translate-x-0 ease-out' : 'hidden -translate-x-full ease-in'" 
                        class="fixed inset-y-0 left-0 w-full py-10 transition duration-300 bg-green-700 transform h-full overflow-y-auto lg:translate-x-0 lg:static lg:inset-0 z-30">
                        <nav class="">
                            <!-- Dashboard Link Start -->
                            <a class="flex items-center mt-32 py-6 px-6 bg-gray-700 bg-opacity-25 text-gray-100" href="{{ route('dashboard') }}">
                                <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z"></path>
                                </svg>

                                <span class="mx-3 text-white">Dashboard</span>
                            </a>
                            <!-- Dashboard Link End -->
                            @if (auth()->user()->can('product-list') && auth()->user()->can('order-list'))
                                <x-dashboard-nav-elms />
                            @elseif (auth()->user()->can('order-create'))
                                <x-buyer-dashboard-nav-elms />
                            @elseif (auth()->user()->can('product-create'))
                                <x-seller-dashboard-nav-elms />
                            @endif
                        </nav>
                    </div>
                </div>
                {{ $slot }}
            </main>
        </div>
        @stack('modals') 
    </body>
</html>

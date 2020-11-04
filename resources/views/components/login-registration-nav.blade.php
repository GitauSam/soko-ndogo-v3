<nav x-data="{ open: false }" class="fixed w-full h-24 z-5 shadow-lg bg-green-800">
        <!-- Primary Navigation Menu -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-full">
            <div class="flex justify-between h-full">
                <div class="flex">
                    <!-- Logo -->
                    <!-- <div class="flex-shrink-0 flex items-center"> -->
                        <!-- <a href="{{ route('dashboard') }}">
                            <x-jet-application-mark class="block h-9 w-auto" />
                        </a> -->
                    <!-- </div> -->

                    <!-- Navigation Links -->
                    <div class="sm:-my-px flex">
                        <x-jet-nav-link 
                            href="{{ route('welcome') }}" :active="request()->routeIs('welcome')">
                            <span class="text-lg font-semibold text-gray-300 hover:text-white">Soko Ndogo</span>
                        </x-jet-nav-link>
                    </div>
                </div>
            </div>
        </div>

        <!-- Responsive Navigation Menu -->
        <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
            <div class="pt-2 pb-3 space-y-1">
                <x-jet-responsive-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                    {{ __('Dashboard') }}
                </x-jet-responsive-nav-link>
            </div>

            <!-- Responsive Settings Options -->
            <div class="pt-4 pb-1 border-t border-gray-200">
                <div class="flex items-center px-4">
                </div>

                <div class="mt-3 space-y-1">
                </div>
            </div>
        </div>
    </nav>
<style>
    .custom-shape-divider-top-1609233651 .shape-fill {
        fill: rgba(6, 95, 70);
    }
    .bg-custom {
        background: rgba(6, 95, 70);
    }
</style>
<section>
    <div class="
                text-black 
                bg-custom
                sm:py-8
                w-full
                sm:h-auto
            "
    >
        @guest
            <div class="
                    container 
                    grid 
                    grid-cols-1 
                    sm:grid-cols-2 
                    gap-8 
                    sm:h-96 
                    mx-auto 
                    overflow-visible"
            >
                <div class="text-white pt-6 sm:pt-24 px-16 text-center rounded-lg sm:h-96">
                    <h1 class="sm:text-4xl text-3xl mb font-medium text-white text-center font-mono">
                        {{ $title }} 
                    </h1>
                        {{ $slot }}
                    <div class="flex justify-center">
                        <button class="border-2 
                                    border-white  
                                    rounded-sm 
                                    font-bold 
                                    py-4 
                                    px-6 
                                    mr-2 
                                    flex items-center 
                                    hover:bg-white
                                    hover:text-green-800
                                    hover:border-green-800
                                    bg-transparent 
                                    text-white 
                                    transition ease-in-out duration-500"
                        >
                                {{ $action }}
                        </button>
                    </div>
                </div>
                <div class="
                        text-center 
                        pt-8 
                        sm:px-8  
                        h-96  
                        sm:mt-20 
                        mx-auto 
                        bg-white
                        rounded-lg 
                        shadow-xl
                        z-10">

                        <h1 class="text-2xl 
                                    mt-4 
                                    font-medium 
                                    text-black 
                                    font-mono"
                        >
                            Sign In
                        </h1>
                        <form class="pt-4 px-4 mt-6" action="{{ route('login') }}" method="post">
                            @csrf
                            <div class="text-justify">
                                <x-jet-label for="email" value="{{ __('Email') }}" />
                                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                            </div>

                            <div class="mt-4 text-justify">
                                <x-jet-label for="password" value="{{ __('Password') }}" />
                                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
                            </div>
                            <!-- sticky footer -->
                            <div class="flex mt-8 justify-center px-8">
                                <x-gen-button id="submit">
                                    Login
                                </x-gen-button>
                            </div>
                        </form>
                </div>
            </div>
        @else
            <div class="
                    container 
                    sm:h-96 
                    mx-auto 
                    overflow-visible"
            >
                <div class="text-white pt-6 sm:pt-24 px-16 text-center rounded-lg sm:h-96">
                    <h1 class="sm:text-4xl text-3xl mb font-medium text-white text-center font-mono">
                        {{ $title }} 
                    </h1>
                        {{ $slot }}
                    <div class="flex justify-center">
                        <button class="border-2 
                                    border-white  
                                    rounded-sm 
                                    font-bold 
                                    py-4 
                                    px-6 
                                    mr-2 
                                    flex items-center 
                                    hover:bg-white
                                    hover:text-green-800
                                    hover:border-green-800
                                    bg-transparent 
                                    text-white 
                                    transition ease-in-out duration-500"
                        >
                                {{ $action }}
                        </button>
                    </div>
                </div>
            </div>
        @endguest
    </div>
    <div class="custom-shape-divider-top-1609233651">
        <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
            <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z" class="shape-fill"></path>
        </svg>
    </div>
</section>
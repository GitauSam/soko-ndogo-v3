<section class="text-black bg-green-100 pt-8">
    <div class="container mx-auto flex px-5 py-24 items-center justify-center flex-col">
        <div class="text-center lg:w-2/3 w-full">
            <h1 class="introduce-service-section-title introduce title-font sm:text-4xl text-3xl mb-4 font-medium text-black font-mono">
                {{ $title }} 
            </h1>
                {{ $slot }}
            <div class="flex justify-center">
                <x-gen-button class="introduce-service-section-action">
                        {{ $action }}
                </x-gen-button>
            </div>
        </div>
    </div>
</section>
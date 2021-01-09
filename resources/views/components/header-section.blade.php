<div class="flex flex-col pb-2 lg:justify-between lg:flex-row">
    <div></div>
    <h2 class="py-7 inline-flex items-center my-auto text-2xl sm:text-4xl font-semibold leading-tight">
        {{ $title }}
    </h2>
    <a 
        href="{{ $action }}"
        class="w-24 h-8 text-white text-center rounded-sm 
                my-auto py-1 bg-green-500 
                hover:bg-green-800 focus:shadow-outline 
                focus:outline-none">
            {{ $description }}
    </a>
</div>
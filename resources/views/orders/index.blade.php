<x-app-layout>
    <div class="container mx-auto">
        
    </div>
    <div class="container bg-white border-solid border-2 border-gray-300 rounded-sm shadow mx-auto flex flex-col mt-4 py-4">
        
        <livewire:notification-read />

        <div class="px-7 flex flex-inline justify-center">
            <h2 class="text-4xl font-semibold">All Orders</h2>
        </div>
                    
        <div class="container mx-auto flex flex-col py-4">
            <hr class="mb-4"/>
            <div class="py-2 flex flex-col">
                <livewire:index-orders />
            </div>
        </div>
    </div>
</x-app-layout>
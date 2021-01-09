<x-dashboard-app>
    <div class="w-full h-screen bg-gray-100">
        <div class="container mx-auto flex flex-col py-24 px-4">

            <x-header-section>
                <x-slot name="title">
                    Add Order
                </x-slot>
                <x-slot name="action">
                    {{ route('orders.index') }}
                </x-slot>
                <x-slot name="description">
                    Back
                </x-slot>
            </x-header-section>

            <div class="bg-white border-2 border-gray-300 lg:rounded lg:shadow-md">
                <form class="w-full px-4 sm:px-8 md:px-16 lg:px-24 xl:px-32 mx-auto mt-12" action="{{ route('orders.store') }}" method="post">
                    @csrf
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full px-3 sm:mb-6 md:mb-0">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-order-name">
                                Name
                            </label>
                            <input class="bg-gray-200 focus:bg-gray-100 block w-full text-gray-700 
                                                    border-b-2 rounded py-3 px-4 leading-tight 
                                                    focus:outline-none focus:border-gray-500" 
                                    id="grid-order-name" name="order_name" type="text"
                                    placeholder="Order Name">
                        </div>
                    </div>
                    <livewire:order-category-and-type />
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                            <div class="w-full">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-quantity">
                                    Quantity
                                </label>
                                <div class="flex flex-row gap-3 w-full">
                                    <input class="appearance-none block w-2/5 bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-quantity" type="number" name="quantity" placeholder="0">
                                    <div class="inline-block relative w-full my-1">
                                        <select class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline" name="qty_unit" id="grid-qty-unit">
                                            <option value="kg">KG(s)</option>
                                            <option value="liter">Liter(s)</option>
                                            <option value="unit">Unit(s)</option>
                                        </select>
                                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 pb-3 text-gray-700">
                                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- sticky footer -->
                    <footer class="flex justify-center px-8 pb-8 pt-4 mt-4">
                        <x-gen-button id="submit">
                            Add Order
                        </x-gen-button>
                    </footer>
                </form>
            </div>
            
        </div>
    </div>
</x-dashboard-app>
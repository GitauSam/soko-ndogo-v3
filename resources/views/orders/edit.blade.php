<x-app-layout>
<div class="container bg-white border-solid border-2 border-gray-300 rounded-sm shadow mx-auto flex flex-col mt-4 py-4">

    <div class="px-7 flex flex-inline justify-center">
        <h2 class="text-4xl font-semibold">Edit Order</h2>
    </div>
                
    <div class="container mx-auto flex flex-col py-4">
        <hr class="mb-4"/>
        <div class="container mx-auto shadow py-2 mx-2">
            <form class="w-2/3 mx-auto" action="{{ route('orders.update', $order->id) }}" method="post">
                @csrf
                <div class="flex flex-wrap -mx-3 mb-6 bg-blue-500">
                    <div class="w-screen md:w-1/2 px-3 mb-6 md:mb-0 bg-red-500">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-order-name">
                            Name
                        </label>
                        <input class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="grid-order-name" name="order_name" type="text" value="{{ $order->order_name }}">
                    </div>
                </div>
                <livewire:order-category-and-type-edit :order="$order" />
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                        <div class="w-full">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-quantity">
                                Quantity
                            </label>
                            <div class="flex flex-row gap-3">
                                <input class="appearance-none block w-2/5 bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-quantity" type="number" name="quantity" value="{{ $order->quantity }}">
                                <div class="inline-block relative w-2/5 my-1">
                                    <select class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline" name="qty_unit" id="grid-qty-unit">
                                            <option value="kg" {{ ( "kg" == $order->quantity_unit ) ? 'selected' : '' }} >KG(s)</option>
                                            <option value="liter" {{ ( "liter" == $order->quantity_unit ) ? 'selected' : '' }} >Liter(s)</option>
                                            <option value="unit" {{ ( "unit" == $order->quantity_unit ) ? 'selected' : '' }} >Unit(s)</option>
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
                    <button id="submit" class="rounded-sm px-3 py-1 bg-blue-700 hover:bg-blue-500 text-white focus:shadow-outline focus:outline-none">
                        Save
                    </button>
                </footer>
            </form>
        </div>
    </div>
</div>
</x-app-layout>
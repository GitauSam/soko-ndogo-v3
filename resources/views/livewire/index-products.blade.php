<div>
    <livewire:notification-read />
    <x-header-section>
        <x-slot name="title">
            Products
        </x-slot>
        <x-slot name="action">
            {{ route('products.create') }}
        </x-slot>
        <x-slot name="description">
            Add Product 
        </x-slot>
    </x-header-section>
    <div class="my-2 flex sm:flex-row flex-col">
        <div class="flex flex-row mb-1 sm:mb-0">
            <div class="relative">
                <select
                    class="appearance-none h-full rounded-l border block w-full 
                            bg-white border-gray-400 text-gray-700 py-2 px-4 pr-8 
                            leading-tight focus:outline-none focus:bg-white 
                            focus:border-gray-500">
                    <option>5</option>
                    <option>10</option>
                    <option>20</option>
                </select>
                <div
                    class="pointer-events-none absolute inset-y-0 right-0 
                            flex items-center px-2 text-gray-700">
                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                    </svg>
                </div>
            </div>
            <div class="relative">
                <select
                    class="appearance-none h-full rounded-r border-t sm:rounded-r-none 
                            sm:border-r-0 border-r border-b block appearance-none w-full 
                            bg-white border-gray-400 text-gray-700 py-2 px-4 pr-8 
                            leading-tight focus:outline-none focus:border-l 
                            focus:border-r focus:bg-white focus:border-gray-500">
                    <option>Active</option>
                    <option>Inactive</option>
                    <option>All</option>
                </select>
                <div
                    class="pointer-events-none absolute inset-y-0 right-0 flex 
                            items-center px-2 text-gray-700">
                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                    </svg>
                </div>
            </div>
        </div>
        <div class="block relative">
            <span class="h-full absolute inset-y-0 left-0 flex items-center pl-2">
                <svg viewBox="0 0 24 24" class="h-4 w-4 fill-current text-gray-500">
                    <path
                        d="M10 4a6 6 0 100 12 6 6 0 000-12zm-8 6a8 8 0 1114.32 4.906l5.387 5.387a1 1 0 01-1.414 1.414l-5.387-5.387A8 8 0 012 10z">
                    </path>
                </svg>
            </span>
            <input placeholder="Search"
                class="appearance-none rounded-r rounded-l sm:rounded-l-none border border-gray-400 border-b block pl-8 pr-6 py-2 w-full bg-white text-sm placeholder-gray-400 text-gray-700 focus:bg-white focus:placeholder-gray-600 focus:text-gray-700 focus:outline-none" />
        </div>
    </div>
    <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
        <div class="inline-block min-w-0 sm:min-w-full md:min-w-full lg:min-w-full xl:min-w-full shadow rounded-lg">
            <table class="min-w-0 sm:min-w-full md:min-w-full lg:min-w-full xl:min-w-full leading-normal">
                <thead>
                    <tr>
                        <th
                            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            Name
                        </th>
                        <th
                            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            Quantity
                        </th>
                        <th
                            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            Price
                        </th>
                        <th
                            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            Category
                        </th>
                        <th
                            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            Created On
                        </th>
                        <th
                            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody>
                @foreach($products as $product)
                    <tr>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                            <div class="flex items-center">
                                <div>
                                    <p class="text-gray-900 whitespace-no-wrap">
                                        {{ $product->product_name }}
                                    </p>
                                </div>
                            </div>
                        </td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                            <p class="text-gray-900 whitespace-no-wrap">{{ $product->quantity }} {{ $product->unit }}(s)</p>
                        </td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                            <p class="text-gray-900 whitespace-no-wrap">
                                Ksh. {{ $product->price }}/{{ $product->unit }}
                            </p>
                        </td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                            <span
                                class="relative inline-block px-3 py-1 font-semibold text-green-900 leading-tight">
                                <span aria-hidden
                                    class="absolute inset-0 bg-green-200 opacity-50 rounded-full"></span>
                                <span class="relative">{{ $product->categories->category_name }}</span>
                            </span>
                        </td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                            <span
                                class="relative inline-block px-3 py-1 font-semibold text-green-900 leading-tight">
                                <span aria-hidden
                                    class="absolute inset-0 bg-green-200 opacity-50 rounded-full"></span>
                                <span class="relative">{{ \Carbon\Carbon::parse($product->created_at)->format('M d, Y') }}</span>
                            </span>
                        </td>
                        <td class="flex flex-wrap px-5 py-5 border-b border-gray-200 bg-white text-sm">
                            <a class="w-16 text-center rounded-sm my-1 mx-1 px-3 py-1 bg-yellow-500 hover:bg-yellow-800 focus:shadow-outline focus:outline-none" href="{{ route('products.show', $product->id) }}">Show</a>
                            <a class="w-16 text-center rounded-sm my-1 mx-1 px-3 py-1 bg-green-500 hover:bg-green-800 focus:shadow-outline focus:outline-none" href="{{ route('products.edit', $product->id) }}">Edit</a>
                            <a wire:click="deactivateProduct('{{ $product->id }}')" class="w-16 text-center rounded-sm mx-1 my-1 px-3 py-1 bg-red-500 hover:bg-red-800 focus:shadow-outline focus:outline-none">Delete</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="px-5 py-2 bg-white border-t flex flex-col xs:flex-row xs:justify-between">
                {{ $products->links()}}
            </div>
        </div>
    </div>
</div>
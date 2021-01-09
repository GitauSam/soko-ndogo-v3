<x-dashboard-app>
    <div class="w-full h-screen bg-gray-100 px-4">
        <div class="mt-24 container mx-auto">
            <x-header-section>
                <x-slot name="title">
                    Show Order
                </x-slot>
                <x-slot name="action">
                    {{ route('orders.index') }}
                </x-slot>
                <x-slot name="description">
                    Back
                </x-slot>
            </x-header-section>    
            <div class="container mx-auto flex flex-col py-4 px-4 m-4 bg-white border-2 border-gray-300 lg:rounded lg:shadow-md">
                <div class="py-2 flex flex-col">
                    <table class="table-auto w-full mx-auto border-none">
                        <tbody>
                            <tr>
                                <td class="border-b-2 px-4 py-2 w-1/5">Name:</td>
                                <td class="border-l-2 border-b-2 px-4 py-2">{{ $order->order_name }}</td>
                            </tr>
                            <tr class="bg-gray-100">
                                <td class="border-b-2 px-4 py-2">Category:</td>
                                <td class="border-l-2 border-b-2 px-4 py-2">{{ $order->category->category_name }}</td>
                            </tr>
                            <tr>
                                <td class="border-b-2 px-4 py-2">Quantity:</td>
                                <td class="border-l-2 border-b-2 px-4 py-2">
                                    <span> {{ $order->quantity }}</span>
                                    <span class="uppercase">{{ $order->quantity_unit }}s</span>
                                </td>
                            </tr>
                            <tr class="bg-gray-100">
                                <td class="border-b-2 px-4 py-2">Category Type:</td>
                                <td class="border-l-2 border-b-2 px-4 py-2">
                                    @if($order->categoryType != null) 
                                        <span> {{ $order->categoryType->category_type_name }}</span>
                                    @else
                                        <span>N/A</span>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td class="px-4 py-2">Created On:</td>
                                <td class="border-l-2 px-4 py-2">
                                    <span> {{ \Carbon\Carbon::parse($order->created_at)->format('M d, Y') }}</span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="flex flex-row w-full my-8 mx-auto justify-end px-4">
                    <a href="{{ route('orders.edit', $order->id) }}" class="ml-4 rounded-sm px-3 py-1 bg-green-500 hover:bg-green-800 focus:shadow-outline focus:outline-none">Update</a>
                    <a href="#" class="ml-4 rounded-sm px-3 py-1 bg-red-500 hover:bg-red-800 focus:shadow-outline focus:outline-none">Delete</a>
                </div>
            </div>
        </div>
    </div>
</x-dashboard-app>
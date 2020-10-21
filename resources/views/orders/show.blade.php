{{-- dump($product) --}}
<x-app-layout>
    <div class="container bg-white border-solid border-2 border-gray-300 rounded-sm shadow mx-auto flex flex-col mt-4 py-4">

        <div class="px-7 flex flex-inline justify-center">
            <h2 class="text-4xl font-semibold">Show Order</h2>
        </div>
                    
        <div class="container mx-auto flex flex-col py-4">
            <hr class="mb-4"/>
            <div class="flex flex-row w-2/3 my-8 mx-auto justify-end px-4">
                <a href="{{ route('orders.index') }}" class="ml-4 rounded-sm px-3 py-1 bg-blue-500 hover:bg-blue-800 focus:shadow-outline focus:outline-none">Back</a>
            </div>
            <div class="py-2 flex flex-col">
                <table class="table-auto w-2/3 mx-auto border-none">
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
                                <span> {{ $order->categoryType->category_type_name }}</span>
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
            <div class="flex flex-row w-2/3 my-8 mx-auto justify-end px-4">
                <a href="#" class="ml-4 rounded-sm px-3 py-1 bg-green-500 hover:bg-green-800 focus:shadow-outline focus:outline-none">Update</a>
                <a href="#" class="ml-4 rounded-sm px-3 py-1 bg-red-500 hover:bg-red-800 focus:shadow-outline focus:outline-none">Delete</a>
            </div>
        </div>
    </div>
</x-app-layout>
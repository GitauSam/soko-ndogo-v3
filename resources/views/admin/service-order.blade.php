<x-dashboard-app>
    <div class="w-full h-screen bg-gray-100">
        <div class="px-2 py-24 container mx-auto">
            <x-header-section>
                <x-slot name="title">
                    Service Product
                </x-slot>
                <x-slot name="action">
                    {{ route('non-serviced-orders') }}
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
                            <tr>
                                <td class="px-4 py-2">Created On:</td>
                                <td class="border-l-2 px-4 py-2">
                                    <span> {{ \Carbon\Carbon::parse($order->created_at)->format('M d, Y') }}</span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2">
                <div class="container mx-auto text-xl font-semibold bg-white border-2 border-gray-300 lg:rounded lg:shadow-md pl-8 py-12 grid grid-cols-1 lg:grid-cols-2">
                    <div class="w-max-content px-4">Amount Available In Store:</div>
                    <div class="">
                        <span>{{ $amtInStock }}</span> (
                        @foreach($units as $unit)
                            <span>{{ $unit }}</span> 
                            @if(!$loop->last)
                                /
                            @endif
                        @endforeach)
                    </div>
                </div>
                <div class="p-8">
                    <a href="{{ route('service.order', $order->id) }}"
                        class= "border-2 border-green-800 h-16 w-full mx-auto
                                block rounded-sm font-bold py-4 text-center
                                bg-green-800 hover:bg-transparent 
                                text-white hover:text-green-800
                                transition ease-in-out duration-500">
                            Service Order
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-dashboard-app>
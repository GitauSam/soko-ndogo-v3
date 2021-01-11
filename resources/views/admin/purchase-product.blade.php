<x-dashboard-app>
    <div class="w-full h-screen bg-gray-100">
        <div class="px-2 py-24 container mx-auto">
            <x-header-section>
                <x-slot name="title">
                    Purchase Product
                </x-slot>
                <x-slot name="action">
                    {{ route('non-purchased-products') }}
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
                                <td class="border-l-2 border-b-2 px-4 py-2">{{ $product->product_name }}</td>
                            </tr>
                            <tr class="bg-gray-100">
                                <td class="border-b-2 px-4 py-2">Category:</td>
                                <td class="border-l-2 border-b-2 px-4 py-2">{{ $product->category }}</td>
                            </tr>
                            <tr>
                                <td class="border-b-2 px-4 py-2">Quantity:</td>
                                <td class="border-l-2 border-b-2 px-4 py-2">
                                    <span> {{ $product->quantity }}</span>
                                    <span class="uppercase">{{ $product->unit }}s</span>
                                </td>
                            </tr>
                            <tr class="bg-gray-100">
                                <td class="border-b-2 px-4 py-2">Price:</td>
                                <td class="border-l-2 border-b-2 px-4 py-2">
                                    <span> Ksh</span>
                                    <span> {{ $product->price }}</span>
                                    <span> per</span>
                                    <span class="uppercase">{{ $product->unit }}</span>
                                </td>
                            </tr>
                            <tr>
                                <td class="px-4 py-2">Created On:</td>
                                <td class="border-l-2 px-4 py-2">
                                    <span> {{ \Carbon\Carbon::parse($product->created_at)->format('M d, Y') }}</span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="w-full mx-auto grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
                    @foreach($product->productImages as $key => $img)
                            @if($img->status ==  1 && $img->is_thumbnail == 1) 
                            <div class="mt-8">
                                <a href="#">
                                    <img src="{{ asset($loc . $img->saved_image_name) }}" alt="Product Image 1"
                                        class="hover:opacity-75 transition ease-in-out duration-150">
                                </a>
                            </div>
                        @endif
                    @endforeach
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
                    <a href="{{ route('purchase.product', $product->id) }}"
                        class= "border-2 border-green-800 h-16 w-full mx-auto
                                block rounded-sm font-bold py-4 text-center
                                bg-green-800 hover:bg-transparent 
                                text-white hover:text-green-800
                                transition ease-in-out duration-500">
                            Purchase
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-dashboard-app>
<div class="flex items-center justify-center">
	<div class="container px-2">
		<table class="w-full flex mx-auto flex-row flex-no-wrap sm:bg-white rounded-sm overflow-hidden sm:shadow-lg my-5">
			<thead class="text-white">
                @foreach ($products as $product)
				          <x-product-index-table-head/>
                @endforeach
			</thead>
			<tbody class="flex-1 sm:flex-none">
                @foreach ($products as $product)
                    <tr class="flex flex-col flex-no wrap sm:table-row mb-2 sm:mb-0">
                        <td class="text-center border-grey-light border hover:bg-gray-100 p-3 truncate">{{ $product->product_name }}</td>
                        <td class="text-center border-grey-light border hover:bg-gray-100 p-3 truncate">{{ $product->quantity }} {{ $product->unit }}(s)</td>
                        <td class="text-center border-grey-light border hover:bg-gray-100 p-3 truncate">Ksh. {{ $product->price }}/{{ $product->unit }}</td>
                        <td class="text-center border-grey-light border hover:bg-gray-100 p-3 truncate">{{ $product->category }}</td>
                        <td class="text-center border-grey-light border hover:bg-gray-100 p-3 truncate mb-1 sm:mb-0 md:mb-0 lg:mb-0">
                            <span> {{ \Carbon\Carbon::parse($product->created_at)->format('M d, Y') }}</span>
                        </td>
                        <td class="border-grey-light border hover:bg-gray-100 p-3 flex flex-inline flex-wrap gap-1 justify-center">
                            <a class="w-16 text-center rounded-sm px-3 bg-yellow-500 hover:bg-yellow-800 focus:shadow-outline focus:outline-none" href="{{ route('products.show', $product->id) }}">Show</a>
                            <a class="w-16 text-center rounded-sm px-3 bg-green-500 hover:bg-green-800 focus:shadow-outline focus:outline-none" href="{{ route('products.edit', $product->id) }}">Edit</a>
                            <button wire:click="deactivateProduct('{{ $product->id }}')" class="w-16 text-center rounded-sm px-3 bg-red-500 hover:bg-red-800 focus:shadow-outline focus:outline-none">Delete</button>
                        </td>
                    </tr>
                @endforeach
			</tbody>
		</table>
	</div>
</div>

<style>
  html,
  body {
    height: 100%;
  }

  @media (min-width: 640px) {
    table {
      display: inline-table !important;
    }

    thead tr:not(:first-child) {
      display: none;
    }
  }

  td:not(:last-child) {
    border-bottom: 0;
  }

  th:not(:last-child) {
    border-bottom: 2px solid rgba(0, 0, 0, .1);
  }
</style>
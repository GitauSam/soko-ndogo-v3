<div class="flex flex-wrap -mx-3">
    <div class="flex flex-col w-full mb-6 md:w-1/2 px-3">
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-category-name">
            Category
        </label>
        <div class="inline-block relative my-1">
            <select 
                class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline" 
                name="category" 
                id="grid-category-name">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ ( $category->id == $order->order_category ) ? 'selected' : '' }}>
                        {{ $category->category_name }}
                    </option>
                @endforeach
            </select>
            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
            </div>
        </div>
    </div>
    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
        <div class="w-full">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-type">
                Category Type
            </label>
            <div class="flex flex-row">
                <div class="inline-block relative w-full my-1">
                    <select
                        class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline" name="type" id="grid-type">
                        @foreach($categoryTypes as $categoryType)
                            <option value="{{ $categoryType->id}}" {{ ( $categoryType->id == $order->order_category_type_id ) ? 'selected' : '' }}>
                                {{ $categoryType->category_type_name}}
                            </option>
                        @endforeach
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
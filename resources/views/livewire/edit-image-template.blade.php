<div id="edit-image-template" class="mx-auto w-2/3">
    <div class="px-7 flex flex-inline justify-center">
            <h4 class="text-2xl font-semibold">Uploaded Images</h2>
        </div>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
        @foreach($this->product->productImages as $key => $img)
            @if($img->status ==  1 && $img->is_thumbnail == 1) 
                <li class="block p-1 w-auto h-24">
                    <article tabindex="0" class="group hasImage w-full h-full rounded-md focus:outline-none focus:shadow-outline bg-gray-100 cursor-pointer relative text-transparent hover:text-white shadow-sm">
                        <img alt="upload preview" class="img-preview w-full h-full sticky object-cover rounded-md bg-fixed" src='{{  asset($loc . $img->saved_image_name) }}'/>

                        <section class="flex flex-col rounded-md text-xs break-words w-full h-full z-20 absolute top-0 py-2 px-3">
                            <h1 class="flex-1"></h1>
                            <div class="flex">
                            <span class="p-1">
                                <i>
                                <svg class="fill-current w-4 h-4 ml-auto pt-" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                    <path d="M5 8.5c0-.828.672-1.5 1.5-1.5s1.5.672 1.5 1.5c0 .829-.672 1.5-1.5 1.5s-1.5-.671-1.5-1.5zm9 .5l-2.519 4-2.481-1.96-4 5.96h14l-5-8zm8-4v14h-20v-14h20zm2-2h-24v18h24v-18z" />
                                </svg>
                                </i>
                            </span>

                            <p class="p-1 size text-xs"></p>
                            <button wire:click="deactivateProductImage" class="delete ml-auto focus:outline-none hover:bg-gray-300 p-1 rounded-md">
                                <svg class="pointer-events-none fill-current w-4 h-4 ml-auto" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                <path class="pointer-events-none" d="M3 6l3 18h12l3-18h-18zm19-4v2h-20v-2h5.711c.9 0 1.631-1.099 1.631-2h5.316c0 .901.73 2 1.631 2h5.711z" />
                                </svg>
                            </button>
                            </div>
                        </section>
                    </article>
                </li>
            @endif
        @endforeach
    </div>
</div>

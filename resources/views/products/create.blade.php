<x-app-layout>
    <div class="container mx-auto flex flex-col mt-20 mb-12 px-4">

        <div class="p-7  flex flex-inline justify-center">
            <h2 class="text-4xl font-semibold">Add Product</h2>
        </div>
        <div class="border-2 border-gray-300 lg:rounded lg:shadow-md">
            <form class="w-full px-4 sm:px-8 md:px-16 lg:px-24 xl:px-32 mx-auto mt-12" action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="flex flex-wrap -mx-3">
                    <div class="w-full md:w-1/2 lg:border-r-2 border-gray-300">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2 px-3 " for="grid-product-name">
                            Name
                        </label>
                        <div class="px-3">
                            <input class="block w-full text-gray-700 border-b-2 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-product-name" name="product_name" type="text" placeholder="Product Name">
                        </div>
                    </div>
                    <div class="w-full md:w-1/2">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2 px-3" for="grid-category-name">
                            Category
                        </label>
                        

                        <div class="inline-block relative w-full px-3 mb-3">
                            <select class="block appearance-none w-full bg-white 
                                            border border-gray-400 hover:border-gray-500 
                                            px-4 py-3 pr-8 rounded shadow leading-tight 
                                            focus:outline-none focus:shadow-outline" 
                                    name="category" id="grid-category-name">
                                <option value="Cereals">Cereals</option>
                                <option value="Poultry Produce">Poultry Produce</option>
                                <option value="Dairy Produce">Dairy Produce</option>
                                <option value="Fruits">Fruits</option>
                                <option value="Legumes">Legumes</option>
                                <option value="Aquatic Produce">Aquatic Produce</option>
                                <option value="Beef">Beef</option>
                            </select>
                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-5 text-gray-700">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex flex-wrap -mx-3">
                    <div class="w-full md:w-1/2">
                        <div class="w-full lg:border-r-2 border-gray-300">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2 px-3" for="grid-quantity">
                                Quantity
                            </label>
                            <div class="flex flex-col lg:flex-row gap-3 px-3">
                                <input class="appearance-none block w-full text-gray-700 border-b-2 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-quantity" type="number" name="quantity" placeholder="0">
                                <div class="inline-block relative w-full mb-3">
                                    <select class="block appearance-none w-full bg-white 
                                                    border border-gray-400 hover:border-gray-500 
                                                    px-4 py-3 pr-8 rounded shadow leading-tight 
                                                    focus:outline-none focus:shadow-outline" 
                                            name="qty_unit" id="grid-qty-unit">
                                        <option value="kg">KG(s)</option>
                                        <option value="liter">Liter(s)</option>
                                        <option value="unit">Unit(s)</option>
                                    </select>
                                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="w-full md:w-1/2">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2 px-3" for="grid-quantity">
                            Price
                        </label>
                        <div class="flex flex-col lg:flex-row gap px-3">
                            <input class="appearance-none block w-full text-gray-700 border-b-2 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-quantity" type="number" name="price" placeholder="0">
                            <p class="py-2 text-center mx-0 lg:mx-2">per</p>
                            <div class="inline-block relative w-full">
                                <select class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-3 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline" name="qty_price_per_unit" id="grid-qty-price">
                                    <option value="kg">KG(s)</option>
                                    <option value="liter">Liter(s)</option>
                                    <option value="unit">Unit(s)</option>
                                </select>
                                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 pb-0 lg:pb-3 text-gray-700">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex flex-col flex-wrap mx-auto py-8">
                    <main class="">
                        <!-- file upload modal -->
                        <article aria-label="File Upload Modal" class="relative h-full flex flex-col bg-white rounded-md" ondrop="dropHandler(event);" ondragover="dragOverHandler(event);" ondragleave="dragLeaveHandler(event);" ondragenter="dragEnterHandler(event);">
                            <!-- overlay -->
                            <div id="overlay" class="w-full h-full absolute top-0 left-0 pointer-events-none z-50 flex flex-col items-center justify-center rounded-md">
                                <i>
                                <svg class="fill-current w-12 h-12 mb-3 text-blue-700" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                    <path d="M19.479 10.092c-.212-3.951-3.473-7.092-7.479-7.092-4.005 0-7.267 3.141-7.479 7.092-2.57.463-4.521 2.706-4.521 5.408 0 3.037 2.463 5.5 5.5 5.5h13c3.037 0 5.5-2.463 5.5-5.5 0-2.702-1.951-4.945-4.521-5.408zm-7.479-1.092l4 4h-3v4h-2v-4h-3l4-4z" />
                                </svg>
                                </i>
                                <p class="text-lg text-blue-700">Drop files to upload</p>
                            </div>

                            <!-- scroll area -->
                            <section class="h-full overflow-auto p-8 w-full h-full flex flex-col">
                                <header class="border-dashed border-2 border-gray-400 py-12 flex flex-col justify-center items-center">
                                    <p class="mb-3 font-semibold text-gray-900 flex flex-wrap justify-center">
                                        <span>Drag and drop your</span>&nbsp;<span>files anywhere or</span>
                                    </p>
                                    <input id="hidden-input" type="file" multiple class="hidden" name="photos[]" />
                                    <button id="button" class="mt-2 rounded-sm px-3 py-1 bg-gray-200 hover:bg-gray-300 focus:shadow-outline focus:outline-none">
                                        Upload a file
                                    </button>
                                </header>

                                <h1 class="pt-8 pb-3 font-semibold sm:text-lg text-gray-900">
                                    To Upload
                                </h1>

                                <ul id="gallery" class="flex flex-1 flex-wrap -m-1">
                                    <li id="empty" class="h-full w-full text-center flex flex-col items-center justify-center items-center">
                                        <img class="mx-auto w-32" src="https://user-images.githubusercontent.com/507615/54591670-ac0a0180-4a65-11e9-846c-e55ffce0fe7b.png" alt="no data" />
                                        <span class="text-small text-gray-500">No files selected</span>
                                    </li>
                                </ul>
                            </section>

                            <!-- sticky footer -->
                            <footer class="flex justify-end px-8 pb-8 pt-4">
                                <button id="cancel" class="ml-3 rounded-sm px-3 py-1 hover:bg-gray-300 focus:shadow-outline focus:outline-none">
                                Cancel
                                </button>
                            </footer>
                        </article>
                    </main>

                    <!-- using two similar templates for simplicity in js code -->
                    <template id="file-template">
                        <li class="block p-1 w-1/2 sm:w-1/3 md:w-1/4 lg:w-1/6 xl:w-1/8 h-24">
                            <article tabindex="0" class="group w-full h-full rounded-md focus:outline-none focus:shadow-outline elative bg-gray-100 cursor-pointer relative shadow-sm">
                                <img alt="upload preview" class="img-preview hidden w-full h-full sticky object-cover rounded-md bg-fixed" />

                                <section class="flex flex-col rounded-md text-xs break-words w-full h-full z-20 absolute top-0 py-2 px-3">
                                    <h1 class="flex-1 group-hover:text-blue-800"></h1>
                                    <div class="flex">
                                    <span class="p-1 text-blue-800">
                                        <i>
                                        <svg class="fill-current w-4 h-4 ml-auto pt-1" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                            <path d="M15 2v5h5v15h-16v-20h11zm1-2h-14v24h20v-18l-6-6z" />
                                        </svg>
                                        </i>
                                    </span>
                                    <p class="p-1 size text-xs text-gray-700"></p>
                                    <button class="delete ml-auto focus:outline-none hover:bg-gray-300 p-1 rounded-md text-gray-800">
                                        <svg class="pointer-events-none fill-current w-4 h-4 ml-auto" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                        <path class="pointer-events-none" d="M3 6l3 18h12l3-18h-18zm19-4v2h-20v-2h5.711c.9 0 1.631-1.099 1.631-2h5.316c0 .901.73 2 1.631 2h5.711z" />
                                        </svg>
                                    </button>
                                    </div>
                                </section>
                            </article>
                        </li>
                    </template>

                    <template id="image-template">
                        <li class="block p-1 w-1/2 sm:w-1/3 md:w-1/4 lg:w-1/6 xl:w-1/8 h-24">
                            <article tabindex="0" class="group hasImage w-full h-full rounded-md focus:outline-none focus:shadow-outline bg-gray-100 cursor-pointer relative text-transparent hover:text-white shadow-sm">
                                <img alt="upload preview" class="img-preview w-full h-full sticky object-cover rounded-md bg-fixed" />

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
                                    <button class="delete ml-auto focus:outline-none hover:bg-gray-300 p-1 rounded-md">
                                        <svg class="pointer-events-none fill-current w-4 h-4 ml-auto" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                        <path class="pointer-events-none" d="M3 6l3 18h12l3-18h-18zm19-4v2h-20v-2h5.711c.9 0 1.631-1.099 1.631-2h5.316c0 .901.73 2 1.631 2h5.711z" />
                                        </svg>
                                    </button>
                                    </div>
                                </section>
                            </article>
                        </li>
                    </template>
                </div>
                <!-- sticky footer -->
                <footer class="flex justify-center px-8 pb-8 pt-4 mt-4">
                    <!-- <button id="submit" class="rounded-sm px-3 py-1 bg-blue-700 hover:bg-blue-500 text-white focus:shadow-outline focus:outline-none">
                        Add Product
                    </button> -->
                    <x-gen-button id="submit">
                        Add Product
                    </x-gen-button>
                </footer>
            </form>
        </div>
        
        <script>

            // click the hidden input of type file if the visible button is clicked
            // and capture the selected files
            const hidden = document.getElementById("hidden-input");
            const fileTempl = document.getElementById("file-template"),
            imageTempl = document.getElementById("image-template"),
            empty = document.getElementById("empty");

            // use to store pre selected files
            let FILES = {};

            // check if file is of type image and prepend the initialied
            // template to the target element
            function addFile(target, file) {
                const isImage = file.type.match("image.*"),
                    objectURL = URL.createObjectURL(file);

                const clone = isImage
                    ? imageTempl.content.cloneNode(true)
                    : fileTempl.content.cloneNode(true);

                clone.querySelector("h1").textContent = file.name;
                clone.querySelector("li").id = objectURL;
                clone.querySelector(".delete").dataset.target = objectURL;
                clone.querySelector(".size").textContent =
                    file.size > 1024
                    ? file.size > 1048576
                    ? Math.round(file.size / 1048576) + "mb"
                    : Math.round(file.size / 1024) + "kb"
                    : file.size + "b";

                isImage &&
                    Object.assign(clone.querySelector("img"), {
                    src: objectURL,
                    alt: file.name
                    });

                empty.classList.add("hidden");
                target.prepend(clone);

                FILES[objectURL] = file;
                console.log(FILES);
                console.log(hidden.files);
            }

            const gallery = document.getElementById("gallery"),
            overlay = document.getElementById("overlay");

            document.getElementById("button").onclick = (e) => {
                e.preventDefault();
                hidden.click();
            };

            hidden.onchange = (e) => {

                for (const file of e.target.files) {
                    addFile(gallery, file);
                }
                
            };

            // use to check if a file is being dragged
            const hasFiles = ({ dataTransfer: { types = [] } }) =>
            types.indexOf("Files") > -1;

            // use to drag dragenter and dragleave events.
            // this is to know if the outermost parent is dragged over
            // without issues due to drag events on its children
            let counter = 0;

            // reset counter and append file to gallery when file is dropped
            function dropHandler(ev) {
                ev.preventDefault();
                for (const file of ev.dataTransfer.files) {
                    addFile(gallery, file);

                    overlay.classList.remove("draggedover");
                    counter = 0;
                }
            }

            // only react to actual files being dragged
            function dragEnterHandler(e) {
                e.preventDefault();
                if (!hasFiles(e)) {
                    return;
                }
                ++counter && overlay.classList.add("draggedover");
            }

            function dragLeaveHandler(e) {
                1 > --counter && overlay.classList.remove("draggedover");
            }

            function dragOverHandler(e) {
                if (hasFiles(e)) {
                    e.preventDefault();
                }
            }

            // event delegation to caputre delete events
            // fron the waste buckets in the file preview cards
            gallery.onclick = ({ target }) => {
                if (target.classList.contains("delete")) {
                    const ou = target.dataset.target;
                    document.getElementById(ou).remove(ou);
                    gallery.children.length === 1 && empty.classList.remove("hidden");
                    delete FILES[ou];
                }
            };

            // print all selected files
            // document.getElementById("submit").onclick = () => {
            //     alert(`Submitted Files:\n${JSON.stringify(FILES)}`);
            //     console.log(FILES);
            // };

            // clear entire selection
            document.getElementById("cancel").onclick = (e) => {
                e.preventDefault();
                while (gallery.children.length > 0) {
                    gallery.lastChild.remove();
                }
                FILES = {};
                empty.classList.remove("hidden");
                gallery.append(empty);
            };
        </script>
        <style>
            .hasImage:hover section {
                background-color: rgba(5, 5, 5, 0.4);
            }
            .hasImage:hover button:hover {
                background: rgba(5, 5, 5, 0.45);
            }

            #overlay p,
            i {
                opacity: 0;
            }

            #overlay.draggedover {
                background-color: rgba(255, 255, 255, 0.7);
            }
            #overlay.draggedover p,
            #overlay.draggedover i {
                opacity: 1;
            }

            .group:hover .group-hover\:text-blue-800 {
                color: #2b6cb0;
            }
        </style>
    </div>
</x-app-layout>
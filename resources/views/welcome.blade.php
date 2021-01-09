<x-app-welcome>
    <div class="font-sans leading-normal tracking-normal antialiased">
        <!--- Welcome Section -->
        @guest          
            <x-introduce-service-section>
                <x-slot name="title">
                    Welcome
                </x-slot>
                <p class="leading-relaxed mt-2 mb-8 font-normal">
                    We are a family owned organization that has partnered with farmers 
                    who produce only the highest quality of agricultural products.
                    Explore our site and order the freshest produce that will be delivered
                    directly to your doorstep.
                </p>
                <x-slot name="action">
                    <a href="#">Read More...</a>
                </x-slot>
            </x-introduce-service-section>
        @else
            <x-introduce-service-section>
                <x-slot name="title">
                    Welcome to Soko Ndogo
                </x-slot>
                <p class="leading-relaxed mt-2 mb-8 font-normal">
                    We are a family owned organization that has partnered with farmers 
                    who produce only the highest quality of agricultural products.
                    Explore our site and order the freshest produce that will be delivered
                    directly to your doorstep.
                </p>
                <x-slot name="action">
                    <a href="#">Read More...</a>
                </x-slot>
            </x-introduce-service-section>
        @endguest

        <!--- First Image -->
        <section class="">
            <div class="container mx-auto flex px-10 py-8 items-center justify-center flex-col">
                <img class="lg:w-15/15 md:w-15/5 w-20/6 mb-10 object-cover object-center rounded" alt="hero"
                    src="https://images.unsplash.com/photo-1600367051858-9cc795d50a52?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80">
            </div>
        </section>
        <section class="">
            <div class="container px-5 pt-8 mx-auto flex flex-wrap">
                <div class="flex flex-col text-center w-full">
                    <h2 class="text-xs text-black tracking-widest font-medium title-font mb-1 uppercase">
                        We aim to empower agribusiness.
                    </h2>
                    <h1 class="sm:text-3xl text-2xl font-medium title-font text-black">
                        Taking small scale farming to higher levels.
                    </h1>
                </div>
            </div>
        </section>
        <section class="text-black">
            <div class="container mx-auto flex px-5 py-24 md:flex-row flex-col items-center">
                <div class="lg:max-w-lg lg:w-full md:w-1/2 w-5/6 md:mb-0 mb-10 ">
                    <img class="object-cover object-center rounded" alt="hero"
                        src="https://images.unsplash.com/photo-1557234195-bd9f290f0e4d?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1050&q=80">
                </div>
                <div
                    class="lg:flex-grow md:w-1/2 lg:pl-24 md:pl-16 flex flex-col md:items-start md:text-left items-center text-center">
                    <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-black ">High nutrient yield.
                        <br class="hidden lg:inline-block">Healthier produce.
                    </h1>
                    <p class="mb-8 leading-relaxed">
                        We assist our farmers to produce high quality yield ensuring the produce has the highest
                        possible nutrient content that our customers expect from us.
                    </p>
                    <div class="flex justify-center">
                        @guest
                        @else
                            @if (auth()->user()->can('product-create'))
                                <button class="border-2 border-black  text-black rounded-sm font-bold py-4 px-6 mr-2 flex items-center hover:bg-white hover:text-indigo-500 transition ease-in-out duration-700">Add Product</button>
                            @elseif (auth()->user()->can('order-create'))
                                <button class="border-2 border-black  text-black rounded-sm font-bold py-4 px-6 mr-2 flex items-center hover:bg-white hover:text-indigo-500 transition ease-in-out duration-700">Add Order</button>
                            @endif
                        @endguest
                    </div>
                </div>
            </div>
        </section>
        <section class="text-black">
            <div class="container mx-auto flex px-5 py-24 md:flex-row flex-col items-center">
                <div
                    class="lg:flex-grow md:w-1/2 lg:pr-24 md:pr-16 flex flex-col md:items-start md:text-left mb-16 md:mb-0 items-center text-center">
                    <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-black">Best prices.
                        <br class="hidden lg:inline-block text-black">Good for economic value.
                    </h1>
                    <p class="mb-8 leading-relaxed">
                        Work with us to find the best value for your needs. We aim to create an environment where everyone benefits from each other.
                    </p>
                    <div class="flex justify-center">
                        @guest
                        @else
                            @if (auth()->user()->can('product-create'))
                                <button class="border-2 border-black  text-black rounded-sm font-bold py-4 px-6 mr-2 flex items-center hover:bg-white hover:text-indigo-500 transition ease-in-out duration-700">Add Product</button>
                            @elseif (auth()->user()->can('order-create'))
                                <button class="border-2 border-black  text-black rounded-sm font-bold py-4 px-6 mr-2 flex items-center hover:bg-white hover:text-indigo-500 transition ease-in-out duration-700">Add Order</button>
                            @endif
                        @endguest
                    </div>
                </div>
                <div class="lg:max-w-lg lg:w-full md:w-1/2 w-5/6">
                    <img class="object-cover object-center rounded" alt="hero"
                        src="https://images.unsplash.com/photo-1592079927431-3f8ced0dacc6?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1050&q=80">
                </div>
            </div>
        </section>
        <section class="text-black">
            <div class="container mx-auto flex px-5 py-24 md:flex-row flex-col items-center">
                <div class="lg:max-w-lg lg:w-full md:w-1/2 w-5/6 md:mb-0 mb-10">
                    <img class="object-cover object-center rounded" alt="hero"
                        src="https://images.unsplash.com/photo-1525286102393-8bf945cd0649?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1353&q=80">
                </div>
                <div
                    class="lg:flex-grow md:w-1/2 lg:pl-24 md:pl-16 flex flex-col md:items-start md:text-left items-center text-center">
                    <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-black">Varied inventory.</h1>
                    <p class="mb-8 leading-relaxed">
                        We deal with many agricultural products as we aim to provide our customers an opportunity to select a plethora of items 
                        from the comfort of their own couch and have them delivered conveniently to them.
                    </p>
                    <div class="flex justify-center">
                        @guest
                        @else
                            @if (auth()->user()->can('product-create'))
                                <button class="border-2 border-black  text-black rounded-sm font-bold py-4 px-6 mr-2 flex items-center hover:bg-white hover:text-indigo-500 transition ease-in-out duration-700">Add Product</button>
                            @elseif (auth()->user()->can('order-create'))
                                <button class="border-2 border-black  text-black rounded-sm font-bold py-4 px-6 mr-2 flex items-center hover:bg-white hover:text-indigo-500 transition ease-in-out duration-700">Add Order</button>
                            @endif
                        @endguest
                    </div>
                </div>
            </div>
        </section>
        <section class="text-black">
            <div class="container mx-auto flex px-5 py-24 md:flex-row flex-col items-center">
                <div
                    class="lg:flex-grow md:w-1/2 lg:pr-24 md:pr-16 flex flex-col md:items-start md:text-left mb-16 md:mb-0 items-center text-center">
                    <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-black">High quality livestock produce.
                        <br class="hidden lg:inline-block">Healthy & nutritious.
                    </h1>
                    <p class="mb-8 leading-relaxed">
                        We source animal produce from farms that only use high quality feeds for their animals to ensure prime and delicious yield.
                    </p>
                    <div class="flex justify-center">
                        @guest
                        @else
                            @if (auth()->user()->can('product-create'))
                                <button class="border-2 border-black  text-black rounded-sm font-bold py-4 px-6 mr-2 flex items-center hover:bg-white hover:text-indigo-500 transition ease-in-out duration-700">Add Product</button>
                            @elseif (auth()->user()->can('order-create'))
                                <button class="border-2 border-black  text-black rounded-sm font-bold py-4 px-6 mr-2 flex items-center hover:bg-white hover:text-indigo-500 transition ease-in-out duration-700">Add Order</button>
                            @endif
                        @endguest
                    </div>
                </div>
                <div class="lg:max-w-lg lg:w-full md:w-1/2 w-5/6">
                    <img class="object-cover object-center rounded" alt="hero"
                        src="https://images.unsplash.com/photo-1500595046743-cd271d694d30?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1353&q=80">
                </div>
            </div>
        </section>
        <section class="text-black">
            <div class="container px-5 py-24 mx-auto">
                <div class="flex flex-col text-center w-full mb-20">
                    <h1 class="text-2xl font-medium title-font mb-4 text-black">Meet the team</h1>
                    <p class="lg:w-2/3 mx-auto leading-relaxed">
                        Here is the team that do their best to bring you the best produce the land can offer.
                        They go out into the fields to find the best farms to partner with to ensure the customers 
                        get the highest quality foods that are produced by our farmers. From their efforts, we are 
                        able to give the best prices that cannot be rivaled with in the marketplace.
                    </p>
                </div>
                <div class="text-gray-600 flex flex-wrap -m-4">
                    <div class="p-4 lg:w-1/4 md:w-1/2">
                        <div class="h-full flex flex-col items-center text-center bg-gray-800 rounded-lg">
                            <img alt="team"
                                class="flex-shrink-0 rounded-t-lg w-full h-56 object-cover object-center mb-4"
                                src="https://vignette.wikia.nocookie.net/topcat/images/1/15/Vlcsnap-2015-09-05-11h43m38s970.png/revision/latest/scale-to-width-down/185?cb=20150905170357">
                            <div class="w-full ">
                                <h2 class="title-font font-medium text-lg text-white">Top Cat</h2>
                                <h3 class=" mb-3">The boss</h3>
                            </div>
                        </div>
                    </div>
                    <div class="p-4 lg:w-1/4 md:w-1/2">
                        <div class="h-full flex flex-col items-center text-center bg-gray-800 rounded-lg">
                            <img alt="team"
                                class="flex-shrink-0 rounded-t-lg w-full h-56 object-cover object-center mb-4"
                                src="https://vignette.wikia.nocookie.net/topcat/images/6/6b/2311015_f260-1-.jpg/revision/latest/scale-to-width-down/185?cb=20110425143215">
                            <div class="w-full ">
                                <h2 class="title-font font-medium text-lg text-white">Benny the Ball</h2>
                                <h3 class="mb-3">Mischief in chief</h3>
                            </div>
                        </div>
                    </div>
                    <div class="p-4 lg:w-1/4 md:w-1/2">
                        <div class="h-full flex flex-col items-center text-center bg-gray-800 rounded-lg">
                            <img alt="team"
                                class="flex-shrink-0 rounded-t-lg w-full h-56 object-cover object-center mb-4"
                                src="https://vignette.wikia.nocookie.net/topcat/images/0/03/CHOO-CHOO_large-1-.jpg/revision/latest/top-crop/width/300/height/300?cb=20110425143410">
                            <div class="w-full ">
                                <h2 class="title-font font-medium text-lg text-white">Choo Choo</h2>
                                <h3 class="mb-3">Dealer</h3>
                            </div>
                        </div>
                    </div>
                    <div class="p-4 lg:w-1/4 md:w-1/2">
                        <div class="h-full flex flex-col items-center text-center bg-gray-800 rounded-lg">
                            <img alt="team"
                                class="flex-shrink-0 rounded-t-lg w-full h-56 object-cover object-center mb-4"
                                src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcTgCkQvfTy-1SqAIjXBQ8eiDmqgzz8ISCMbDQ&usqp=CAU">
                            <div class="w-full ">
                                <h2 class="title-font font-medium text-lg text-white">Spook</h2>
                                <h3 class="mb-3">Sly cat</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</x-app-welcome>        

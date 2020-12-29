<x-app-layout>
    <div class="bg-white font-sans leading-normal tracking-normal antialiased">
        <!--- Welcome Section -->
        @guest          
            <x-introduce-service-section>
                <x-slot name="title">
                    Welcome,
                </x-slot>
                <p class="leading-relaxed mb-2 font-normal">
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. 
                    Nesciunt quae facilis tempora corporis culpa, rerum nemo sunt, 
                    beatae consectetur temporibus, eum error.
                </p>
                <x-slot name="action">
                    <a href="#">Read More...</a>
                </x-slot>
            </x-introduce-service-section>
        @else
            <x-introduce-service-section>
                <x-slot name="title">
                    Welcome to Soko Ndogo,
                </x-slot>
                <p class="leading-relaxed mb-8 font-normal">
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. 
                    Nesciunt quae facilis tempora corporis culpa, rerum nemo sunt, 
                    beatae consectetur temporibus, eum error. 
                    Aperiam eveniet provident enim vero corrupti. 
                    Distinctio harum voluptatum repellat officia saepe hic corrupti, 
                    at, incidunt laborum, tempore nisi necessitatibus aspernatur 
                    exercitationem fugit ex voluptas. Fugit, dolores reprehenderit.
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
            <div class="container px-5 py-24 mx-auto flex flex-wrap">
                <div class="flex flex-col text-center w-full mb-20">
                    <h2 class="text-xs text-black tracking-widest font-medium title-font mb-1 uppercase">
                        Lorem ipsum dolor sit amet.
                    </h2>
                    <h1 class="sm:text-3xl text-2xl font-medium title-font text-black">
                        Lorem ipsum dolor sit amet consectetur.
                    </h1>
                </div>
                <div class="flex flex-wrap -m-4">
                    <div class="p-4 md:w-1/3">
                        <div class="flex rounded-lg h-full bg-gray-200 p-8 flex-col">
                            <div class="flex items-center mb-3">
                                <h2 class="text-gray-700 text-lg title-font font-medium">Lorem, ipsum.</h2>
                            </div>
                            <div class="flex-grow">
                                <p class="leading-relaxed text-gray-700 font-medium">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                                    Reprehenderit, delectus accusamus perspiciatis quod quas libero?..</p>
                                <a href="#" class="mt-3 text-gray-700 inline-flex items-center font-medium">Learn More
                                    »
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="p-4 md:w-1/3">
                            <div class="flex rounded-lg h-full bg-gray-200 p-8 flex-col">
                            <div class="flex items-center mb-3">
                                <h2 class="text-gray-700 text-lg title-font font-medium">Lorem, ipsum.</h2>
                            </div>
                            <div class="flex-grow">
                                <p class="leading-relaxed text-gray-700 font-medium">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                                    Ducimus provident atque facere, aspernatur voluptas voluptates!..
                                </p>
                                <a href="#" class="mt-3 text-gray-700 inline-flex items-center font-medium">Learn More
                                    »
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="p-4 md:w-1/3">
                            <div class="flex rounded-lg h-full bg-gray-200 p-8 flex-col">
                            <div class="flex items-center mb-3">
                                <h2 class="text-gray-700 text-lg title-font font-medium">Lorem, ipsum.</h2>
                            </div>
                            <div class="flex-grow">
                                <p class="leading-relaxed text-gray-700 font-medium">
                                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. 
                                    Dolore alias asperiores corporis modi blanditiis doloribus...
                                </p>
                                <a href="#" class="mt-3 text-gray-700 inline-flex items-center font-medium">Learn More
                                    »
                                </a>
                            </div>
                        </div>
                    </div>
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
                    <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-black ">Lorem ipsum dolor sit.
                        <br class="hidden lg:inline-block">Lorem, ipsum.
                    </h1>
                    <p class="mb-8 leading-relaxed">
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. 
                        Accusamus soluta sit doloribus porro atque numquam voluptatem quam itaque? 
                        Quibusdam iusto amet, aperiam ea rerum quisquam.
                    </p>
                    <div class="flex justify-center">
                        <button
                            class="border-2 border-black  text-black rounded-sm font-bold py-4 px-6 mr-2 flex items-center hover:bg-white hover:text-indigo-500 transition ease-in-out duration-700">Lorem</button>
                    </div>
                </div>
            </div>
        </section>
        <section class="text-black">
            <div class="container mx-auto flex px-5 py-24 md:flex-row flex-col items-center">
                <div
                    class="lg:flex-grow md:w-1/2 lg:pr-24 md:pr-16 flex flex-col md:items-start md:text-left mb-16 md:mb-0 items-center text-center">
                    <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-black">Lorem ipsum dolor sit.
                        <br class="hidden lg:inline-block text-black">Lorem, ipsum.
                    </h1>
                    <p class="mb-8 leading-relaxed">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. 
                        Sint modi fugit explicabo error ab aliquid corporis voluptatem, 
                        iure cumque repudiandae saepe dolore illo quo aut!
                    </p>
                    <div class="flex justify-center">
                        <button
                            class="border-2 border-black  text-black rounded-sm font-bold py-4 px-6 mr-2 flex items-center hover:bg-white hover:text-indigo-500 transition ease-in-out duration-700">Lorem</button>
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
                    <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-black">Lorem ipsum dolor sit amet.
                        <br class="hidden lg:inline-block">Lorem, ipsum.
                    </h1>
                    <p class="mb-8 leading-relaxed">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                        Cupiditate quidem adipisci quaerat ad deleniti distinctio, perspiciatis voluptatem tempore ea fugit itaque, 
                        quibusdam natus quam doloribus dolor quae possimus minima provident!
                    </p>
                    <div class="flex justify-center">
                        <button
                            class="border-2 border-black  text-black rounded-sm font-bold py-4 px-6 mr-2 flex items-center hover:bg-white hover:text-indigo-500 transition ease-in-out duration-700">Lorem</button>
                    </div>
                </div>
            </div>
        </section>
        <section class="text-black">
            <div class="container mx-auto flex px-5 py-24 md:flex-row flex-col items-center">
                <div
                    class="lg:flex-grow md:w-1/2 lg:pr-24 md:pr-16 flex flex-col md:items-start md:text-left mb-16 md:mb-0 items-center text-center">
                    <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-black">Lorem ipsum dolor sit amet.
                        <br class="hidden lg:inline-block">Lorem, ipsum.
                    </h1>
                    <p class="mb-8 leading-relaxed">
                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ullam, 
                        debitis eos fugiat explicabo tempore ut quas odit repellendus ea saepe quos hic, 
                        quo ad deleniti, quibusdam officiis vel cum accusantium?
                    </p>
                    <div class="flex justify-center">
                        <button
                            class="border-2 border-black  text-black rounded-sm font-bold py-4 px-6 mr-2 flex items-center hover:bg-white hover:text-indigo-500 transition ease-in-out duration-700">Lorem</button>
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
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vitae odit suscipit placeat ex, 
                        at saepe pariatur illum soluta blanditiis ab velit commodi tenetur omnis facere deleniti! 
                        Quis exercitationem ipsa labore accusamus enim nisi deserunt tempora et magnam inventore? 
                        Officiis corporis, quidem rem minima mollitia ratione quaerat quis, laborum magnam ad aperiam 
                        minus ipsa nesciunt recusandae, voluptatibus facilis? Voluptate exercitationem provident dignissimos, 
                        assumenda reiciendis repellendus voluptatibus, corporis id nostrum accusamus quam, 
                        doloribus officiis sapiente laborum fuga illo consequuntur. Nulla, cumque animi. 
                        Sint vitae qui veniam alias reiciendis totam nesciunt aspernatur debitis aperiam quisquam 
                        repudiandae velit excepturi, corrupti labore est voluptatem quas ab tempore. 
                        Iste rerum voluptates in cum, blanditiis quam neque nesciunt soluta, eius distinctio vel 
                        aut est reiciendis sunt dolor officia sapiente ipsum. Delectus omnis est placeat corporis 
                        inventore! Iste reiciendis nisi recusandae explicabo pariatur assumenda architecto neque 
                        velit corrupti sint molestias, quisquam animi suscipit quaerat eaque itaque blanditiis 
                        aspernatur.
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
</x-app-layout>        

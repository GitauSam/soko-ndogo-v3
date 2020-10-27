<x-app-layout>
    <div class="container bg-white border-solid border-2 border-gray-300 rounded-sm shadow mx-auto flex flex-col mt-4 py-4">


        <div class="flex justify-between justify-items-center items-center px-7">
            <h2 class="text-4xl font-semibold">Roles</h2>
            <a 
                class="flex inline-flex items-center text-gray-900 rounded font-semibold px-7 py-4
                    bg-green-500 hover:bg-green-600 transition ease-in-out duration-150"
                href="{{ route('roles.create') }}">             
                <img class="w-6 fill-current" src="https://img.icons8.com/metro/26/000000/plus-math.png"/>
                <span class="ml-2 text-lg">Add Role</span>
            </a>
        </div>
        
        @if($message = Session::get('success'))
            <div class="flex items-center bg-green-500 text-white text-sm font-bold px-4 py-3 m-2 rounded-lg" role="alert">
                <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z"/></svg>
                <p>{{ $message }}.</p>
            </div>
        @elseif($message = Session::get('errors'))
            <div role="alert">
                <div class="bg-red-500 text-white font-bold rounded-t px-4 py-2 m-2">
                    Danger
                </div>
                <div class="border border-t-0 border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700">
                    <p>{{ $message }}</p>
                </div>
            </div>
        @elseif($message = Session::get('unsuccessful'))
            <div role="alert">
                <div class="bg-red-500 text-white font-bold rounded-t px-4 py-2 m-2">
                    Danger
                </div>
                <div class="border border-t-0 border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700">
                    <p>{{ $message }}</p>
                </div>
            </div>
        @endif        
        
        <div class="container mx-auto py-4">
            <hr/>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-0 py-4 px-2">
                @foreach($roles as $key => $role)
                    <div class="flex items-center text-gray-900 rounded font-semibold py-2
                                justify-start sm:justify-start md:justify-start lg:justify-center">
                        <div class="flex inline-flex">
                            <span>{{ $role->name}}</span>
                        </div>
                        <a 
                            class="text-gray-900 text-sm text-center rounded font-semibold py-1 ml-2 px-2
                                bg-gray-500 hover:bg-gray-600 transition ease-in-out duration-150"
                            href="{{ route('roles.show', $role->id) }}"
                        >
                            <span class="">Show</span>
                        </a>
                        <a 
                            class="text-gray-900 text-sm text-center rounded font-semibold py-1 ml-2 px-2
                                bg-green-500 hover:bg-green-600 transition ease-in-out duration-150"
                            href="{{ route('roles.edit', $role->id) }}"
                        >
                            <span class="">Edit</span>
                        </a>
                        <a 
                            class="text-gray-900 text-sm text-center rounded font-semibold py-1 ml-2 px-2
                                bg-red-500 hover:bg-red-600 transition ease-in-out duration-150"
                            href="{{ route('roles.destroy', $role->id) }}"
                        >
                            <span class="">Delete</span>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
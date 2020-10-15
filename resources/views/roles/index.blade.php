<x-app-layout>
    <div class="container bg-white border-solid border-2 border-gray-300 rounded-sm shadow mx-auto flex flex-col mt-4 py-4">

        <div class="flex justify-between justify-items-center items-center px-7">
            <h2 class="text-4xl font-semibold">Roles</h2>
            <a 
                class="flex inline-flex items-center text-gray-900 rounded font-semibold px-7 py-4
                    bg-green-500 hover:bg-green-600 transition ease-in-out duration-150"
                href="{{ route('roles.create') }}"
            >             
                <img class="w-6 fill-current" src="https://img.icons8.com/metro/26/000000/plus-math.png"/>
                <span class="ml-2 text-lg">Add Role</span>
            </a>
        </div>
        
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
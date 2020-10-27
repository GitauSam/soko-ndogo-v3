<x-app-layout>
    <div class="container bg-white border-solid border-2 border-gray-300 rounded-sm shadow mx-auto flex flex-col my-24 py-4">

        <div class="px-7 flex flex-inline justify-center">
            <h2 class="text-4xl font-semibold">Show Role</h2>
        </div>
                    
        <div class="container mx-auto flex flex-col py-4">
            <hr class="mb-4"/>
            <div class="flex flex-row w-2/3 my-8 mx-auto justify-end px-4">
                <a href="{{ route('roles.index') }}" class="ml-4 rounded-sm px-3 py-1 bg-blue-500 hover:bg-blue-800 focus:shadow-outline focus:outline-none">Back</a>
            </div>
            <div class="py-2 flex flex-col">
                <table class="table-auto w-2/3 mx-auto border-none">
                    <tbody>
                        <tr>
                            <td class="px-4 py-2 w-1/5 font-semibold">Name:</td>
                            <td class="border-l-4 px-4 py-2">
                                {{ $role->name }}
                            </td>
                        </tr>
                        <tr>
                            <td class="px-4 py-2 w-1/5 font-semibold border-t-4">Permissions:</td>
                            <td class="border-l-4 px-4 py-2 border-t-4">
                                @if(!empty($rolePermissions))
                                    @foreach($rolePermissions as $v)
                                        <label class="inline-block rounded text-white text-center bg-indigo-500 px-2 py-1 my-1 text-xs font-bold mr-3">
                                            {{ $v->name }}
                                        </label>
                                    @endforeach
                                @endif
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="flex flex-row w-2/3 my-8 mx-auto justify-end px-4">
                <a href="{{ route('roles.edit', $role->id) }}" class="ml-4 rounded-sm px-3 py-1 bg-green-500 hover:bg-green-800 focus:shadow-outline focus:outline-none">Update</a>
                <a href="{{ route('roles.destroy', $role->id) }}" class="ml-4 rounded-sm px-3 py-1 bg-red-500 hover:bg-red-800 focus:shadow-outline focus:outline-none">Delete</a>
            </div>
        </div>
    </div>
</x-app-layout>
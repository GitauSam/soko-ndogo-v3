<x-app-layout>
    <div class="container bg-white border-solid border-2 border-gray-300 rounded-sm shadow mx-auto flex flex-col my-24 py-4">

        <div class="px-7 flex flex-inline justify-center">
            <h2 class="text-4xl font-semibold">Create New Role</h2>
        </div>
                    
        <div class="container mx-auto flex flex-col py-4">
            <hr class="mb-4"/>
            <div class="flex flex-row w-2/3 my-8 mx-auto justify-end px-4">
                <a href="{{ route('roles.index') }}" class="ml-4 rounded-sm px-3 py-1 bg-blue-500 hover:bg-blue-800 focus:shadow-outline focus:outline-none">Back</a>
            </div>
            @if (count($errors) > 0)
                <div class="w-2/3 mx-auto bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative m-2" role="alert">
                    <strong class="font-bold">Whoops!</strong>
                    <span class="block sm:inline">There were some problems with your input.</span>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                        <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
                    </span>
                </div>
            @endif
            <div class="py-2 flex flex-col">
                <form action="{{ route('roles.store') }}" method="post">
                    @csrf
                    <table class="table-auto mx-auto bg-gray-100 w-2/3 rounded">
                        <tbody>
                            <tr>
                                <td class="pl-24 py-2">
                                    <strong class="w-24 px-4">Name:</strong>
                                </td>
                                <td class="py-2">
                                    <input type="text" name="name" class="p-2 text-lg bg-transparent border-b border-gray-400 hover:bg-gray-200 focus:bg-gray-300 focus:border-green-500" placeholder="Name" required>
                                </td>
                            </tr>
                            <tr class="mb-32">
                                <td class="pl-24 align-top py-2 w-8">
                                    <strong class="w-24 px-4">Permission:</strong>
                                </td>
                                <td class="py-2">
                                    <div class="flex flex-col">
                                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-y-2 gap-x-2 p-2">
                                            @foreach($permission as $value)
                                                <label class="inline-flex items-center mt-3 cursor-pointer">
                                                    <input type="checkbox" name="permission[]" class="form-checkbox h-5 w-5 text-green-600" value="{{ $value->id }}"><span class="ml-2 text-gray-700">{{ $value->name }}</span>
                                                </label>
                                            @endforeach
                                        </div>
                                    <div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                        <button type="submit" class="mt-4 bg-transparent hover:bg-green-500 text-green-700 font-semibold hover:text-white py-2 px-4 border border-green-500 hover:border-transparent rounded">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
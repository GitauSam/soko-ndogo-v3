<x-app-layout>
    <div class="container bg-white border-solid border-2 border-gray-300 rounded-sm shadow mx-auto flex flex-col my-24 py-4">

        <div class="px-7 flex flex-inline justify-center">
            <h2 class="text-4xl font-semibold">Show User</h2>
        </div>
                    
        <div class="container mx-auto flex flex-col py-4">
            <hr class="mb-4"/>
            <div class="flex flex-row w-2/3 my-8 mx-auto justify-end px-4">
                <a href="{{ route('users.index') }}" class="ml-4 rounded-sm px-3 py-1 bg-blue-500 hover:bg-blue-800 focus:shadow-outline focus:outline-none">Back</a>
            </div>

            @if ($message = Session::get('unsuccessful'))
                <div class="bg-orange-100 border-l-4 border-orange-500 text-orange-700 p-4 m-2" role="alert">
                    <p class="font-bold">Whoops!</p>
                    <p>{{ $message }}.</p>
                </div>
            @endif
            <div class="py-2 flex flex-col">
                <table class="table-auto mx-auto bg-gray-100 w-2/3 rounded">
                    <tbody>
                        <tr class="border-t-2 border-gray-200">
                            <td class="px-4 py-2">
                                <strong class="w-24 px-4">User:</strong>
                            </td>
                            <td class="px-4 py-2 border-l-2 border-gray-200">
                                <input type="hidden" value="{{ $user->id}} " name="user_id">
                                <div class="p-2 text-lg">
                                    {{ $user->name }}
                                </div>
                            </td>
                        </tr>
                        <tr class="mb-32 border-t-2 border-gray-200">
                            <td class="px-4 align-top py-2">
                                <strong class="w-24 px-4">Roles:</strong>
                            </td>
                            <td class="px-4 py-2 border-l-2 border-gray-200">
                            <div class="flex flex-row">
                                    <div class="flex flex-col">
                                        <div class="p-2 font-semibold text-center mr-4 pr-4">
                                            Associated Roles
                                        </div>
                                        <div class="grid grid-cols-1 lg:grid-cols-2 mt-3 gap-y-2 gap-x-4 mr-4 border-r-2 border-gray-200 pr-4">
                                            @foreach($userRoles as $key => $value)
                                                <div class="flex justify-between bg-green-200 rounded">
                                                    <span class="px-4 mt-1 w-9/12">
                                                        {{ $value }}
                                                    </span>
                                                </div>
                                            @endforeach
                                        </div>
                                        @if(count($userRoles) == 0)
                                            <div class="bg-green-100 border-t border-b border-green-500 text-green-700 px-4 py-3 m-4" role="alert">
                                                <p class="font-bold">Informational message</p>
                                                <p class="text-sm">User does not have any roles.</p>
                                            </div>
                                        @endif
                                    </div>
                                <div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>

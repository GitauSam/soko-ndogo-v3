<div class="flex flex-row">
    <div class="flex flex-col border-r-2 border-gray-200">
        <div class="p-2 font-semibold text-center mr-4 pr-4">
            Associated Roles
        </div>
        @if($message = Session::get('role-revoked'))
            <div class="flex flex-inline p-2 rounded-lg bg-green-100 text-center mr-4">
                <span>
                    <img src="https://img.icons8.com/android/24/000000/info.png"/>
                </span>
                <span class="ml-4">
                    {{ $message }}
                </span>
            </div>
        @endif
        <div class="grid grid-cols-1 lg:grid-cols-2 mt-3 gap-y-2 gap-x-4 mr-4 border-r-2 border-gray-200 pr-4">
            @foreach($userRoles as $key => $value)
                <div class="flex justify-between bg-green-200 rounded">
                    <span class="px-4 mt-1 w-9/12">
                        {{ $value }}
                    </span>
                    <button class="w-3/12 cursor-pointer hover:bg-red-500 hover:p-4" wire:click.prevent="removeRole('{{ $value }}')">
                        <svg class="pointer-events-none fill-current w-4 h-4 m-auto my-2" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                            <path class="pointer-events-none" d="M3 6l3 18h12l3-18h-18zm19-4v2h-20v-2h5.711c.9 0 1.631-1.099 1.631-2h5.316c0 .901.73 2 1.631 2h5.711z" />
                        </svg>
                    </button>
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
    <div class="flex flex-col  border-l-2 border-gray-200">
        <div class="pb-2 pr-2 pt-2 font-semibold text-center pr-4">
            Add Roles
        </div>
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-y-2 gap-x-4 mt-3">
            @foreach($roles as $value)
                @if(!in_array($value->id, $userRoles->toArray()))
                    <label class="inline-flex mt-1 cursor-pointer mx-2">
                        <input type="checkbox" value="{{ $value->name}} " name="roles[]" class="form-checkbox h-5 w-5 text-green-600 mt-1">
                        <span class="ml-2 text-gray-700">{{ $value->name }}</span>
                    </label>
                @endif
            @endforeach
        </div>
        @if(count($userRoles) == count($roles))
            <div class="bg-green-100 border-t border-b border-green-500 text-green-700 px-4 py-3 mt-16 mx-auto" role="alert">
                <p class="font-bold">Informational message</p>
                <p class="text-sm">There are no additional roles to assign.</p>
            </div>
        @endif
    </div>
<div>
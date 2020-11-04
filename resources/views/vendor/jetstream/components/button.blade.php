<button 
    {{ $attributes->merge(['type' => 'submit', 
        'class' => 'inline-flex items-center px-4 py-2 bg-green-800 border border-transparent rounded-md font-semibold 
                        hover:font-bold
                        text-xs text-white hover:text-green-800 uppercase tracking-widest hover:bg-transparent active:bg-gray-900 
                        focus:outline-none hover:border-green-800 focus:shadow-outline-gray disabled:opacity-25 
                        transition ease-in-out duration-150']) 
    }}>
    {{ $slot }}
</button>

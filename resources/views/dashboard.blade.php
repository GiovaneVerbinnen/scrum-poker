<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="xs:max-w-xs max-w-xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <a href="{{ route('home') }}"
                    class="text-center text-2xl flex  bg-blue-500  space-x-2 px-3 py-2 rounded-lg text-white hover:bg-blue-600 focus:outline-none  xs:w-full justify-center">
                    Room Page</a>
                {{-- <x-jet-welcome /> --}}
            </div>
        </div>
    </div>
</x-app-layout>
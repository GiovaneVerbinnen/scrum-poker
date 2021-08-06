@props(['rating', 'name' => null,'participant'=> null, 'selected' => false, 'feature' => false, ])

<div x-data {{ $attributes }}
    class="mx-3 group select-none cursor-pointer relative mb-3 col-span-1 transition {{ $selected ? 'opacity-100 transform scale-110' : 'opacity-50 hover:opacity-75' }}"
    style="max-width: 96px">
    <div
        class=" w-24 h-36 mb-2 bg-white rounded-2xl flex items-center justify-center text-gray-900 text-opacity-75 text-5xl cursor-pointer">
        <span>{{ $rating }}</span>
    </div>

    @if($participant && isManager())
    <button @click="$dispatch('remove-participant', {{$participant->id}} )"
        class="flex opacity-0 items-center justify-center absolute -top-2 -right-2 p-1 bg-red-400 hover:bg-red-600 group-hover:opacity-100 rounded-full transition duration-200">
        <x-icon.x class="w-5 h-5 "></x-icon.x>
    </button>
    @endif

    <div class="text-center">{{ $name }}</div>
</div>

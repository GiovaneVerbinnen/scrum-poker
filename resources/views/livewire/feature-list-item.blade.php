<div
    @if (isManager())
        wire:click="$emit('featureSelected', {{ $feature->id }})"
    @endif
    class="rounded-lg group relative p-2 my-2 cursor-pointer transition-all duration-200 border-2
        @if ($this->isSelectedFeature())
            opacity-100 border-primary-400 hover:border-primary-500 bg-primary-500  bg-opacity-25
        @else
             opacity-75 border-transparent hover:border-gray-600 hover:bg-white hover:bg-opacity-5
        @endif
    ">
    <span class="
    @if($feature->isCompleted()) text-green-500 @endif
    ">{{ $feature->name }}</span>
    <div class="absolute  bottom-0 right-0 p-1.5">
        <x-button wire:click="remove" class="bg-red-400 p-1.5 rounded-full opacity-0 group-hover:opacity-100 transition duration-200">
            <x-icon.trash class="w-4 h-4"></x-icon>
        </x-button>
        <!-- <x-button type="submit" class="bg-primary-400 p-1.5 rounded-full opacity-0 group-hover:opacity-100 transition duration-200">
            <x-icon.eye class="w-4 h-4"></x-icon>
        </x-button> -->

        <x-button wire:click="toggleComplete" class="bg-green-400 p-1.5 rounded-full  group-hover:opacity-100 transition duration-200
        {{$feature->isCompleted() ? 'opacity-50 ' : 'opacity-0 '}}">
            <x-icon.check class="w-4 h-4"></x-icon.check>
        </x-button>
    </div>
</div>

<div wire:poll="verifySelectedFeature" class="max-w-6xl  px-8  mx-auto divide-y-2 divide-gray-700">
    {{-- Header --}}
    <div class="py-8 flex items-center justify-between ">
        <div>
            {{-- @dump(isManager($room)) --}}
            <h1 class="text-4xl font-bold text-pink-500">Scrum Poker</h1>
            @if(isManager())
            <h3 class="text-md opacity-80">You are the manager</h3>
            @else
            <h3 class="text-md opacity-80"> Welcome, {{participant()->name}} !</h3>
            @endif
        </div>
        <p class="bg-gradient-to-b from-pink-500 to-pink-600 space-x-2 px-3 py-1 rounded-lg text-lg">
            Room ID: {{$this->room->id}}
        </p>
        <x-button
            class="bg-blue-400 flex items-center space-x-2 px-3 py-1 rounded-lg text-white hover:bg-blue-500 focus:outline-none ">
            <span class="text-xl">Share</span>
            <x-icon.share class="w-5 h-5">
                </x-icon>
        </x-button>
    </div>
    {{-- Corpo --}}
    <div class="grid grid-cols-12 gap-10 pt-8">
        <div class="col-span-4 space-y-3">
            <div>
                @if(isManager())
                <form class="relative" wire:submit.prevent='addNewFeature'>
                    <input type="text" wire:model.defer='newFeature'
                        class="rounded-full w-full bg-white bg-opacity-10 pl-3 pr-10 py-1.5 border-none focus:outline-none focus:ring-primary-400 focus:ring-2"
                        placeholder="Add a new feature ...">
                    <x-button type="submit"
                        class="bg-primary-400 p-1 rounded-full absolute top-1 right-1 focus:outline-none">
                        <x-icon.plus class="w-5 h-5"></x-icon.plus>
                    </x-button>
                </form>
                @endif
                @if($this->completedFeatureCount > 0)
                <span class="opacity-50 text-xs cursor-pointer hover:underline" wire:click="$toggle('showCompleted')">
                    {{$showCompleted ? 'Hide' : 'Show'}} {{ $this->completedFeatureCount }} compleated features
                </span>
                @endif
                <x-jet-input-error for="newFeature"></x-jet-input-error>

                @foreach ($this->getFeatureListProperty() as $key => $feature)
                <livewire:feature-list-item :feature="$feature" :selectedFeatureId="$selectedFeatureId"
                    :key='"room-{$room->id}-{$feature->id}-" . $selectedFeatureId ?? null . $room->participants()->count()' />
                @endforeach
            </div>

        </div>
        <div class="col-span-8">
            @if($selectedFeatureId)
            <livewire:voting-feature :key="$selectedFeatureId . $room->participants()->count()"
                :selectedFeatureId="$selectedFeatureId" />
            @endif
        </div>
    </div>
</div>

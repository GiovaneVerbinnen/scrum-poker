<div wire:poll="verifySelectedFeature" class="max-w-6xl  px-8  mx-auto">
    {{-- Header --}}
    <div class="pt-16 flex items-center justify-between">
        <div>
            {{-- @dump(isManager($room)) --}}
            <h1 class="text-4xl">Scrum Poker</h1>
            @if(isManager())
            <h3 class="text-xl opacity-50">You are the manager</h3>
            @else
            <h3 class="text-xl opacity-50"> Welcome, {{session('participant')->name}} !</h3>
            @endif
        </div>
        <x-button class="bg-primary-400 flex items-center space-x-2 px-3 py-1 rounded-lg text-white">
            <span class="text-xl">Share</span>
            <x-icon.share class="w-5 h-5">
                </x-icon>
        </x-button>
    </div>
    {{-- Corpo --}}
    <div class="grid grid-cols-12 gap-10 mt-16">
        <div class="col-span-4 space-y-3">
            <div>
                @if(isManager())
                <form class="relative" wire:submit.prevent='addNewFeature'>
                    <input type="text" wire:model.defer='newFeature' class="rounded-full w-full bg-white bg-opacity-10 pl-3 pr-10 py-1.5 border-none focus:outline-none focus:ring-primary-400 focus:ring-2" placeholder="Add a new feature ...">
                    <x-button type="submit" class="bg-primary-400 p-1 rounded-full absolute top-1 right-1 focus:outline-none">
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
                <livewire:feature-list-item :feature="$feature" :selectedFeatureId="$selectedFeatureId" :key='"room-{$room->id}-{$feature->id}-" . $selectedFeatureId ?? null' />
                @endforeach
            </div>

        </div>
        <div class="col-span-8">
            @if($selectedFeatureId)
            <livewire:voting-feature :key="$selectedFeatureId . $room->participants()->count()" :selectedFeatureId="$selectedFeatureId" />
            @endif
        </div>
    </div>
</div>

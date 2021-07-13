<div>
    <div class="flex items-center justify-between">
        <h2 class="text-2xl mb-2 opacity-50">
            Voting Feature
        </h2>

        <div>
            <x-button.red class="p-2">
                <x-icon.trash class="w-5 h-5"></x-icon.trash>
            </x-button.red>
            <x-button.primary class="p-2">
                <x-icon.eye class="w-5 h-5"></x-icon.eye>
        </x-button.primary>
            <x-button.green class="p-2">
                <x-icon.check class="w-5 h-5"></x-icon.check>
            </x-button.green>
        </div>
    </div>
    <h1 class="text-4xl mb-10">{{ $feature->name }}</h1>

    <div class="mx-3">
        <div class="flex flex-wrap" >
            @foreach ($this->participants as $participant)
            {{-- Card --}}
            <x-voting-card rating="?" :name="$participant['name']" />
            {{-- <x-voting-card rating="?" :name="$participant->name" /> --}}
            @endforeach
        </div>
    </div>

    <h3 class="text-2xl opacity-50 mt-10 mb-3">Cards:</h3>
    <div class="mx-3">
        <div class="flex flex-wrap" >
            @foreach ($ratings as $rating)
            {{-- Card --}}
            <x-voting-card :rating="$rating" />
            @endforeach
        </div>
    </div>
</div>

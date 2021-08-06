@if ($feature)
<div class="w-full" wire:poll="verifyParticipants">
    <div class="flex items-center justify-between">
        <h2 class="text-2xl mb-2 opacity-50">
            Voting Feature
        </h2>

        @if(isManager())
        <div class="flex items-center justify-between gap-2">
            <x-button.red wire:click="remove" class="p-2">
                <p>Delete</p>

            </x-button.red>
            <x-button.primary class="p-2">

                <p>Visibility</p>
            </x-button.primary>
            <x-button.green wire:click="toggleComplete" class="p-2">
                {{ $feature->isCompleted() ? 'Uncomplete' : 'Complete'  }}
            </x-button.green>
        </div>
        @endif
    </div>
    <h1 class="text-4xl mb-10 ">{{ $feature->name }}</h1>

    <hr class="border-primary-400 border" />

    <div class="mx-3 mt-10 mb-3">
        <div class="flex flex-wrap">
            @foreach ($this->participants as $participant )
            <x-voting-card rating="?" :participant="$participant" :selected="$this->hasVoted($participant)"
                :name="$participant['name']" @remove-participant="$wire.removeParticipant($event.detail)" />
            @endforeach
        </div>
    </div>

    <h3 class="text-2xl opacity-50 mt-10 mb-3">Cards:</h3>
    <div class="mx-3">
        {{ $voted }}
        <div class="flex flex-wrap">
            @foreach ($ratings as $rating)
            {{-- Card --}}
            <x-voting-card :rating="$rating" :selected="$rating == $voted" wire:click="vote('{{ $rating }}')" />
            @endforeach
        </div>
    </div>
</div>

@endif

<div class="flex items-center justify-center h-screen text-gray-900">
    <form wire:submit.prevent="join" class="space-y-3 w-80">
        <div class="mb-3">
            <label class="block text-gray-400" for="name">Participant Name:</label>
            <input name="name" type="text" placeholder="Type your name " wire:model.defer="name"
                class="w-full py-3 px-6 text-lg rounded-lg outline-none bg-opacity-10 bg-white border-2 border-gray-600 focus:border-primary-500 focus:ring-0 text-white">
            <x-jet-input-error for="name" class="py-1"></x-jet-input-error>
        </div>
        <x-button.primary type="submit" class="w-full py-3 px-3 text-white">Join Room</x-button.primary>
    </form>

</div>

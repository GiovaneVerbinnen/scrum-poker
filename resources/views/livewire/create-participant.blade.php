<div class="flex items-center justify-center h-screen text-gray-900">
   <form wire:submit.prevent="create">
      <div class="mb-3">
         <label class="block" for="name">Participant Name:</label>
         <input
         type="text"
         placeholder="Type your name "
         wire:model.defer="name"
         class="py-3 px-6 text-lg rounded-lg outline-none bg-opacity-10 bg-white border-2 border-gray-600 focus:border-primary-500 focus:ring-0 text-white"  >
   </div>
      <x-button.primary type="submit" class="w-full py-3 px-3 text-white">Create</x-button.primary>
      <x-jet-input-error  for="name"></x-jet-input-error>
   </form >

</div>

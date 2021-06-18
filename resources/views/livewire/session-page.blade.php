<div class="max-w-6xl px-8  mx-auto">
   <div class="pt-16 flex items-center justify-between">
        <h1 class="text-4xl">Scrum Poker</h1>

        <x-button class="bg-primary-400 flex items-center space-x-2 px-3 py-1 rounded-lg text-white">
            <span class="text-xl">Share</span>
            <x-icon.share class="w-5 h-5"></x-icon>
        </x-button>
   </div>

   <div class="grid grid-cols-12 gap-10 mt-32">
        <div class="col-span-4 space-y-3">

          <div class="relative">
            <input 
                type="text" 
                class="rounded-full w-full bg-white bg-opacity-10 pl-3 pr-10 py-1.5 border-none focus:outline-none focus:ring-primary-400 focus:ring-2" 
                placeholder="Add a new feature ...">
                <x-button class="bg-primary-400 p-1 rounded-full absolute top-1 right-1 focus:outline-none">
                    <x-icon.plus class="w-5 h-5"></x-icon.plus>  
                </x-button>
          </div>

        <div class="rounded-lg group relative p-2 border-2 border-transparent cursor-pointer hover:border-gray-600 hover:bg-gray-800 transition-all duration-200">
            Loren Loren Loren Loren Loren LorenLoren Loren LorenLoren Loren LorenLoren Loren Loren

            <div class="absolute opacity-0  group-hover:opacity-100 bottom-0 right-0  transition duration-200">
                <x-button class="bg-red-400 p-1.5 rounded-full opacity-75 hover:opacity-100 transition duration-200">
                    <x-icon.trash class="w-4 h-4"></x-icon> 
                </x-button>
                <x-button class="bg-primary-400 p-1.5 rounded-full opacity-75 hover:opacity-100 transition duration-200">
                    <x-icon.eye class="w-4 h-4"></x-icon>
                </x-button>
                <x-button class="bg-green-400 p-1.5 rounded-full opacity-75 hover:opacity-100 transition duration-200">
                    <x-icon.check class="w-4 h-4"></x-icon> 
                </x-button>
            </div>
        
        <div class="col-auto">adqwe</div>
   </div>
</div>

<div wire:poll :class="expandComments ? 'grow' : 'basis-1/2'" class="flex flex-col gap-4 p-8 text-lg font-semibold capitalize bg-white rounded-lg text-secondary-600">
    <div class="flex justify-between">
        <div class="flex items-center gap-4">
            <span class="relative flex w-3 h-3">
                <span class="absolute inline-flex w-full h-full rounded-full opacity-75 animate-ping bg-sky-400"></span>
                <span class="relative inline-flex w-3 h-3 rounded-full bg-sky-500"></span>
            </span>
            <span>{{__('ui.comments')}}</span>
        </div>
        <div>
            <button @click="expandComments=!expandComments" class="px-2 py-1 duration-150 ease-in delay-75 rounded-lg hover:text-secondary-800 hover:bg-secondary-100">
                <i class="fa-solid fa-expand"></i>
            </button>
        </div>
    </div>
    <div class="flex flex-col w-full gap-2 pl-2 overflow-y-auto text-sm" :class="expandComments ? 'grow' : 'h-44'">
        {{-- Loop Item Below --}}
        @for ($i = 0; $i < 2; $i++)
            <div class="flex flex-col justify-between w-full px-4 py-1 border-r-4 hover:bg-secondary-50 text-secondary-500">
                <div class="flex justify-between">
                    <div class="text-sm font-normal w-80">
                        كلام لطيف
                        لخسهيتب خ
                        ضخهصثي تضصثهختضص
                        ث ضخهصثتخضهصثت
                        ضص هثختضصخهثتضص
                        خثه تضصثخهتضصخثه
                    </div>
                    <div class="flex items-start gap-4">
                        <div class="flex flex-col items-end">
                            <span class="text-xs font-normal text-secondary-700">Username</span>
                            <span class="font-normal text-2xs text-secondary-400">since time</span>
                        </div>
                        <img class="rounded-lg w-7 h-7" src="https://flowbite.com/docs/images/people/profile-picture-5.jpg" alt="Bordered avatar">
                    </div>
                    {{-- <div class="flex gap-2">
                        <button class="px-4 py-1 duration-150 ease-in-out delay-75 rounded-lg hover:text-error-600 hover:bg-error-100">
                            <i class="fas fa-trash"></i>
                        </button>
                    </div> --}}
                    
                </div>
            </div>
        @endfor
    </div>
    <div class="justify-self-end">
        <input wire:keydown.enter="" wire:model="search" type="text" class="block w-full p-2 text-sm text-gray-900 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500" placeholder="{{__('ui.comment')}}" required>
    </div>
</div>
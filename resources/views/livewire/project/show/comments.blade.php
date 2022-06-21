<div class="flex flex-col gap-4 p-8 text-lg font-semibold capitalize bg-white rounded-lg basis-1/2 text-secondary-600"  x-data="{add:false}" x-cloak>
    <div class="flex justify-between">
        <div class="flex items-center gap-4">
            <span class="w-3.5 h-3.5 bg-primary-400 border-2 border-white rounded-full"></span>
            <span>{{__('ui.users')}}</span>
        </div>
        <div>
            <button @click="add=!add" class="px-2 py-1 duration-150 ease-in delay-75 rounded-lg hover:text-secondary-800 hover:bg-secondary-100">
                <i class="fas fa-plus"></i>
            </button>
        </div>
    </div>
    <div class="flex flex-col w-full gap-2 pl-2 overflow-y-auto text-sm h-44">
        {{-- Loop Item Below --}}
        @for ($i = 0; $i < 2; $i++)
            <div class="flex justify-between w-full px-4 py-2 rounded-lg hover:bg-secondary-50 text-secondary-500">
                <div class="flex items-center gap-4">
                    <img class="w-10 h-10 p-0.5 rounded-full ring-1 ring-gray-300" src="https://flowbite.com/docs/images/people/profile-picture-5.jpg" alt="Bordered avatar">
                    <div class="flex flex-col">
                        <span class="text-base font-normal text-secondary-700">Username</span>
                        <span class="text-xs font-normal text-secondary-400">joining date</span>
                    </div>
                </div>
                <div class="flex gap-2">
                    <button class="px-4 py-1 duration-150 ease-in-out delay-75 rounded-lg hover:text-error-600 hover:bg-error-100">
                        <i class="fas fa-trash"></i>
                    </button>
                </div>
            </div>
        @endfor
    </div>
</div>
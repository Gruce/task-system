<div x-show="selected == 2" class="flex flex-col gap-2">
    <div class="flex flex-col w-full gap-2 px-2 overflow-y-auto text-sm">
        {{-- Loop Item Below --}}
        @for ($i = 0; $i < 2; $i++)
            <div class="flex flex-col justify-between w-full px-4 py-1 border-r-4 hover:bg-secondary-50 text-secondary-500">
                <div class="flex justify-between gap-4">
                    <div class="text-sm font-normal">
                        Text
                    </div>
                    <div class="flex items-start gap-4">
                        <div class="flex flex-col items-end">
                            <span class="text-xs font-normal text-secondary-700">Username</span>
                            <span class="font-normal text-2xs text-secondary-400">since time</span>
                        </div>
                        <img class="rounded-lg w-7 h-7" src="https://flowbite.com/docs/images/people/profile-picture-5.jpg" alt="Bordered avatar">
                    </div>

                </div>
            </div>
        @endfor
    </div>
    <div class="justify-self-end">
        <input wire:keydown.enter="" wire:model="comment" type="text" class="block w-full p-2 text-sm text-gray-900 border border-gray-200 rounded-lg focus:ring-blue-500 focus:border-blue-500" placeholder="{{__('ui.comment')}}" required>
    </div>
</div>
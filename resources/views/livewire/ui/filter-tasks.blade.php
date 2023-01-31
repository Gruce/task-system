<div x-cloak x-data="{ importance: false }">
    <button id="multiLevelDropdownButton" data-dropdown-toggle="dropdown" class="text-white bg-gradient-to-r from-gray-500 via-gray-600 to-gray-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-gray-300 shadow-lg shadow-gray-500/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 inline-flex items-center gap-4 " type="button">
        <i class="text-xl fa-solid fa-filter"></i>
    </button>
    <div id="dropdown" class="hidden z-10 w-48 m-1 bg-white rounded divide-y divide-gray-100 shadow ">
        <ul class="py-1 text-sm text-gray-700" aria-labelledby="multiLevelDropdownButton">
            @admin()
            <li>
                <button @click="archive=!archive" type="button" class="flex justify-between m-1 rounded-lg items-center py-2 px-4 w-full hover:bg-secondary-50 text-secondary-700">{{__('ui.archive')}}</button>
            </li>
            @endadmin
            <li>
                <input wire:model="date" type="month" class=" m-1 rounded-lg  hover:bg-secondary-50 text-secondary-700" />
            </li>
            <li>
                <button @click="importance=!importance" data-dropdown-placement="right-start" type="button" class="flex justify-between items-center m-1 rounded-lg py-2 px-4 w-full hover:bg-secondary-50 text-secondary-700">{{__('ui.importance')}}
                    <i class="fa-solid fa-angle-down"></i>
                </button>
                <div x-show="importance" class="z-10 w-44 ">
                    <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="doubleDropdownButton">
                        <li>
                            <a href="#" wire:click="$set('importance', 1)" class="block m-1 rounded-lg py-2 px-4 @if ($importance == 1) bg-secondary-50 @endif hover:bg-secondary-50 text-secondary-700">{{__('ui.importance_low')}}</a>
                        </li>
                        <li>
                            <a href="#" wire:click="$set('importance', 2)" class="block m-1 rounded-lg py-2 px-4 @if ($importance == 2) bg-blue-100 @endif hover:bg-blue-100 text-blue-800">{{__('ui.importance_medium')}}</a>
                        </li>
                        <li>
                            <a href="#" wire:click="$set('importance', 3)" class="block m-1 rounded-lg py-2 px-4 @if ($importance == 3) bg-error-100 @endif hover:bg-error-100 text-error-900"> {{__('ui.importance_high')}}</a>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
</div>

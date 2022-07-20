<div>
    <button id="filterHome" data-dropdown-toggle="dropdownFilterHome" data-dropdown-placement="left" class="p-2 py-1 duration-150 ease-in delay-75 rounded-lg  text-gray-500 hover:text-gray-900">
        <i class="text-xl fa-solid fa-filter"></i>
    </button>

    <div id="dropdownFilterHome" class="hidden mt-8 rounded-lg z-10 w-44 bg-secondary-50  divide-y divide-gray-100 shadow ">
        <ul class="p-3 space-y-1 text-sm text-gray-700" aria-labelledby="filterHome">
            <li>
                <div class="flex items-center p-2 rounded hover:bg-white">
                    <input wire:model="currentFilter" id="default-radio-1" type="radio" value="1" name="default-radio" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500">
                    <label for="default-radio-1" class="mx-2 w-full text-sm font-medium text-gray-900 rounded">{{__('ui.current_year')}}</label>
                </div>
            </li>
            <li>
                <div class="flex items-center p-2 rounded hover:bg-white">
                    <input wire:model="currentFilter" id="default-radio-2" type="radio" value="2" name="default-radio" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500">
                    <label for="default-radio-2" class="mx-2 w-full text-sm font-medium text-gray-900 rounded">{{__('ui.current_month')}}</label>
                </div>
            </li>
            <li>
                <div class="flex items-center p-2 rounded hover:bg-white">
                    <input wire:model="currentFilter" id="default-radio-3" type="radio" value="3" name="default-radio" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500">
                    <label for="default-radio-3" class="mx-2 w-full text-sm font-medium text-gray-900 rounded ">{{__('ui.current_week')}}</label>
                </div>
            </li>
            <li>
                <div class="flex items-center p-2 rounded hover:bg-white">
                    <input wire:model="currentFilter" id="default-radio-4" type="radio" value="4" name="default-radio" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500">
                    <label for="default-radio-4" class="mx-2 w-full text-sm font-medium text-gray-900 rounded">{{__('ui.current_day')}}</label>
                </div>
            </li>
        </ul>
    </div>
</div>

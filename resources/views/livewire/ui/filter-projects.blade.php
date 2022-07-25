<div>
    <button id="filterProjects" data-dropdown-toggle="filterProjectsRadio" class="text-white bg-gradient-to-r from-gray-500 via-gray-600 to-gray-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-gray-300 shadow-lg shadow-gray-500/50 px-4 py-2.5 text-center inline-flex items-center rounded-lg" type="button">
        <i class="text-xl fa-solid fa-filter"></i>
    </button>

    <!-- Dropdown menu -->
    <div id="filterProjectsRadio" class="hidden z-10 w-48 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
        <ul class="p-3 space-y-3 text-sm text-gray-700" aria-labelledby="filterProjects">
            <li>
                <div class="flex items-center">
                    <input wire:model="done" id="default-radio-1" type="radio" value="null" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600">
                    <label for="default-radio-1" class="mx-2 text-sm font-medium text-gray-900">{{__('ui.all')}}</label>
                </div>
            </li>
            <li>
                <div class="flex items-center">
                    <input wire:model="done" id="default-radio-2" type="radio" value="0" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600">
                    <label for="default-radio-2" class="mx-2 text-sm font-medium text-gray-900">{{__('ui.in_progress')}}</label>
                </div>
            </li>
            <li>
                <div class="flex items-center">
                    <input wire:model="done" id="default-radio-3" type="radio" value="1" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600">
                    <label for="default-radio-3" class="ml-2 text-sm font-medium text-gray-900">{{__('ui.closed')}}</label>
                </div>
            </li>
        </ul>
    </div>
</div>

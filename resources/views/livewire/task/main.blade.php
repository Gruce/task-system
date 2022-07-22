@section('header-actions')
@endsection
@section('title', __('ui.tasks'))


{{-- @if ($selectedTab == 0) --}}
<div x-cloak class="p-4 sm:p-8" x-data="{ add: false, showModal: false, archive: false }">

    <div class="flex items-center justify-between mb-4">

        <div>
            <button @click="add = !add" type="button" class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 shadow-lg shadow-blue-500/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 inline-flex items-center gap-4">
                <i class="ri-add-line"></i>
                {{ __('ui.add_task') }}
            </button>
        </div>
        <div>
            <button id="multiLevelDropdownButton" data-dropdown-toggle="dropdown" class="text-white bg-gradient-to-r from-gray-500 via-gray-600 to-gray-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-gray-300 shadow-lg shadow-gray-500/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 inline-flex items-center gap-4 " type="button">
                <i class="text-xl fa-solid fa-filter"></i>
            </button>
        </div>
    </div>

    <div class="my-4" x-show="add" x-transition>
        @livewire('task.add')
    </div>
    <div>
        <div x-show="!archive">
            @livewire('task.all')
        </div>

        <div x-show="archive">
            @livewire('task.archived')
        </div>
    </div>


    <!-- Dropdown menu -->
    <div id="dropdown" class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow ">
        <ul class="py-1 text-sm text-gray-700" aria-labelledby="multiLevelDropdownButton">
            <li>
                <button @click="archive=!archive" type="button" class="flex justify-between m-1 rounded-lg items-center py-2 px-4 w-full hover:bg-secondary-50 text-secondary-700">{{__('ui.archive')}}</button>
            </li>
            <li>
                <button id="doubleDropdownButton" data-dropdown-toggle="doubleDropdown" data-dropdown-placement="right-start" type="button" class="flex justify-between items-center m-1 rounded-lg py-2 px-4 w-full hover:bg-secondary-50 text-secondary-700">{{__('ui.importance')}}<svg aria-hidden="true" class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                    </svg></button>
                <div id="doubleDropdown" class="hidden  z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow">
                    <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="doubleDropdownButton">
                        <li>
                            <a href="#" class="block m-1 rounded-lg py-2 px-4 hover:bg-secondary-50 text-secondary-700">{{__('ui.importance_low')}}</a>
                        </li>
                        <li>
                            <a href="#" class="block m-1 rounded-lg py-2 px-4 hover:bg-blue-100 text-blue-800">{{__('ui.importance_medium')}}</a>
                        </li>
                        <li>
                            <a href="#" class="block m-1 rounded-lg py-2 px-4 hover:bg-error-100 text-error-900"> {{__('ui.importance_high')}}</a>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>


    @if ($taskID)
    @livewire('task.modal.view', ['task' => $taskID], key('taskModal-' . $taskID))
    @endif
</div>

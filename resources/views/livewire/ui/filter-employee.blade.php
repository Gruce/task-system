{{-- <div>
    <select wire:model="department_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        <option value="" selected>{{__('ui.select_department')}}</option>
        @foreach ($departments as $department)
        <option value="{{$department->id}}">{{$department->name}}</option>
        @endforeach
    </select>
</div> --}}

<div>
    <button id="filterEmployee" data-dropdown-toggle="filterEmployeeRadio" class="text-white bg-gradient-to-r from-gray-500 via-gray-600 to-gray-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-gray-300 shadow-lg shadow-gray-500/50 px-4 py-2.5 text-center inline-flex items-center rounded-lg" type="button">
        <i class="text-xl fa-solid fa-filter"></i>
    </button>

    <!-- Dropdown menu -->
    <div id="filterEmployeeRadio" class="hidden z-10 w-48 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
        <ul class="p-3 space-y-3 text-sm text-gray-700" aria-labelledby="filterProjects">
            <li>
                <a href="{{ route('employees') }}" class="block m-1 rounded-lg py-2 px-4  bg-secondary-50  hover:bg-secondary-50 text-secondary-700">{{__('ui.all')}}</a>
            </li>
            @foreach ($departments as $department)
            <li>
                <div class="flex items-center">
                    <input wire:model="department_id" id="default-radio-{{$department->id}}" type="radio" value="{{$department->id}}" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600">
                    <label for="default-radio-{{$department->id}}" class="mx-2 text-sm font-medium text-gray-900">{{$department->name}}</label>
                </div>
            </li>
            @endforeach
        </ul>
    </div>
</div>

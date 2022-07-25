<div>
    <div @class(['container flex flex-wrap justify-between mx-auto '])>
        <div class=" w-full md:block md:w-auto">
            <ul
                class="flex flex-col mt-4 md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium">
                <li>
                    <div class="flex items-center p-2">
                        <i @if (Request::route()->getName() == ' home') class="fa-solid fa-house text-primary-500" @else class="fa-solid fa-house text-gray-700" @endif></i>
        <a href="{{ route('home') }}" aria-current="page" @if (Request::route()->getName() == 'home') class="block py-2 pr-4 pl-3 text-primary-500 group-hover:text-primary-500 rounded"
            @else class="block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700" @endif>{{ __('ui.home') }}
        </a>
    </div>

    </li>
    <li>
        <div class="flex items-center p-2 ">
            <i @if (Request::route()->getName() == 'employees') class="fa-solid fa-briefcase text-primary-500"
                @else class="fa-solid fa-briefcase text-gray-700" @endif></i>
            <a href="{{ route('employees') }}" aria-current="page" @if (Request::route()->getName() == 'employees') class="block py-2 pr-4 pl-3 text-primary-500 group-hover:text-primary-500 rounded "
                @else class="block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700" @endif>{{ __('ui.employees') }}</a>
        </div>
    </li>
    <li>
        <div class="flex items-center p-2 ">
            <i @if (Request::route()->getName() == 'projects') class="fa-solid fa-diagram-project text-primary-500"
                @else class="fa-solid fa-diagram-project text-gray-700" @endif></i>
            <a href="{{ route('projects') }}" aria-current="page" @if (Request::route()->getName() == 'projects') class="block py-2 pr-4 pl-3 text-primary-500 group-hover:text-primary-500 rounded "
                @else class="block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700" @endif>{{ __('ui.projects') }}</a>
        </div>
    </li>
    <li>
        <div class="flex items-center p-2 ">
            <i @if (Request::route()->getName() == 'tasks') class="fa-solid fa-list-check text-primary-500"
                @else class="fa-solid fa-list-check text-gray-700" @endif></i>
            <a href="{{ route('tasks') }}" aria-current="page" @if (Request::route()->getName() == 'tasks') class="block py-2 pr-4 pl-3 text-primary-500 group-hover:text-primary-500 rounded"
                @else class="block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700" @endif>{{ __('ui.tasks') }}</a>
        </div>
    </li>
    @admin()
    <li>
        <div class="flex items-center p-2 ">
            <i @if (Request::route()->getName() == 'employees') class="fa-solid fa-users text-primary-500"
                @else class="fa-solid fa-users text-gray-700" @endif></i>
            <a href="{{ route('employees') }}" aria-current="page" @if (Request::route()->getName() == 'employees') class="block py-2 pr-4 pl-3 text-primary-500 group-hover:text-primary-500 rounded"
                @else class="block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700" @endif>{{ __('ui.employees') }}</a>
        </div>
    </li>
    <li>
        <div class="flex items-center p-2 ">
            <i @if (Request::route()->getName() == 'notifications') class="fa-solid fa-bell text-primary-500"
                @else class="fa-solid fa-bell text-gray-700" @endif></i>
            <a href="{{ route('notifications') }}" aria-current="page" @if (Request::route()->getName() == 'notifications') class="block py-2 pr-4 pl-3 text-primary-500 group-hover:text-primary-500 rounded"
                @else class="block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700" @endif>{{ __('ui.notifications') }}</a>
        </div>
    </li>
    @endadmin()
    <hr>
    <li class="block py-2 pr-4 pl-3 text-xs text-black group-hover:text-gray-500 rounded">
        @foreach ($langs as $locale => $name)
        <a href="{{ route('change_locale', $locale) }}" class="w-full px-4 py-2 text-sm text-center rounded-lg hover:bg-gray-100">
            @if(lang($locale))
            <span class="font-semibold text-primary-500">{{$name}}</span>
            @elseif (!lang($locale))
            <span>{{$name}}</span>
            @endif
        </a>
        @endforeach
    </li>
    </ul>
</div>
</div>
</div>

<div>

    <button id="dropdownNotificationButton" data-dropdown-toggle="dropdownNotification" class="inline-flex items-center m-2 ml-5 text-sm font-medium text-center text-gray-500 hover:text-gray-900 focus:outline-none " type="button">
        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <path d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6zM10 18a3 3 0 01-3-3h6a3 3 0 01-3 3z"></path>
        </svg>
        @if ($notifications->count() > 0)
        <div class="flex relative">
            <span class="absolute inline-flex w-full h-full -top-2 right-3  rounded-full opacity-75 animate-ping   bg-red-400"></span>
            <span class="relative inline-flex w-3 h-3 rounded-full border-white border-2 bg-red-500 -top-2 right-3"></span>
        </div>
        @endif
    </button>
    <!-- Dropdown menu -->
    <div id="dropdownNotification" class="hidden z-20 w-full max-w-sm bg-white rounded divide-y divide-gray-100 shadow " aria-labelledby="dropdownNotificationButton" style="position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate3d(215.2px, 54.4px, 0px);" data-popper-reference-hidden="" data-popper-escaped="" data-popper-placement="bottom">
        <div class="block py-2 px-4 font-medium text-center text-gray-700 bg-gray-50 dark:bg-gray-800 dark:text-white">
            {{__('ui.notifications')}}
        </div>
        @forelse ($notifications as $item)
        <div class="divide-y divide-gray-700">
            <a href="#" class="flex py-3 px-4">
                <div class="pl-3 w-full">
                    <div class="text-gray-500 text-sm mb-1.5 dark:text-gray-400"><span class="font-semibold text-gray-900 dark:text-white">{{$item->title}}</span>: {{__($item->description)}}</div>
                    <div class="text-xs text-blue-600 dark:text-blue-500">{{$item->created_at->diffForHumans()}}</div>
                </div>
            </a>
        </div>
        @empty
        <div class="flex items-center  p-4">
            <span class="">{{__('ui.no_notifications')}}</span>
        </div>
        @endforelse
        <a href="{{ route('notifications') }}" class="block py-2 text-sm font-medium text-center text-gray-900 bg-gray-50 hover:bg-gray-100 dark:bg-gray-800 dark:hover:bg-gray-700 dark:text-white">
            <div class="inline-flex items-center ">
                <svg class="mr-2 w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"></path>
                    <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"></path>
                </svg>
                {{__('ui.view_all')}}
            </div>
        </a>
    </div>
</div>

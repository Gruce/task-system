<div>

    <button id="dropdownNotificationButton" data-dropdown-toggle="dropdownNotification" class="inline-flex items-center m-2 ml-5 text-sm font-medium text-center text-gray-500 hover:text-gray-900 focus:outline-none " type="button">
        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <path d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6zM10 18a3 3 0 01-3-3h6a3 3 0 01-3 3z"></path>
        </svg>
        <div class="flex relative">
            <div class="inline-flex relative -top-2 right-3 w-3 h-3 bg-red-500 rounded-full border-2 border-white dark:border-gray-900"></div>
        </div>
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

    {{-- <div class="flex flex-row">
        <button type="button" id="dropdownDefault" data-dropdown-toggle="dropdown" class="text-white focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm p-2.5 text-center inline-flex items-center mr-2 ">
            <i class="fa-solid fa-bell text-gray-400 text-lg"></i>
            <h6 class="text-sm  text-red-400 ">
                {{$notifications->count()}}
            </h6>
        </button>
    </div> --}}

    <!-- Dropdown menu -->
    {{-- <div id="dropdown" class="z-10  w-auto hidden bg-white divide-y divide-gray-100 rounded shadow  dark:bg-gray-700" data-popper-placement="bottom" style="position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate(821.25px, 728.75px);">
        <div class="flex justify-around text-center pt-3 pb-3">
            <h5 class=" font-semibold">
                Notifcation
            </h5>

        </div>
        <ul class="py-1 m-2 text-sm overflow-y-auto it h-96 text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefault">

            @forelse ($notifications as $item)
            <li class="m-2">
                <div class="w-full max-w-xs p-4 text-gray-500  bg-white rounded-lg border hover:bg-gray-200" role="alert">
                    <div class="flex">
                        <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-blue-500 bg-blue-100 rounded-lg dark:text-blue-300 dark:bg-blue-900">
                            <i class="fa-solid fa-user"></i>
                        </div>
                        <div class="ml-3 text-sm font-normal mr-3">
                            <span class="mb-1  text-sm font-semibold text-gray-900 dark:text-white"> {{$item->title}} </span>
                            <div class="mb-2 text-sm font-normal ">
                                {{__($item->description)}}
                            </div>
                            <div class="grid grid-cols-2 gap-2">
                                <div>
                                    <a href="#" class="inline-flex justify-center w-23 px-2 py-0.5 text-xs font-medium text-center text-white bg-secondary-600 rounded-lg hover:bg-secondary-700 focus:ring-4 focus:outline-none focus:ring-secondary-300 ">View</a>
                                </div>

                            </div>
                        </div>
                        <button wire:click="read({{$item->id}})" type="button" class="ml-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700">
                            <i class="fa-solid fa-times"></i>
                        </button>
                    </div>
                </div>

            </li>
            @empty

            <span>no task</span>
            @endforelse

        </ul>
        <a href="{{ route('notifications') }}" class="block p-4 max-w-sm text-center bg-white border border-gray-200 hover:bg-blue-100 ">

            show more
        </a>
    </div> --}}
</div>

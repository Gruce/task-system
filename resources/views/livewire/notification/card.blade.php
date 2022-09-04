<div class="relative" x-data="{dropdownNotification:false}">

    <button @click="dropdownNotification = !dropdownNotification" class="inline-flex items-center m-2 ml-5 text-sm font-medium text-center text-gray-500 hover:text-gray-900 focus:outline-none " type="button">
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
    <div wire:poll @click.outside="dropdownNotification = false" x-show="dropdownNotification" class="fixed top-14 right-15 w-auto z-20  bg-white rounded divide-y divide-gray-100 shadow overflow-visible">
        <div class="block py-2 px-4 font-medium text-center text-gray-700 bg-gray-50 dark:bg-gray-800 dark:text-white">
            {{__('ui.notifications')}}
        </div>
        <div class="overflow-y-auto h-tasklist">
            @forelse ($notifications as $item)
            <div class="divide-y divide-gray-700 ">
                <a class="flex py-3 px-4">
                    <div class="flex flex-col pl-3 w-full">
                        <div class="break-all flex justify-between text-gray-500 text-sm mb-1.5 w-full">
                            <div class="">
                                <p @if ($item->project_id)
                                    @click="window.location.href = '{{route('projects.show', $item->project_id)}}'"
                                    @else
                                    @click="window.location.href = '{{route('notifications')}}'"
                                    @endif class="w-full font-semibold text-gray-900 dark:text-white hover:underline break-all">{{$item->title}}</p>{{__($item->description)}}
                            </div>
                            <div class="mx-4">
                                <button wire:click="read({{$item->id}})" type="button" class=" bg-white text-gray-400 hover:text-gray-900 focus:ring-4 focus:outline-none hover:bg-gray-100 focus:ring-gray-300  font-sm rounded-lg text-sm p-2.5 text-center inline-flex items-center h-8 w-8 mx-2 ">
                                    <i class="fa-solid fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="text-xs text-blue-600 ">{{$item->created_at->diffForHumans()}}</div>
                    </div>
                </a>
            </div>
            @empty
            <div class="flex items-center  p-4">
                <span class="">{{__('ui.no_notifications')}}</span>
            </div>
            @endforelse
        </div>

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

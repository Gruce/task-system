<div>
    <div class="flex flex-row">
        <button type="button" id="dropdownDefault" data-dropdown-toggle="dropdown"
            class="text-white focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm p-2.5 text-center inline-flex items-center mr-2 ">
            <i class="fa-solid fa-bell text-gray-400 text-lg"></i>
            <h6 class="text-sm  text-red-400 ">
                {{$notifications->count()}}
            </h6>
        </button>
    </div>

    <!-- Dropdown menu -->
    <div id="dropdown" class="z-10  w-auto hidden bg-white divide-y divide-gray-100 rounded shadow  dark:bg-gray-700"
        data-popper-placement="bottom"
        style="position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate(821.25px, 728.75px);">
        <div class="flex justify-around text-center pt-3 pb-3">
            <h5 class=" font-semibold">
                Notifcation
            </h5>

        </div>
        <ul class="py-1 m-2 text-sm overflow-y-auto it h-96 text-gray-700 dark:text-gray-200"
            aria-labelledby="dropdownDefault">

            @forelse ($notifications as $item)
            <li class="m-2">
                <div
                    class="w-full max-w-xs p-4 text-gray-500  bg-white rounded-lg border hover:bg-gray-200"
                    role="alert">
                    <div class="flex">
                        <div
                            class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-blue-500 bg-blue-100 rounded-lg dark:text-blue-300 dark:bg-blue-900">
                            <i class="fa-solid fa-user"></i>
                        </div>
                        <div class="ml-3 text-sm font-normal mr-3">
                            <span class="mb-1  text-sm font-semibold text-gray-900 dark:text-white"> {{$item->title}} </span>
                            <div class="mb-2 text-sm font-normal">
                                {{$item->description}}
                            </div>
                            <div class="grid grid-cols-2 gap-2">
                                <div>
                                    <a href="#"
                                        class="inline-flex justify-center w-23 px-2 py-0.5 text-xs font-medium text-center text-white bg-secondary-600 rounded-lg hover:bg-secondary-700 focus:ring-4 focus:outline-none focus:ring-secondary-300 ">View</a>
                                </div>

                            </div>
                        </div>
                        <button wire:click="read({{$item->id}})" type="button"
                            class="ml-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700">
                            <i class="fa-solid fa-times"></i>
                        </button>
                    </div>
                </div>

            </li>
            @empty

                <span>no task</span>
            @endforelse

        </ul>
        <a href="{{ route('notifications') }}"
            class="block p-4 max-w-sm text-center bg-white border border-gray-200 hover:bg-blue-100 ">

            show more
        </a>
    </div>
</div>

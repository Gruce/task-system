<div>
    <div class="flex flex-row">
        <button type="button" id="dropdownDefault" data-dropdown-toggle="dropdown"
            class="text-white focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm p-2.5 text-center inline-flex items-center mr-2 ">
            <i class="fa-solid fa-bell text-gray-400 text-lg"></i>
                <h6 class="text-sm  text-red-400 ">
                    4
                </h6>
        </button>
    </div>

    <!-- Dropdown menu -->
    <div id="dropdown" class="z-10  w-auto hidden bg-white divide-y divide-gray-100 rounded shadow  dark:bg-gray-700"
        data-popper-placement="bottom"
        style="position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate(821.25px, 728.75px);">
        <ul class="py-1 m-2 text-sm overflow-y-auto it h-96 text-gray-700 dark:text-gray-200"
            aria-labelledby="dropdownDefault">
            @for ($i = 0; $i < 5; $i++)
                <li class="m-2">
                    <div id="toast-interactive"
                        class="w-full max-w-xs p-4 text-gray-500 bg-white rounded-lg border dark:bg-gray-800 dark:text-gray-400"
                        role="alert">
                        <div class="flex">
                            <div
                                class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-blue-500 bg-blue-100 rounded-lg dark:text-blue-300 dark:bg-blue-900">
                                <i class="fa-solid fa-user"></i>
                            </div>
                            <div class="ml-3 text-sm font-normal mr-3">
                                <span class="mb-1  text-sm font-semibold text-gray-900 dark:text-white"> Hassan </span>
                                <div class="mb-2 text-sm font-normal">A new task assigned to you .
                                </div>
                                <div class="grid grid-cols-2 gap-2">
                                    <div>
                                        <a href="#"
                                            class="inline-flex justify-center w-full px-2 py-1.5 text-xs font-medium text-center text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-500 dark:hover:bg-blue-600 dark:focus:ring-blue-800">View</a>
                                    </div>
                                    <div>
                                        <a href="#"
                                            class="inline-flex justify-center w-full px-2 py-1.5 text-xs font-medium text-center text-gray-900 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 dark:bg-gray-600 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-700 dark:focus:ring-gray-700">Not
                                            now</a>
                                    </div>
                                </div>
                            </div>
                            <button type="button"
                                class="ml-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700"
                                data-dismiss-target="#toast-interactive" aria-label="Close">
                                <span class="sr-only">Close</span>
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </button>
                        </div>
                    </div>

                </li>
            @endfor
            <li class="text-center">

                <a href="" class="text-black text-center font-semibold hover:text-indigo-600">
                    show more
                </a>
            </li>
        </ul>
    </div>
</div>

<div>
    <div
        class="relative p-5 bg-white border-t-[12px] border-x border-b border-x-transparent border-b-transparent rounded-lg transition-all duration-200 delay-100 ease-in-out hover:border-x-indigo-600 hover:border-b-indigo-600 hover:shadow-xl hover:shadow-secondary-100 border-indigo-600 hover:border-2">

            <select id="states" class="absolute text-center  py-1 tracking-wider  uppercase rounded-lg left-5 text-2xs -top-2 bg-indigo-600  text-white text-sm rounded-r-lg   block w-1/4 p-1.5 ">
                <option selected>اختر حالة المهمة</option>
                <option value="CA">غير مسندة</option>
                <option value="TX">قيد التنفيذ</option>
                <option value="WH">منتهية</option>
                <option value="FL">معلقة</option>
                <option value="VG">متأخرة</option>
                <option value="GE">معطلة</option>
            </select>

        <div
            class="p-6 text-right  bg-white rounded-lg  w-full ">
            <div class="flex flex-row justify-between items-center">
                <h5 class="mb-3 text-l font-semibold tracking-tight text-gray-900 dark:text-white ">
                    {{ $task->title }}
                </h5>
                <button id="dropdownButton" data-dropdown-toggle="dropdown"
                    class="hidden sm:inline-block text-gray-400 dark:text-gray-400 hover:bg-gray-200 dark:hover:bg-gray-200 focus:outline-none focus:ring-4 focus:outline-none focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-1.5"
                    type="button">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z">
                        </path>
                    </svg>
                </button>
                <div id="dropdown"
                    class="hidden z-10  w-44 text-base list-none bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700">
                    <ul class="py-1" aria-labelledby="dropdownButton">
                        <li>
                            <a href="#"
                                class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-black">Edit</a>
                        </li>
                        <li>
                            <a href="#"
                                class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-black">Export
                                Data</a>
                        </li>

                        <li>
                            <a href="#"
                                class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-black">Export
                                Data</a>
                        </li>
                        <li  wire>
                            <a href="#"  wire:click="confirmed({{ $task->id }})"
                                class="block py-2 px-4 text-sm text-red-600 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-black">Delete</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="flex flex-col">
                <div class="flex flex-row justify-between items-center">
                    <div class="max-w-xs">
                        <h5 class="p-1   tracking-tighter bg-indigo-600/20 rounded-lg text-sm text-indigo-600 ">
                            {{-- {{ $task->project->name }} --}}
                        </h5>
                    </div>
                </div>
                <div class="flex flex-row justify-between">
                    <img class="w-6 h-6 rounded-full ml-1 mt-3"
                        src="https://cdn.dribbble.com/users/5084254/avatars/normal/7412fd6c884231ed6f256c39b244f8d0.jpg?1644808490&compress=1&resize=40x40"
                        alt="Rounded avatar">

                    <div class="flex flex-col items-center ">
                        <h6 class="p-1  text-sm text-gray-500 ">
                            {{$task->start_at}}
                        </h6>
                        <h6 class="p-1  text-sm text-gray-500 ">
                            {{$task->end_at}}
                        </h6>
                    </div>
                </div>
                <div class="flex justify-between mt-4 text-sm text-center text-gray-500">
                    <div @class([
                        'px-4 py-2 basis-1/4 flex items-center justify-center gap-2',
                        'border-r' => en(),
                        'border-l' => ar(),
                    ]) class="">

                        <span class="font-semibold">{{ $task->importance }}</span>
                    </div>
                    <div @class([
                        'px-4 py-2 basis-1/4 flex items-center justify-center gap-2',
                        'border-r' => en(),
                        'border-l' => ar(),
                    ]) class="">
                        <i class="ri-chat-1-line"></i>
                        <span>3</span>
                    </div>
                    <div @class([
                        'px-4 py-2 basis-1/4 flex items-center justify-center gap-2',
                        'border-r' => en(),
                        'border-l' => ar(),
                    ]) class="">
                        <i class="ri-attachment-line"></i>
                        <span>{{$task->files_count}}</span>
                    </div>
                    <div @class(['px-4 py-2 basis-1/3 flex items-center justify-center gap-2']) class="">
                        <i class="fa-solid fa-circle-check"></i>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

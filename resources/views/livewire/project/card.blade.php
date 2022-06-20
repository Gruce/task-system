<div
    class="relative p-5 bg-white border-t-[12px] border-x border-b border-x-transparent border-b-transparent rounded-lg transition-all duration-200 delay-100 ease-in-out hover:border-x-secondary-500 hover:border-b-secondary-500 hover:shadow-xl hover:shadow-secondary-100 border-secondary-500 hover:border-2">
    <span
        class="absolute px-2 py-1 tracking-wider text-white uppercase rounded-lg left-5 text-2xs -top-2 bg-secondary-500">
        Section
    </span>
    <div class="flex flex-col">
        {{-- Do your work, then step back. --}}
        <div class="flex items-center justify-between mt-3">
            <h5 class="mb-3 text-xl font-bold tracking-tight text-secondary-700 ">
                {{ $project->title }}
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
                class="z-10 hidden text-base list-none bg-white divide-y divide-gray-100 rounded shadow w-44 dark:bg-gray-700">
                <ul class="py-1" aria-labelledby="dropdownButton">
                    <li>
                        <a href="{{route('projects.show' , ['id' => $project->id])}}"
                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-black">
                            {{__('ui.show')}}
                        </a>
                    </li>
                    <li>
                        <a href="#"
                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-black">
                            {{__('ui.create_task')}}
                        </a>
                    </li>
                    <li>
                        <a href="#"
                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-black">
                            {{__('ui.edit')}}
                        </a>
                    </li>
                    <li>
                        <a wire:click="confirmed({{ $project->id }} , 'delete')" href="#" class="block px-4 py-2 text-sm text-red-600 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-black">
                            {{__('ui.delete')}}
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <p class="max-w-xs text-sm tracking-tighter text-secondary-600">
            {{ $project->description }}
        </p>


        <div class="flex my-4 -space-x-4 rtl:space-x-reverse">
            <img class="w-10 h-10 border-2 border-white rounded-full dark:border-gray-800"
                src="https://flowbite.com/docs/images/people/profile-picture-5.jpg" alt="">
            <img class="w-10 h-10 border-2 border-white rounded-full dark:border-gray-800"
                src="https://flowbite.com/docs/images/people/profile-picture-5.jpg" alt="">
            <img class="w-10 h-10 border-2 border-white rounded-full dark:border-gray-800"
                src="https://flowbite.com/docs/images/people/profile-picture-5.jpg" alt="">
            <a class="flex items-center justify-center w-10 h-10 text-xs font-medium text-white bg-gray-700 border-2 border-white rounded-full hover:bg-gray-600 dark:border-gray-800"
                href="#">+99</a>
        </div>


        <div class="flex justify-between mb-1">
            <span class="text-xs font-medium text-secondary-500">45%</span>
            <span class="text-xs font-medium text-secondary-500">{{$project->created_at->diffForHumans()}}</span>
        </div>
        <div class="w-full bg-gray-200 rounded-full h-1.5">
            <div class="bg-secondary-600 h-1.5 rounded-full" style="width: 45%"></div>
        </div>

        <div class="flex justify-between mt-4 text-sm text-center text-gray-500">
            <div @class([
                'px-4 py-2 basis-1/3 flex items-center justify-center gap-2',
                'border-r' => en(),
                'border-l' => ar(),
            ]) class="">
                <i class="ri-chat-1-line"></i>
                <span>3</span>
            </div>
            <div @class([
                'px-4 py-2 basis-1/3 flex items-center justify-center gap-2',
                'border-r' => en(),
                'border-l' => ar(),
            ]) class="">
                <i class="ri-attachment-line"></i>
                <span>{{$project->files_count}}</span>
            </div>
            <div @class(['px-4 py-2 basis-1/3 flex items-center justify-center gap-2']) class="">
                <i class="fa-solid fa-list-check"></i>
                <span>{{$project->tasks_count}}</span>
            </div>
        </div>

    </div>
</div>


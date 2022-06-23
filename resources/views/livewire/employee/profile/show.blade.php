<div>
    <div class="flex flex-row" x-data="{name:false}">
        <div class="basis-1/4">
            <div class="p-4 h-full bg-white rounded-lg sm:p-8 dark:bg-gray-800 dark:border-gray-700">
                <div class="flex justify-between items-center mb-4">
                    <div class="flex flex-col">
                        <div class="flex items-center justify-between mt-3">
                            <div class="flex items-center gap-4 mb-3 text-secondary-600 group">

                                    <h5 x-show="!name" class="text-xl font-bold tracking-tight text-secondary-700">
                                        Hassan Hazim
                                    </h5>
                                    <div class="flex items-center gap-4" @click.stop="" @click.outside="name = false">
                                        <input wire:keydown.enter="edit_name" wire:model="project.title" type="text" x-show="name" class="block w-full p-2 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500" required>

                                        <div class="px-2 py-1 duration-200 ease-in-out delay-100 rounded-lg opacity-0 group-hover:opacity-100 hover:text-secondary-800 bg-secondary-50">
                                            <a @click="name = !name" x-show="!name" href="#"><i class="fas fa-pen"></i></a>
                                            <a wire:click="edit_name" @click="name = !name" x-show="name" href="#"><i class="fas fa-check"></i></a>
                                        </div>
                                    </div>
                                {{-- <div class="flex items-center gap-4" @click.stop="" @click.outside="name = false">
                                    <input wire:keydown.enter="edit_name" wire:model="project.title" type="text" x-show="name" class="block w-full p-2 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500" required>

                                    <div class="px-2 py-1 duration-200 ease-in-out delay-100 rounded-lg opacity-0 group-hover:opacity-100 hover:text-secondary-800 bg-secondary-50">
                                        <a @click="name = !name" x-show="!name" href="#"><i class="fas fa-pen"></i></a>
                                        <a wire:click="edit_name" @click="name = !name" x-show="name" href="#"><i class="fas fa-check"></i></a>
                                    </div>
                                </div> --}}
                            </div>

                        </div>
                        <div class="flex items-center gap-4  text-secondary-600 group">
                            <h6 x-show="!name" class="text-sm font-bold tracking-tight text-secondary-700">
                                salem.cf11@gmail.com
                            </h6>
                            <div class="flex items-center gap-4" @click.stop="" @click.outside="name = false">
                                <input wire:keydown.enter="edit_name" wire:model="project.title" type="text" x-show="name" class="block w-full p-2 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500" required>

                                <div class="px-2 py-1 duration-200 ease-in-out delay-100 rounded-lg opacity-0 group-hover:opacity-100 hover:text-secondary-800 bg-secondary-50">
                                    <a @click="name = !name" x-show="!name" href="#"><i class="fas fa-pen"></i></a>
                                    <a wire:click="edit_name" @click="name = !name" x-show="name" href="#"><i class="fas fa-check"></i></a>
                                </div>
                            </div>
                        </div>

                        <div class="flex items-center gap-4  text-secondary-600 group">
                            <h6 x-show="!name" class="text-xs font-bold tracking-tight text-secondary-700">
                                077343423423
                            </h6>
                            <div class="flex items-center gap-4" @click.stop="" @click.outside="name = false">
                                <input wire:keydown.enter="edit_name" wire:model="project.title" type="text" x-show="name" class="block w-full p-2 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500" required>

                                <div class="px-2 py-1 duration-200 ease-in-out delay-100 rounded-lg opacity-0 group-hover:opacity-100 hover:text-secondary-800 bg-secondary-50">
                                    <a @click="name = !name" x-show="!name" href="#"><i class="fas fa-pen"></i></a>
                                    <a wire:click="edit_name" @click="name = !name" x-show="name" href="#"><i class="fas fa-check"></i></a>
                                </div>
                            </div>
                        </div>

                    </div>
                    {{-- <div>
                        <livewire:livewire-line-chart key="{{ $lineChartModel->reactiveKey() }}"
                                    :line-chart-model="$lineChartModel" />
                    </div> --}}
                    <div class="relative">
                        <img class="w-16 h-16 rounded-full" src="https://flowbite.com/docs/images/people/profile-picture-5.jpg" alt="">
                        {{-- <button type="button" class="bottom-0 left-7 bg-black    absolute  w-5.5 h-5.5  text-sm  text-center inline-flex items-center mr-2 ">
                            <i class="fa-solid fa-camera-rotate bg-black text-gray-600 text-lg"></i>
                        </button> --}}
                        <button type="button" class="absolute  bottom-0 left-8 w-5.5 h-5.5 text-white bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-full text-lg p-1 text-center inline-flex items-center  dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            <i class="fa-solid fa-camera-rotate  text-l"></i>
                          </button>

                    </div>
                </div>
                <div class="flex flex-col">
                    <div>
                        <img src="https://www.microsoft.com/en-us/microsoft-365/blog/uploads/sites/2/2012/06/Excel-charts-11.png"
                            alt="">
                    </div>
                    <div>
                        <img src="https://i.stack.imgur.com/aQMp3.png" alt="">
                    </div>
                </div>
            </div>
        </div>
        <div class="basis-3/4 ml-5 mr-5">
            <div class="flex flex-col">
                <div class="flex flex-row justify-between">
                    <div class="p-4 ml-3 w-full bg-white rounded-lg sm:p-8 dark:bg-gray-800 dark:border-gray-700">
                        <div class="flex flex-col">
                            <div class="flex flex-row items-center  mb-8">
                                <i class="fa-solid fa-list-check mr-2 ml-2  text-secondary-500 "></i>
                                <h3 class="text-sm text-secondary-500 font-semibold">
                                    مهمة قيد التنفيذ
                                </h3>
                            </div>

                            <div class="flex justify-between mb-1">
                                <span class="text-xs font-medium text-secondary-500">45%</span>
                                <span class="text-xs font-medium text-secondary-500">545</span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-1.5">
                                <div class="bg-secondary-600 h-1.5 rounded-full" style="width: 45%"></div>
                            </div>
                        </div>
                    </div>
                    <div class="p-4 ml-3 w-full bg-white rounded-lg sm:p-8 dark:bg-gray-800 dark:border-gray-700">
                        <div class="flex flex-row justify-around items-center">
                            <div class="flex items-center">
                                <i class="fa-solid fa-calendar-check p-3 text-secondary-500"></i>
                                <h3 class="text-sm text-secondary-500 font-semibold">
                                    المهام المكتملة
                                </h3>
                            </div>
                            <div class="flex items-center">
                                <i class="fa-solid fa-calendar-xmark p-2 text-secondary-500"></i>
                                <h3 class="text-sm text-secondary-500 font-semibold">
                                    المهام الغير مكتملة
                                </h3>
                            </div>
                        </div>
                        <div class="flex justify-between mt-4 text-sm text-center text-gray-500">
                            <div @class([
                                'px- py-2 basis-1/2 flex items-center justify-center gap-2',
                                'border-r' => en(),
                                'border-l' => ar(),
                            ]) class="">
                                <span class="text-2xl">45</span>
                            </div>

                            <div @class(['px-4 py-2 basis-1/2 flex items-center justify-center gap-2']) class="">
                                <span class="text-2xl">45</span>
                            </div>
                        </div>
                    </div>
                    <div class="p-4 ml-3 w-full bg-white rounded-lg sm:p-8 dark:bg-gray-800 dark:border-gray-700">
                        asdas
                    </div>
                </div>
                <div class="ml-3 w-full mt-6 bg-white rounded-lg sm:p-8 dark:bg-gray-800 dark:border-gray-700">
                    <div class="flex flex-row justify-center items-center">
                        <h1 class="font-semibold text-secondary-700 m-5 ">
                            2020 Nov
                        </h1>
                        <div class="relative ">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor"
                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <input datepicker="" datepicker-autohide="" type="text"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 datepicker-input"
                                placeholder="Select date">
                        </div>

                    </div>
                    <div class="flex flex-col  px-2 m-1 overflow-y-auto h-tasklist">
                        <ol class="relative border-l border-gray-300 ">
                            <div
                                class="p-4 w-full mb-5  bg-gray-100 rounded-lg  sm:p-4 dark:bg-gray-800 dark:border-gray-700">
                                <li class="mb-10 ml-4">
                                    <div
                                        class="absolute w-3 h-3 bg-black rounded-full mt-1.5 -left-1.5 border border-white dark:border-gray-900 dark:bg-gray-700">
                                    </div>
                                    <time
                                        class="mb-1 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">March
                                        2022</time>
                                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Marketing UI design
                                        in
                                        Figma
                                    </h3>
                                    <p class="text-base font-normal  mb-5 text-gray-500 dark:text-gray-400">All of the
                                        pages and
                                        components are first designed in Figma and we keep a parity between the two
                                        versions
                                        even as we update the project.</p>
                                </li>
                            </div>
                            <div
                                class="p-4 w-full bg-red-400 mb-5 rounded-lg sm:p-4 dark:bg-gray-800 dark:border-gray-700">
                                <li class="mb-10 ml-4">
                                    <div
                                        class="absolute w-3 h-3 bg-red-500 rounded-full mt-1.5 -left-1.5 border border-white dark:border-gray-900 dark:bg-gray-700">
                                    </div>
                                    <time
                                        class="mb-1 text-sm font-normal leading-none text-white dark:text-gray-500">March
                                        2022</time>
                                    <h3 class="text-lg font-semibold text-gray-900 ">Marketing UI design in
                                        Figma
                                    </h3>
                                    <p class="text-base font-normal text-white ">All of the pages and
                                        components are first designed in Figma and we keep a parity between the two
                                        versions
                                        even as we update the project.</p>
                                </li>
                            </div>
                        </div>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>

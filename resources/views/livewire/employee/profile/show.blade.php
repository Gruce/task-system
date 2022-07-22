<div>
    <div class="sm:flex flex-row" x-data="{ edit: false , showModal: false }" x-cloak>
        <div class="basis-1/4 mt-3">
            <div class="flex flex-col items-center gap-2 p-8 text-center bg-white rounded-lg basis-1/4">
                <div class="flex items-center gap-2">
                    <div class="relative">
                        <button data-tooltip-target="tooltip-default" wire:click="state({{$employee->id}})">
                            @if(!$employee->state)
                            <div class="ring-4 ring-red-500 opacity-100 rounded-full">
                                <div class=" blur-sm opacity-90 rounded-full ">
                                    <img class="w-40 h-40 p-1  mb-3 rounded-full" src="{{ $employee->user->profile_photo }}" alt="">
                                </div>
                            </div>
                            <div id="tooltip-default" role="tooltip" class="inline-block absolute invisible z-10  py-2 px-3 text-sm font-medium text-white bg-green-700 rounded-lg  opacity-0 transition-opacity duration-300 tooltip">
                                {{__('ui.active')}}
                                <div class="tooltip-arrow" data-popper-arrow></div>
                            </div>
                            @else
                            <img class="w-40 h-40 p-1 mb-3 ring-4 ring-green-600 rounded-full" src="{{ $employee->user->profile_photo }}" alt="">
                            <div id="tooltip-default" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-sm font-medium text-white bg-red-600 rounded-lg shadow-sm opacity-0 transition-opacity duration-300 tooltip dark:bg-gray-700">
                                {{__('ui.disable')}}
                                <div class="tooltip-arrow" data-popper-arrow></div>
                            </div>
                            @endif
                        </button>
                        <div class="relative">
                            <div class="image-upload  ">
                                <label for="file-input">
                                    <i class="fa-solid fa-camera inline-flex items-center justify-center  mr-2 text-pink-100 transition-colors  duration-150 bg-black rounded-full focus:shadow-outline cursor-pointer text-lg bottom-5 left-7 absolute  w-6.9 h-6.7 p-0.5 hover:text-white"></i>
                                </label>
                                <input wire:model="photo" id="file-input" type="file" onchange="previewFile(this);" style="display: none;" />
                            </div>
                        </div>
                    </div>
                </div>
                <span x-show="!edit" class="text-2xl font-bold text-secondary-600">
                    {{ $employee->name }}
                </span>
                <p x-show="!edit" class="text-sm tracking-tighter text-secondary-500">
                    {{ $employee->user->username }}
                </p>
                <button x-show="!edit" @click="edit = !edit" type="button" class="w-full flex justify-center text-secondary-600 bg-white hover:bg-gray-100 border border-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-2.5 text-center  items-center    mr-2 mb-2">
                    <i class="fa-solid fa-pen-to-square mx-2"></i>
                    <span>{{__('ui.edit_profile')}}</span>
                </button>
                <div x-show="!edit" class="w-full flex justify-start">
                    <div>
                        <i class="fa-regular fa-at  text-secondary-500"></i>
                        <span class="text-sm tracking-tighter text-secondary-500">
                            {{ $employee->user->email }}
                        </span>
                    </div>
                </div>
                <div x-show="!edit" class="w-full flex justify-start">
                    <div>
                        <i class="fa-solid fa-phone  text-secondary-500"></i>
                        <span class="text-sm tracking-tighter text-secondary-500">
                            {{ $employee->user->phonenumber ?? __('ui.no_phone_number') }}
                        </span>
                    </div>
                </div>
                <div x-show="!edit" class="w-full flex justify-items-start">
                    <div>
                        <i class="fa-solid fa-mars-and-venus mx-2 text-secondary-500"></i>
                        <span class="text-sm tracking-tighter text-secondary-500">
                            {{ $employee->user->gender == 1 ? __('male') : __('ui.female') }}
                        </span>
                    </div>
                </div>
                <div x-show="!edit" class="mt-4 h-96">
                    <livewire:livewire-pie-chart key="{{ $this->pieChartModel->reactiveKey() }}" :pie-chart-model="$this->pieChartModel" />
                </div>

                {{-- edit --}}
                <div x-show="edit" class="w-full flex-col">
                    @livewire('employee.profile.edit', ['employee' => $employee])
                </div>
            </div>
        </div>
        <div class="basis-3/4 sm:ml-5 sm:mr-5">
            <div class="flex flex-col">
                <div class="sm:flex justify-between ">
                    <div class="p-4 sm:ml-3 mt-3 w-full bg-white rounded-lg sm:p-8 ">
                        <div class="flex flex-col">
                            <div class="flex flex-row items-center">
                                <div class="w-10 h-10   rounded-full text-secondary-500 bg-secondary-50">
                                    <i class="fa-solid fa-list-check p-3"></i>
                                </div>
                                <div>
                                    <h3 class="font-semibold text-secondary-600 text-l p-1">
                                        {{__('ui.projects_completed')}}
                                    </h3>
                                </div>
                            </div>
                            <div class="flex justify-between mt-5">
                                <span class="text-xs font-medium text-secondary-500">{{$employee->percentage_completed_projects}}%</span>
                                <span class="text-xs font-medium text-secondary-500">{{$employee->projects_count}}/{{$projects_done_count}}</span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-1.5">
                                <div class="bg-secondary-600 h-1.5 rounded-full" style="width: {{$employee->percentage_completed_projects}}%"></div>
                            </div>
                        </div>
                    </div>
                    <div class="p-4 sm:ml-3 mt-3 w-full bg-white rounded-lg sm:p-8 dark:bg-gray-800 dark:border-gray-700">
                        <div class="flex flex-col">
                            <div class="flex flex-row items-center">
                                <div class="w-10 h-10  text-secondary-500 bg-secondary-50 rounded-full">
                                    <i class="fa-solid fa-file-circle-exclamation p-3 "></i>
                                </div>
                                <div>
                                    <h3 class="font-semibold text-secondary-600 text-l p-1">
                                        {{__('ui.projects_in_progress')}}
                                    </h3>
                                </div>
                            </div>
                            <div class="flex justify-between mt-5">
                                <span class="text-xs font-medium text-secondary-500">{{$employee->percentage_not_completed_projects}}%</span>
                                <span class="text-xs font-medium text-secondary-500">{{$employee->projects_count}}/{{$projects_not_done_count}}</span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-1.5">
                                <div class="bg-secondary-600 h-1.5 rounded-full" style="width: {{$employee->percentage_not_completed_projects}}%"></div>
                            </div>
                        </div>
                    </div>
                    <div class="p-4 sm:ml-3 mt-3 w-full bg-white rounded-lg sm:p-8 dark:bg-gray-800 dark:border-gray-700">
                        <div class="flex flex-col">
                            <div class="flex flex-row items-center">
                                <div class="w-10 h-10  text-secondary-500 bg-secondary-50 rounded-full">
                                    <i class="fa-solid fa-diagram-project  p-3"></i>
                                </div>
                                <div>
                                    <h3 class="font-semibold text-secondary-600 text-l p-1">
                                        erert
                                    </h3>
                                </div>
                            </div>
                            <div class="flex justify-between mt-5">
                                <span class="text-xs font-medium text-secondary-500">234234%</span>
                                <span class="text-xs font-medium text-secondary-500">{{$employee->tasks_count}}/23</span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-1.5">
                                <div class="bg-secondary-600 h-1.5 rounded-full" style="width: 23%"></div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- Bottom --}}
                <div class="sm:ml-3  w-full mt-3 bg-white rounded-lg sm:p-8 dark:bg-gray-800 dark:border-gray-700">
                    <span class="block p-3 sm:hidden">{{__('ui.tasks')}}</span>
                    @livewire('task.all', ['employee' => $employee])
                    @if ($taskID)
                    @livewire('task.modal.view', ['task' => $taskID], key('taskModal-' . $taskID))
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

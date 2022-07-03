<div>
    <div class="flex flex-row" x-data="{ edit: false }" x-cloak>
        <div class="basis-1/4">
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
                                تفعيل
                                <div class="tooltip-arrow" data-popper-arrow></div>
                            </div>
                            @else
                            <img class="w-40 h-40 p-1 mb-3 ring-4 ring-green-600 rounded-full" src="{{ $employee->user->profile_photo }}" alt="">
                            <div id="tooltip-default" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-sm font-medium text-white bg-red-600 rounded-lg shadow-sm opacity-0 transition-opacity duration-300 tooltip dark:bg-gray-700">
                                تعطيل
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
                    <span>Edit Profile</span>
                </button>
                <div x-show="!edit" class="w-full flex justify-start">
                    <div>
                        <i class="fa-regular fa-at mx-2"></i>
                        <span class="text-sm tracking-tighter text-secondary-500">
                            {{ $employee->user->email }}
                        </span>
                    </div>
                </div>
                <div x-show="!edit" class="w-full flex justify-start">
                    <div>
                        <i class="fa-solid fa-phone mx-2"></i>
                        <span class="text-sm tracking-tighter text-secondary-500">
                            {{ $employee->phonenumber ?? 'No Phone Number' }}
                        </span>
                    </div>
                </div>
                <div x-show="!edit" class="w-full flex justify-items-start">
                    <div>
                        <i class="fa-solid fa-mars-and-venus mx-2"></i>
                        <span class="text-sm tracking-tighter text-secondary-500">
                            {{ $employee->user->gender == 1 ? __('male') : __('ui.female') }}
                        </span>
                    </div>

                </div>
                <div class="rounded mt-4 p-4 flex-1 " style="height: 35rem;">
                    <livewire:livewire-pie-chart key="{{ $pieChartModel->reactiveKey() }}" :pie-chart-model="$pieChartModel" />
                </div>


                {{-- edit --}}
                <div x-show="edit" class="w-full flex-col">
                    <div>
                        <input wire:keydown.enter="updatePofile" wire:model.defer="employee.user.name" type="text" class="mt-2 bg-gray-50 border  border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder={{ __('ui.name') }} required>
                        @error('employee.user.name')<span class="text-red-500">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <input wire:keydown.enter="updatePofile" wire:model.defer="employee.user.username" type="text" class="mt-2 bg-gray-50 border  border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder={{ __('ui.username') }} required>
                        @error('employee.user.username')<span class="text-red-500">{{ $message }}</span> @enderror
                    </div>
                    <hr class="my-2">
                    <div>
                        <div class="flex mt-2">
                            <span class=" inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 rounded-l-md border border-r-0 border-gray-300 dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                                <i class="fa-regular fa-at mx-2"></i>
                            </span>
                            <input wire:keydown.enter="updatePofile" wire:model.defer="employee.user.email" type="email" class="rounded-none rounded-r-lg bg-gray-50 border text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm border-gray-300 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="{{__('ui.email')}}">
                        </div>
                    </div>
                    <div>
                        <div class="flex mt-2">
                            <span class=" inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 rounded-l-md border border-r-0 border-gray-300 dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                                <i class="fa-solid fa-phone mx-2"></i>
                            </span>
                            <input wire:keydown.enter="updatePofile" wire:model.defer="employee.user.phonenumber" type="text" class="rounded-none rounded-r-lg bg-gray-50 border text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm border-gray-300 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="{{__('ui.phonenumber')}}">
                        </div>
                    </div>
                    <div>
                        <div class="flex mt-2">
                            <span class=" inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 rounded-l-md border border-r-0 border-gray-300 dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                                <i class="fa-solid fa-bullhorn mx-2"></i>
                            </span>
                            <input wire:keydown.enter="updatePofile" wire:model.defer="employee.job" type="text" class="rounded-none rounded-r-lg bg-gray-50 border text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm border-gray-300 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="{{__('ui.job')}}">
                        </div>
                    </div>

                    <div>
                        <div class="flex mt-2">
                            <span class=" inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 rounded-l-md border border-r-0 border-gray-300 dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                                <i class="fa-solid fa-key"></i>
                            </span>
                            <input wire:keydown.enter="updatePofile" wire:model.defer="employee.user.password" type="text" class="rounded-none rounded-r-lg bg-gray-50 border text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm border-gray-300 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="{{__('ui.new_password')}}">
                        </div>
                    </div>
                    <div>
                        <div class="flex mt-2">
                            <span class=" inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 rounded-l-md border border-r-0 border-gray-300 dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                                <i class="fa-solid fa-key"></i>
                            </span>
                            <input wire:model.defer="employee.user.password_confirmation" type="text" class="rounded-none rounded-r-lg bg-gray-50 border text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm border-gray-300 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="{{__('ui.confirm_password')}}">
                        </div>
                    </div>
                    <div class="flex justify-center rounded-md shadow-sm gap-2 w-full mt-2" role="group">
                        <label class="@if ($employee['user']['gender'] == 2) text-rose-500 @else  text-gray-900 @endif basis-1/2 flex justify-center items-center py-2 px-4 text-sm font-medium  bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-rose-700 focus:text-rose-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-rose-500 dark:focus:text-white">
                            <span>
                                <i class="fas fa-2x fa-female"></i>
                            </span>
                            <input class="hidden" type="radio" name="gender" value="2" autocomplete="off" wire:model="employee.user.gender">
                        </label>
                        <label class="@if ($employee['user']['gender'] == 1) text-blue-500 @else text-gray-900 @endif basis-1/2 flex justify-center items-center py-2 px-4 text-sm font-medium  bg-white rounded-md border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
                            <span>
                                <i class="fas fa-2x fa-male"></i>
                            </span>
                            <input class="hidden" type="radio" name="gender" value="1" wire:model="employee.user.gender">
                        </label>
                    </div>
                    <div class="mt-4">
                        <button wire:keydown.enter="updatePofile" wire:click="updatePofile" @click="edit = !edit" type="button" class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">{{__('ui.save')}}</button>

                        <button @click="edit = !edit" type="button" class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">{{__('ui.cancel')}}</button>
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
                                <span class="text-xs font-medium text-secondary-500">234234%</span>
                                <span class="text-xs font-medium text-secondary-500">545</span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-1.5">
                                <div class="bg-secondary-600 h-1.5 rounded-full" style="width: 23%"></div>
                            </div>
                        </div>
                    </div>
                    <div class="p-4 ml-3 w-full bg-white rounded-lg sm:p-8 dark:bg-gray-800 dark:border-gray-700">
                        <div class="flex flex-row justify-around items-center">
                            <div class="flex flex-col">
                                <div class="flex items-center">
                                    <i class="fa-solid fa-calendar-check p-3 text-green-400"></i>
                                    <h3 class="text-sm text-green-400 font-semibold">
                                        المهام المكتملة
                                    </h3>
                                </div>
                            </div>
                            <div class="flex items-center">
                                <i class="fa-solid fa-calendar-xmark p-2 text-red-400"></i>
                                <h3 class="text-sm text-red-400 font-semibold">
                                    المهام الغير مكتملة
                                </h3>
                            </div>
                        </div>
                        <div class="flex justify-between mt-4 text-sm text-center text-gray-500">
                            <div @class([ 'px- py-2 basis-1/2 flex items-center  justify-center gap-2' , 'border-r'=> en(),
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
                    {{-- Bottom --}}
                    <span class="block sm:hidden">{{__('ui.tasks')}}</span>
                    @livewire('task.all', ['employee' => $employee])
                    @if ($taskID)
                    @livewire('task.modal.view', ['task' => $taskID], key('taskModal-' . $taskID))
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

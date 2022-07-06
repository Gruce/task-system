<div>
    <div class="sm:flex flex-row" x-data="{ edit: false }" x-cloak>
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
                    <i class="fa-solid fa-pen-to-square "></i>
                    <span>Edit Profile</span>
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
                            {{ $employee->phonenumber ?? 'No Phone Number' }}
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
                    <livewire:livewire-pie-chart key="{{ $pieChartModel->reactiveKey() }}" :pie-chart-model="$pieChartModel" />
                </div>


                {{-- edit --}}
                <div x-show="edit" class="w-full flex-col">
                    <div>
                        <input wire:keydown.enter="edit" wire:model.defer="employee.user.name" type="text" class="mt-2 bg-gray-100 border-0 text-gray-500 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 pl-4 {{ar() ? 'pl-10' : 'pr-10'}}" placeholder={{ __('ui.name') }} required>
                        @error('employee.user.name')<span class="text-red-500">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <input wire:keydown.enter="edit" wire:model.defer="employee.user.username" type="text" class="mt-2 bg-gray-100 border-0 text-gray-500 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 pl-4 {{ar() ? 'pl-10' : 'pr-10'}}" placeholder={{ __('ui.username') }} required>
                        @error('employee.user.username')<span class="text-red-500">{{ $message }}</span> @enderror
                    </div>
                    <hr class="my-2">
                    <div class="flex mt-2">
                        <div class="relative w-full">
                            <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                                <i class="fa-regular fa-at  text-gray-500 dark:text-gray-400"></i>
                            </div>
                            <input type="text" wire:keydown.enter="edit" wire:model.defer="employee.user.email" class="bg-gray-100 border-0 text-gray-500 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 pl-10 {{ar() ? 'pl-10' : 'pr-10'}}" placeholder="{{__('ui.email')}}">
                            @error('employee.user.email')<span class="text-red-500">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="flex mt-2">
                        <div class="relative w-full">
                            <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                                <i class="fa-solid fa-phone  text-gray-400 dark:text-gray-400"></i>
                            </div>
                            <input type="text" wire:keydown.enter="edit" wire:model.defer="employee.user.phonenumber" class="bg-gray-100 border-0 text-gray-500 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 pl-10 {{ar() ? 'pl-10' : 'pr-10'}}" placeholder="{{__('ui.phonenumber')}}">
                            @error('employee.user.phonenumber')<span class="text-red-500">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="flex mt-2">
                        <div class="relative w-full">
                            <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                                <i class="fa-solid fa-bullhorn  text-gray-400 dark:text-gray-400"></i>
                            </div>
                            <input wire:keydown.enter="edit" type="text" wire:model.defer="employee.job" class="bg-gray-100 border-0 text-gray-500 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 pl-10 {{ar() ? 'pl-10' : 'pr-10'}}" placeholder="{{__('ui.job')}}">
                            @error('employee.job')<span class="text-red-500">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="flex mt-2">
                        <div class="relative w-full">
                            <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                                <i class="fa-solid fa-key  text-gray-400 dark:text-gray-400"></i>
                            </div>
                            <input wire:keydown.enter="edit" type="text" wire:model.defer="employee.user.password" class="bg-gray-100 border-0 text-gray-500 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 pl-10 {{ar() ? 'pl-10' : 'pr-10'}}" placeholder="{{__('ui.new_password')}}">
                            @error('employee.user.password')<span class="text-red-500">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="flex mt-2">
                        <div class="relative w-full">
                            <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                                <i class="fa-solid fa-key  text-gray-400 dark:text-gray-400"></i>
                            </div>
                            <input wire:keydown.enter="edit" type="text" wire:model.defer="employee.password_confirmation" class="bg-gray-100 border-0 text-gray-500 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 pl-10 {{ar() ? 'pl-10' : 'pr-10'}}" placeholder="{{__('ui.confirm_password')}}">
                            @error('employee.password_confirmation')<span class="text-red-500">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="flex justify-center rounded-md shadow-sm gap-2 w-full mt-2" role="group">
                        <label class="@if ($employee['user']['gender'] == 2) text-red-500 @else  text-gray-900 @endif basis-1/2 flex justify-center items-center py-2 px-4 text-sm font-medium bg-white   rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-rose-700 focus:text-rose-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-rose-500 dark:focus:text-white">
                            <span>
                                <i class="fas fa-2x fa-female"></i>
                            </span>
                            <input class="hidden" type="radio" name="gender" value="2" wire:model.lazy="employee.user.gender">
                        </label>
                        <label class="@if ($employee['user']['gender'] == 1) text-blue-500 @else text-gray-900 @endif basis-1/2 flex justify-center items-center py-2 px-4 text-sm font-medium bg-white  rounded-md border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
                            <span>
                                <i class="fas fa-2x fa-male"></i>
                            </span>
                            <input class="hidden" type="radio" name="gender" value="1" wire:model.lazy="employee.user.gender">
                        </label>
                    </div>
                    <div class="mt-4">
                        <button wire:keydown.enter="edit" wire:click="edit" @click="edit = !edit" type="button" class="text-white bg-primary-700 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2">{{__('ui.save')}}</button>
                        <button @click="edit = !edit" type="button" class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">{{__('ui.cancel')}}</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="basis-3/4 sm:ml-5 sm:mr-5">
            <div class="flex flex-col">
                <div class="sm:flex justify-between ">
                    <div class="p-4 sm:ml-3 mt-3 w-full bg-white rounded-lg sm:p-8 ">
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
                    <div class="p-4 sm:ml-3 mt-3 w-full bg-white rounded-lg sm:p-8 dark:bg-gray-800 dark:border-gray-700">
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
                    <div class="p-4 sm:ml-3 mt-3 w-full bg-white rounded-lg sm:p-8 dark:bg-gray-800 dark:border-gray-700">
                        asdas
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

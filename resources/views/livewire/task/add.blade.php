<div class="p-4 bg-white rounded-lg sm:p-8" x-init="@this.on('$refresh', ()=>{ setTimeout(()=>{ addTask = false;}, 400) })">
    @if($project)
    <div>
        <button @click="addTask=!addTask" class="px-2 py-1 mb-2 duration-150 ease-in delay-75 rounded-lg hover:text-secondary-800 hover:bg-secondary-100">
            <i class="fa-solid fa-xmark"></i>
        </button>
    </div>
    @endif
    <form wire:submit.prevent="add">
        <div class="flex flex-col gap-10 sm:flex-row">
            <div class="flex flex-col gap-4 sm:basis-3/4">
                <label class="block mb-2 text-sm font-medium text-gray-500">
                    {{ __('ui.basicinfo') }}
                </label>
                <div class="grid xl:grid-cols-2 xl:gap-6">
                    <div class="@if($project) w-full @endif">
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                            {{ __('ui.title') }}
                        </label>
                        <input wire:model.defer="task.title" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder={{ __('ui.title') }}>
                        @error('task.title')
                        <p class="text-red-500 text-s ">{{__('ui.this_field_is_required')}}</p>
                        @enderror
                    </div>
                    @if (!$project)
                    <div>
                        <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">
                            {{ __('ui.choose_project') }}</label>
                        </label>
                        <div class="flex w-full gap-2">
                            <select wire:model="task.project_id" class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                {{-- <input wire:model="search" type="text" class="block w-full p-2 text-sm text-gray-900 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500" placeholder="{{__('ui.project_title')}}"> --}}

                                <option value="" selected>{{__('ui.select_project')}}</option>
                                @foreach ($projects as $project)
                                <option value="{{$project->id}}">{{$project->title}}</option>
                                @endforeach
                            </select>

                        </div>
                        @error('task.project_id')
                        <p class="text-red-500 text-s ">{{__('ui.this_field_is_required')}}</p>
                        @enderror
                    </div>
                    @endif
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                            {{ __('ui.start_date') }}
                        </label>
                        <input wire:model="task.start_at" type="date" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 datepicker-input" placeholder="Select date">
                        @error('task.start_at')
                        <p class="text-red-500 text-s ">{{__('ui.this_field_is_required')}}</p>
                        @enderror
                    </div>
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                            {{ __('ui.end_date') }}
                        </label>
                        <input wire:model.defer="task.end_at" type="date" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 datepicker-input" placeholder="Select date">
                    </div>
                </div>

                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">
                        {{ __('ui.description') }}
                    </label>
                    <textarea wire:model.defer="task.description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder={{ __('ui.description') }}></textarea>
                </div>

                <div class="grid xl:grid-cols-2 xl:gap-6">

                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">
                            {{ __('ui.importance') }}</label>
                        </label>
                        <select wire:model.defer="task.importance" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value="1">{{ __('ui.importance_low') }}</option>
                            <option value="2">{{ __('ui.importance_medium') }}</option>
                            <option value="3">{{ __('ui.importance_high') }}</option>
                        </select>
                        @error('task.importance')
                        <p class="text-red-500 text-s ">{{__('ui.this_field_is_required')}}</p>
                        @enderror
                    </div>
                    <div>
                        <div class="grid xl:grid-cols-1 xl:gap-6">
                            <div>
                                {{-- <div>
                                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">
                                        {{ __('ui.employees') }}</label>
                                    </label>
                                    <input wire:model="employeesSearch" type="text" class="block w-full p-2 text-sm text-gray-900 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500" placeholder="{{__('ui.name')}}">
                                </div> --}}
                                <div>
                                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">
                                        {{ __('ui.employees') }}</label>
                                    </label>
                                    <select wire:model="employee_id" wire:change="addEmployee" class="my-2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <option selected="">{{ __('ui.select_employee') }}</option>
                                        @foreach($employees as $employee)
                                        <option value="{{$employee->id}}">{{$employee->name}} - {{$employee->department->name ??__('ui.no_data')}} - {{$employee->job ??__('ui.no_job')}}</option>
                                        @endforeach
                                        <button wire:click="add" @click="add=!add" class="px-4 py-1 duration-150 ease-in-out delay-75 border rounded-lg hover:text-success-800 hover:bg-success-100">
                                            <i class="fas fa-check"></i>
                                        </button>
                                    </select>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="flex flex-wrap gap-2">
                    @foreach ($taskEmployees as $key => $employee)
                    <div>
                        <span class="bg-gray-100 text-gray-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded-lg mr-2">
                            <button wire:click="removeEmployee({{$key}}) class=" m-1 duration-150 ease-in delay-75 rounded-full hover:text-secondary-800 hover:bg-secondary-100">
                                <i class="fas fa-times p-1  "></i>
                            </button>
                            {{$employee['name']}}
                        </span>
                    </div>
                    @endforeach
                </div>
                <button type="submit" class="text-white hover:bg-blue-700 bg-blue-600 font-medium rounded-lg mt-4 text-sm w-full sm:w-auto px-5 py-2.5 text-center">
                    {{ __('ui.add') }}
                </button>
            </div>

            {{-- Attachments --}}
            <div class="flex flex-col gap-4 sm:basis-1/4">
                {{-- Label --}}
                <label class="flex items-center justify-between mb-2 text-sm font-medium text-gray-500">
                    <span>{{ __('ui.addattachments') }}</span>
                    @if (count($files) > 0)
                    <span class="text-xs text-secondary-400">{{ __('ui.file_count') }}: {{ count($files) }}
                    </span>
                    @endif
                </label>

                {{-- Input --}}
                <div class="relative flex items-center justify-center h-48 border-2 border-dotted rounded-lg bg-secondary-50 border-secondary-300">
                    <div class="absolute">
                        <div class="flex flex-col items-center cursor-pointer">
                            <div wire:loading wire:target="files">
                                <i class="mb-3 fas fa-spinner fa-spin fa-3x text-secondary-600"></i>
                            </div>
                            <div wire:loading.remove wire:target="files">
                                <i class="ri-upload-line ri-3x text-secondary-600"></i>
                            </div>
                            <span class="block font-normal text-secondary-600">{{ __('ui.upload_files') }}</span>
                        </div>
                    </div>
                    <input wire:model="files" type="file" class="w-full h-full opacity-0 cursor-pointer" name="" multiple>
                    @error('files') <span class="error">{{__('ui.this_field_is_required')}}</span> @enderror
                </div>

                {{-- Preview --}}
                <div class="flex flex-col gap-2">
                    @foreach ($files as $key => $file)
                    <div class="flex items-center justify-between px-4 py-2 rounded-lg bg-secondary-50 text-secondary-500">
                        <span>{{ __('ui.file') . ' ' . ($key + 1) }}</span>
                        <button wire:click="removeFile({{ $key }})" type="button" class="focus:outline-none text-error-600 hover:bg-error-100 focus:ring-4 focus:ring-error-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2">
                            <i class="fa-solid fa-trash"></i>
                        </button>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

    </form>

</div>

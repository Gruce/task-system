<div x-cloak x-init="show = $wire.modal" x-data="{ show: false }" class="flex flex-col p-3 border rounded-lg hover:bg-secondary-50 text-secondary-600">
    <div @click="() => {show=!show, $wire.toggleModal()}" class="flex flex-col gap-2 cursor-pointer">
        <div class="flex justify-between w-full">
            <div class="flex flex-col">
                <div class="flex items-center gap-2">
                    <span class="font-semibold">{{$task->title}}</span>
                    <span>·</span>
                    <span class="text-xs text-secondary-500"><{{$task->project->title}}</span>
                </div>
            </div>
            <div class="flex justify-end gap-2">
                <button class="px-1.5 py-0.5 text-xs font-semibold uppercase border rounded border-secondary-100 text-secondary-500 bg-secondary-50 hover:bg-secondary-100 hover:text-secondary-600 hover:border-secondary-200">
                    <span>Todo</span>
                </button>
                <button class="px-1.5 py-0.5 text-xs font-semibold uppercase border rounded text-warning-700 bg-warning-50 hover:bg-warning-100 hover:text-warning-800 border-warning-100 hover:border-warning-200">
                    <span>Progress</span>
                </button>
                <button class="px-1.5 py-0.5 text-xs font-semibold uppercase border rounded text-success-800 bg-success-50 hover:bg-success-100 hover:text-success-900 border-success-100 hover:border-success-200">
                    <span>Done</span>
                </button>
            </div>
        </div>
        <div class="flex items-center justify-between w-full">
            <span class="text-xs">{{$task->end_at}}</span>
            <div>
                <span class="bg-secondary-50 text-secondary-600 text-2xs font-semibold px-2.5 py-0.5 rounded uppercase">low</span>
                <span class="bg-primary-50 text-primary-600 text-2xs font-semibold px-2.5 py-0.5 rounded uppercase">medium</span>
                <span class="bg-error-50 text-error-600 text-2xs font-semibold px-2.5 py-0.5 rounded uppercase">high</span>
                <span class="bg-gray-600 text-gray-50 text-2xs font-semibold px-2.5 py-0.5 rounded uppercase">hold</span>
            </div>
        </div>
    </div>
    <!-- Main modal -->
    {{--
        Selections:
            0. Overview
            1. Files
            2. Comments
    --}}
    <div x-show="show" class="fixed top-0 left-0 right-0 z-50 flex items-center justify-center w-full h-full overflow-x-hidden overflow-y-auto bg-black bg-opacity-50 md:inset-0" x-cloak x-data="{ selected: 0 }">
        <div class="relative w-full max-w-4xl p-4">
            <!-- Modal content -->
            <div class="relative bg-white border rounded-lg">
                <!-- Modal header -->
                <div class="flex justify-between p-4 border-b rounded-t">
                    <h3 class="text-xl font-semibold text-secondary-700">
                        <i class="mx-2 fa-solid fa-list-check"></i>
                        {{-- {{$task->title}} - {{$task->project->title }} --}}
                        {{__('ui.task')}}
                    </h3>
                    <button @click="() => {show=!show, $wire.toggleModal()}" type="button" class="inline-flex items-center px-4 py-2 text-lg text-gray-400 bg-transparent rounded-lg hover:bg-gray-200 hover:text-gray-900 " data-modal-toggle="defaultModal">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="flex gap-2 p-6">

                    {{-- Options / Controllers --}}
                    <div class="flex flex-col basis-1/4">
                        <div class="flex flex-col gap-6">

                            {{-- Group Items --}}
                            <div class="flex flex-col gap-1 text-sm">
                                {{-- Items --}}
                                <span @click="selected = 0" :class="selected == 0 ? 'bg-secondary-100 font-semibold' : 'bg-secondary-50'" class="flex items-center justify-between px-4 py-2 capitalize rounded cursor-pointer hover:bg-secondary-100 w-44">
                                    <span class="text-sm">{{__('ui.overview')}}</span>
                                    <i class="text-xs fa-solid fa-home"></i>
                                </span>
                                <span @click="selected = 1" :class="selected == 1 ? 'bg-secondary-100 font-semibold' : 'bg-secondary-50'" class="flex items-center justify-between px-4 py-2 capitalize rounded cursor-pointer hover:bg-secondary-100 w-44">
                                    <span class="text-sm">{{__('ui.files')}}</span>
                                    <i class="text-xs fa-solid fa-paperclip"></i>
                                </span>
                                <span @click="selected = 2" :class="selected == 2 ? 'bg-secondary-100 font-semibold' : 'bg-secondary-50'" class="flex items-center justify-between px-4 py-2 capitalize rounded cursor-pointer hover:bg-secondary-100 w-44">
                                    <span class="text-sm">{{__('ui.comments')}}</span>
                                    <i class="text-xs fa-solid fa-comments"></i>
                                </span>
                                <span @click="selected = 3" :class="selected == 3 ? 'bg-secondary-100 font-semibold' : 'bg-secondary-50'" class="flex items-center justify-between px-4 py-2 capitalize rounded cursor-pointer hover:bg-secondary-100 w-44">
                                    <span class="text-sm">{{__('ui.users')}}</span>
                                    <i class="text-xs fa-solid fa-users"></i>
                                </span>
                            </div>

                            {{-- Group Items --}}
                            <div class="flex flex-col gap-1 text-sm">
                                {{-- Items --}}
                                <span class="flex items-center justify-between px-4 py-2 rounded cursor-pointer hover:bg-secondary-100 w-44 {{ true ? 'bg-secondary-100' : 'bg-secondary-50' }}">
                                    <span class="text-sm">{{__('ui.archive')}}</span>
                                    <i class="text-xs fa-solid fa-box-archive"></i>
                                </span>
                                <span >
                                    <button wire:click="confirmed({{ $task->id }}, 'delete') "class="flex items-center justify-between px-4 py-2 rounded cursor-pointer hover:bg-error-100 w-44 bg-secondary-50 hover:text-error-600" >
                                        <span class="text-sm">{{__('ui.delete')}}</span>
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </span>
                            </div>
                        </div>
                    </div>







                    {{-- Task Content --}}
                    <div class="flex flex-col gap-4 basis-3/4">
                        {{-- Overview --}}
                        <div x-show="selected == 0" class="flex flex-col gap-6">
                            <div x-data="{ title: false, project: false }" class="flex items-center justify-between pb-2 border-b-2 border-secondary-50">
                                <div @click.outside="title = false" class="flex items-center gap-4 cursor-pointer group">
                                    <h4 @click="title=!title" x-show="!title" class="text-xl font-semibold">{{$task->title}}</h4>
                                    <a @click="title=!title" x-show="!title" href="#" class="invisible group-hover:visible"><i class="fas fa-pen"></i></a>
                                    <input wire:model="task.title" wire:click="edit_name" x-show="title" type="text" class="block w-full p-1 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-primary-500 focus:border-primary-500" required>
                                </div>
                                <div @click.outside="project = false" class="flex items-center gap-4 cursor-pointer group">
                                    <h4 @click="project=!project" x-show="!project" class="text-sm font-semibold text-secondary-400">{{$task->project->title}}</h4>
                                    <a @click="project=!project" x-show="!project" href="#" class="invisible group-hover:visible"><i class="fas fa-pen"></i></a>
                                    <select wire:model.defer="task.project_id" wire:keydown.enter="edit_name" x-show="project" class="block w-full px-4 py-1 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500">
                                            {{-- @forelse($task as $item)
                                            <option value="{{ $item->project->id }}">{{ $item->project->title }}</option>
                                            @empty
                                            <option value="id">{{ __('ui.no_projects') }}</option>
                                            @endforelse --}}
                                        </select>

                                    </select>
                                </div>
                            </div>
                            {{-- Description --}}
                            <div @click.outside="description = false" x-data="{description: false}">
                                <div x-show="!description" @click="description=!description" class="px-4 py-3 border rounded cursor-pointer hover:bg-secondary-50">
                                    {{$task->description}}
                                </div>
                                <textarea   wire:model.defer="task.description" wire:keydown.enter="edit_name" x-show="description" id="message" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded border border-gray-300 focus:ring-primary-500 focus:border-primary-500" placeholder="Description"></textarea>
                            </div>
                        </div>

                        {{-- Files --}}
                        <div x-show="selected == 1" class="flex flex-col gap-2">
                            <div class="relative flex items-center justify-center h-10 border rounded-lg hover:bg-secondary-50 border-secondary-100">
                                <div class="absolute w-full px-4">
                                    <div class="flex items-center justify-between cursor-pointer">
                                        <span class="text-secondary-400">{{__('ui.upload_files')}}</span>

                                        <div wire:loading wire:target="files">
                                            <i class="text-xl fas fa-spin fa-spinner text-secondary-600"></i>
                                        </div>
                                        <div wire:loading.remove wire:target="files">
                                            <i class="text-xl ri-upload-line text-secondary-600"></i>
                                        </div>
                                    </div>
                                </div>
                                <input wire:model="files" type="file" class="w-full h-full opacity-0 cursor-pointer" name="" multiple>
                            </div>
                            {{-- <div class="flex justify-between w-full px-4 py-2 rounded-lg hover:bg-secondary-50 text-secondary-500">
                                <span class="text-sm font-semibold">{{__('ui.file')}} 1</span>
                                <div class="flex gap-2 text-sm">
                                    <a href="#" class="px-4 py-1 duration-150 ease-in delay-75 rounded-lg hover:text-secondary-800 hover:bg-secondary-100">
                                        <i class="fas fa-download"></i>
                                    </a>
                                    <button class="px-4 py-1 duration-150 ease-in-out delay-75 rounded-lg hover:text-error-600 hover:bg-error-100">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </div> --}}
                            @forelse ($task->files as $key => $file)
                            <div class="flex justify-between w-full px-4 py-2 rounded-lg hover:bg-secondary-50 text-secondary-500">
                                <span>{{__('ui.file')}} {{$key + 1}}</span>
                                <div class="flex gap-2">
                                    <a href="{{$file->file_path}}" download class="px-4 py-1 duration-150 ease-in delay-75 rounded-lg hover:text-secondary-800 hover:bg-secondary-100">
                                        <i class="fas fa-download"></i>
                                    </a>
                                    {{-- <button class="px-4 py-1 duration-150 ease-in delay-75 rounded-lg hover:text-secondary-800 hover:bg-secondary-100">
                                        <i class="fas fa-download"></i>
                                    </button> --}}
                                    <button wire:click="confirmedFile({{ $file->id }} , 'deleteFile')" class="px-4 py-1 duration-150 ease-in-out delay-75 rounded-lg hover:text-error-600 hover:bg-error-100">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </div>
                        @empty
                            {{__('ui.no_data')}}
                        @endforelse
                        </div>

                        {{-- Comments --}}
                        <div x-show="selected == 2" class="flex flex-col gap-2">
                            <div class="flex flex-col w-full gap-2 pl-2 overflow-y-auto text-sm">
                                {{-- Loop Item Below --}}
                                @for ($i = 0; $i < 2; $i++)
                                    <div class="flex flex-col justify-between w-full px-4 py-1 border-r-4 hover:bg-secondary-50 text-secondary-500">
                                        <div class="flex justify-between gap-4">
                                            <div class="text-sm font-normal">
                                                Text
                                            </div>
                                            <div class="flex items-start gap-4">
                                                <div class="flex flex-col items-end">
                                                    <span class="text-xs font-normal text-secondary-700">Username</span>
                                                    <span class="font-normal text-2xs text-secondary-400">since time</span>
                                                </div>
                                                <img class="rounded-lg w-7 h-7" src="https://flowbite.com/docs/images/people/profile-picture-5.jpg" alt="Bordered avatar">
                                            </div>

                                        </div>
                                    </div>
                                @endfor
                            </div>
                            <div class="justify-self-end">
                                <input wire:keydown.enter="" wire:model="search" type="text" class="block w-full p-2 text-sm text-gray-900 border border-gray-200 rounded-lg focus:ring-blue-500 focus:border-blue-500" placeholder="{{__('ui.comment')}}" required>
                            </div>
                        </div>



                        {{-- Users --}}
                        <div x-show="selected == 3" class="flex flex-col">
                            <div class="flex flex-col w-full gap-2 pl-2 overflow-y-auto text-sm">
                                <div class="flex justify-between w-full px-4 py-2 rounded-lg text-secondary-500">
                                    <div class="flex w-full gap-2">
                                        <input wire:model="search" type="text" class="block w-full p-2 text-sm text-gray-900 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500" placeholder="{{__('ui.name')}}" required>
                                        @if ($search)
                                            <select wire:model="userId" class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                                <option value="" selected>{{__('ui.select_employee')}}</option>
                                                <option value="1">Employer Name</option>
                                            </select>
                                            <button wire:click="add" class="px-4 py-1 duration-150 ease-in-out delay-75 border rounded-lg hover:text-success-800 hover:bg-success-100">
                                                <i class="fas fa-check"></i>
                                            </button>
                                        @endif
                                    </div>
                                </div>

                                {{-- Loop Item Below --}}
                                @for ($i = 0; $i < 2; $i++)
                                <div class="flex justify-between w-full px-4 py-2 rounded-lg hover:bg-secondary-50 text-secondary-500">
                                    <div class="flex items-center gap-4">
                                        <img class="w-10 h-10 rounded-lg" src="https://flowbite.com/docs/images/people/profile-picture-5.jpg" alt="Bordered avatar">
                                        <div class="flex flex-col">
                                            <span class="text-base font-normal text-secondary-700">
                                                Name
                                            </span>
                                            <span class="text-xs font-normal text-secondary-400">
                                                Joined Time
                                            </span>
                                        </div>
                                    </div>
                                    <div class="flex gap-2">
                                        <button class="px-4 py-1 duration-150 ease-in-out delay-75 rounded-lg hover:text-error-600 hover:bg-error-100">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </div>
                                @endfor
                            </div>
                        </div>




                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

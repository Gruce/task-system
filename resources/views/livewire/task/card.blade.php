<div x-cloak x-data="{ show: false }" class="flex flex-col p-3 border rounded-lg hover:bg-secondary-50 text-secondary-600">
    <div @click="show=!show" class="flex items-center justify-between gap-2 cursor-pointer">
        <div class="flex justify-between w-full">
            <div class="flex flex-col">
                <div class="flex items-center gap-2">
                    <span class="font-semibold">{{$task->title}}</span>
                    <span>·</span>
                    <span class="text-xs text-secondary-500">{{$task->project_title}}</span>
                </div>
                <span class="text-xs">{{$task->end_at}}</span>
            </div>
            <div>
                Button
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
    <template x-if="show">
        <div class="fixed top-0 left-0 right-0 z-50 flex items-center justify-center w-full h-full overflow-x-hidden overflow-y-auto bg-black bg-opacity-50 md:inset-0" x-cloak x-data="{ selected: 0 }">
            <div class="relative w-full max-w-4xl p-4">
                <!-- Modal content -->
                <div class="relative bg-white border rounded-lg">
                    <!-- Modal header -->
                    <div class="flex justify-between p-4 border-b rounded-t">
                        <h3 class="text-xl font-semibold text-gray-900">
                            {{$task->title}} - {{$task->project->title }}
                        </h3>
                        <button @click="show=!show" type="button" class="inline-flex items-center px-4 py-2 text-lg text-gray-400 bg-transparent rounded-lg hover:bg-gray-200 hover:text-gray-900 " data-modal-toggle="defaultModal">
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
                                    <span @click="selected = 0" :class="selected == 0 ? 'bg-secondary-100 font-semibold' : 'bg-secondary-50'" class="flex items-center justify-between px-4 py-2 rounded cursor-pointer hover:bg-secondary-100 w-44">
                                        <span class="text-sm">{{__('ui.overview')}}</span>
                                        <i class="text-xs fa-solid fa-home"></i>
                                    </span>
                                    <span @click="selected = 1" :class="selected == 1 ? 'bg-secondary-100 font-semibold' : 'bg-secondary-50'" class="flex items-center justify-between px-4 py-2 rounded cursor-pointer hover:bg-secondary-100 w-44">
                                        <span class="text-sm">{{__('ui.files')}}</span>
                                        <i class="text-xs fa-solid fa-paperclip"></i>
                                    </span>
                                    <span @click="selected = 2" :class="selected == 2 ? 'bg-secondary-100 font-semibold' : 'bg-secondary-50'" class="flex items-center justify-between px-4 py-2 rounded cursor-pointer hover:bg-secondary-100 w-44">
                                        <span class="text-sm">{{__('ui.comments')}}</span>
                                        <i class="text-xs fa-solid fa-comments"></i>
                                    </span>
                                </div>

                                {{-- Group Items --}}
                                <div class="flex flex-col gap-1 text-sm">
                                    {{-- Items --}}
                                    <span class="flex items-center justify-between px-4 py-2 rounded cursor-pointer hover:bg-secondary-100 w-44 bg-secondary-50">
                                        <span class="text-sm">{{__('ui.archive')}}</span>
                                        <i class="text-xs fa-solid fa-box-archive"></i>
                                    </span>
                                    <span class="flex items-center justify-between px-4 py-2 rounded cursor-pointer hover:bg-error-100 w-44 bg-secondary-50 hover:text-error-600">
                                        <span class="text-sm">{{__('ui.delete')}}</span>
                                        <button wire:click="confirmed({{ $task->id }} , 'delete')" >
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </span>
                                </div>
                            </div>
                        </div>







                        {{-- Task Content --}}
                        <div class="flex flex-col gap-4 basis-3/4">
                            {{-- Description --}}
                            <div x-show="selected == 0" class="relative flex flex-col gap-2 p-4 pt-6 border rounded-lg">
                                <span class="absolute px-4 text-sm bg-white -top-2 text-secondary-400">{{__('ui.description')}}</span>
                                <p>{{$task->description}}</p>
                            </div>

                            {{-- Files --}}
                            <div x-show="selected == 1" class="relative flex flex-col gap-2 p-4 pt-6 border rounded-lg">
                                <div class="absolute right-0 flex justify-between w-full -top-2">
                                    <span class="px-4 mx-4 text-sm bg-white text-secondary-400">
                                        {{__('ui.files')}}
                                    </span>
                                </div>
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
                            <div x-show="selected == 2" class="relative flex flex-col gap-2 p-4 pt-6 border rounded-lg">
                                <span class="absolute px-4 text-sm bg-white -top-2 text-secondary-400">{{__('ui.comments')}}</span>
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </template>
</div>

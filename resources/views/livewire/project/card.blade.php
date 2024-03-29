<div wire:loading.class="opacity-50" @click="window.location.href = '{{route('projects.show', $project->id)}}'" x-data="{name: false, dropdown: false}" @ class="cursor-pointer relative p-5 group bg-white border-t-[12px] border-x border-b border-x-transparent border-b-transparent rounded-lg transition-all duration-200 delay-100 ease-in-out hover:border-x-secondary-500 hover:border-b-secondary-500 hover:shadow-xl hover:shadow-secondary-100 border-secondary-500 hover:border-2">
    <span class="absolute px-2 py-1 tracking-wider text-white uppercase duration-200 ease-in-out delay-100 border-2 border-transparent rounded-lg ransition-all left-5 text-2xs -top-2 bg-{{$project->done ? 'green' : 'secondary'}}-600 group-hover:bg-{{$project->done ? 'green' : 'secondary'}}-500 group-hover:border-{{$project->done ? 'green' : 'secondary'}}-500 group-hover:text-{{$project->done ? 'white' : 'secondary'}}-100">
        {{$project->done ? __('ui.completed_project') : __('ui.in_progress_project')}}
    </span>
    <div class="flex flex-col">
        {{-- Do your work, then step back. --}}
        <div class="flex items-center justify-between mt-3">
            <div class="flex items-center gap-4 mb-3 text-secondary-600 group">
                <h5 x-show="!name" class="text-xl font-bold tracking-tight text-secondary-700">
                    {{ $project->title }}
                </h5>
                @admin()
                <div class="flex items-center gap-4" @click.stop="" @click.outside="name = false">
                    <input wire:keydown.enter="edit_name" wire:model="project.title" type="text" x-show="name" class="block w-full p-2 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500" required>

                    <div class="px-2 py-1 duration-200 ease-in-out delay-100 rounded-lg opacity-0 group-hover:opacity-100 hover:text-secondary-800 bg-secondary-50">
                        <a @click="name = !name" x-show="!name" href="#"><i class="fas fa-pen"></i></a>
                        <a wire:click="edit_name" @click="name = !name" x-show="name" href="#"><i class="fas fa-check"></i></a>
                    </div>
                </div>
                @endadmin
            </div>
            @admin()
            <div class="relative">
                <button @click.stop="dropdown = !dropdown" class="sm:inline-block text-gray-400 dark:text-gray-400 hover:bg-gray-200 dark:hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-1.5" type="button">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z">
                        </path>
                    </svg>
                </button>

                <div @click.outside="dropdown = false" @click.stop="" x-show="dropdown" class="absolute z-10 text-base list-none bg-white divide-y divide-gray-100 rounded shadow w-44 dark:bg-gray-700 {{ar() ? 'left-0' : 'right-0'}}">
                    <ul class="py-1">
                        <li>
                            <a wire:click="chnageDone({{$project->id}})" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-black">
                                {{$project->done ? __('ui.mark_as_in_progress') : __('ui.mark_as_done')}}
                            </a>
                        </li>
                        <li>
                            <a wire:click="export({{ $project->id}})" class="cursor block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-black">
                                {{__('ui.export_to_excel')}}
                            </a>
                        </li>
                        <li>
                            <a wire:click="confirmed({{ $project->id }})" class="block px-4 py-2 text-sm text-red-600 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-black">
                                {{__('ui.delete')}}
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            @endadmin
        </div>

        <p class="max-w-xs text-sm tracking-tighter text-secondary-600">
            {{ $project->description }}
        </p>


        <div class="flex my-4 -space-x-4 rtl:space-x-reverse">
            @foreach ($project->employees as $employee)
            <a href="#">
                <img src="{{$employee->photo}}" class="w-10 h-10 border-2 border-white rounded-full dark:border-gray-800" alt="">
            </a>
            @endforeach
            @if($project->employees_count > 2)
            <a href="#" class="flex items-center justify-center w-10 h-10 text-xs font-medium text-white bg-gray-700 border-2 border-white rounded-full hover:bg-gray-600 dark:border-gray-800">
                + {{$project->employees_count - 2}}
            </a>
            @endif
        </div>


        <div class="flex justify-between mb-1">
            <span class="text-xs font-medium text-secondary-500">{{$project->percentage_completed_tasks}}%</span>
            <span class="text-xs font-medium text-secondary-500">{{$project->created_at->diffForHumans()}}</span>
        </div>
        <div class="w-full bg-gray-200 rounded-full h-1.5">
            <div class="bg-secondary-600 h-1.5 rounded-full" style="width: {{$project->percentage_completed_tasks}}%"></div>
        </div>

        <div class="flex justify-between mt-4 text-sm text-center text-gray-500">
            <div @class([ 'px-4 py-2 basis-1/3 flex items-center justify-center gap-2' , 'border-r'=> en(),
                'border-l' => ar(),
                ]) class="">
                <i class="ri-chat-1-line"></i>
                <span>{{$project->comments->count()}}</span>
            </div>
            <div @class([ 'px-4 py-2 basis-1/3 flex items-center justify-center gap-2' , 'border-r'=> en(),
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

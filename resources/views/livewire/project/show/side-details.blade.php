<div class="flex flex-col items-center gap-2 p-8 text-center bg-white rounded-lg basis-1/4">
    <div class="flex items-center gap-2">
        <span class="text-2xl font-bold text-secondary-600">
            {{$project->title}}
        </span>
    </div>
    <p class="text-sm tracking-tighter text-secondary-500">
        {{$project->description}}
    </p>

    {{-- <span class="px-2 py-1 text-xs rounded text-secondary-600 bg-secondary-100 w-fit">#{{ $project->id }}</span> --}}

    <div class="w-full mt-5">
        <div class="flex justify-between mb-1">
            <span class="text-xs font-medium text-secondary-500">{{$project->percentage_completed_tasks }}%</span>
            <span class="text-xs font-medium text-secondary-500">{{$project->completed_tasks}}/{{$project->tasks_count}} {{__('ui.completed_tasks')}}</span>
        </div>
        <div class="w-full bg-gray-200 rounded-full h-1.5">
            <div class="bg-secondary-600 h-1.5 rounded-full" style="width: {{$project->percentage_completed_tasks}}%"></div>
        </div>
    </div>

    {{-- Files --}}
    <div class="relative w-full px-3 pt-5 pb-3 mt-5 border rounded-lg">
        <div class="absolute left-0 flex justify-between w-full -top-2 ">
            <span class="px-2 mx-4 text-xs capitalize bg-white text-secondary-500">{{__('ui.files')}}</span>
            <span class="px-2 mx-4 text-xs bg-white text-secondary-500">{{$project->files_count}}</span>
        </div>

        <div class="flex flex-col w-full gap-2 pl-2 overflow-y-auto h-projectfiles">
            {{-- Addition --}}
            @admin()
            <div class="relative flex items-center justify-center h-20 border-2 border-dotted rounded-lg hover:bg-secondary-50 border-secondary-300">
                <div class="absolute">
                    <div class="flex flex-col items-center cursor-pointer">
                        <div wire:loading wire:target="files">
                            <i class="mb-3 fas fa-spin fa-spinner fa-2x text-secondary-600"></i>
                        </div>
                        <div wire:loading.remove wire:target="files">
                            <i class="ri-upload-line ri-2x text-secondary-600"></i>
                        </div>
                    </div>
                </div>
                <input wire:model="files" type="file" class="w-full h-full opacity-0 cursor-pointer" name="" multiple>
            </div>
            @endadmin

            {{-- Loop Item Below --}}
            @forelse ($project->files as $key => $file)
            <div class="flex justify-between w-full px-4 py-2 rounded-lg hover:bg-secondary-50 text-secondary-500">
                <span>{{__('ui.file')}} {{$key + 1}}</span>
                <div class="flex gap-2">
                    <a href="{{$file->file_path}}" download class="px-4 py-1 duration-150 ease-in delay-75 rounded-lg hover:text-secondary-800 hover:bg-secondary-100">
                        <i class="fas fa-download"></i>
                    </a>
                    {{-- <button class="px-4 py-1 duration-150 ease-in delay-75 rounded-lg hover:text-secondary-800 hover:bg-secondary-100">
                        <i class="fas fa-download"></i>
                    </button> --}}
                    @admin()
                    <button wire:click="confirmed({{ $file->id }} , 'delete')" class="px-4 py-1 duration-150 ease-in-out delay-75 rounded-lg hover:text-error-600 hover:bg-error-100">
                        <i class="fas fa-trash"></i>
                    </button>
                    @endadmin
                </div>
            </div>
            @empty
            {{__('ui.no_data')}}
            @endforelse
        </div>
    </div>
</div>

<div class="flex flex-col h-full gap-8 sm:flex-row" x-data="{expandComments: false, showModal: false, addTask: false}" x-cloak>
    {{-- Right Side --}}
    @livewire('project.show.side-details' , ['project' => $project])

    {{-- Left Side --}}
    <div class="flex flex-col gap-6 basis-3/4">
        {{-- Top --}}
        <div x-show="!addTask" :class="expandComments ? 'h-full' : 'sm:basis-1/3 sm:h-1/3'" class="flex flex-col gap-8 sm:flex-row">
            {{-- Right : Users --}}
            @livewire('project.show.users' , ['project_employees' => $project->employees, 'project' => $project])

            {{-- Left --}}
            @livewire('project.show.comments', ['project' => $project])
            {{-- Left --}}

        </div>
        @admin()
        <div x-show="addTask">
            @livewire('task.add', ['project' => $project])
        </div>
        @endadmin
        {{-- Bottom --}}
        <div x-show="!expandComments" class="flex flex-col gap-4  text-lg font-semibold capitalize bg-white rounded-lg sm:p-2 text-secondary-600 sm:basis-2/3 min-h-max">
            @admin()
            <div>
                <button @click="addTask=!addTask" class="px-2 py-1 duration-150 ease-in delay-75 rounded-lg hover:text-secondary-800 hover:bg-secondary-100">
                    <i class="fa-solid fa-plus"></i>
                </button>
            </div>
            @endadmin

            <span class="block sm:hidden">{{__('ui.tasks')}}</span>
            @livewire('task.all', ['project' => $project])
            @if ($taskID)
            @livewire('task.modal.view', ['task' => $taskID], key('taskModal-' . $taskID))
            @endif
        </div>
    </div>
</div>

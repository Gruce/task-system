<div class="flex flex-col h-full gap-8 sm:flex-row" x-data="{expandComments: false, showModal: false}" x-cloak>
    {{-- Right Side --}}
    @livewire('project.show.side-details' , ['project' => $project])

    {{-- Left Side --}}
    <div class="flex flex-col gap-6 basis-3/4">
        {{-- Top --}}
        <div :class="expandComments ? 'h-full' : 'sm:basis-1/3 sm:h-1/3'" class="flex flex-col gap-8 sm:flex-row">
            {{-- Right : Users --}}
            @livewire('project.show.users' , ['project_employees' => $project->employees, 'project' => $project])

            {{-- Left --}}
            @livewire('project.show.comments', ['project' => $project])
        </div>

        {{-- Bottom --}}
        <div x-show="!expandComments" class="flex flex-col gap-4 p-4 text-lg font-semibold capitalize bg-white rounded-lg sm:p-8 text-secondary-600 sm:basis-2/3 sm:h-2/3">
            <span class="block sm:hidden">{{__('ui.tasks')}}</span>
            @livewire('task.all', ['project' => $project])
            @if ($taskID)
                @livewire('task.modal.view', ['task' => $taskID], key('taskModal-' . $taskID))
            @endif
        </div>
    </div>
</div>

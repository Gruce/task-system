<div class="flex h-full gap-8" x-data="{expandComments: false, showModal: false}" x-cloak>
    {{-- Right Side --}}
    @livewire('project.show.side-details' , ['project' => $project])

    {{-- Left Side --}}
    <div class="flex flex-col gap-6 basis-3/4">
        {{-- Top --}}
        <div :class="expandComments ? 'h-full' : 'basis-1/3 h-1/3'" class="flex gap-8">
            {{-- Right : Users --}}
            @livewire('project.show.users' , ['project_employees' => $project->employees, 'project' => $project])

            {{-- Left --}}
            @livewire('project.show.comments', ['project' => $project])
        </div>

        {{-- Bottom --}}
        <div x-show="!expandComments" class="flex flex-col gap-4 p-8 text-lg font-semibold capitalize bg-white rounded-lg text-secondary-600 basis-2/3 h-2/3">
            @livewire('task.all', ['project' => $project])
            @if ($taskID)
                @livewire('task.modal.view', ['task' => $taskID], key('taskModal-' . $taskID))
            @endif
        </div>
    </div>
</div>

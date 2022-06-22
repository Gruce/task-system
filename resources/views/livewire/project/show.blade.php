
<div class="flex h-full gap-8" x-data="{expandComments: false}" x-cloak>
    {{-- Right Side --}}
    @livewire('project.show.side-details' , ['project' => $project])

    {{-- Left Side --}}
    <div class="flex flex-col gap-8 basis-3/4">
        {{-- Top --}}
        <div :class="expandComments ? 'grow' : 'basis-1/3'" class="flex gap-8">
            {{-- Right : Users --}}
            @livewire('project.show.users' , ['project_employees' => $project->employees, 'project' => $project])


            {{-- Left --}}
            @livewire('project.show.comments')
        </div>

        {{-- Bottom --}}
        <div x-show="!expandComments" class="flex p-8 text-lg font-semibold capitalize bg-white rounded-lg basis-2/3 text-secondary-600">
            <div class="flex flex-col items-center gap-4 p-3 basis-1/3">
                <div class="flex items-center gap-2">
                    <span class="w-3.5 h-3.5 bg-primary-400 border-2 border-white rounded-full"></span>
                    <span>Todo</span>
                </div>
                <div class="w-full border rounded-lg grow"></div>
            </div>
            <div class="flex flex-col items-center gap-4 p-3 basis-1/3">
                <div class="flex items-center gap-2">
                    <span class="w-3.5 h-3.5 bg-warning-400 border-2 border-white rounded-full"></span>
                    <span>Doing</span>
                </div>
                <div class="w-full border rounded-lg grow"></div>
            </div>
            <div class="flex flex-col items-center gap-4 p-3 basis-1/3">
                <div class="flex items-center gap-2">
                    <span class="w-3.5 h-3.5 bg-success-800 border-2 border-white rounded-full"></span>
                    <span>Done</span>
                </div>
                <div class="w-full border rounded-lg grow"></div>
            </div>
        </div>
    </div>
</div>

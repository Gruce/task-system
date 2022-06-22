
<div class="flex h-full gap-8">
    {{-- Right Side --}}
    @livewire('project.show.side-details' , ['project' => $project])

    {{-- Left Side --}}
    <div class="flex flex-col gap-8 basis-3/4">
        {{-- Top --}}
        <div class="flex gap-8 basis-1/3">
            {{-- Right : Users --}}
            @livewire('project.show.users' , ['project_employees' => $project->employees , 'project' => $project])


            {{-- Left --}}
            <div class="flex flex-col gap-4 p-8 text-lg font-semibold capitalize bg-white rounded-lg basis-1/2 text-secondary-600">
                <div class="flex justify-between">
                    <div class="flex items-center gap-4">
                        <span class="w-3.5 h-3.5 bg-warning-400 border-2 border-white rounded-full"></span>
                        <span>currently no data</span>
                    </div>
                </div>
            </div>
        </div>

        {{-- Bottom --}}
        <div class="flex p-8 text-lg font-semibold capitalize bg-white rounded-lg basis-2/3 text-secondary-600">
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

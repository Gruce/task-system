<div x-data="{isMoving: false}" draggable="true" @dragstart="drag($event)" @dragend="dragend($event)" id="task-id-{{$task->id}}" x-cloak class="relative flex flex-col p-3 border-2 rounded-lg hover:bg-secondary-50 text-secondary-600">
    <div @click="() => {showModal=!showModal, $wire.emit('toggleModal', {{$task->id}})}" class="flex flex-col gap-2 cursor-pointer">
        <div class="flex justify-between w-full">
            <div class="flex flex-col">
                <div class="flex items-center gap-2">
                    <span class="font-semibold">{{$task->title}}</span>
                    <span>·</span>
                    <span class="text-xs text-secondary-500">{{$task->project->title}}</span>
                </div>
            </div>
        </div>
        <div class="flex items-center justify-between w-full">
            <span class="text-xs">{{$task->end_at}}</span>
            <div class="flex gap-2">
                <span class="bg-secondary-50 text-secondary-600 text-2xs font-semibold px-2.5 py-0.5 rounded uppercase">low</span>
                <span class="bg-primary-50 text-primary-600 text-2xs font-semibold px-2.5 py-0.5 rounded uppercase">medium</span>
                <span class="bg-error-50 text-error-600 text-2xs font-semibold px-2.5 py-0.5 rounded uppercase">high</span>
                <span class="bg-gray-600 text-gray-50 text-2xs font-semibold px-2.5 py-0.5 rounded uppercase">hold</span>
            </div>
        </div>
    </div>
</div>

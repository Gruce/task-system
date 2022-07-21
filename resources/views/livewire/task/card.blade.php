<div x-data="{isMoving: false , model:false}" draggable="true" @dragstart="drag($event)" @dragend="dragend($event)" id="task-id-{{$task->id}}" x-cloak class="relative group flex flex-col p-3 border-2 rounded-lg hover:bg-secondary-50 text-secondary-600">
    <div @click="() => {showModal=!showModal, $wire.emit('toggleModal', {{$task->id}})}" class="flex flex-col gap-2 cursor-pointer">
        <div class="flex justify-between w-full">
            <div class="flex flex-col">
                <div class="flex items-center gap-2">
                    <span class="font-semibold">{{$task->title}}</span>
                    <span>·</span>
                    <span class="text-xs text-secondary-500">{{$task->project->title}}</span>
                    @if(Request::route()->getName() == 'tasks')
                    <button @click.stop="add = true" class="" wire:click="$emit('duplicatTask' , {{$task}})">
                        <div class="px-2 py-1 duration-200  rounded-lg opacity-0 group-hover:opacity-100 hover:text-gray-500">
                            <i class="fa-solid fa-clone"></i>
                        </div>
                    </button>
                    @endif
                </div>
            </div>
        </div>
        <div class="flex items-center justify-between w-full">
            <span class="text-xs">{{$task->end_at}}</span>
            <div class="flex gap-2">
                @if($task->importance == 1)
                <span class="bg-secondary-50 text-secondary-600 text-2xs font-semibold px-2.5 py-0.5 rounded uppercase">{{ __('ui.importance_low') }}</span>
                @endif
                @if($task->importance == 2)
                <span class="bg-primary-50 text-primary-600 text-2xs font-semibold px-2.5 py-0.5 rounded uppercase">{{ __('ui.importance_medium') }}</span>
                @endif
                @if($task->importance == 3)
                <span class="bg-error-50 text-error-600 text-2xs font-semibold px-2.5 py-0.5 rounded uppercase">{{ __('ui.importance_high') }}</span>
                @endif
                <div>
                    @if($task->is_hold == 1)
                    <span class="bg-gray-600 text-gray-50 text-2xs font-semibold px-2.5 py-0.5 rounded uppercase">{{ __('ui.is_hold') }}</span>
                    @endif
                </div>
                <div>
                    @if($task->is_late)
                    <span class="bg-red-100 text-red-500 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded ">
                        <svg class="w-3 h-3 mx-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"></path>
                        </svg>
                        {{__('ui.late')}}
                    </span>
                    @endif
                </div>


            </div>
        </div>
    </div>


</div>

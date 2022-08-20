<div>

    <div class="flex flex-col gap-4  sm:flex-row">
        <div class="flex flex-col gap-2 bg-white rounded-lg basis-1/3">
            <div class="flex items-center gap-2 p-3 m-1 text-lg rounded-lg text-secondary-600 bg-secondary-50">
                <span class="w-3.5 h-3.5 bg-secondary-400 border-2 border-white rounded-full"></span>
                <span>{{__('ui.to_do')}}</span>
            </div>

            <div id="todo-1" class="flex flex-col gap-4 px-2 m-1 overflow-y-auto drag {{$project ? 'sm:h-minitasklist h-tasklist' : 'h-tasklist'}}" ondrop="drop(event)" ondragover="allowDrop(event)">
                @forelse ($tasks as $item )
                @if($item->state == 1)
                @livewire('task.card' , ['task' => $item] , key($item->id . "-" . now()))
                @endif
                @empty
                <div class="flex items-center justify-center">
                    <div class="text-center">
                        <h1 class="text-lg text-center text-gray-500">{{ __('ui.no_data') }}</h1>
                    </div>
                </div>
                @endforelse
            </div>
        </div>
        <div class="flex flex-col gap-2 bg-white rounded-lg basis-1/3">
            <div class="flex items-center gap-2 p-3 m-1 text-lg rounded-lg text-secondary-600 bg-secondary-50">
                <span class="w-3.5 h-3.5 bg-warning-400 border-2 border-white rounded-full"></span>
                <span>{{__('ui.in_progress')}}</span>
            </div>

            <div id="progress-2" class="flex flex-col gap-4 px-2 m-1 overflow-y-auto drag {{$project ? 'sm:h-minitasklist h-tasklist' : 'h-tasklist'}}" ondrop="drop(event)" ondragover="allowDrop(event)">
                @forelse ( $tasks as $item)
                @if($item->state == 2)
                @livewire('task.card', ['task'=>$item], key('task-id-' . $item->id))
                @endif
                @empty
                <div class="flex items-center justify-center">
                    <div class="text-center">
                        <h1 class="text-lg text-center text-gray-500">{{ __('ui.no_data') }}</h1>
                    </div>
                </div>
                @endforelse
            </div>

        </div>

        <div class="flex flex-col gap-2 bg-white rounded-lg basis-1/3">
            <div class="flex items-center gap-2 p-3 m-1 text-lg rounded-lg text-secondary-600 bg-secondary-50">
                <span class="w-3.5 h-3.5 bg-success-700 border-2 border-white rounded-full"></span>
                <span>{{__('ui.done')}}</span>
            </div>

            <div id="done-3" class="flex flex-col gap-4 px-2 m-1 overflow-y-auto drag {{$project ? 'sm:h-minitasklist h-tasklist' : 'h-tasklist'}}" ondrop="drop(event)" ondragover="allowDrop(event)">
                @forelse ($tasks as $item )
                @if($item->state == 3)
                @livewire('task.card', ['task'=>$item], key('task-id-' . $item->id))
                @endif
                @empty
                <div class="flex items-center justify-center">
                    <div class="text-center">
                        <h1 class="text-lg text-center text-gray-500">{{ __('ui.no_data') }}</h1>
                    </div>
                </div>
                @endforelse
            </div>
        </div>

    </div>
    <div class="grid gap-1 m-2 lg:grid-cols-1 sm:grid-cols-1 pt-3" dir="ltr">
        {{ $tasks->links() }}
    </div>

    <script>
        var dragID = null;

        function allowDrop(ev) {
            var dropID = ev.currentTarget.id;
            ev.preventDefault();
        }

        function drag(ev){
            ev.dataTransfer.setData("dragEventID", ev.currentTarget.id);
            dragID = ev.currentTarget.id;
            dragEl = document.getElementById(dragID)
            dragEl.classList.add("dragging");
        }

        function dragend(ev){
            dragEl = document.getElementById(dragID)
            dragEl.classList.remove("dragging");
        }

        function drop(ev, type) {
            ev.preventDefault();
            var dragID = ev.dataTransfer.getData("dragEventID");
            var dropID =  ev.currentTarget.id;
            var dropClass =  ev.currentTarget.getAttribute("class");

            let taskID = dragID.split('-');
            taskID = taskID[taskID.length - 1];

            let typeID = dropID.split('-');
            typeID = typeID[typeID.length - 1];

            // Task Drop Item
            if (dropClass.includes("drag")) {
                document.getElementById(dropID).appendChild(document.getElementById(dragID));
                Livewire.emit('taskMoved', {
                    type: typeID,
                    id: taskID,
                })
            }
        }
    </script>
</div>

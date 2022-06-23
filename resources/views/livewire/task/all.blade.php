<div>
    <div class="flex flex-row gap-4">
        <div class="flex flex-col gap-2 bg-white rounded-lg basis-1/3">
            <div class="flex items-center gap-2 p-3 m-1 text-lg rounded-lg text-secondary-600 bg-secondary-50">
                <span class="w-3.5 h-3.5 bg-secondary-400 border-2 border-white rounded-full"></span>
                <span>{{__('ui.to_do')}}</span>
            </div>

            <div class="flex flex-col gap-4 px-2 m-1 overflow-y-auto h-tasklist">
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

            <div class="flex flex-col gap-4 px-2 m-1 overflow-y-auto h-tasklist">
                @forelse ($tasks as $item )
                    @if($item->state == 2)
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
                <span class="w-3.5 h-3.5 bg-success-700 border-2 border-white rounded-full"></span>
                <span>{{__('ui.done')}}</span>
            </div>

            <div class="flex flex-col gap-4 px-2 m-1 overflow-y-auto h-tasklist">
                @forelse ($tasks as $item )
                    @if($item->state == 3)
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
    </div>
</div>

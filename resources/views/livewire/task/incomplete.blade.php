<div>
        <div class="p-2 flex flex-row mt-2 gap-8 bg-gray-50">
            <div class="basis-1/3   bg-gray-100 rounded-lg">

                <div class="flex flex-row justify-between m-3  rounded-lg p-2">
                    <div>
                        <h5 class="mr-3 text-black font-semibold text-xl">
                            {{__('ui.outstanding_tasks')}}
                        </h5>
                    </div>

                </div>
                <div class="flex flex-col  overflow-y-auto h-tasklist p-2 gap-4">
                    @forelse ($tasks as $item )
                    @if($item->state == 4)
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
            <div class="basis-1/3  bg-gray-100 rounded-lg">
                <div class="flex flex-row justify-between m-3  rounded-lg p-2">
                    <div>
                        <h5 class="mr-3 text-black font-semibold text-xl">
                            {{__('ui.late_tasks')}}
                        </h5>
                    </div>
                    {{-- <div>
                        <i class="fa-solid fa-plus text-l text-white"></i>
                    </div> --}}
                </div>
                <div class="flex flex-col  overflow-y-auto h-tasklist p-2 gap-4">
                    @forelse ($tasks as $item )
                    @if($item->state == 5)
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
            <div class="basis-1/3  bg-gray-100 rounded-lg">
                <div class="flex flex-row justify-between m-3  rounded-lg p-2">
                    <div>
                        <h5 class="mr-3 text-black font-semibold text-xl">
                            {{__('ui.rejected_tasks')}}
                        </h5>
                    </div>
                    {{-- <div>
                        <i class="fa-solid fa-plus text-l text-white"></i>
                    </div> --}}
                </div>
                <div class="flex flex-col  overflow-y-auto h-tasklist p-2 gap-4">
                    @forelse ($tasks as $item )
                    @if($item->state == 6)
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


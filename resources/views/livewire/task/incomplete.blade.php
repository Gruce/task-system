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
                    @if($state == 4)
                    @forelse ( $tasks as $item )
                    <div>@livewire('task.card', ['task'=>$item])</div>
                    @empty

                    @endforelse
                    @endif
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
                    @if($state == 5)
                    @forelse ( $tasks as $item )
                    <div>@livewire('task.card', ['task'=>$item])</div>
                    @empty

                    @endforelse
                    @endif
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
                    @if($state == 6)
                    @forelse ( $tasks as $item )
                    <div>@livewire('task.card', ['task'=>$item])</div>
                    @empty

                    @endforelse
                    @endif
                </div>
            </div>
        </div>
    </div>


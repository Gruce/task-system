<div>
        <div class="flex flex-row mt-2 gap-8 bg-gray-50">
            <div class="basis-1/3   bg-gray-100 rounded-lg">

                <div class="flex flex-row justify-between m-3 bg-stone-500 rounded-lg p-2">
                    <div>
                        <h5 class="mr-3 text-white">
                            المهام المعلقة
                        </h5>
                    </div>

                </div>
                <div class="flex flex-col  overflow-y-auto h-tasklist p-2 gap-4">
                    @forelse ( $tasks as $item )
                    <div>@livewire('task.card', ['task'=>$item])</div>
                    @empty

                    @endforelse
                </div>
            </div>
            <div class="basis-1/3  bg-gray-100 rounded-lg">
                <div class="flex flex-row justify-between m-3 bg-orange-800 rounded-lg p-2">
                    <div>
                        <h5 class="mr-3 text-white">
                            المهام المتأخرة
                        </h5>
                    </div>
                    {{-- <div>
                        <i class="fa-solid fa-plus text-l text-white"></i>
                    </div> --}}
                </div>
                <div class="flex flex-col  overflow-y-auto h-tasklist p-2 gap-4">
                    @forelse ( $tasks as $item )
                    <div>@livewire('task.card', ['task'=>$item])</div>
                    @empty

                    @endforelse
                </div>
            </div>
            <div class="basis-1/3  bg-gray-100 rounded-lg">
                <div class="flex flex-row justify-between m-3 bg-red-600 rounded-lg p-2">
                    <div>
                        <h5 class="mr-3 text-white">
                            المهام المرفوضة
                        </h5>
                    </div>
                    {{-- <div>
                        <i class="fa-solid fa-plus text-l text-white"></i>
                    </div> --}}
                </div>
                <div class="flex flex-col  overflow-y-auto h-tasklist p-2 gap-4">
                    @forelse ( $tasks as $item )
                    <div>@livewire('task.card', ['task'=>$item])</div>
                    @empty

                    @endforelse
                </div>
            </div>
        </div>
    </div>


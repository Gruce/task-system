
<div>
        <div class="p-2 bg-gray-50 rounded-lg dark:bg-gray-800" id="profile" role="tabpanel" aria-labelledby="profile-tab">
            <div class="flex flex-row  gap-8">
                <div class="basis-1/3  bg-gray-100 rounded-lg ">
                    <div class="flex flex-row justify-between m-3  rounded-lg p-2">
                        <div>
                            <h5 class="mr-3 text-black font-semibold text-xl ">
                                المهام
                            </h5>
                        </div>
                    </div>

                    <div class="flex flex-col  overflow-y-auto h-tasklist p-2 gap-4">
                        {{-- @for ($i = 0; $i < 10; $i++) <div>@livewire('task.card')</div>
                    @endfor --}}
                    @forelse ( $tasks as $item )
                    <div>@livewire('task.card', ['task'=>$item])</div>
                    @empty

                    @endforelse
                </div>
            </div>
            <div class="basis-1/3  bg-gray-100 rounded-lg">
                <div class="flex flex-row justify-between m-3 text-black font-semibold text-xl rounded-lg p-2">
                    <div>
                        <h5 class="mr-3 text-black font-semibold text-xl">
                            المهام قيد التنفيذ
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
                <div class="flex flex-row justify-between m-3 text-black font-semibold text-xl rounded-lg p-2">
                    <div>
                        <h5 class="mr-3 text-black font-semibold text-xl">
                            المهام المنتهية
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

</div>


</div>

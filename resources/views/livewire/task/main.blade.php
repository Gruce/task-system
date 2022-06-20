@section('title', __('ui.tasks'))
@section('header-actions')
    <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="myTab" data-tabs-toggle="#myTabContent" role="tablist">
        <li class="mr-2" role="presentation">
            <button class="inline-block p-4 text-blue-600 border-b-2 border-blue-600 rounded-t-lg hover:text-blue-600 dark:text-blue-500 dark:hover:text-blue-500 dark:border-blue-500" id="profile-tab" data-tabs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="true">اضافة مهمة</button>
        </li>
        <li class="mr-2" role="presentation">
            <button class="inline-block p-4 text-gray-500 border-b-2 border-transparent border-gray-100 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300 dark:border-transparent dark:text-gray-400 dark:border-gray-700" id="dashboard-tab" data-tabs-target="#dashboard" type="button" role="tab" aria-controls="dashboard" aria-selected="false">المهام الغير مكتملة</button>
        </li>
    </ul>
@endsection

<div>

    <div class="mb-4 border-b border-gray-200 dark:border-gray-700">
        <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="myTab" data-tabs-toggle="#myTabContent" role="tablist">
            <li class="mr-2" role="presentation">
                <button class="inline-block p-4 rounded-t-lg border-b-2 text-blue-600 hover:text-blue-600 dark:text-blue-500 dark:hover:text-blue-500 border-blue-600 dark:border-blue-500" id="profile-tab" data-tabs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="true">اضافة مهمة</button>
            </li>
            <li class="mr-2" role="presentation">
                <button class="inline-block p-4 rounded-t-lg border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300 dark:border-transparent text-gray-500 dark:text-gray-400 border-gray-100 dark:border-gray-700" id="dashboard-tab" data-tabs-target="#dashboard" type="button" role="tab" aria-controls="dashboard" aria-selected="false">المهام الغير مكتملة</button>
            </li>
        </ul>
    </div>

    @livewire('task.add')

    <div id="myTabContent">
        <div class="p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="profile" role="tabpanel" aria-labelledby="profile-tab">
            <div class="flex flex-row gap-8 mt-2">
                <div class="bg-gray-100 rounded-lg basis-1/3">
                    <div class="flex flex-row justify-between p-2 m-3 bg-indigo-600 rounded-lg">
                        <div>
                            <h5 class="mr-3 text-white">
                                المهام
                            </h5>
                        </div>
                        <div>
                            <i class="text-white fa-solid fa-plus text-l"></i>
                        </div>
                    </div>
                    <div class="flex flex-col gap-4 p-2 overflow-y-auto h-tasklist">
                        @for ($i = 0; $i < 10; $i++) <div>@livewire('task.card')</div>
                    @endfor
                </div>
            </div>
            <div class="bg-gray-100 rounded-lg basis-1/3">
                <div class="flex flex-row justify-between p-2 m-3 rounded-lg bg-amber-600">
                    <div>
                        <h5 class="mr-3 text-white">
                            المهام قيد التنفيذ
                        </h5>
                    </div>
                    {{-- <div>
                        <i class="text-white fa-solid fa-plus text-l"></i>
                    </div> --}}
                </div>
                <div class="flex flex-col gap-4 p-2 overflow-y-auto h-tasklist">
                    @for ($i = 0; $i < 10; $i++) <div>@livewire('task.card')</div>
                @endfor
            </div>
        </div>
        <div class="bg-gray-100 rounded-lg basis-1/3">
            <div class="flex flex-row justify-between p-2 m-3 bg-green-600 rounded-lg">
                <div>
                    <h5 class="mr-3 text-white">
                        المهام المنتهية
                    </h5>
                </div>
                {{-- <div>
                    <i class="text-white fa-solid fa-plus text-l"></i>
                </div> --}}
            </div>
            <div class="flex flex-col gap-4 p-2 overflow-y-auto h-tasklist">
                @for ($i = 0; $i < 10; $i++) <div>@livewire('task.card')</div>
            @endfor
        </div>
    </div>
</div>
</div>
<div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
    <div class="flex flex-row gap-8 mt-2">
        <div class="bg-gray-100 rounded-lg basis-1/3">

            <div class="flex flex-row justify-between p-2 m-3 rounded-lg bg-stone-500">
                <div>
                    <h5 class="mr-3 text-white">
                        المهام المعلقة
                    </h5>
                </div>
                <div>
                    <i class="text-white fa-solid fa-plus text-l"></i>
                </div>
            </div>
            <div class="flex flex-col gap-4 p-2 overflow-y-auto h-tasklist">
                @for ($i = 0; $i < 10; $i++) <div>@livewire('task.card')</div>
            @endfor
        </div>
    </div>
    <div class="bg-gray-100 rounded-lg basis-1/3">
        <div class="flex flex-row justify-between p-2 m-3 bg-orange-800 rounded-lg">
            <div>
                <h5 class="mr-3 text-white">
                    المهام المتأخرة
                </h5>
            </div>
            {{-- <div>
                <i class="text-white fa-solid fa-plus text-l"></i>
            </div> --}}
        </div>
        <div class="flex flex-col gap-4 p-2 overflow-y-auto h-tasklist">
            @for ($i = 0; $i < 10; $i++) <div>@livewire('task.card')</div>
        @endfor
    </div>
</div>
<div class="bg-gray-100 rounded-lg basis-1/3">
    <div class="flex flex-row justify-between p-2 m-3 bg-red-600 rounded-lg">
        <div>
            <h5 class="mr-3 text-white">
                المهام المرفوضة
            </h5>
        </div>
        {{-- <div>
            <i class="text-white fa-solid fa-plus text-l"></i>
        </div> --}}
    </div>
    <div class="flex flex-col gap-4 p-2 overflow-y-auto h-tasklist">
        @for ($i = 0; $i < 10; $i++) <div>@livewire('task.card')</div>
    @endfor
</div>

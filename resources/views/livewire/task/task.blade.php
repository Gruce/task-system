@section('title', __('ui.tasks'))
<div>

    <div class="flex flex-row gap-8 mt-5">
        <div class="basis-1/3 ">
            <div class="flex flex-row">
                <div>
                    <i class="text-xs fa-solid fa-circle"></i>
                </div>
                <div>
                    <h5 class="mr-3">
                         المهام
                    </h5>
                </div>
            </div>
            <div class="flex flex-col gap-4 p-2 overflow-y-auto h-tasklist">
                @for($i = 0; $i < 10; $i++)
                <div>@livewire('task.card')</div>
                @endfor
              </div>

        </div>
        <div class="basis-1/3">
            <div class="flex flex-row">
                <div>
                    <i class="text-xs fa-solid fa-circle"></i>
                </div>
                <div>
                    <h5 class="mr-3">
                         قيد الانجاز
                    </h5>
                </div>
            </div>
        </div>
        <div class="basis-1/3">
            <div class="flex flex-row">
                <div>
                    <i class="text-xs fa-solid fa-circle"></i>
                </div>
                <div>
                    <h5 class="mr-3">
                         اكتملت
                    </h5>
                </div>
            </div>
        </div>
    </div>
</div>

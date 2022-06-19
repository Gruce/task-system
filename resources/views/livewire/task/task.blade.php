@section('title', __('ui.tasks'))
<div>

    <div class="flex flex-row mt-5 gap-8">
        <div class="basis-1/3 ">
            <div class="flex flex-row">
                <div>
                    <i class="fa-solid fa-circle text-xs"></i>
                </div>
                <div>
                    <h5 class="mr-3">
                         المهام
                    </h5>
                </div>
            </div>
            <div class="flex flex-col  overflow-y-auto h-tasklist p-2 gap-4">
                @for($i = 0; $i < 10; $i++)
                <div>@livewire('task.card')</div>
                @endfor
              </div>

        </div>
        <div class="basis-1/3">
            <div class="flex flex-row">
                <div>
                    <i class="fa-solid fa-circle text-xs"></i>
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
                    <i class="fa-solid fa-circle text-xs"></i>
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

@section('header-actions')
@livewire('ui.tabs', ['tabs' => $tabs, 'selectedTab' => $selectedTab])
@endsection
@section('title', __('ui.tasks'))


<div x-cloak class="p-8" x-data="{ add: false }" x-init="add = false">
    <div class="flex items-center justify-between mb-4">
        <div>
            <button @click="add = !add" type="button" class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 shadow-lg shadow-blue-500/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 inline-flex items-center gap-4">
                <i class="ri-add-line"></i>
                {{__('ui.add_task')}}
            </button>
        </div>
        <div>
            Filteration
        </div>
    </div>

    <div class="my-4" x-show="add" x-transition>
        @livewire('task.add')
    </div>

    @if ($selectedTab == 0)
    @livewire('task.all')
        @elseif ($selectedTab == 1)
            @livewire('task.incomplete')
    @endif
</div>

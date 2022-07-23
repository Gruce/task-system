@section('header-actions')
@endsection
@section('title', __('ui.tasks'))


{{-- @if ($selectedTab == 0) --}}
<div x-cloak class="p-4 sm:p-8" x-data="{ add: false, showModal: false, archive: false }">

    <div class="flex items-center justify-between mb-4">

        <div>
            <button @click="add = !add" type="button" class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 shadow-lg shadow-blue-500/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 inline-flex items-center gap-4">
                <i class="ri-add-line"></i>
                {{ __('ui.add_task') }}
            </button>
        </div>
        <div>
            @livewire('ui.filter-tasks')
        </div>
    </div>

    <div class="my-4" x-show="add" x-transition>
        @livewire('task.add')
    </div>
    <div>
        <div x-show="!archive">
            @livewire('task.all')
        </div>

        <div x-show="archive">
            @livewire('task.archived')
        </div>
    </div>


    <!-- Dropdown menu -->



    @if ($taskID)
    @livewire('task.modal.view', ['task' => $taskID], key('taskModal-' . $taskID))
    @endif
</div>

@section('header-actions')
@endsection
@section('title', __('ui.tasks'))


{{-- @if ($selectedTab == 0) --}}
<div x-cloak class="p-4 sm:p-8" x-data="{ addTask: false, showModal: false, archive: false, deleteTask:false }">

    <div class="flex items-center justify-between mb-4">
        @admin
        <div>
            <button @click="addTask = !addTask" type="button" class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 shadow-lg shadow-blue-500/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 inline-flex items-center gap-4">
                <i class="ri-add-line"></i>
                {{ __('ui.add_task') }}
            </button>
        </div>
        @endadmin

        <div class="flex gap-2">
            @admin()
            <button x-show="!deleteTask" @click="deleteTask=!deleteTask" class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mb-2 inline-flex items-center gap-4">
                <i class="fa-solid fa-trash"></i>
                {{__('ui.delete')}}
            </button>
            <button x-show="deleteTask" @click="deleteTask =!deleteTask" class=" text-black font-medium rounded-lg text-2xl px-5 py-2.5 text-center mb-2 inline-flex items-center gap-4">
                <i class="fa-solid fa-house"></i>
            </button>
            @endadmin
            @livewire('ui.filter-tasks')

        </div>
    </div>
    @admin
    <div class="my-4" x-show="addTask" x-transition>
        @livewire('task.add')
    </div>
    @endadmin
    <div>
        <div x-show="!archive && !deleteTask">
            @livewire('task.all')
        </div>

        <div x-show="archive">
            @livewire('task.archived')
        </div>
        <div x-show="deleteTask">
            @livewire('task.delete')
        </div>
    </div>

    <!-- Dropdown menu -->

    @if ($taskID)
    @livewire('task.modal.view', ['task' => $taskID], key('taskModal-' . $taskID))
    @endif
</div>

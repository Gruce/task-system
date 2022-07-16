@section('header-actions')
@endsection
@section('title', __('ui.tasks'))


{{-- @if ($selectedTab == 0) --}}
    <div x-cloak class="p-4 sm:p-8" x-data="{ add: false, showModal: false }">
        <div class="flex flex-row justify-center">
            <div class="mb-4 border-b border-gray-200 dark:border-gray-700 ">
                <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="myTab" data-tabs-toggle="#myTabContent" role="tablist">
                    <li class="mr-2" role="presentation">
                        <button class="inline-block p-4 rounded-t-lg border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300 dark:border-transparent text-gray-500 dark:text-gray-400 border-gray-100 dark:border-gray-700" id="task-tab" data-tabs-target="#tasks" type="button" role="tab" aria-controls="tasks" aria-selected="true">{{__('ui.tasks')}}</button>
                    </li>
                    <li class="mr-2" role="presentation">
                        <button class="inline-block p-4 rounded-t-lg border-b-2 text-blue-600 hover:text-blue-600 dark:text-blue-500 dark:hover:text-blue-500 border-blue-600 dark:border-blue-500" id="profile-tab" data-tabs-target="#archive" type="button" role="tab" aria-controls="archive" aria-selected="false">{{__('ui.archive')}}</button>
                    </li>
                </ul>
            </div>
        </div>
        <div class="flex items-center justify-between mb-4">

            <div>
                <button @click="add = !add" type="button"
                    class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 shadow-lg shadow-blue-500/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 inline-flex items-center gap-4">
                    <i class="ri-add-line"></i>
                    {{ __('ui.add_task') }}
                </button>
            </div>
            <div>
                Filteration

                {{-- <a href="{{route('tasks.archive')}}">{{__('ui.archive')}}</a> --}}
            </div>
        </div>

        <div class="my-4" x-show="add" x-transition>
            @livewire('task.add')
        </div>
        <div  id="myTabContent" >
            <div  id="tasks" role="tabpanel" aria-labelledby="tasks-tab">
        @livewire('task.all')
            </div>
    {{-- @elseif ($selectedTab == 1) --}}
        <div id="archive" role="tabpanel" >
        @livewire('task.archived')
        </div>
        </div>


@if ($taskID)
    @livewire('task.modal.view', ['task' => $taskID], key('taskModal-' . $taskID))
@endif
</div>

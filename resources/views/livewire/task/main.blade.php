@section('header-actions')
@livewire('ui.tabs', ['tabs' => $tabs, 'selectedTab' => $selectedTab])
@endsection
@section('title', __('ui.tasks'))

<div>
    <button class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button" data-modal-toggle="defaultModal">
        Toggle modal
      </button>
    @livewire('task.add')
    @if ($selectedTab == 0)
        @livewire('task.all')
        @elseif ($selectedTab == 1)
            @livewire('task.incomplete')
    @endif

</div>


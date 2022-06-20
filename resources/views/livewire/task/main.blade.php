@section('header-actions')
@livewire('ui.tabs', ['tabs' => $tabs, 'selectedTab' => $selectedTab])
@endsection
@section('title', __('ui.tasks'))

<div>
    @if ($selectedTab == 0)
        @livewire('task.all')
        @elseif ($selectedTab == 1)
            @livewire('task.incomplete')
    @endif
</div>


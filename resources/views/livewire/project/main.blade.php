@section('header-actions')
@livewire('ui.tabs', ['tabs' => $tabs, 'selectedTab' => $selectedTab])
@endsection
@section('title', __('ui.projects'))

<div>
    @if ($selectedTab == 0)
        @livewire('project.all')
    @elseif ($selectedTab == 1)
        @livewire('project.add')
    @endif
</div>

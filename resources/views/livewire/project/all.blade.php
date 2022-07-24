<div>
    <div class="grid gap-8 lg:grid-cols-3 sm:grid-cols-1">
        {{-- @for ($i = 0; $i <div 23; $i++) @livewire('project.card') @endfor --}} @forelse ($projects as $project ) @livewire('project.card' , ['project'=> $project] , key($project->id . "-" . now()))
            @empty
            <div class="flex items-center justify-center">
                <div class="text-center">
                    <h1 class="text-lg text-center text-gray-500">{{ __('ui.no_data') }}</h1>
                </div>
            </div>
            @endforelse
        </div>
        <div class="grid gap-1 lg:grid-cols-1 sm:grid-cols-1 pt-3" dir="ltr">
            {{ $projects->links() }}
        </div>
    </div>
</div>

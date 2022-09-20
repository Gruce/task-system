<div>
    <div class="sm:p-3 p-2">
        <div :class="gridEmployee ? 'grid-cols-1':'grid lg:grid-cols-4'" class="sm:grid-cols-1 gap-8">
            @forelse ($employees as $employee )
            @livewire('employee.card' , ['employee' => $employee], key($employee->id . "-" . now()))
            @empty
            {{__('ui.no_data')}}
            @endforelse
        </div>
    </div>
    <div class=" pt-3" dir="ltr">
        {{ $employees->links() }}
    </div>
</div>

<div>
    <div class="sm:p-3 p-2">
        <div class="grid lg:grid-cols-4 sm:grid-cols-1 gap-4">
            @forelse ($employees as $employee )
            @livewire('employee.card' , ['employee' => $employee])
            @empty
            @endforelse
        </div>
    </div>
</div>

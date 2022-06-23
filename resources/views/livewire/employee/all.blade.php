<div>
    <div class="p-8">
        <div class="grid grid-cols-4 gap-4">
            @forelse ($employees as $employee )
            @livewire('employee.card' , ['employee' => $employee])
            @empty
            @endforelse
        </div>
    </div>
</div>

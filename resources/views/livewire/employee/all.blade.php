<div>
    <div class="p-8">
        <div class="grid grid-cols-4 gap-4">
            @for ($i = 0; $i < 10; $i++)
                @livewire('employee.card')
            @endfor
        </div>
    </div>
</div>

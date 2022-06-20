<div>
    <div class="p-8">

        <div class="grid grid-cols-4 grid-rows-3 gap-8">
            @for ($i = 0; $i < 23; $i++)
                @livewire('project.card')
            @endfor
        </div>

    </div>
</div>

<div>
    <div class="bg-white rounded-lg">
        <div class="grid grid-cols-4 gap-4 p-10">
            @forelse ($tasks as $task)
                @livewire('task.card', ['task' => $task], key('task-id-' . $task->id ))
            @empty
                <div class="flex items-center justify-center">
                    <div class="text-center">
                        <h1 class="text-lg text-center text-gray-500">{{ __('ui.no_data') }}</h1>
                    </div>
                </div>
            @endforelse
        </div>
    </div>
</div>

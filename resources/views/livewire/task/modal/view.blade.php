<div x-show="showModal" x-transition.opacity.duration.250ms class="fixed top-0 left-0 right-0 z-50 flex items-center justify-center w-full h-full overflow-x-hidden overflow-y-auto bg-black bg-opacity-50 md:inset-0" x-cloak x-data="{ selected: 0 }">
    <div class="relative w-full max-w-4xl p-4">
        <!-- Modal content -->
        <div class="relative bg-white border rounded-lg" wire:loading.class="bg-opacity-50" wire:target="task">
            <!-- Modal header -->
            <div class="flex justify-between p-4 border-b rounded-t">
                <span class="text-xl font-semibold text-secondary-700">
                    <i class="mx-2 fa-solid fa-list-check"></i>
                    {{-- {{$task->title}} - {{$task->project->title }} --}}
                    {{__('ui.task')}}
                </span>
                <button @click="showModal=!showModal" type="button" class="inline-flex items-center px-4 py-2 text-lg text-gray-400 bg-transparent rounded-lg hover:bg-gray-200 hover:text-gray-900 ">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <!-- Modal body -->
            <div class="flex gap-2 p-6">

                {{-- Options / Controllers --}}
                <div class="flex flex-col basis-1/4">
                    <div class="flex flex-col gap-6">

                        {{-- Group Items --}}
                        <div class="flex flex-col gap-1 text-sm">
                            {{-- Items --}}
                            <template x-for="(tab, index) in $wire.tabs" :key="index">
                                <span @click="selected = index" :class="selected == index ? 'bg-secondary-100 font-semibold' : 'bg-secondary-50'" class="flex items-center justify-between px-4 py-2 capitalize rounded cursor-pointer hover:bg-secondary-100 w-44 text-secondary-700">
                                    <span class="text-sm" x-text="tab[0]"></span>
                                    <i class="text-xs" :class="tab[2]"></i>
                                </span>
                            </template>
                        </div>

                        {{-- Group Items --}}
                        <div class="flex flex-col gap-1 text-sm">
                            {{-- Items --}}
                            <span class="flex items-center justify-between px-4 py-2 rounded cursor-pointer hover:bg-secondary-100 w-44 text-secondary-700 {{ true ? 'bg-secondary-100' : 'bg-secondary-50' }}">
                                <span class="text-sm">{{__('ui.archive')}}</span>
                                <i class="text-xs fa-solid fa-box-archive"></i>
                            </span>
                            <span>
                                <button wire:click="confirmed({{ $task->id }}, 'delete') " class="flex items-center justify-between px-4 py-2 rounded cursor-pointer hover:bg-error-100 w-44 text-secondary-700 bg-secondary-50 hover:text-error-600">
                                    <span class="text-sm">{{__('ui.delete')}}</span>
                                    <i class="fas fa-trash"></i>
                                </button>
                            </span>
                        </div>
                    </div>
                </div>



                {{-- Task Content --}}
                <div class="flex flex-col gap-4 basis-3/4">
                    @foreach ($tabs as $tab)
                    @livewire('task.modal.' . $tab[1], ['task' => $task], key('tab-' . $tab[0]))
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
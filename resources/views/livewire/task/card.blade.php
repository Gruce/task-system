<div x-cloak x-init="show = $wire.modal" x-data="{ show: false }" class="flex flex-col p-3 border rounded-lg hover:bg-secondary-50 text-secondary-600">
    <div @click="() => {show=!show, $wire.toggleModal()}" class="flex flex-col gap-2 cursor-pointer">
        <div class="flex justify-between w-full">
            <div class="flex flex-col">
                <div class="flex items-center gap-2">
                    <span class="font-semibold">{{$task->title}}</span>
                    <span>·</span>
                    <span class="text-xs text-secondary-500">{{$task->project->title}}</span>
                </div>
            </div>
            <div class="flex justify-end gap-2">
                <button class="px-1.5 py-0.5 text-xs font-semibold uppercase border rounded border-secondary-100 text-secondary-500 bg-secondary-50 hover:bg-secondary-100 hover:text-secondary-600 hover:border-secondary-200">
                    <span>Todo</span>
                </button>
                <button class="px-1.5 py-0.5 text-xs font-semibold uppercase border rounded text-warning-700 bg-warning-50 hover:bg-warning-100 hover:text-warning-800 border-warning-100 hover:border-warning-200">
                    <span>Progress</span>
                </button>
                <button class="px-1.5 py-0.5 text-xs font-semibold uppercase border rounded text-success-800 bg-success-50 hover:bg-success-100 hover:text-success-900 border-success-100 hover:border-success-200">
                    <span>Done</span>
                </button>
            </div>
        </div>
        <div class="flex items-center justify-between w-full">
            <span class="text-xs">{{$task->end_at}}</span>
            <div>
                <span class="bg-secondary-50 text-secondary-600 text-2xs font-semibold px-2.5 py-0.5 rounded uppercase">low</span>
                <span class="bg-primary-50 text-primary-600 text-2xs font-semibold px-2.5 py-0.5 rounded uppercase">medium</span>
                <span class="bg-error-50 text-error-600 text-2xs font-semibold px-2.5 py-0.5 rounded uppercase">high</span>
                <span class="bg-gray-600 text-gray-50 text-2xs font-semibold px-2.5 py-0.5 rounded uppercase">hold</span>
            </div>
        </div>
    </div>
    <!-- Main modal -->
    {{--
        Selections:
            0. Overview
            1. Files
            2. Comments
    --}}
    <div x-show="show" class="fixed top-0 left-0 right-0 z-50 flex items-center justify-center w-full h-full overflow-x-hidden overflow-y-auto bg-black bg-opacity-50 md:inset-0" x-cloak x-data="{ selected: 0 }">
        <div class="relative w-full max-w-4xl p-4">
            <!-- Modal content -->
            <div class="relative bg-white border rounded-lg">
                <!-- Modal header -->
                <div class="flex justify-between p-4 border-b rounded-t">
                    <h3 class="text-xl font-semibold text-secondary-700">
                        <i class="mx-2 fa-solid fa-list-check"></i>
                        {{-- {{$task->title}} - {{$task->project->title }} --}}
                        {{__('ui.task')}}
                    </h3>
                    <button @click="() => {show=!show, $wire.toggleModal()}" type="button" class="inline-flex items-center px-4 py-2 text-lg text-gray-400 bg-transparent rounded-lg hover:bg-gray-200 hover:text-gray-900 " data-modal-toggle="defaultModal">
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
                                    <span @click="selected = index" :class="selected == index ? 'bg-secondary-100 font-semibold' : 'bg-secondary-50'" class="flex items-center justify-between px-4 py-2 capitalize rounded cursor-pointer hover:bg-secondary-100 w-44">
                                        <span class="text-sm" x-text="tab[0]"></span>
                                        <i class="text-xs" :class="tab[2]"></i>
                                    </span>
                                </template>
                            </div>

                            {{-- Group Items --}}
                            <div class="flex flex-col gap-1 text-sm">
                                {{-- Items --}}
                                <span class="flex items-center justify-between px-4 py-2 rounded cursor-pointer hover:bg-secondary-100 w-44 {{ true ? 'bg-secondary-100' : 'bg-secondary-50' }}">
                                    <span class="text-sm">{{__('ui.archive')}}</span>
                                    <i class="text-xs fa-solid fa-box-archive"></i>
                                </span>
                                <span class="flex items-center justify-between px-4 py-2 rounded cursor-pointer hover:bg-error-100 w-44 bg-secondary-50 hover:text-error-600">
                                    <span class="text-sm">{{__('ui.delete')}}</span>
                                    <button wire:click="confirmed({{ $task->id }} , 'delete')" >
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
</div>

<div x-show="showModal" x-transition.opacity.duration.250ms class="fixed top-0 left-0 right-0 z-50 flex items-center justify-center w-full h-full overflow-x-hidden overflow-y-auto bg-black bg-opacity-50 md:inset-0" x-cloak x-data="{ selected: 0, tabs: false }">
    <div class="relative w-full max-w-4xl p-4">
        <!-- Modal content -->
        <div class="relative bg-white border rounded-lg">
            <!-- Modal header -->
            <div class="flex justify-between p-4 border-b rounded-t">
                <span class="flex items-center gap-1 text-xl font-semibold text-secondary-700">
                    <i class="mx-2 fa-solid fa-list-check"></i>
                    {{__('ui.task')}}
                    <div class="w-5 h-5" wire:loading>
                        <x-spinner />
                    </div>
                </span>
                <div class="flex">
                    <button @click="tabs=!tabs" type="button" class="inline-flex items-center px-4 py-2 text-lg text-gray-400 bg-transparent rounded-lg sm:hidden hover:bg-gray-200 hover:text-gray-900 ">
                        <i class="fas fa-bars"></i>
                    </button>
                    <button @click="showModal=!showModal" type="button" class="inline-flex items-center px-4 py-2 text-lg text-gray-400 bg-transparent rounded-lg hover:bg-gray-200 hover:text-gray-900 ">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <!-- Modal body -->
            <div class="flex flex-col gap-6 p-6 sm:flex-row">

                {{-- Options / Controllers --}}
                <div :class="tabs ? 'flex' : 'sm:flex hidden'" class="flex-col basis-1/4">
                    <div class="flex flex-col gap-6">

                        {{-- Group Items --}}
                        <div class="flex flex-col gap-1 text-sm">
                            {{-- Items --}}
                            <template x-for="(tab, index) in $wire.tabs" :key="index">
                                <span @click="selected = index; tabs = false" :class="selected == index ? 'bg-secondary-100 font-semibold' : 'bg-secondary-50'" class="flex items-center justify-between w-full px-4 py-2 capitalize rounded cursor-pointer hover:bg-secondary-100 sm:w-44 text-secondary-700">
                                    <span class="text-sm" x-text="tab[0]"></span>
                                    <i class="text-xs" :class="tab[2]"></i>
                                </span>
                            </template>
                        </div>

                        {{-- Group Items --}}
                        <div class="flex flex-col gap-1 text-sm">
                            {{-- Items --}}


                            {{-- Date --}}
                            <input wire:model.lazy="task.start_at" @admin() wire:click="edit" type="date" @endadmin class="sm:w-44 w-full bg-gray-100 border-0 text-secondary-700 text-sm rounded p-2.5">
                            <input wire:model.lazy="task.end_at" @admin() wire:click="edit" type="date" @endadmin class="sm:w-44 w-full bg-gray-100 border-0 text-secondary-700 text-sm rounded p-2.5">

                            {{-- State Drop Down --}}
                            <div class="relative w-full sm:w-44" x-data="{stateDropDown: false}">
                                <div x-show="stateDropDown" x-transition class="absolute left-0 flex flex-col justify-center w-full gap-1 p-1 bg-white bg-opacity-75 border rounded bottom-10">
                                    <div @click="stateDropDown = !stateDropDown" wire:click="state(1)" class="flex items-center justify-between px-4 py-2 rounded cursor-pointer bg-secondary-50 text-secondary-700">
                                        <span class="text-xs">{{__('ui.to_do')}}</span>
                                        <i class="text-2xs fa-solid fa-circle"></i>
                                    </div>
                                    <div @click="stateDropDown = !stateDropDown" wire:click="state(2)" class="flex items-center justify-between px-4 py-2 rounded cursor-pointer bg-warning-100 text-warning-800">
                                        <span class="text-xs">{{__('ui.in_progress')}}</span>
                                        <i class="text-2xs fa-solid fa-circle"></i>
                                    </div>
                                    <div @click="stateDropDown = !stateDropDown" wire:click="state(3)" class="flex items-center justify-between px-4 py-2 rounded cursor-pointer bg-success-100 text-success-900">
                                        <span class="text-xs">{{__('ui.done')}}</span>
                                        <i class="text-2xs fa-solid fa-circle"></i>
                                    </div>
                                </div>
                                <div @click="stateDropDown = !stateDropDown" class="flex items-center justify-between px-4 py-2 rounded cursor-pointer {{ $task->state == 1 ? 'bg-secondary-50 text-secondary-700' : ( $task->state == 2 ? 'bg-warning-100 text-warning-800' : 'bg-success-100 text-success-900') }}">
                                    {{-- Dropdown --}}
                                    <span class="text-sm">
                                        @if ($task->state == 1)
                                        {{__('ui.to_do')}}
                                        @elseif ($task->state == 2)
                                        {{__('ui.in_progress')}}
                                        @else
                                        {{__('ui.done')}}
                                        @endif
                                    </span>
                                    <i class="text-xs fa-solid fa-circle"></i>
                                </div>
                            </div>

                            {{-- Priority Drop Down --}}
                            <div class="relative w-full sm:w-44" x-data="{priorityDropDown: false}">
                                @admin()
                                <div x-show="priorityDropDown" x-transition class="absolute left-0 flex flex-col justify-center w-full gap-1 p-1 bg-white bg-opacity-75 border rounded bottom-10">
                                    <div @click="priorityDropDown = !priorityDropDown" wire:click="importance(1)" class="flex items-center justify-between px-4 py-2 rounded cursor-pointer bg-secondary-50 text-secondary-700">
                                        <span class="text-xs">{{__('ui.importance_low')}}</span>
                                        <i class="text-2xs fa-solid fa-circle"></i>
                                    </div>
                                    <div @click="priorityDropDown = !priorityDropDown" wire:click="importance(2)" class="flex items-center justify-between px-4 py-2 rounded cursor-pointer bg-primary-100 text-primary-800">
                                        <span class="text-xs">{{__('ui.importance_medium')}}</span>
                                        <i class="text-2xs fa-solid fa-circle"></i>
                                    </div>
                                    <div @click="priorityDropDown = !priorityDropDown" wire:click="importance(3)" class="flex items-center justify-between px-4 py-2 rounded cursor-pointer bg-error-100 text-error-900">
                                        <span class="text-xs">{{__('ui.importance_high')}}</span>
                                        <i class="text-2xs fa-solid fa-circle"></i>
                                    </div>
                                </div>
                                @endadmin
                                <div @if (is_admin()) @click="priorityDropDown = !priorityDropDown" @endif class="flex items-center justify-between px-4 py-2 rounded cursor-pointer {{ $task->importance == 1 ? 'bg-secondary-50 text-secondary-700' : ( $task->importance == 2 ? 'bg-primary-100 text-primary-800' : 'bg-error-100 text-error-900') }}">
                                    {{-- Dropdown --}}
                                    <span class="text-sm">
                                        @if ($task->importance == 1)
                                        {{__('ui.importance_low')}}
                                        @elseif ($task->importance == 2)
                                        {{__('ui.importance_medium')}}
                                        @else
                                        {{__('ui.importance_high')}}
                                        @endif
                                    </span>
                                    <i class="text-xs fa-solid fa-circle"></i>
                                </div>
                            </div>

                            {{-- Priority Drop Down --}}
                            <div class="relative w-full sm:w-44" x-data="{holdDropDown: false}">

                                <div x-show="holdDropDown" x-transition class="absolute left-0 flex flex-col justify-center w-full gap-1 p-1 bg-white bg-opacity-75 border rounded bottom-10">
                                    <div @click="holdDropDown = !holdDropDown" wire:click="is_hold(0)" class="flex items-center justify-between px-4 py-2 rounded cursor-pointer bg-secondary-50 text-secondary-700">
                                        <span class="text-xs">{{__('ui.is_not_hold')}}</span>
                                        <i class="text-2xs fa-solid fa-circle"></i>
                                    </div>
                                    <div @click="holdDropDown = !holdDropDown" wire:click="is_hold(1)" class="flex items-center justify-between px-4 py-2 rounded cursor-pointer bg-primary-100 text-black-800">
                                        <span class="text-xs">{{__('ui.is_hold')}}</span>
                                        <i class="text-2xs fa-solid fa-circle"></i>
                                    </div>
                                </div>

                                <div @click="holdDropDown = !holdDropDown" class="flex items-center justify-between px-4 py-2 rounded cursor-pointer {{ $task->is_hold == 0 ? 'bg-secondary-50 text-secondary-700' : ( $task->is_hold == 1 ? 'bg-primary-100 text-black-800' : 'bg-error-100 text-error-900') }}">
                                    {{-- Dropdown --}}
                                    <span class="text-sm">
                                        @if ($task->is_hold == 1)
                                        {{__('ui.is_hold')}}
                                        @elseif ($task->is_hold == 0)
                                        {{__('ui.is_not_hold')}}
                                        @endif
                                    </span>
                                    <i class="text-xs fa-solid fa-circle"></i>
                                </div>
                            </div>



                            {{-- Archive Button --}}
                            @admin()
                            <div wire:click="archive" class="flex items-center justify-between px-4 py-2 rounded cursor-pointer hover:bg-secondary-100 w-full sm:w-44 text-secondary-700 {{ $task->trashed() ? 'bg-secondary-100' : 'bg-secondary-50' }}">
                                <span class="text-sm">{{__('ui.archive')}}</span>
                                <i class="text-xs fa-solid fa-box-archive"></i>
                            </div>

                            {{-- Force Delete Button --}}
                            <div>
                                <button @click="showModal=!showModal" wire:click="confirmed({{ $task->id }}) " class="flex items-center justify-between w-full px-4 py-2 rounded cursor-pointer hover:bg-error-100 sm:w-44 text-secondary-700 bg-secondary-50 hover:text-error-600">
                                    <span class="text-sm">{{__('ui.delete')}}</span>
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                            @endadmin
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

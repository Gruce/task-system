<div>
    <div wire:loading.class="opacity-50" x-data="{name: false, dropdown: false}" @ class="cursor-pointer relative p-5 group bg-white border-t-[12px] border-x border-b border-x-transparent border-b-transparent rounded-lg transition-all duration-200 delay-100 ease-in-out border-x-secondary-500 border-b-secondary-500 shadow-xl shadow-secondary-100 border-secondary-500 border-2">
        <span class="absolute px-2 py-1 tracking-wider text-white uppercase duration-200 ease-in-out delay-100 border-2 border-transparent rounded-lg ransition-all left-5 text-2xs -top-2 bg-secondary-600 group-bg-500 group-border-secondary-500 group-text-secondary-100">
            {{$department->employees_count}}
        </span>
        <div class="flex flex-col">
            {{-- Do your work, then step back. --}}
            <div class="flex items-center justify-between mt-3">
                <div class="flex items-center gap-4 mb-3 text-secondary-600 group">
                    <h5 x-show="!name" class="text-xl font-bold tracking-tight text-secondary-700">
                        {{$department->name}}
                    </h5>
                    @admin()
                    <div class="flex items-center gap-4" @click.stop="" @click.outside="name = false">
                        <input wire:keydown.enter="edit_name" wire:model="department.name" type="text" x-show="name" class="block w-full p-2 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500" required>

                        <div class="px-2 py-1 duration-200 ease-in-out delay-100 rounded-lg opacity-0 group-hover:opacity-100 hover:text-secondary-800 bg-secondary-50">
                            <a @click="name = !name" x-show="!name" href="#"><i class="fas fa-pen"></i></a>
                            <a wire:click="edit_name" @click="name = !name" x-show="name" href="#"><i class="fas fa-check"></i></a>
                        </div>
                    </div>
                    @endadmin
                </div>
                @admin()
                <div class="relative">
                    <button @click.stop="dropdown = !dropdown" class="sm:inline-block text-gray-400 dark:text-gray-400 hover:bg-gray-200 dark:hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-1.5" type="button">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z">
                            </path>
                        </svg>
                    </button>

                    <div @click.outside="dropdown = false" @click.stop="" x-show="dropdown" class="absolute z-10 text-base list-none bg-white divide-y divide-gray-100 rounded shadow w-44 dark:bg-gray-700 {{ar() ? 'left-0' : 'right-0'}}">
                        <ul class="py-1">
                            <li>
                                <a wire:click="confirmed({{ $department->id }})" class="block px-4 py-2 text-sm text-red-600 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-black">
                                    {{__('ui.delete')}}
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                @endadmin
            </div>
        </div>
    </div>

</div>

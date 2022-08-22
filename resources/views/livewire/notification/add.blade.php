<div class="p-8 bg-white rounded-lg">
    <form wire:submit.prevent="add">
        <div class="flex  gap-10  ">
            {{-- Basic Inputs --}}
            <div class="flex flex-col gap-4 basis-3/4">
                <label class="block mb-2 text-sm font-medium text-gray-500">
                    {{ __('ui.basicinfo') }}
                </label>
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                        {{ __('ui.title') }}
                    </label>
                    <input wire:model.defer="notification.title" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder>
                    @error('notification.title')
                    <p class="text-red-500 text-s ">{{__('ui.this_field_is_required')}}</p>
                    @enderror
                </div>
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                        {{ __('ui.description') }}
                    </label>
                    <textarea wire:model.defer="notification.description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder></textarea>
                    @error('notification.description')
                    <p class="text-red-500 text-s ">{{__('ui.this_field_is_required')}}</p>
                    @enderror
                </div>
                <button type="submit" wire:loading.attr="disabled" class="text-white hover:bg-blue-700 bg-blue-600 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">
                    {{__('ui.send')}}
                </button>
            </div>

            <div class="flex flex-col w-full p-3 mr-6 ml-3  ">

                <div class="mb-3 flex items-center gap-4">
                    <span class=" w-3.5 h-3.5 bg-primary-400 border-2 border-white rounded-full"></span>
                    <span>{{__('ui.employees')}}</span>
                </div>

                {{-- search --}}
                <input wire:model="search" type="text" class=" mb-6 block w-full p-2 text-sm text-gray-900 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500" placeholder="{{__('ui.search_employees')}}">

                <div class="flex flex-col pl-2 overflow-y-auto py-1 h-48 ">

                    {{-- Addition --}}
                    <div class="flex flex-col gap-4  text-lg font-semibold capitalize pr-9 bg-white rounded-lg   text-secondary-600" x-data="{add:false}" x-cloak>
                        @forelse ($employees as $employee)
                        <div class="flex justify-between w-full px-4 py-2 rounded-lg hover:bg-secondary-50 text-secondary-500">
                            <div class="flex items-center gap-4">
                                <input wire:model="selected" type="checkbox" value="{{$employee->id}}" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <div class="flex flex-col">
                                    <span class="text-base font-normal text-secondary-700">
                                        {{$employee->name}}
                                    </span>
                                </div>
                            </div>
                        </div>
                        @empty
                        {{__('ui.no_data')}}
                        @endforelse
                    </div>
                </div>
                <button wire:click="select" wire:loading.attr="disabled" type="button" class="flex items-center p-3 text-sm
                    font-medium  text-{{$selectAll ? 'red':'blue'}}-600 bg-gray-50 border-t border-gray-200 dark:border-gray-600 hover:bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:text-red-500 hover:underline">
                    <i class="fa-solid fa-user-{{ $selectAll ? 'minus':'plus'}} mx-1 w-5 h-5"></i>
                    {{ $selectAll ? __('ui.unselect_all'): __('ui.select_all') }}
                </button>
            </div>
        </div>
    </form>
    <script>
        document.addEventListener('livewire:load', function () {

            // Run a callback when an event ("foo") is emitted from this component
            @this.on('play', () => {
                console.log('play');
                new Audio("{{url('/public/audio/not.mp3')}}").play();
            })
            })
    </script>
</div>

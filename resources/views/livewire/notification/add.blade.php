<div class="p-8 bg-white rounded-lg">
    <form wire:submit.prevent="add">
        <div class="flex gap-10">
            {{-- Basic Inputs --}}
            <div class="flex flex-col gap-4 basis-3/4">
                <label class="block mb-2 text-sm font-medium text-gray-500">
                    {{ __('ui.basicinfo') }}
                </label>
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                        {{ __('ui.title') }}
                    </label>
                    <input wire:model.defer="notification.title" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder required>
                </div>
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">
                        {{ __('ui.description') }}
                    </label>
                    <textarea wire:model.defer="notification.description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder></textarea>

                </div>
                <button type="submit" class="text-white hover:bg-blue-700 bg-blue-600 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">
                    {{__('ui.send')}}
                </button>
            </div>
            <div class="flex flex-col w-full gap-2 pl-2 overflow-y-auto h-projectfiles">
                {{-- Addition --}}
                <div class="flex flex-col gap-4 p-4 text-lg font-semibold capitalize bg-white rounded-lg sm:p-8 basis-1/2 text-secondary-600" x-data="{add:false}" x-cloak>
                    <div class="flex justify-between">
                        <div class="flex items-center gap-4">
                            <span class="w-3.5 h-3.5 bg-primary-400 border-2 border-white rounded-full"></span>
                            <span>{{__('ui.users')}}</span>
                        </div>
                    </div>
                    {{-- Loop Item Below --}}
                    <div class="flex items-center gap-2">
                        <input wire:model="selectAll" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <span class=" text-base  font-normal text-secondary-700">
                            {{__('ui.select_all')}}
                        </span>
                    </div>
                    @forelse ($employees as $employee)
                    <div class="flex justify-between w-full px-4 py-2 rounded-lg hover:bg-secondary-50 text-secondary-500">
                        <div class="flex items-center gap-4">
                            <input wire:model="selected" type="checkbox" value="{{$employee->id}}" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <img src="{{$employee->photo}}" class="w-10 h-10 rounded-lg" alt="Bordered avatar">
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
        </div>
    </form>
</div>

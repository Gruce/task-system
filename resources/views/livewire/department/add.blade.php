<div class="p-4 bg-white rounded-lg sm:p-8" x-init="@this.on('$refresh', ()=>{ setTimeout(()=>{ addDepartment = false;}, 400) })">
    <form wire:submit.prevent="add">
        <div class="flex flex-col gap-10 sm:flex-row">
            {{-- Basic Inputs --}}
            <div class="flex flex-col gap-4 sm:w-full">
                <label class="block mb-2 text-sm font-medium text-gray-500">
                    {{ __('ui.basicinfo') }}
                </label>
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                        {{ __('ui.name') }}
                    </label>
                    <input wire:model.defer="name" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder={{ __('ui.name') }}>
                    @error('name')
                    <p class="text-red-500 text-s ">{{ __('ui.this_field_is_required')}}</p>
                    @enderror
                </div>
                <button type="submit" class="text-white hover:bg-blue-700 bg-blue-600 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">
                    {{__('ui.add')}}
                </button>
            </div>

        </div>

    </form>

</div>

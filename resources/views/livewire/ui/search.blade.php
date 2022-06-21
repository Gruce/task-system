<div>
    <div class="py-4" wire:loading.class="opacity-50">
        <label for="search" class="sr-only">{{__('ui.search')}}</label>
        <div class="relative mt-1">
            <div class="absolute inset-y-0 flex items-center pointer-events-none {{ar() ? 'left-0 pl-3' : 'right-0 pr-3'}}">
                <svg class="w-5 h-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
                </svg>
            </div>
            <input wire:model="search" type="text" id="table-search" class="bg-gray-100 border-0 text-gray-500 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 {{ar() ? 'pl-10' : 'pr-10'}}" placeholder="{{__('ui.search')}}" />
        </div>
    </div>
</div>

@section('title', __('ui.projects'))

<div x-cloak class="p-4 sm:p-8" x-data="{ add: false , export: false}">
    <div class="flex items-center mb-4">
            <div class=" basis-[10%]">
                <button @click="add = !add" type="button" class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 shadow-lg shadow-blue-500/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 inline-flex items-center gap-4">
                    <i class="ri-add-line"></i>
                    {{__('ui.add')}}
                </button>
            </div>
            <div class=" basis-[10%]">
                <button  type="button" class="text-white bg-gradient-to-r from-gray-500 via-gray-600 to-gray-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-gray-300 shadow-lg shadow-gray-500/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 inline-flex items-center gap-4">
                    <i class="fa-solid fa-file-arrow-down"></i>
                    Export
                </button>
            </div>
        <div class="basis-[80%]">
            Filteration
        </div>
    </div>

    <div class="my-4" x-show="add" x-transition>
        @livewire('project.add')
    </div>

    @if ($selectedTab == 0)
        @livewire('project.all')
    {{-- @elseif ($selectedTab == 1) --}}
    @endif
</div>

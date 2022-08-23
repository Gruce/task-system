@section('title', __('ui.projects'))

<div x-cloak class="p-4 sm:p-8" x-data="{ addProject: false , export: false}">
    <div class="flex justify-between mb-4">
        @admin
        <div>
            <button @click="addProject = !addProject" type="button" class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 shadow-lg shadow-blue-500/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 inline-flex items-center gap-4">
                <i class="ri-add-line"></i>
                {{__('ui.add')}}
            </button>
        </div>
        @endadmin
        <div class="flex gap-2">
            @admin
            <button wire:click="export" class="text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mb-2 inline-flex items-center gap-4">
                <i class="fa-solid fa-file-excel"></i>
                {{__('ui.export')}}
            </button>
            @endadmin
            <div>
                @livewire('ui.filter-projects')
            </div>
        </div>

        {{-- <div class="basis-[80%]">
            Filteration
        </div> --}}
    </div>

    <div class="my-4" x-show="addProject" x-transition>
        @livewire('project.add')
    </div>

    @if ($selectedTab == 0)
    @livewire('project.all')
    {{-- @elseif ($selectedTab == 1) --}}
    @endif
</div>

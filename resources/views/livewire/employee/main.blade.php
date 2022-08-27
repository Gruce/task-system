<div>
    <div x-cloak class="p-4" x-data="{ addEmployee: false }">
        <div class="flex items-center justify-between mb-4">
            <div>
                <button @click="addEmployee = !addEmployee" type="button" class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 shadow-lg shadow-blue-500/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 inline-flex items-center gap-4">
                    <i class="ri-add-line"></i>
                    {{__('ui.add')}}
                </button>
            </div>
            <div>
                {{-- Filteration --}}
            </div>
        </div>

        <div class="my-4" x-show="addEmployee" x-transition>
            @livewire('employee.add')
        </div>

        @if ($selectedTab == 0)
        @livewire('employee.all')
        {{-- @elseif ($selectedTab == 1) --}}
        @endif
    </div>
</div>



{{-- <div class="shadow rounded p-4 border bg-white flex-1" style="height: 32rem;">
    <livewire:livewire-column-chart key="{{ $columnChartModel->reactiveKey() }}" :column-chart-model="$columnChartModel" />
</div> --}}

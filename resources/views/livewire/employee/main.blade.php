<div>

    <div x-cloak class="p-4" x-data="{ addEmployee: false, gridEmployee:false, deleteEmployee:false }">
        <div class="flex justify-between mb-4">
            <div>
                <button @click="addEmployee = !addEmployee" type="button" class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 shadow-lg shadow-blue-500/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 inline-flex items-center gap-4">
                    <i class="ri-add-line"></i>
                    {{__('ui.add')}}
                </button>
            </div>
            <div class="flex gap-4">
                <button @click="gridEmployee = ! gridEmployee" class="text-black font-medium rounded-lg text-2xl px-5 py-2.5 text-center mb-2 inline-flex items-center gap-4">
                    <i :class=" gridEmployee ?  'fa-solid fa-grip-vertical':'fa-solid fa-grip'"></i>
                </button>
                @admin()
                <button @click="deleteEmployee = !deleteEmployee" class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mb-2 inline-flex items-center gap-4">
                    <i class="fa-solid fa-trash"></i>
                    {{__('ui.delete')}}
                </button>
                @endadmin
                <div>
                    @livewire('ui.filter-employee')
                </div>
            </div>

        </div>

        <div class="my-4" x-show="addEmployee" x-transition>
            @livewire('employee.add')
        </div>

        <div x-show="deleteEmployee">
            @livewire('employee.delete')
        </div>
        <div x-show="!deleteEmployee">
            @livewire('employee.all')
        </div>


    </div>
</div>



{{-- <div class="shadow rounded p-4 border bg-white flex-1" style="height: 32rem;">
    <livewire:livewire-column-chart key="{{ $columnChartModel->reactiveKey() }}" :column-chart-model="$columnChartModel" />
</div> --}}

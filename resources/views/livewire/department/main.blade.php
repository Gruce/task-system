@section('title', __('ui.departments'))

<div x-cloak class="p-4 sm:p-8" x-data="{ addDepartment: false , export: false , gridDepartment:false } ">
    <div class="flex justify-between mb-4">
        @admin
        <div>
            <button @click="addDepartment = !addDepartment" type="button" class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 shadow-lg shadow-blue-500/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 inline-flex items-center gap-4">
                <i class="ri-add-line"></i>
                {{__('ui.add')}}
            </button>
        </div>
        @endadmin
        <div class="flex gap-2">
            <button @click="gridDepartment = ! gridDepartment" class=" text-black font-medium rounded-lg text-2xl px-5 py-2.5 text-center mb-2 inline-flex items-center gap-4">
                <i :class=" gridDepartment ?  'fa-solid fa-grip-vertical':'fa-solid fa-grip'"></i>
            </button>
        </div>

        {{-- <div class="basis-[80%]">
            Filteration
        </div> --}}
    </div>

    <div class="my-4" x-show="addDepartment" x-transition>
        @livewire('department.add')
    </div>

    @livewire('department.all')

</div>

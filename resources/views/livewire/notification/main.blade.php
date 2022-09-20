<div>
    <div x-cloak class="p-8" x-data="{ add: false,deleteNotification:false }">
        @admin
        <div class="flex items-center justify-between mb-4">
            <div>
                <button @click="add = !add" type="button" class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 shadow-lg shadow-blue-500/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 inline-flex items-center gap-4">
                    <i class="ri-add-line"></i>
                    {{__('ui.add')}}
                </button>
            </div>
            <div>
                <button x-show="!deleteNotification" @click="deleteNotification =!deleteNotification" class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mb-2 inline-flex items-center gap-4">
                    <i class="fa-solid fa-trash"></i>
                    {{__('ui.delete')}}
                </button>
                <button x-show="deleteNotification" @click="deleteNotification =!deleteNotification" class=" text-black font-medium rounded-lg text-2xl px-5 py-2.5 text-center mb-2 inline-flex items-center gap-4">
                    <i class="fa-solid fa-house"></i>
                </button>
            </div>
        </div>
        @endadmin
        <div class="my-4" x-show="add" x-transition>
            @livewire('notification.add')
        </div>

        <div x-show="deleteNotification">
            @livewire('notification.delete')
        </div>

        <div x-show="!deleteNotification">
            @livewire('notification.all')
        </div>
        {{-- @elseif ($selectedTab == 1) --}}

    </div>
</div>

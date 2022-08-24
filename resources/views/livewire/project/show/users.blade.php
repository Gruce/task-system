<div x-show="!expandComments" class="flex flex-col gap-4 p-4 text-lg font-semibold capitalize bg-white rounded-lg sm:p-8 basis-1/2 text-secondary-600" x-data="{add:false}" x-cloak>
    <div class="flex justify-between">
        <div class="flex items-center gap-4">
            <span class="w-3.5 h-3.5 bg-primary-400 border-2 border-white rounded-full"></span>
            <span>{{__('ui.users')}}</span>
        </div>
        <div>
            @admin()
            <button @click="add=!add" class="px-2 py-1 duration-150 ease-in delay-75 rounded-lg hover:text-secondary-800 hover:bg-secondary-100">
                <i class="fas fa-plus"></i>
            </button>
            @endadmin
        </div>
    </div>
    <div id="loadmoreuser" class="flex flex-col w-full gap-2 pl-2 overflow-y-auto text-sm h-44 sm:h-96">
        {{-- Addition --}}
        @admin()
        <div class="flex justify-between w-full px-4 py-2 rounded-lg text-secondary-500" x-show="add">
            <div class="flex w-full gap-2">
                {{-- <input wire:model="search" type="text" class="block w-full p-2 text-sm text-gray-900 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500" placeholder="{{__('ui.name')}}" required> --}}

                <select wire:model="userId" class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    <option value="" selected>{{__('ui.select_employee')}}</option>
                    @foreach ($employees as $employee)
                    <option value="{{$employee->id}}">{{$employee->name}}</option>
                    @endforeach
                </select>
                @if ($userId)
                <button wire:click="add" @click="add=!add" class="px-4 py-1 duration-150 ease-in-out delay-75 border rounded-lg hover:text-success-800 hover:bg-success-100">
                    <i class="fas fa-check"></i>
                </button>
                @endif

            </div>
        </div>
        @endadmin



        {{-- Loop Item Below --}}
        @forelse ($project_employees as $employee)
        <div class="flex justify-between w-full px-4 py-2 rounded-lg hover:bg-secondary-50 text-secondary-500">
            <div class="flex items-center gap-4">
                <img src="{{$employee->photo}}" class="w-10 h-10 rounded-lg" alt="Bordered avatar">
                <div class="flex flex-col">
                    <span class="text-base font-normal text-secondary-700">
                        {{$employee->name}}
                    </span>
                    <span class="text-xs font-normal text-secondary-400">
                        {{$employee->pivot->created_at->diffForHumans()}}
                    </span>
                </div>
            </div>
            <div class="flex gap-2">
                @admin()
                <button wire:click="confirmed({{ $employee->id }} , 'delete')" class="px-4 py-1 duration-150 ease-in-out delay-75 rounded-lg hover:text-error-600 hover:bg-error-100">
                    <i class="fas fa-trash"></i>
                </button>
                @endadmin
            </div>
        </div>
        @empty
        {{__('ui.no_data')}}
        @endforelse

    </div>

    {{-- <script type="text/javascript">
        let obj = document.getElementById("loadmoreuser");

        obj.onscroll = function (ev) {
            if ( obj.scrollTop === (obj.scrollHeight - obj.offsetHeight)){
                window.livewire.emit('load-more');
            }

        };
    </script> --}}
</div>

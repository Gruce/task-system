<div x-show="selected == 3" class="flex flex-col">
    <div class="flex items-center justify-between pb-2 mb-4 border-b-2 border-secondary-50 text-secondary-600">
        <h4 class="text-xl font-semibold capitalize">{{__('ui.users')}}</h4>
        <h4 class="text-sm capitalize"> {{$task_employees->count()}} {{__('ui.users')}}</h4>
    </div>
    <div class="flex flex-col w-full gap-2 overflow-y-auto text-sm">
        <div class="flex justify-between w-full rounded-lg text-secondary-500">
            <div class="flex w-full gap-2">
                <input wire:model="search" type="text" class="block w-full p-2 text-sm text-gray-900 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500" placeholder="{{__('ui.name')}}" required>
                @if ($search)
                    <select wire:model="userId" class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        <option value="" selected>{{__('ui.select_employee')}}</option>
                        @foreach ($employees as $employee)
                            <option value="{{$employee->id}}">{{$employee->name}}</option>
                        @endforeach
                    </select>
                    <button wire:click="add" @click="add=!add" class="px-4 py-1 duration-150 ease-in-out delay-75 border rounded-lg hover:text-success-800 hover:bg-success-100">
                        <i class="fas fa-check"></i>
                    </button>
                @endif
            </div>
        </div>

        {{-- Loop Item Below --}}
        @forelse ($task_employees as $employee)
        <div class="flex justify-between w-full px-4 py-2 rounded-lg hover:bg-secondary-50 text-secondary-500">
            <div class="flex items-center gap-4">
                <img class="w-10 h-10 rounded-lg" src="{{$employee->photo}}" alt="Bordered avatar">
                <div class="flex flex-col">
                    <span class="text-base font-normal text-secondary-700">
                        {{$employee->name}}
                    </span>
                    <span class="text-xs font-normal text-secondary-400">
                        {{-- {{$employee->pivot->created_at->diffForHumans()}} --}}
                    </span>
                </div>
            </div>
            <div class="flex gap-2">
                <button wire:click="confirmed({{ $employee->id }} , 'delete')" class="px-4 py-1 duration-150 ease-in-out delay-75 rounded-lg hover:text-error-600 hover:bg-error-100">
                    <i class="fas fa-trash"></i>
                </button>
            </div>
        </div>
        @empty
            <div class="flex items-center justify-center p-10 text-2xl rounded-lg bg-secondary-50 text-secondary-300">
                {{__('ui.no_data')}}
            </div>
        @endforelse
    </div>
</div>

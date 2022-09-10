<div wire:loading.class="opacity-50" @click="window.location.href = '{{route('employees.profile', $employee->id)}}'" x-data="{ dropdown: false}" class=" mb-4 cursor-pointer relative p-2 group bg-white border-t-[12px] border-x border-b border-x-transparent border-b-transparent rounded-lg transition-all duration-200 delay-100 ease-in-out hover:border-x-primary-400 hover:border-b-primary-400 hover:shadow-xl hover:shadow-primary-50 border-primary-400 hover:border-2">
    <span class="absolute px-2 py-1 tracking-wider text-white uppercase duration-200 ease-in-out delay-100 border-2 border-transparent rounded-lg ransition-all left-5 text-2xs -top-2 bg-primary-400 group-hover:bg-white group-hover:border-primary-400 group-hover:text-primary-600">
        {{$employee->department->name ??__('ui.no_data')}} - {{$employee->job ??__('ui.no_job')}}
    </span>
    <div class="flex flex-col">
        {{-- Do your work, then step back. --}}
        <div class="flex  justify-between mt-4 ">
            <div class="flex justify-start gap-4 mx-4">
                <div class="flex flex-col items-center ">
                    @if ($employee->photo)
                    <img class="mb-3 w-14 h-14 rounded-full " src="{{ asset($employee->photo) }}" alt="Bordered avatar">
                    @else
                    <img class="mb-3 w-14 h-14 rounded-full shadow" src="https://ccemdata.mcmaster.ca/media/avatars/default.png" alt="Bonnie image">
                    @endif
                </div>
                <div class="flex flex-col items-center   text-secondary-600 group">
                    <h5 class="text-xl font-bold tracking-tight text-secondary-700">
                        {{$employee->name}}
                    </h5>
                    <span class="text-sm text-gray-500 dark:text-gray-400"><a class="hover:text-gray-900 text-gray-400 " href="mailto: {{$employee->user->email}}">{{$employee->user->email}}</a>
                    </span>
                </div>
            </div>

            @admin()
            <div class="relative">
                <button @click.stop="dropdown = !dropdown" class="sm:inline-block text-gray-400 dark:text-gray-400 hover:bg-gray-200 dark:hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-1.5" type="button">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z">
                        </path>
                    </svg>
                </button>
                <div @click.outside="dropdown = false" @click.stop="" x-show="dropdown" class="absolute z-10 text-base list-none bg-white divide-y divide-gray-100 rounded shadow w-44 dark:bg-gray-700 {{ar() ? 'left-0' : 'right-0'}}">
                    <ul class="py-1">
                        <li>
                            <a wire:click="confirmed({{ $employee->id }} , 'delete')" class="block px-4 py-2 text-sm text-red-600 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-black">
                                {{__('ui.delete')}}
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            @endadmin
        </div>
        <div class="flex justify-between mt-2 text-sm text-center text-gray-500">
            <button @click.stop="" wire:click="state({{$employee->id}})" @class([ 'px-4 py-2 basis-1/3 flex items-center justify-center rounded-lg gap-2   hover:bg-gray-200 duration-150 ease-in delay-75' , 'border-r'=> en(),
                'border-l' => ar(),
                ]) class="">
                @if ($employee->state)
                <i class="fa-solid fa-user-check text-green-400"></i>
                @else
                <i class="fa-solid fa-user-large-slash text-red-400"></i>
                @endif
            </button>
            <div @class([ 'px-4 py-2 basis-1/3 flex items-center justify-center gap-2' , 'border-r'=> en(),
                'border-l' => ar(),
                ]) class="">
                <i class="fa-solid fa-diagram-project "></i>
                <span>{{$employee->projects_count}}</span>
            </div>
            <div @class(['px-4 py-2 basis-1/3 flex items-center justify-center gap-2']) class="">
                <i class="fa-solid fa-list-check"></i>
                <span>{{$employee->tasks_count}}</span>
            </div>
        </div>

    </div>
</div>

<div wire:loading.class="opacity-50" @click="window.location.href = '{{route('employees.profile', $employee->id)}}'""  class=" cursor-pointer relative p-2 group bg-white border-t-[12px] border-x border-b border-x-transparent border-b-transparent rounded-lg transition-all duration-200 delay-100 ease-in-out hover:border-x-primary-400 hover:border-b-primary-400 hover:shadow-xl hover:shadow-primary-50 border-primary-400 hover:border-2">
    <div class="p-3 text-right bg-white rounded-lg w-fulldark:bg-gray-800 dark:border-gray-700">
        <span class="absolute px-2 py-1 tracking-wider text-white uppercase duration-200 ease-in-out delay-100 border-2 border-transparent rounded-lg ransition-all left-5 text-2xs -top-2 bg-primary-400 group-hover:bg-white group-hover:border-primary-400 group-hover:text-primary-600">
            {{$employee->job ??__('ui.no_job')}}
        </span>
        <div class="max-w-sm bg-white rounded-lg  dark:bg-gray-800">
            <div @click.stop="" class="flex justify-end px-4 pt-4">
                <div class="px-2 py-1 duration-200 ease-in-out delay-100 rounded-lg opacity-0 group-hover:opacity-100 hover:text-red-900 bg-red-100">
                    <a wire:click="confirmed({{ $employee->id }} , 'delete')"><i class="fa-solid fa-trash text-red-500"></i></a>
                </div>
            </div>
            <div class="flex flex-col items-center pb-10">
                @if ($employee->photo)
                <img class="mb-3 w-24 h-24 rounded-full " src="{{ asset($employee->photo) }}" alt="Bordered avatar">
                @else
                <img class="mb-3 w-24 h-24 rounded-full shadow" src="https://ccemdata.mcmaster.ca/media/avatars/default.png" alt="Bonnie image">
                @endif
                <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white">{{$employee->name}}</h5>
                <span class="text-sm text-gray-500 dark:text-gray-400"><a class="hover:text-gray-900 dark:text-gray-400 dark:hover:text-white" href="mailto: {{$employee->user->email}}">{{$employee->user->email}}</a>
                </span>

            </div>
            <div class="flex justify-between mt-4 text-sm text-center text-gray-500">
                <button wire:click="state({{ $employee->id }}" @class([ 'px-4 py-2 basis-1/3 flex items-center justify-center rounded-lg gap-2 hover:text-secondary-800 hover:bg-green-200 duration-150 ease-in delay-75' , 'border-r'=> en(),
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
</div>

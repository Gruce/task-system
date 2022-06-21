@section('title', __('ui.projects'))

<div class="flex h-full gap-8">
    <div class="flex flex-col items-center gap-2 p-8 text-center bg-white rounded-lg basis-1/4">
        <div class="flex items-center gap-2">
            <span class="text-2xl font-bold text-secondary-600">{{ $project->title }}</span>
        </div>
        <p class="text-sm tracking-tighter text-secondary-500">
            {{ $project->description }}
        </p>
        
        {{-- <span class="px-2 py-1 text-xs rounded text-secondary-600 bg-secondary-100 w-fit">#{{ $project->id }}</span> --}}

        <div class="w-full mt-5">
            <div class="flex justify-between mb-1">
                <span class="text-xs font-medium text-secondary-500">45%</span>
                <span class="text-xs font-medium text-secondary-500">5/30 {{__('ui.completed_tasks')}}</span>
            </div>
            <div class="w-full bg-gray-200 rounded-full h-1.5">
                <div class="bg-secondary-600 h-1.5 rounded-full" style="width: 45%"></div>
            </div>
        </div>

        {{-- Files --}}
        <div class="relative w-full px-3 pt-5 pb-3 mt-5 border rounded-lg h-projectfiles">
            <span class="absolute px-2 text-xs bg-white -top-2 right-5 text-secondary-500">{{__('ui.files')}}</span>
            <div class="flex flex-col w-full gap-2 overflow-y-auto">
                {{-- Loop Item Below --}}
                @for ($i = 0; $i < 15; $i++)
                    <div class="flex justify-between w-full px-4 py-2 rounded-lg hover:bg-secondary-50 text-secondary-500">
                        <span>{{__('ui.file')}} 1</span>
                        <div class="flex gap-2">
                            <button class="px-2 py-1 duration-150 ease-in delay-75 rounded-lg hover:text-secondary-800 hover:bg-secondary-100">
                                <i class="fas fa-download"></i>
                            </button>
                            <button class="px-2 py-1 duration-150 ease-in-out delay-75 rounded-lg hover:text-error-600 hover:bg-error-100">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    </div>
                @endfor
            </div>
        </div>
    </div>
    <div class="basis-3/4">asd2</div>
</div>
 
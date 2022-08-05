@section('header-actions')
@endsection
@section('title', __('ui.home'))
@admin()
<div class="flex flex-col h-full m-5">
    <div class="flex flex-col lg:flex-row  gap-8 ">
        <div class="basis-1/4 ">
            <div class="p-4 bg-white rounded-xl  border-gray-200 shadow-md ">
                <div class="flex justify-between">
                    <div>
                        <i class="fa-2x fa-solid fa-diagram-project text-blue-500"></i>
                    </div>
                    <div>
                        <span class="text-xl font-medium text-secondary-400">{{ __('ui.projects_completed') }}</span>
                    </div>
                </div>
                <div class="flex flex-col items-center mt-4 pb-2">
                    <div class="flex items-baseline text-secondary-600">
                        <span class="text-5xl font-extrabold tracking-tight">{{ $projects_done_count }}</span>
                        <span class="ml-1 text-xl font-normal text-gray-400">/ {{$this->current}}</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="basis-1/4">
            <div class="p-4 bg-white rounded-lg border-gray-200 shadow-md ">
                <div class="flex justify-between">
                    <div>
                        <i class="fa-2x fa-solid fa-file-circle-exclamation text-red-400"></i>
                    </div>
                    <div>
                        <span class="text-xl font-medium text-secondary-400">{{ __('ui.projects_not_completed') }}</span>
                    </div>
                </div>
                <div class="flex flex-col items-center mt-4 pb-2">
                    <div class="flex items-baseline text-secondary-600">
                        <span class="text-5xl font-extrabold tracking-tight">{{ $projects_not_done_count }}</span>
                        <span class="ml-1 text-xl font-normal text-gray-400">/ {{$this->current}}</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="basis-1/4">
            <div class="p-4 bg-white rounded-lg  border-gray-200 shadow-md ">
                <div class="flex justify-between">
                    <div>
                        <i class="fa-2x fa-solid fa-list-check text-blue-500"></i>
                    </div>
                    <div>
                        <span class="text-xl font-medium text-secondary-400">{{ __('ui.tasks_completed') }}</span>
                    </div>

                </div>
                <div class="flex flex-col items-center mt-4 pb-2">
                    <div class="flex items-baseline text-secondary-600">
                        <span class="text-5xl font-extrabold tracking-tight">{{ $tasks_done_count }}</span>
                        <span class="ml-1 text-xl font-normal text-gray-400">/ {{$this->current}}</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="basis-1/4">
            <div class="p-4 bg-white rounded-lg border-gray-200 shadow-md ">
                <div class="flex justify-between">
                    <div>
                        <i class="fa-2x fa-solid fa-triangle-exclamation text-red-400"></i>
                    </div>
                    <div>
                        <span class="text-xl font-medium text-secondary-400">{{ __('ui.task_not_completed') }}</span>
                    </div>

                </div>
                <div class="flex flex-col items-center mt-4 pb-2">
                    <div class="flex items-baseline text-secondary-600">
                        <span class="text-5xl font-extrabold tracking-tight">{{ $tasks_in_progress_count }}</span>
                        <span class="ml-1 text-xl font-normal text-gray-400">/ {{$this->current}}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- End of row --}}
    <div class="flex flex-col lg:flex-row gap-8 mt-5">
        <div class="basis-1/4">
            <div class="flex flex-col gap-8">
                <div class="p-4 bg-white rounded-lg border-gray-200 shadow-md ">
                    <div class="flex justify-between">
                        <div>
                            <i class="fa-2x fa-solid fa-users text-blue-500"></i>
                        </div>
                        <div>
                            <span class="text-xl font-medium text-secondary-400">{{ __('ui.employees_active') }}</span>
                        </div>
                    </div>
                    <div class="flex flex-col items-center mt-4 pb-2">
                        <div class="flex items-baseline text-secondary-600">
                            <span class="text-5xl font-extrabold tracking-tight">{{$employees_active_count}}</span>
                            <span class="ml-1 text-xl font-normal text-gray-400"><i class="fa-solid fa-sort-up text-green-400"></i></span>
                        </div>
                    </div>
                </div>
                <div class="p-4 bg-white rounded-lg border-gray-200 shadow-md ">
                    <div class="flex justify-between">
                        <div>
                            <i class="fa-2x fa-solid fa-users-slash text-red-400"></i>
                        </div>
                        <div>
                            <span class="text-xl font-medium text-secondary-400">{{ __('ui.employees_not_active') }}</span>
                        </div>
                    </div>
                    <div class="flex flex-col items-center mt-4 pb-2">
                        <div class="flex items-baseline text-secondary-600">
                            <span class="text-5xl font-extrabold tracking-tight">{{$employees_disable_count}}</span>
                            <span class="ml-1 text-xl font-normal text-gray-400"><i class="fa-solid fa-sort-down text-red-400"></i></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- Right Side --}}
        <div class="basis-3/4">
            <div class="flex gap-4">
                <div class="w-full h-full bg-white rounded-lg  border-gray-200 shadow-md ">
                    <div class=" h-72">
                        <livewire:livewire-pie-chart key="{{ $this->pieChartModel->reactiveKey() }}" :pie-chart-model="$this->pieChartModel" />
                    </div>

                </div>
                <div class="w-full h-full bg-white rounded-lg  border-gray-200 shadow-md ">
                    <div class=" h-72">
                        <livewire:livewire-pie-chart key="{{ $this->projectChartModel->reactiveKey() }}" :pie-chart-model="$this->projectChartModel" />
                    </div>

                </div>
            </div>
        </div>

    </div>
    <div class="mt-5">
        <div class=" w-full bg-white rounded-lg  shadow-md sm:p-3 ">
            <div class="flex justify-between items-center gap-2 mb-4 p-3 text-lg rounded-lg text-secondary-600 bg-secondary-50">
                <h5>{{ __('ui.projects_in_progress') }}</h5>
                <a href="#" class="text-sm font-medium text-blue-600 hover:underline dark:text-blue-500">
                    View all
                </a>
            </div>
            <div class="flex flex-col gap-4 px-2 m-1 overflow-y-auto h-tasklist">
                @forelse ($projects as $item )
                <a href="{{route('projects.show' , ['id' => $item->id])}}">
                    <div class="flex flex-col gap-4 px-2 m-1  ">
                        <div class="relative flex flex-col p-3 border-2 rounded-lg hover:bg-secondary-50 text-secondary-600">
                            <div class="flex flex-col gap-2 cursor-pointer">
                                <div class="flex justify-between w-full">
                                    <div class="flex flex-col">
                                        <div class="flex items-center gap-2">
                                            <span class="font-semibold">{{$item->title}}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex items-center justify-between w-full">
                                    <span class="text-xs">{{date('Y-m-d' , $item->created_at)}}</span>
                                    <div class="flex flex-col gap-2 w-1/2 ">
                                        <div class="flex justify-between mb-1">
                                            <span class="text-xs font-medium text-secondary-500 ">{{$item->percentage_completed_tasks}}%</span>
                                        </div>
                                        <div class="w-full bg-gray-200 rounded-full h-1.5">
                                            <div class="bg-secondary-600 h-1.5 rounded-full" style="width: {{$item->percentage_completed_tasks}}%">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
                @empty
                <div class="flex flex-col gap-4 px-2 m-1">
                    {{ __('ui.no_projects_in_progress') }}
                </div>
                @endforelse
            </div>
        </div>
    </div>
</div>

@endadmin

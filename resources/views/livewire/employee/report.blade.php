<div>
    <div class="flex flex-col justify-center w-full">
        <div class="flex justify-center">
            <p class="text-2xl">{{__('ui.monthly_report')}}</p>
        </div>
        <div class="flex justify-center gap-2 mt-2">
            <img src="{{asset('images\logo.jpg')}}" alt="employee" class="w-10 h-10">
            <img src="{{asset('images\logo.jpg')}}" alt="employee" class="w-10 h-10">
            <img src="{{asset('images\logo.jpg')}}" alt="employee" class="w-10 h-10">
            <img src="{{asset('images\logo.jpg')}}" alt="employee" class="w-10 h-10">
        </div>

        <div class="flex justify-center gap-2 mt-2">
            <span>{{date('Y-m-d')}}</span>
        </div>
        <div class="flex justify-center gap-2 mt-2 w-full">
            <table class="w-full text-sm text-center text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th>
                            #
                        </th>
                        <th scope="col" class="py-3 px-6">
                            الاسم
                        </th>
                        <th scope="col" class="py-3 px-6">
                            المهام
                        </th>
                        <th scope="col" class="py-3 px-6">
                            المجموع
                        </th>
                        <th scope="col" class="py-3 px-6">
                            التقيم
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($employees as $index => $employee)
                    <tr class="bg-white dark:bg-gray-900 dark:border-gray-700">
                        <th class="py-4 px-6">
                            {{$index+1}}
                        </th>
                        <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{$employee->name}}
                        </th>
                        <td class="py-4 px-6">
                            @foreach ($employee->tasks as $task)
                            <span class="bg-gray-100 text-gray-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded-lg mr-2">
                                {{$task->title}}
                            </span>
                            @endforeach
                        </td>
                        <td class="py-4 px-6">
                            {{$employee->tasks->count()}}
                        </td>
                        @switch($employee->tasks->count())
                        @case($employee->tasks->count() ==0) <td class="py-4 px-6 bg-red-500 text-white">
                            <span class="font-semibold">
                                D
                            </span>
                        </td>
                        @break
                        @case($employee->tasks->count() >= 1 && $employee->tasks->count() <= 2) <td class="py-4 px-6 bg-red-500 text-white">
                            <span class="font-semibold">
                                D
                            </span>
                            </td>
                            @break
                            @case($employee->tasks->count() >= 3 && $employee->tasks->count() <= 4) <td class="py-4 px-6 bg-blue-500 text-white">
                                <span class="font-semibold">
                                    C
                                </span>
                                </td>
                                @break
                                @case($employee->tasks->count() >= 5 && $employee->tasks->count() <= 6) <td class="py-4 px-6 bg-yellow-400 text-black">
                                    <span class="font-semibold">
                                        B
                                    </span>
                                    </td>
                                    @break
                                    @case($employee->tasks->count() >=7)
                                    <td class="py-4 px-6 bg-green-600 text-black">
                                        <span class="font-semibold">
                                            A
                                        </span>
                                    </td>
                                    @break
                                    @default
                                    <span>
                                        no
                                    </span>
                                    @endswitch
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="h-72  m-8">
            <livewire:livewire-column-chart :column-chart-model="$this->columnChartModel" />
        </div>
    </div>
</div>

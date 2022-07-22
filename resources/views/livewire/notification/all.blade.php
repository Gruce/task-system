<div>

    <div class="p-6  bg-white rounded-lg border border-gray-200  dark:bg-gray-800 dark:border-gray-700">
        <div class="relative overflow-x-auto  sm:rounded-lg ">
            <table class="w-full text-sm  text-gray-500 dark:text-gray-400 text-center">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50  ">
                    <tr>
                        <th scope="col" class="px-6 py-3">

                        </th>
                        <th scope="col" class="px-6 py-3">
                            {{ __('ui.title') }}
                        </th>
                        <th scope="col" class="px-6 py-3">
                            {{ __('ui.description') }}
                        </th>
                        <th scope="col" class="px-6 py-3">
                            {{ __('ui.employees') }}
                        </th>
                        <th scope="col" class="px-6 py-3">
                            {{ __('ui.date') }}
                        </th>

                    </tr>
                </thead>
                <tbody>
                    @forelse ($notifications as $notification)
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600 ">
                        <th scope="row"
                            class="px-6 py-4 font-medium text-gray-400 dark:text-white whitespace-nowrap">
                            {{ $loop->iteration }}
                        </th>
                        <td scope="row"
                            class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                            {{ $notification->title }}
                        </td>
                        <td class="px-6 py-4">
                            {{$notification->description}}
                        </td>
                        {{-- show enployee in list --}}
                        <td class="px-6 py-4">
                            <button id="states-button" data-dropdown-toggle="dropdown-states" class="flex  inline-flex items-center py-2 px-3 text-sm font-medium text-center text-gray-500 bg-gray-100 border border-gray-300  hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:ring-gray-700 dark:text-white dark:border-gray-600" type="button">
                                <i class="fa-solid fa-angle-down"></i>
                            </button>
                            <div id="dropdown-states" class="hidden z-10  bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700">

                                <ul class=" overflow-y-auto h-40 py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="states-button">
                                    @foreach ($notification->employees as $employee)
                                    <li class="px-4 py-2">
                                        {{ $employee->name }}
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </td>


                        <td class="px-6 py-4">
                            @foreach($notification->employees as $employee)
                                <span class="inline-flex py-2 px-4  text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white">
                                    {{$employee->name}}
                                </span>
                            @endforeach
                        </td>

                        <td class="px-6 py-4">
                            {{ $notification->created_at->format('d/m/Y') }}
                        </td>
                    </tr>

                    @empty
                        <td colspan="5" class="text-center pt-4">
                            {{ __('ui.no_notifications') }}
                        </td>
                    @endforelse

                </tbody>
            </table>
        </div>
    </div>
</div>

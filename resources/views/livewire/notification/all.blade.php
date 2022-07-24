<div>

    {{-- <div class="p-6  bg-white rounded-lg border border-gray-200  dark:bg-gray-800 dark:border-gray-700">
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
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600 ">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-400 dark:text-white whitespace-nowrap">
                            {{ $loop->iteration }}
                        </th>
                        <td scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                            {{ $notification->title }}
                        </td>
                        <td class="px-6 py-4 w-48">
                            {{ substr($notification->description, 0, 50) }}

                        </td>
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
    </div> --}}
    <div class="grid lg:grid-cols-4 gap-6  md:grid-cols-2 sm:grid-cols-1">
        @forelse ($notifications as $notification)
        <div class="w-full" id="accordion-open" data-accordion="open">
            <h2 id="title-{{$notification->id}}">
                <button type="button" class="flex bg-white items-center justify-between w-full p-5 font-medium text-left text-gray-500 border border-b-0 border-gray-200 rounded-t-xl focus:ring-4 focus:ring-gray-200 hover:bg-gray-100" data-accordion-target="#title-body-{{$notification->id}}" aria-expanded="false" aria-controls="title-body-{{$notification->id}}">
                    <span class="flex items-center"> {{ $notification->title }}</span>
                    <svg data-accordion-icon class="w-6 h-6 rotate-180 shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>

                </button>

            </h2>
            <div id="title-body-{{$notification->id}}" class="hidden" aria-labelledby="title-{{$notification->id}}">
                <div class="p-5 font-light border border-b-0 bg-gray-50 border-gray-200">
                    <p class="mb-2 text-black ">{{ substr($notification->description, 0, 50) }}
                    </p>
                </div>
            </div>
            <h2 id="employee-{{$notification->id}}">
                <button type="button" class="flex items-center justify-between w-full p-5 font-medium text-left text-gray-500 border border-b-0 border-gray-200 focus:ring-4 hover:bg-gray-100
                    focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 bg-white" data-accordion-target="#employee-body-{{$notification->id}}" aria-expanded="false" aria-controls="employee-body-{{$notification->id}}">
                    <span class="flex items-center ">
                        {{__('ui.employees')}}
                    </span>
                    <svg data-accordion-icon class="w-6 h-6 shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
                </button>
            </h2>
            <div id="employee-body-{{$notification->id}}" class="overflow-x-auto  h-48 hidden" aria-labelledby="employee-{{$notification->id}}">
                <div class="p-5 font-light border border-b-0 bg-gray-50 border-gray-200">
                    @foreach ($notification->employees as $employee)
                    <span class="bg-gray-100 text-gray-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded-lg mr-2">
                        {{ $employee->name }}
                    </span>
                    @endforeach
                </div>
            </div>
            <button wire:click="confirmed({{ $notification->id }}, 'delete') " type="button" class=" items-center  w-full p-5 font-medium text-center rounded-b-lg hover:bg-red-100 text-red-500 border  border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 bg-white"   >
                    <span class=" items-center ">
                        <i class="fa-solid fa-trash"></i>
                    </span>
            </button>
        </div>
        @empty
        <div class="text-center pt-4">
            {{ __('ui.no_notifications') }}
        </div>
        @endforelse
    </div>

</div>

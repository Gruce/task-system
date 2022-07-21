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
                    @foreach ($notifications as $notification)
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
                        <td class="px-6 py-4">
                            {{$notification->employees->count()}}
                        </td>
                        <td class="px-6 py-4">
                            {{ $notification->created_at->format('d/m/Y') }}
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>

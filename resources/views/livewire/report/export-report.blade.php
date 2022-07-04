<div>

    <div class="bg-white w-full">

        <div class="flex w-full gap-2 p-4 items-center">
            <input type="text"
                class="block w-3/4 p-2 text-sm text-gray-900 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500"
                placeholder="Name of the project" required>
            {{-- @if ($search) --}}
            <select
                class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-1/2 ">
                <option value="" selected>all</option>

                <option value="">completed</option>
                <option value="">news</option>
                <option value="">late</option>
                <option value="">in prosesing</option>

            </select>

            <div class="relative w-full">
                <input type="date"
                    class="sm:w-44 w-full bg-gray-100 border-0 text-secondary-700 text-sm rounded-lg ">

            </div>
            <button type="button"
                class="w-1/4 text-white bg-red-600 hover:bg-red-700  focus:ring-4 focus:outline-none focus:ring-[#3b5998]/50 font-medium rounded-lg text-sm px-5 py-1.5 text-center inline-flex justify-center items-center">
                <i class="fa-solid fa-file-pdf"></i>
                <span class="ml-2">
                    Pdf
                </span>
            </button>

            <button type="button"
                class="w-1/4 text-white bg-green-600 hover:bg-green-700 focus:ring-4 focus:outline-none focus:ring-[#3b5998]/50 font-medium rounded-lg text-sm px-5 py-1.5 text-center inline-flex items-center justify-center">
                <i class="fa-solid fa-file-csv "></i>
                <span class="ml-2">
                    Excle
                </span>
            </button>
            {{-- @endif --}}
        </div>
        <div class="relative overflow-x-auto  sm:rounded-lg p-4">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Task
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Employee
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Importance
                        </th>
                        <th scope="col" class="px-6 py-3">
                            State
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Start Date
                        </th>
                        <th scope="col" class="px-6 py-3">
                            End Date
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row"
                            class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                            Apple MacBook Pro 17"
                        </th>
                        <td class="px-6 py-4">
                            Sliver
                        </td>
                        <td class="px-6 py-4">
                            Laptop
                        </td>
                        <td class="px-6 py-4">
                            Finsh
                        </td>
                        <td class="px-6 py-4">
                            2022-01-01
                        </td>
                        <td class="px-6 py-4">
                            2022-01-03
                        </td>
                    </tr>
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row"
                            class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                            Apple MacBook Pro 17"
                        </th>
                        <td class="px-6 py-4">
                            Sliver
                        </td>
                        <td class="px-6 py-4">
                            Laptop
                        </td>
                        <td class="px-6 py-4">
                            Finsh
                        </td>
                        <td class="px-6 py-4">
                            2022-01-01
                        </td>
                        <td class="px-6 py-4">
                            2022-01-03
                        </td>
                    </tr>
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row"
                            class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                            Apple MacBook Pro 17"
                        </th>
                        <td class="px-6 py-4">
                            Sliver
                        </td>
                        <td class="px-6 py-4">
                            Laptop
                        </td>
                        <td class="px-6 py-4">
                            Finsh
                        </td>
                        <td class="px-6 py-4">
                            2022-01-01
                        </td>
                        <td class="px-6 py-4">
                            2022-01-03
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

</div>

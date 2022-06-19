<div>
    @livewire('project.add')
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr class="text-center">
                    <th scope="col" class="px-6 py-3">
                        {{__('ui.title')}}
                    </th>
                    <th scope="col" class="px-6 py-3">
                        {{__('ui.description')}}
                    </th>
                    <th scope="col" class="px-6 py-3">
                        {{__('ui.task_count')}}
                    </th>
                    <th scope="col" class="px-6 py-3">
                        {{__('ui.file_count')}}
                    </th>
                    <th scope="col" class="px-6 py-3">
                        {{__('ui.settings')}}
                    </th>
                </tr>
            </thead>
            <tbody>
                @forelse ($projects as $item)
                <tr class="text-center bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                        {{$item->title}}
                    </th>
                    <td class="px-6 py-4">
                        {{$item->description}}
                    </td>
                    <td class="px-6 py-4">
                        {{$item->tasks_count}}
                    </td>
                    <td class="px-6 py-4">
                        {{$item->files_count}}
                    </td>
                    <td class="px-6 py-4">
                        <button class="mx-3">
                            <i class="ri-edit-2-fill text-blue-500"></i>
                        </button>
                        <button class="mx-3">
                            <i class="ri-task-fill text-green-600"></i>
                        </button>
                        <button class="mx-3" wire:click="confirmed({{ $item->id }} , 'delete')">
                            <i class="ri-delete-bin-6-fill text-red-700"></i>
                        </button>
                    </td>
                </tr>
                @empty
                <td class="px-6 py-4 text-center" colspan="5">
                    {{__('ui.no_data')}}
                </td>
                @endforelse

            </tbody>
        </table>
    </div>

</div>

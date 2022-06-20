<div>

    <form wire:submit.prevent="add" class="flex">
        <div class="mr-3 ml-3">
            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                {{ __('ui.task_name') }}
            </label>
            <input wire:model="title" type="text"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder={{ __('ui.task_name') }} required>
        </div>

        <div class="mr-3 ml-3">
            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                {{ __('ui.task_description') }}
            </label>
            <input wire:model="description" type="text"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder={{ __('ui.task_description') }} required>
        </div>

        <div class="mr-3 ml-3">
            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                {{ __('ui.task_importance') }}
            </label>
            <input wire:model="importance" type="text"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder={{ __('ui.task_importance') }} required>
        </div>

        <div class="mr-3 ml-3">
            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                {{ __('ui.start_at') }}
            </label>
            <input wire:model="start_at" type="date"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder={{ __('ui.start_at') }} required>
        </div>

        <div class="mr-3 ml-3">
            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                {{ __('ui.finish_at') }}
            </label>
            <input wire:model="end_at" type="date"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder={{ __('ui.finish_at') }} required>
        </div>

        <div class="mr-3 ml-3">
            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300" for="user_avatar">
                {{__('ui.upload_files')}}
            </label>
            <input  wire:model.defer="files"
                class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                aria-describedby="user_avatar_help" id="user_avatar" type="file" multiple>

        </div>

        <button type="submit"
            class="text-white mr-3 ml-3 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-1.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            {{__('ui.add')}}
        </button>
    </form>

</div>

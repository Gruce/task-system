<div class="p-8 bg-white rounded-lg">
    <form wire:submit.prevent="add">
        <div class="flex gap-10">
            {{-- Basic Inputs --}}
            <div class="flex flex-col gap-4 basis-3/4">
                <label class="block mb-2 text-sm font-medium text-gray-500">
                    {{ __('ui.basicinfo') }}
                </label>
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                        {{ __('ui.title') }}
                    </label>
                    <input wire:model.defer="project.title" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder={{ __('ui.project_title') }} required>
                </div>
                <div>

                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">
                        {{ __('ui.description') }}
                    </label>
                    <textarea wire:model.defer="project.description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder={{ __('ui.project_description') }}></textarea>

                </div>

                <button type="submit" class="text-white hover:bg-blue-700 bg-blue-600 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">
                    {{__('ui.add')}}
                </button>
            </div>

            {{-- Attachments --}}
            <div class="flex flex-col gap-4 basis-1/4">
                {{-- Label --}}
                <label class="flex items-center justify-between mb-2 text-sm font-medium text-gray-500">
                    <span>{{ __('ui.addattachments') }}</span>
                    @if (count($files) > 0)
                        <span class="text-xs text-secondary-400">{{ __('ui.file_count') }}: {{count($files)}} </span>
                    @endif
                </label>

                {{-- Input --}}
                <div class="relative flex items-center justify-center h-48 border-2 border-dotted rounded-lg bg-secondary-50 border-secondary-300">
                    <div class="absolute">
                        <div class="flex flex-col items-center cursor-pointer">
                            <div wire:loading wire:target="files">
                                <i class="mb-3 fas fa-spinner fa-spin fa-3x text-secondary-600"></i>
                            </div>
                            <div wire:loading.remove wire:target="files">
                                <i class="ri-upload-line ri-3x text-secondary-600"></i>
                            </div>
                            <span class="block font-normal text-secondary-600">{{__('ui.upload_files')}}</span>
                        </div>
                    </div>
                    <input wire:model="files" type="file" class="w-full h-full opacity-0 cursor-pointer" name="" multiple>
                </div>

                {{-- Preview --}}
                <div class="flex flex-col gap-2">
                    @foreach ($files as $key => $file)
                    <div class="flex items-center justify-between px-4 py-2 rounded-lg bg-secondary-50 text-secondary-500">
                        <span>{{__('ui.file') . ' ' . ($key+1)}}</span>
                        <button wire:click="removeFile({{$key}})" type="button" class="focus:outline-none text-error-600 hover:bg-error-100 focus:ring-4 focus:ring-error-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2">
                            <i class="fa-solid fa-trash"></i>
                        </button>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

    </form>

</div>

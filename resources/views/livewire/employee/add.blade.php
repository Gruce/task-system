<div class="p-8 bg-white rounded-lg">
    <form wire:submit.prevent="save">
        <div class="flex gap-10">
            {{-- Basic Inputs --}}
            <div class="flex flex-col gap-4 basis-3/4">
                <label class="block mb-2 text-sm font-medium text-gray-500">
                    {{ __('ui.basicinfo') }}
                </label>
                <div class="grid xl:grid-cols-2 xl:gap-6">
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                            {{ __('ui.name') }}
                        </label>
                        <input wire:model.defer="employee.user.name" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder={{ __('ui.name') }} required>
                    </div>
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                            {{ __('ui.email') }}
                        </label>
                        <input wire:model.defer="employee.user.email" type="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder={{ __('ui.email') }} required>
                    </div>
                </div>
                <div class="grid xl:grid-cols-2 xl:gap-6">
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                            {{ __('ui.password') }}
                        </label>
                        <input wire:model.defer="employee.user.password" type="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder={{ __('ui.password') }} required>
                    </div>
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                            {{ __('ui.phonenumber') }}
                        </label>
                        <input wire:model.defer="employee.user.phonenumber" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder={{ __('ui.phonenumber') }} required>
                    </div>
                </div>
                <div class="grid xl:grid-cols-2 xl:gap-6">
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                            {{ __('ui.job') }}
                        </label>
                        <input wire:model.defer="employee.job" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder={{ __('ui.job') }} required>
                    </div>
                    <div class="flex pl-4 mt-6">
                        <div class="grow">
                            <div class="relative flex items-center justify-center h-12 border-2 border-dotted rounded-lg bg-secondary-50 border-secondary-300">
                                <div class="absolute">
                                    <div class="flex flex-col items-center cursor-pointer">
                                        <span class="block font-normal text-secondary-600">{{__('ui.profile_photo')}}</span>
                                    </div>
                                </div>
                                <input wire:model="employee.user.profile_photo_path" type="file" class="w-full h-full opacity-0 cursor-pointer">
                            </div>
                        </div>
                        <div class="avatar self-end mx-2">
                            <div class="w-12 h-12 rounded-lg">
                                <div wire:loading.remove wire:target="employee.user.profile_photo_path">
                                    @if ($employee['user']['profile_photo_path'])
                                    <img src="{{ $employee['user']['profile_photo_path']->temporaryUrl() }}">
                                    @else
                                    <img class="rounded-lg" src="https://ccemdata.mcmaster.ca/media/avatars/default.png" />
                                    @endif
                                </div>
                                <div wire:loading wire:target="employee.user.profile_photo_path">
                                    <x-spinner />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex justify-center rounded-md shadow-sm gap-2 w-full" role="group">
                    <label class="@if ($employee['user']['gender'] == 2) text-rose-500 @else  text-gray-900 @endif basis-1/2 flex justify-center items-center py-2 px-4 text-sm font-medium  bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-rose-700 focus:text-rose-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-rose-500 dark:focus:text-white">
                        <span>
                            <i class="fas fa-2x fa-female"></i>
                        </span>
                        <input class="hidden" type="radio" name="gender" value="2" autocomplete="off" wire:model="employee.user.gender">
                    </label>
                    <label class="@if ($employee['user']['gender'] == 1) text-blue-500 @else text-gray-900 @endif basis-1/2 flex justify-center items-center py-2 px-4 text-sm font-medium  bg-white rounded-md border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
                        <span>
                            <i class="fas fa-2x fa-male"></i>
                        </span>
                        <input class="hidden" type="radio" name="gender" value="1" wire:model="employee.user.gender">
                    </label>
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

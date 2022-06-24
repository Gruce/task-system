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

            <div class="flex flex-col w-full gap-2 pl-2 overflow-y-auto h-projectfiles">
                {{-- Addition --}}

                    <div >
                        <div class="ml-8 mt-8">
                            <div x-data="{show: true}">
                              <a href="#" x-on:click.prevent="show = !show" class="relative z-10 border border-gray-600 rounded px-4 py-2 bg-white">
                                <span class="inline-block">Select Vehicle Type</span>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="stroke-current inline-block w-4 h-4 transform transition duration-150" x-bind:class="{ 'rotate-180': show }">
                                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                </svg>
                              </a>
                              <div x-show.transition="show" class="relative z-20 mt-1 flex w-64 flex-col px-4 py-3 whitespace-nowrap border border-gray-600 rounded bg-white overflow-auto h-40">
                                <div>
                                  <input type="checkbox" name="type[]" value="all" class="inline-block mr-2" />All vehicles
                                </div>
                                @for ($i=0;$i<20;$i++)
                                <div><input type="checkbox" name="type[]" value="4x4" class="inline-block mr-2 ml-2" />4x4</div>
                                @endfor
                              </div>
                            </div>
                          </div>
                    </div>

                {{-- Loop Item Below --}}
                @for ($i=0 ; $i<12;$i++)
                    <div class="flex justify-between w-full px-4 py-2 rounded-lg hover:bg-secondary-50 text-secondary-500">
                        <span>محمد حسن نعمه</span>
                        <div class="flex gap-1">

                            {{-- <button class="px-4 py-1 duration-150 ease-in delay-75 rounded-lg hover:text-secondary-800 hover:bg-secondary-100">
                                <i class="fas fa-download"></i>
                            </button> --}}
                            <button class="px-4 py-1 duration-150 ease-in-out delay-75 rounded-lg hover:text-error-600 hover:bg-error-100">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    </div>
                    @endfor
                </div>
            </div>
        </div>
    </form>
</div>

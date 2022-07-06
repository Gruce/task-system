<div x-data="{isMoving: false , model:false}" draggable="true" @dragstart="drag($event)" @dragend="dragend($event)" id="task-id-{{$task->id}}" x-cloak class="relative group flex flex-col p-3 border-2 rounded-lg hover:bg-secondary-50 text-secondary-600">
    <div @click="() => {showModal=!showModal, $wire.emit('toggleModal', {{$task->id}})}" class="flex flex-col gap-2 cursor-pointer">
        <div class="flex justify-between w-full">
            <div class="flex flex-col">
                <div class="flex items-center gap-2">
                    <span class="font-semibold">{{$task->title}}</span>
                    <span>·</span>
                    <span class="text-xs text-secondary-500">{{$task->project->title}}</span>
                    <button @click.stop="model = ! model" class="">
                        <div class="px-2 py-1 duration-200  rounded-lg opacity-0 group-hover:opacity-100 hover:text-gray-500">
                            <i class="fa-solid fa-clone"></i>
                        </div>
                    </button>
                </div>
            </div>
        </div>
        <div class="flex items-center justify-between w-full">
            <span class="text-xs">{{$task->end_at}}</span>
            <div class="flex gap-2">
                @if($task->importance == 1)
                <span class="bg-secondary-50 text-secondary-600 text-2xs font-semibold px-2.5 py-0.5 rounded uppercase">{{ __('ui.importance_low') }}</span>
                @endif
                @if($task->importance == 2)
                <span class="bg-primary-50 text-primary-600 text-2xs font-semibold px-2.5 py-0.5 rounded uppercase">{{ __('ui.importance_medium') }}</span>
                @endif
                @if($task->importance == 3)
                <span class="bg-error-50 text-error-600 text-2xs font-semibold px-2.5 py-0.5 rounded uppercase">{{ __('ui.importance_high') }}</span>
                @endif
                <span class="bg-gray-600 text-gray-50 text-2xs font-semibold px-2.5 py-0.5 rounded uppercase">hold</span>
            </div>
        </div>
    </div>
    <div x-show="model" x-transition tabindex="-1" aria-hidden="true" class="overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full">
        <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex justify-between items-start p-4 rounded-t border-b dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        Terms of Service
                    </h3>
                    <button @click="model = ! model" type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="defaultModal">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-6 space-y-6">
                    <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                        With less than a month to go before the European Union enacts new consumer privacy laws for its citizens, companies around the world are updating their terms of service agreements to comply.
                    </p>
                    <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                        The European Union’s General Data Protection Regulation (G.D.P.R.) goes into effect on May 25 and is meant to ensure a common set of data rights in the European Union. It requires organizations to notify users as soon as possible of high-risk data breaches that could personally affect them.
                    </p>
                </div>
                <!-- Modal footer -->
                <div class="flex items-center p-6 space-x-2 rounded-b border-t border-gray-200 dark:border-gray-600">
                    <button data-modal-toggle="defaultModal" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">I accept</button>
                    <button data-modal-toggle="defaultModal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Decline</button>
                </div>
            </div>
        </div>
    </div>

</div>

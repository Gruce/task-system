<div>
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

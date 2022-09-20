<div>
    <div class="flex flex-col w-full p-3 mr-6 ml-3  ">

        <div class="mb-3 flex justify-between gap-4 py-2 bg-white rounded-lg">
            <div class="mx-2 my-1">
                <span>{{__('ui.notifications')}}</span>
            </div>
            <div>
                @if ($selected)
                <button wire:click="confirmed" class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2 text-center mx-2  inline-flex items-center gap-4">
                    ({{count($selected)}}) {{__('ui.delete')}}
                </button>
                @endif
            </div>
        </div>
        {{-- search --}}
        <div class="flex flex-col pl-2 overflow-y-auto py-1 h-screen ">
            {{-- Addition --}}
            <div class="flex flex-col gap-4  text-lg font-semibold capitalize px-2 bg-white rounded-lg   text-secondary-600" x-data="{add:false}" x-cloak>
                <div class="flex items-center gap-4">
                    <button wire:click="select" type="button" class="flex items-center p-3 text-sm
                                font-medium  text-{{$selectAll ? 'red':'blue'}}-600    dark:text-red-500 hover:underline">
                        {{ $selectAll ? __('ui.unselect_all'): __('ui.select_all') }}
                    </button>
                </div>
                @forelse ($notifications as $notification)
                <div class="flex justify-between  w-full px-4 py-2 rounded-lg hover:bg-secondary-50 text-secondary-500">
                    <div class="flex items-center gap-4">
                        <input wire:model="selected" type="checkbox" value="{{$notification->id}}" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <div class="flex flex-col">
                            <span class="text-base font-normal text-black">
                                {{$notification->title}}
                            </span>
                        </div>
                    </div>
                </div>
                @empty
                {{__('ui.no_data')}}
                @endforelse
            </div>
        </div>


    </div>
</div>

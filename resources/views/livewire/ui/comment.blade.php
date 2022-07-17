<div class="relative p-3 mt-3 border rounded-lg group">
    <ol class="relative m-5 text-left border-blue-200">
        <li class="mb-10 border-blue-200 rounded-lg ">
            <form wire:submit.prevent="comment">
                <div class="relative">
                    <input wire:keydown.enter="comment" wire:model.defer="comment" type="text" id="default-text" class="block w-full p-2 pl-4 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="{{__('ui.Leave_a_comment')}}..." required>
                    <button type="submit" class="absolute inset-y-0 right-0 flex items-center pr-3">
                        <i class="fa-regular fa-comment"></i>
                    </button>
                </div>
            </form>
        </li>
        @forelse ($comments as $item)
        <li class="p-3 mb-3 ml-2 border border-blue-200 rounded-lg">
            {{-- <span class="absolute flex items-center justify-center w-4 h-4 mt-2 -left-2 ">
                <i class="fa-solid fa-user"></i>
            </span> --}}
            <span class="flex items-center text-lg font-semibold text-gray-500">
                {{ $item->user->name }}
                <time class="ml-2 font-normal leading-none text-gray-400 text-2xs">{{ $item->created_at->diffForHumans() }}</time>
            </span>
            <p class="text-base font-normal text-gray-900">{!! $item->body !!}</p>
        </li>
        @empty
        <div class="text-center text-gray-500">
            <span class="text-xl">{{__('ui.no_comment')}}</span>
        </div>
        @endforelse
    </ol>
    {{ $comments->links() }}
</div>

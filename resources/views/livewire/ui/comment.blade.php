<div wire:poll.750ms class="mt-3 relative border rounded-lg p-3 group">
    <ol class="relative  border-blue-200 text-left m-5">
        <li class="mb-10 rounded-lg border-blue-200 ">
            <form wire:submit.prevent="comment">
                <div class="relative">
                    <input wire:keydown.enter="comment" wire:model.defer="comment" type="text" id="default-text" class="block p-2 pl-4 w-full text-sm  text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="{{__('ui.Leave_a_comment')}}..." required>
                    <button type="submit" class="flex absolute inset-y-0 right-0 items-center pr-3">
                        <i class="fa-regular fa-comment"></i>
                    </button>
                </div>
            </form>
        </li>
        @forelse ($comments as $item)
        <li class="mb-3 ml-2 rounded-lg border-blue-200 border p-3">
            {{-- <span class="flex absolute -left-2 mt-2 justify-center items-center w-4 h-4 ">
                <i class="fa-solid fa-user"></i>
            </span> --}}
            <span class="flex items-center text-lg font-semibold text-gray-500">
                {{ $item->user->name }}
                <time class="ml-2 text-2xs font-normal leading-none text-gray-400">{{ $item->created_at->diffForHumans() }}</time>
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

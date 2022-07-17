<div x-show="selected == 2" class="flex flex-col gap-2">
    <div class="flex items-center justify-between pb-2 mb-4 border-b-2 border-secondary-50 text-secondary-600">
        <h4 class="text-xl font-semibold capitalize">{{__('ui.comments')}}</h4>
        <h4 class="text-sm capitalize"> {{$comments->count()}} {{__('ui.comment')}}</h4>
    </div>
    <div class="flex flex-col w-full gap-2 px-2 overflow-y-auto text-sm h-72">
        {{-- Loop Item Below --}}
        @forelse ($comments as $comment)
        <div class="flex flex-col justify-between w-full px-4 py-1 border-r-4 hover:bg-secondary-50 text-secondary-500">
            <div class="flex justify-between gap-4">
                <div class="w-24 text-sm font-normal break-all">
                    <x-markdown>
                        {{$comment->body}}
                    </x-markdown>
                </div>
                <div class="flex items-start gap-4">
                    <div class="flex flex-col items-end">
                        <span class="text-xs font-normal text-secondary-700">{{$comment->user->name}}</span>
                        <span class="font-normal text-2xs text-secondary-400">{{$comment->created_at->diffForHumans()}} </span>
                    </div>
                    <img class="rounded-lg w-7 h-7" src="{{$comment->user->profile_photo}}" alt="Bordered avatar">
                </div>

            </div>
        </div>
        @empty
        {{__('ui.no_comment')}}
        @endforelse


    </div>
    <div class="justify-self-end">
        <input wire:keydown.enter="add_comment" wire:model.defer="comment" type="text" class="block w-full p-2 text-sm text-gray-900 border border-gray-200 rounded-lg focus:ring-blue-500 focus:border-blue-500" placeholder="{{__('ui.comment')}}" required>
    </div>
</div>

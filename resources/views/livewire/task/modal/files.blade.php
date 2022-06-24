<div x-show="selected == 1" class="flex flex-col gap-2">
    <div class="relative flex items-center justify-center h-10 border rounded-lg hover:bg-secondary-50 border-secondary-100">
        <div class="absolute w-full px-4">
            <div class="flex items-center justify-between cursor-pointer">
                <span class="text-secondary-400">{{__('ui.upload_files')}}</span>

                <div wire:loading wire:target="files">
                    <i class="text-xl fas fa-spin fa-spinner text-secondary-600"></i>
                </div>
                <div wire:loading.remove wire:target="files">
                    <i class="text-xl ri-upload-line text-secondary-600"></i>
                </div>
            </div>
        </div>
        <input wire:model="files" type="file" class="w-full h-full opacity-0 cursor-pointer" name="" multiple>
    </div>
    {{-- <div class="flex justify-between w-full px-4 py-2 rounded-lg hover:bg-secondary-50 text-secondary-500">
        <span class="text-sm font-semibold">{{__('ui.file')}} 1</span>
        <div class="flex gap-2 text-sm">
            <a href="#" class="px-4 py-1 duration-150 ease-in delay-75 rounded-lg hover:text-secondary-800 hover:bg-secondary-100">
                <i class="fas fa-download"></i>
            </a>
            <button class="px-4 py-1 duration-150 ease-in-out delay-75 rounded-lg hover:text-error-600 hover:bg-error-100">
                <i class="fas fa-trash"></i>
            </button>
        </div>
    </div> --}}
    @forelse ($task->files as $key => $file)
    <div class="flex justify-between w-full px-4 py-2 rounded-lg hover:bg-secondary-50 text-secondary-500">
        <span>{{__('ui.file')}} {{$key + 1}}</span>
        <div class="flex gap-2">
            <a href="{{$file->file_path}}" download class="px-4 py-1 duration-150 ease-in delay-75 rounded-lg hover:text-secondary-800 hover:bg-secondary-100">
                <i class="fas fa-download"></i>
            </a>
            {{-- <button class="px-4 py-1 duration-150 ease-in delay-75 rounded-lg hover:text-secondary-800 hover:bg-secondary-100">
                <i class="fas fa-download"></i>
            </button> --}}
            <button wire:click="confirmed({{ $file->id }})" class="px-4 py-1 duration-150 ease-in-out delay-75 rounded-lg hover:text-error-600 hover:bg-error-100">
                <i class="fas fa-trash"></i>
            </button>
        </div>
    </div>
@empty
    {{__('ui.no_data')}}
@endforelse
</div>

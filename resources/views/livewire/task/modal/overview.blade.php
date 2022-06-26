<div x-show="selected == 0" class="flex flex-col gap-6">
    <div x-data="{ title: false, project: false }" class="flex items-center justify-between pb-2 border-b-2 border-secondary-50">
        <div @click.outside="title = false" class="flex items-center gap-4 cursor-pointer group text-secondary-600">
            <h4 @click="title=!title" x-show="!title" class="text-xl font-semibold capitalize">{{$task->title}}</h4>
            <a @click="title=!title" x-show="!title" href="#" class="invisible group-hover:visible"><i class="fas fa-pen"></i></a>
            <input wire:model="task.title" wire:keydown.enter="edit" x-show="title" type="text" class="block w-full p-2.5 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-primary-500 focus:border-primary-500" required>
            <button wire:click="edit" @click="title=!title" x-show="title" class="px-4 py-2.5 text-sm duration-150 ease-in-out delay-75 border rounded-lg hover:text-success-800 hover:bg-success-100">
                <i class="fas fa-check"></i>
            </button>
        </div>
        <div class="flex items-center gap-2 group text-secondary-600">
            <h4 @click="project=!project" x-show="!project" class="text-lg capitalize">{{$task->project->title}}</h4>
            <a @click="project=!project" x-show="!project" href="#" class="invisible group-hover:visible"><i class="fas fa-pen"></i></a>

            <input x-show="project" wire:model="search" type="text" class="block w-full p-2.5 text-sm text-gray-900 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500" placeholder="{{__('ui.project_title')}}" required>
            @if ($search)
                <select wire:model="task.project_id" class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    <option value="" selected>{{__('ui.select_project')}}</option>
                    @foreach ($projects as $project)
                        <option value="{{$project->id}}">{{$project->title}}</option>
                    @endforeach
                </select>
                <button wire:click="edit" @click="() => { project=!project, $wire.$set('search', {{null}}) }" class="px-4 py-2.5 duration-150 ease-in-out delay-75 border rounded-lg hover:text-success-800 hover:bg-success-100">
                    <i class="fas fa-check"></i>
                </button>
            @endif
        </div>
    </div>

    {{-- Description --}}
    <div @click.outside="description = false" x-data="{description: false}">
        <div x-show="!description" @click="description=!description" class="px-4 py-3 border rounded cursor-pointer hover:bg-secondary-50">
            <x-markdown>
                {{$task->description}}
            </x-markdown>


        </div>
        <textarea wire:model="task.description" wire:keydown.enter="edit"  x-show="description" id="message" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded border border-gray-300 focus:ring-primary-500 focus:border-primary-500" placeholder="{{__('ui.description')}}"></textarea>
    </div>
</div>

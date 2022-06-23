<div x-show="selected == 0" class="flex flex-col gap-6">
    <div x-data="{ title: false, project: false }" class="flex items-center justify-between pb-2 border-b-2 border-secondary-50">
        <div @click.outside="title = false" class="flex items-center gap-4 cursor-pointer group">
            <h4 @click="title=!title" x-show="!title" class="text-xl font-semibold">{{$task->title}}</h4>
            <a @click="title=!title" x-show="!title" href="#" class="invisible group-hover:visible"><i class="fas fa-pen"></i></a>
            <input x-show="title" type="text" class="block w-full p-1 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-primary-500 focus:border-primary-500" required>
        </div>
        <div @click.outside="project = false" class="flex items-center gap-4 cursor-pointer group">
            <h4 @click="project=!project" x-show="!project" class="text-sm font-semibold text-secondary-400">{{$task->project->title}}</h4>
            <a @click="project=!project" x-show="!project" href="#" class="invisible group-hover:visible"><i class="fas fa-pen"></i></a>
            <select x-show="project" class="block w-full px-4 py-1 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500">
                <option>United States</option>
                </select>
        </div>
    </div>
    {{-- Description --}}
    <div @click.outside="description = false" x-data="{description: false}">
        <div x-show="!description" @click="description=!description" class="px-4 py-3 border rounded cursor-pointer hover:bg-secondary-50">
            {{$task->description}}
        </div>
        <textarea x-show="description" id="message" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded border border-gray-300 focus:ring-primary-500 focus:border-primary-500" placeholder="Description"></textarea>
    </div>
</div>
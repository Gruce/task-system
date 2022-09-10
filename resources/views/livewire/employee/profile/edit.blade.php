<div>
    <div>
        <input wire:model.defer="name" type="text" class="mt-2 bg-gray-100 border-0 text-gray-500 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 pl-4 {{ar() ? 'pl-10' : 'pr-10'}}" placeholder={{ __('ui.name') }} required>
        @error('name')<span class="text-red-500">{{ $message }}</span> @enderror
    </div>
    <div>
        <input wire:model.defer="username" type="text" class="mt-2 bg-gray-100 border-0 text-gray-500 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 pl-4 {{ar() ? 'pl-10' : 'pr-10'}}" placeholder={{ __('ui.username') }} required>
        @error('username')<span class="text-red-500">{{ $message }}</span> @enderror
    </div>
    <hr class="my-2">
    <div class="flex mt-2">
        <div class="relative w-full">
            <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                <i class="fa-regular fa-at  text-gray-500 dark:text-gray-400"></i>
            </div>
            <input type="email" wire:model.defer="email" class="bg-gray-100 border-0 text-gray-500 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 pl-10 {{ar() ? 'pl-10' : 'pr-10'}}" placeholder="{{__('ui.email')}}">
            @error('email')<span class="text-red-500">{{ $message }}</span> @enderror
        </div>
    </div>
    <div class="flex mt-2">
        <div class="relative w-full">
            <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                <i class="fa-solid fa-phone  text-gray-400 dark:text-gray-400"></i>
            </div>
            <input type="number" wire:model.defer="phonenumber" class="bg-gray-100 border-0 text-gray-500 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 pl-10 {{ar() ? 'pl-10' : 'pr-10'}}" placeholder="{{__('ui.phonenumber')}}">
            @error('phonenumber')<span class="text-red-500">{{ $message }}</span> @enderror
        </div>
    </div>
    <div class="flex mt-2">
        <div class="relative w-full">
            <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                <i class="fa-solid fa-bullhorn  text-gray-400 dark:text-gray-400"></i>
            </div>
            <input type="text" wire:model.defer="job" class="bg-gray-100 border-0 text-gray-500 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 pl-10 {{ar() ? 'pl-10' : 'pr-10'}}" placeholder="{{__('ui.job')}}">
            @error('job')<span class="text-red-500">{{ $message }}</span> @enderror
        </div>
    </div>
    <div class="flex mt-2">
        <select wire:model.defer="department_id" id="departments" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <option value="" selected>{{__('ui.select_department')}}</option>
            @foreach ($departments as $department)
            <option value="{{$department->id}}">{{$department->name}}</option>
            @endforeach
        </select>
        @error('department_id')<span class="text-red-500">{{ $message }}</span> @enderror
    </div>
    <div class="flex mt-2">
        <div class="relative w-full">
            <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                <i class="fa-solid fa-key  text-gray-400 dark:text-gray-400"></i>
            </div>
            <input type="text" wire:model.defer="password" class="bg-gray-100 border-0 text-gray-500 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 pl-10 {{ar() ? 'pl-10' : 'pr-10'}}" placeholder="{{__('ui.new_password')}}">
            @error('password')<span class="text-red-500">{{ $message }}</span> @enderror
        </div>
    </div>
    <div class="flex mt-2">
        <div class="relative w-full">
            <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                <i class="fa-solid fa-key  text-gray-400 dark:text-gray-400"></i>
            </div>
            <input type="text" wire:model.defer="password_confirmation" class="bg-gray-100 border-0 text-gray-500 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 pl-10 {{ar() ? 'pl-10' : 'pr-10'}}" placeholder="{{__('ui.confirm_password')}}">
            @error('password_confirmation')<span class="text-red-500">{{ $message }}</span> @enderror
        </div>
    </div>
    <div class="flex justify-center rounded-md shadow-sm gap-2 w-full mt-2" role="group">
        <label class="@if ($gender == 2) text-red-500 @else  text-gray-900 @endif basis-1/2 flex justify-center items-center py-2 px-4 text-sm font-medium bg-white   rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-rose-700 focus:text-rose-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-rose-500 dark:focus:text-white">
            <span>
                <i class="fas fa-2x fa-female"></i>
            </span>
            <input class="hidden" type="radio" name="gender" value="2" wire:model.lazy="gender">
        </label>
        <label class="@if ($gender == 1) text-blue-500 @else text-gray-900 @endif basis-1/2 flex justify-center items-center py-2 px-4 text-sm font-medium bg-white  rounded-md border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
            <span>
                <i class="fas fa-2x fa-male"></i>
            </span>
            <input class="hidden" type="radio" name="gender" value="1" wire:model.lazy="gender">
        </label>
    </div>
    <div class="mt-4">
        <button wire:click="edit" type="button" class="text-white bg-blue-700  font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2">{{__('ui.save')}}</button>
        <button @click="edit = !edit" type="button" class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">{{__('ui.cancel')}}</button>
    </div>
</div>

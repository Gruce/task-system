<div>
    <div class="flex flex-row" x-data="{ name: false }">
        <div class="basis-1/4">
            <div class="flex flex-col items-center gap-2 p-8 text-center bg-white rounded-lg basis-1/4">
                <div class="flex items-center gap-2">
                    <div class="relative">
                        <img class="w-40 h-40 mb-3 rounded-full" src="{{ $employee->user->profile_photo }}" alt="">
                        <button wire:click="state({{$employee->id}})">
                            @if($employee->state)
                            <i class="fa-solid fa-lock-open top-0 left-13 absolute text-green-700"></i>
                            @else
                            <i class="fa-solid fa-lock top-0 left-13 absolute text-red-400"></i>
                            @endif
                        </button>
                        <div class="relative">
                            <div class="image-upload  ">
                                <label for="file-input">
                                    <i class="fa-solid fa-camera inline-flex items-center justify-center  mr-2 text-pink-100 transition-colors  duration-150 bg-black rounded-full focus:shadow-outline   text-lg bottom-8 left-7 absolute  w-6.9 h-6.7 p-0.5 hover:text-white"></i>
                                </label>
                                <input wire:model="photo" id="file-input" type="file" onchange="previewFile(this);" style="display: none;" />
                            </div>
                        </div>
                    </div>

                </div>
                <span class="text-2xl font-bold text-secondary-600">
                    {{ $employee->name }}
                </span>
                <p class="text-sm tracking-tighter text-secondary-500">
                    username
                </p>
                <button type="button" class="w-full flex justify-center text-secondary-600 bg-white hover:bg-gray-100 border border-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-2.5 text-center  items-center    mr-2 mb-2">
                    <i class="fa-solid fa-pen-to-square mx-2"></i>
                    <span>Edit Profile</span>
                </button>
                <div class="w-full flex justify-start">
                    <div>
                        <i class="fa-regular fa-at mx-2"></i>
                        <span class="text-sm tracking-tighter text-secondary-500">
                            {{ $employee->user->email }}
                        </span>
                    </div>
                </div>
                <div class="w-full flex justify-start">
                    <div>
                        <i class="fa-solid fa-phone mx-2"></i>
                        <span class="text-sm tracking-tighter text-secondary-500">
                            {{ $employee->phonenumber ??'No Phone Number' }}
                        </span>
                    </div>
                </div>
                <div class="w-full flex justify-start">
                    <div>
                        <i class="fa-solid fa-mars-and-venus mx-2"></i>
                        <span class="text-sm tracking-tighter text-secondary-500">
                            {{ $employee->user->gender == 1 ? __('male') : __('ui.female') }}
                        </span>
                    </div>
                </div>



                {{-- <div class="relative w-full px-3 pt-5 pb-3 mt-5 border rounded-lg">
                    <div class="absolute left-0 flex justify-between w-full -top-2 ">
                        <span class="px-2 mx-4 text-xs capitalize bg-white text-secondary-500"></span>
                        <span class="px-2 mx-4 text-xs bg-white text-secondary-500">شسي</span>
                    </div>

                    <div class="flex flex-col w-full gap-2 pl-2 overflow-y-auto h-projectfiles">




                    </div>
                </div> --}}
            </div>


        </div>
        <div class="basis-3/4 ml-5 mr-5">
            <div class="flex flex-col">
                <div class="flex flex-row justify-between">
                    <div class="p-4 ml-3 w-full bg-white rounded-lg sm:p-8 dark:bg-gray-800 dark:border-gray-700">
                        <div class="flex flex-col">
                            <div class="flex flex-row items-center  mb-8">
                                <i class="fa-solid fa-list-check mr-2 ml-2  text-secondary-500 "></i>
                                <h3 class="text-sm text-secondary-500 font-semibold">
                                    مهمة قيد التنفيذ
                                </h3>
                            </div>
                            <div class="flex justify-between mb-1">
                                <span class="text-xs font-medium text-secondary-500">234234%</span>
                                <span class="text-xs font-medium text-secondary-500">545</span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-1.5">
                                <div class="bg-secondary-600 h-1.5 rounded-full" style="width: 23%"></div>
                            </div>
                        </div>
                    </div>
                    <div class="p-4 ml-3 w-full bg-white rounded-lg sm:p-8 dark:bg-gray-800 dark:border-gray-700">
                        <div class="flex flex-row justify-around items-center">
                            <div class="flex flex-col">
                                <div class="flex items-center">
                                    <i class="fa-solid fa-calendar-check p-3 text-green-400"></i>
                                    <h3 class="text-sm text-green-400 font-semibold">
                                        المهام المكتملة
                                    </h3>
                                </div>
                            </div>
                            <div class="flex items-center">
                                <i class="fa-solid fa-calendar-xmark p-2 text-red-400"></i>
                                <h3 class="text-sm text-red-400 font-semibold">
                                    المهام الغير مكتملة
                                </h3>
                            </div>
                        </div>
                        <div class="flex justify-between mt-4 text-sm text-center text-gray-500">
                            <div @class([ 'px- py-2 basis-1/2 flex items-center  justify-center gap-2' , 'border-r'=> en(),
                                'border-l' => ar(),
                                ]) class="">
                                <span class="text-2xl">45</span>
                            </div>

                            <div @class(['px-4 py-2 basis-1/2 flex items-center justify-center gap-2']) class="">
                                <span class="text-2xl">45</span>
                            </div>
                        </div>
                    </div>
                    <div class="p-4 ml-3 w-full bg-white rounded-lg sm:p-8 dark:bg-gray-800 dark:border-gray-700">
                        asdas
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

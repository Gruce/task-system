<div class="p-8 bg-white rounded-lg">
    <form wire:submit.prevent="add" >
        <div class="flex gap-10">
            {{-- Basic Inputs --}}
            <div class="flex flex-col gap-4 basis-3/4">
                <label class="block mb-2 text-sm font-medium text-gray-500">
                    {{ __('ui.basicinfo') }}
                </label>
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                        {{ __('ui.title') }}
                    </label>
                    <input wire:model.defer="notification.title" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder required>
                </div>
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">
                        {{ __('ui.description') }}
                    </label>
                    <textarea wire:model.defer="notification.description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder></textarea>

                </div>
                <button type="submit" class="text-white hover:bg-blue-700 bg-blue-600 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">
                    {{__('ui.add')}}
                </button>
            </div>

            <div class="flex flex-col w-full gap-2 pl-2 overflow-y-auto h-projectfiles">
                {{-- Addition --}}
                <div  class="flex flex-col gap-4 p-4 text-lg font-semibold capitalize bg-white rounded-lg sm:p-8 basis-1/2 text-secondary-600"  x-data="{add:false}" x-cloak>
                    <div class="flex justify-between">
                        <div class="flex items-center gap-4">
                            <span class="w-3.5 h-3.5 bg-primary-400 border-2 border-white rounded-full"></span>
                            <span>{{__('ui.users')}}</span>
                        </div>
                        @livewire('ui.search' ,['employees' => $employees])
                        {{-- <div>
                            <button  @click="add=!add" class="px-2 py-1 duration-150 ease-in delay-75 rounded-lg hover:text-secondary-800 hover:bg-secondary-100">
                                <i class="fas fa-plus"></i>
                            </button>
                        </div> --}}
                    </div>



                    {{-- <div id="loadmoreuser" class="flex flex-col w-full gap-2 pl-2 overflow-y-auto text-sm h-44 sm:h-96">
                        {{-- Addition --}}
                        {{-- <div class="flex justify-between w-full px-4 py-2 rounded-lg text-secondary-500"> --}}
                            {{-- <div class="flex w-full gap-2">
                                <input wire:model="search" type="text" class="block w-full p-2 text-sm text-gray-900 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500" placeholder="{{__('ui.name')}}" required>
                                <div class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 tracking-wider">
                                    <button wire:click="x">
                                        dfsdfdsf
                                    </button>
                                </div> --}}
                                {{-- @if ($search)
                                    <select wire:model="userId" class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                        <option value="" selected>{{__('ui.select_employee')}}</option>
                                        @foreach ($employees as $employee)
                                            <option value="{{$employee->id}}">{{$employee->name}}</option>
                                        @endforeach
                                    </select>
                                    <button  @click="add=!add" class="px-4 py-1 duration-150 ease-in-out delay-75 border rounded-lg hover:text-success-800 hover:bg-success-100">
                                        <i class="fas fa-check"></i>
                                    </button>
                                @endif
                            </div>
                        </div>
                    </div> --}}

                        {{-- Loop Item Below --}}
                        <div class="flex items-center gap-2">
                        <input  wire:model="employee_id"  wire:click="addAllEmployee"  id="selectall" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <span class=" text-base  font-normal text-secondary-700">
                                select all
                            </span>
                        </div>
                        @forelse ($employees as $employee)
                            <div class="flex justify-between w-full px-4 py-2 rounded-lg hover:bg-secondary-50 text-secondary-500">
                                <div class="flex items-center gap-4">
                                    <input  type="checkbox" value="{{$employee->id}}" name="check" class="check" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <img src="{{$employee->photo}}" class="w-10 h-10 rounded-lg"  alt="Bordered avatar">
                                    <div class="flex flex-col">
                                        <span class="text-base font-normal text-secondary-700">
                                            {{$employee->name}}
                                        </span>
                                    </div>
                                </div>
                                {{-- <div class="flex gap-2">
                                    <button wire:click="confirmed({{ $employee->id }} , 'delete')" class="px-4 py-1 duration-150 ease-in-out delay-75 rounded-lg hover:text-error-600 hover:bg-error-100">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div> --}}
                            </div>
                        @empty
                            {{__('ui.no_data')}}
                        @endforelse
                    </div>
                    {{-- <script type="text/javascript">
                        let obj = document.getElementById("loadmoreuser");
                        obj.onscroll = function (ev) {
                            if ( obj.scrollTop === (obj.scrollHeight - obj.offsetHeight)){
                                window.livewire.emit('load-more');
                            }
                        };
                    </script> --}}
                </div>
                </div>
                <div >
                    <ul >
                        @if ($employee_id)
                        @forelse ($employees as $employee )
                        <li class="m-6">
                            {{$loop->iteration}} : {{$employee['name']}}
                            <button wire:click="removeEmployee({{$employee['id']}})">
                                <i class="mx-4 my-2 fas fa-times text-red-500"></i>
                            </button>
                        </li>
                        @empty
                        <li>{{ __('ui.no_data') }}</li>
                        @endforelse
                        @endif
                    </ul>
                </div>
            </div>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script>
        $(document).ready(function(){
            $("#selectall").click(function(){
                if(this.checked){
                    $(".check").prop("checked",true);
                }
                else{
                    $(".check").prop("checked",false);
                }
            });
        });

        </script>
    </form>

</div>

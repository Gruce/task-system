<div>
    <div data-modal-toggle="defaultModal" class="relative p-5 cursor-pointer bg-white border-t-[12px] border-x border-b border-x-transparent border-b-transparent rounded-lg transition-all duration-200 delay-100 ease-in-out hover:border-x-gray-200 hover:border-b-gray-200 hover:shadow-xl hover:shadow-gray-100 border-gray-300 hover:border-2">
        <span class="absolute px-2 py-1 tracking-wider text-white uppercase duration-200 ease-in-out delay-100 border-2 border-transparent rounded-lg ransition-all left-5 text-2xs -top-2 bg-indigo-500 group-hover:bg-white group-hover:border-indigo-500 group-hover:text-indigo-500">
            مهمة جديدة
        </span>
        <div class="flex flex-col">
        <div
            class="p-2 text-right  bg-white rounded-lg  w-full ">
            <div class="flex flex-row justify-between items-center">
                <h5 class="mb-3 text-xl font-semibold tracking-tight text-gray-900 dark:text-white ">
                    {{ $task->title }}
                </h5>
            </div>
                <div class="flex flex-row justify-between items-center">
                    <div class="max-w-xs">
                        <h5 class="p-1   tracking-tighter bg-indigo-600/20 rounded-lg text-sm text-indigo-600 ">
                            kjljkh
                        </h5>
                    </div>
                    <h6 class="p-1  text-sm text-gray-500 ">
                        {{-- {{$task->end_at}} --}}
                        2022/2/2
                    </h6>
                </div>
                <div class="flex flex-row justify-between">
                    <img class="w-6 h-6 rounded-full ml-1 mt-3"
                        src="https://cdn.dribbble.com/users/5084254/avatars/normal/7412fd6c884231ed6f256c39b244f8d0.jpg?1644808490&compress=1&resize=40x40"
                        alt="Rounded avatar">

                    <div class="flex flex-col items-center ">

                        <i class="fa-solid fa-circle-arrow-left text-lg mt-3"></i>
                    </div>
                </div>
                {{-- <div class="flex justify-between mt-4 text-sm text-center text-gray-500">
                    <div @class([
                        'px-4 py-2 basis-1/4 flex items-center justify-center gap-2',
                        'border-r' => en(),
                        'border-l' => ar(),
                    ]) class="">

                        <span class="font-semibold">{{ $task->importance }}</span>
                    </div>
                    <div @class([
                        'px-4 py-2 basis-1/4 flex items-center justify-center gap-2',
                        'border-r' => en(),
                        'border-l' => ar(),
                    ]) class="">
                            <i class="ri-chat-1-line"></i>
                            <span>3</span>
                    </div>

                    <div @class([ 'px-4 py-2 basis-1/3 flex items-center justify-center gap-2' , 'border-r'=> en(),
                        'border-l' => ar(),
                        ]) class="">
                        <i class="ri-attachment-line"></i>
                        <span>{{$task->files_count}}</span>
                    </div>
                    <div @class(['px-4 py-2 basis-1/3 flex items-center justify-center gap-2']) class="">
                        <a href="#"  >
                        <i class="fa-solid fa-circle-check"></i>
                    </a>
                    </div>

                </div> --}}
            </div>
        </div>
    </div>
  <!-- Main modal -->
  <div id="defaultModal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full justify-center items-center">
      <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
          <!-- Modal content -->
          <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
              <!-- Modal header -->
              <div class="flex justify-between items-start p-4 rounded-t border-b dark:border-gray-600">
                  <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                      اسم المهمة
                  </h3>
                  <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5  inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="defaultModal">
                      <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                  </button>
              </div>
              <!-- Modal body -->
              <div class="p-6 space-y-6">
                <div class="flex items-center gap-4 mb-3 text-black-600 group">
                    <h5  class="text-l  tracking-tight text-black">
                        اسم المشروع
                    </h5>
                    <div class="flex items-center gap-4" @click.stop="" @click.outside="name = false">
                        {{-- <input wire:keydown.enter="edit_name" wire:model="project.title" type="text" x-show="name" class="block w-full p-2 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500" required> --}}

                        {{-- <div class="px-2 py-1 duration-200 ease-in-out delay-100 rounded-lg opacity-0 group-hover:opacity-100 hover:text-secondary-800 bg-secondary-50">
                            <a @click="name = !name" x-show="!name" href="#"><i class="fas fa-pen"></i></a>
                            <a wire:click="edit_name" @click="name = !name" x-show="name" href="#"><i class="fas fa-check"></i></a>
                        </div> --}}
                    </div>
                </div>
                
              </div>
              <!-- Modal footer -->
              <div class="flex items-center p-6 space-x-2 rounded-b border-t border-gray-200 dark:border-gray-600">
                  <button data-modal-toggle="defaultModal" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">I accept</button>
                  <button data-modal-toggle="defaultModal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Decline</button>
              </div>
          </div>
      </div>
  </div>

</div>

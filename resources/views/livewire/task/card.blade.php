<div>
    <div data-modal-toggle="defaultModal" class="relative p-5 cursor-pointer bg-white border-t-[12px] border-x border-b border-x-transparent border-b-transparent rounded-lg transition-all duration-200 delay-100 ease-in-out hover:border-x-indigo-600 hover:border-b-indigo-600 hover:shadow-xl hover:shadow-secondary-100 border-indigo-600 hover:border-2">

            <select  id="states" class="absolute text-center  py-1 tracking-wider  uppercase rounded-lg left-5 text-2xs -top-2 bg-indigo-600  text-white text-sm rounded-r-lg   block w-1/4 p-1.5 ">
                <option selected>اختر حالة المهمة</option>
                <option value="1">غير مسندة</option>
                <option value="2">قيد التنفيذ</option>
                <option value="3">منتهية</option>
                <option value="4">معلقة</option>
                <option value="5">متأخرة</option>
                <option value="6">معطلة</option>
            </select>

        <div
            class="p-6 text-right  bg-white rounded-lg  w-full ">
            <div class="flex flex-row justify-between items-center">
                <h5 class="mb-3 text-l font-semibold tracking-tight text-gray-900 dark:text-white ">
                    {{ $task->title }}
                </h5>

                <button id="dropdownButton" data-dropdown-toggle="dropdown"
                    class="hidden sm:inline-block text-gray-400 dark:text-gray-400 hover:bg-gray-200 dark:hover:bg-gray-200 focus:outline-none focus:ring-4 focus:outline-none focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-1.5"
                    type="button">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z">
                        </path>
                    </svg>
                </button>
                <div id="dropdown"
                    class="hidden z-10  w-44 text-base list-none bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700">
                    <ul class="py-1" aria-labelledby="dropdownButton">
                        <li>
                            <a href="#"
                                class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-black">Edit</a>
                        </li>
                        <li>
                            <a href="#"
                                class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-black">Export
                                Data</a>
                        </li>

                        <li>
                            <a href="#"
                                class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-black">Export
                                Data</a>
                        </li>
                        <li >
                            <a href="#"  wire:click="confirmed({{ $task->id }})"
                                class="block py-2 px-4 text-sm text-red-600 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-black">Delete</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="flex flex-col">
                <div class="flex flex-row justify-between items-center">
                    <div class="max-w-xs">
                        <h5 class="p-1   tracking-tighter bg-indigo-600/20 rounded-lg text-sm text-indigo-600 ">
                            {{ $task->project->title ?? 'no title!' }}
                        </h5>
                    </div>
                </div>
                <div class="flex flex-row justify-between">
                    <img class="w-6 h-6 rounded-full ml-1 mt-3"
                        src="https://cdn.dribbble.com/users/5084254/avatars/normal/7412fd6c884231ed6f256c39b244f8d0.jpg?1644808490&compress=1&resize=40x40"
                        alt="Rounded avatar">

                    <div class="flex flex-col items-center ">
                        <h6 class="p-1  text-sm text-gray-500 ">
                            {{$task->start_at}}
                        </h6>
                        <h6 class="p-1  text-sm text-gray-500 ">
                            {{$task->end_at}}

                        </h6>
                    </div>
                </div>
                <div class="flex justify-between mt-4 text-sm text-center text-gray-500">
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
                    {{-- <div @class([
                        'px-4 py-2 basis-1/4 flex items-center justify-center gap-2',
                        'border-r' => en(),
                        'border-l' => ar(),
                    ]) class="">
                        <i class="ri-attachment-line"></i>
                        <span>{{$task->files_count}}</span>
                    </div> --}}
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

                </div>
            </div>
        </div>
    </div>


{{--
<!-- Modal toggle -->
<button class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button" data-modal-toggle="defaultModal">
    Toggle modal
  </button> --}}

  <!-- Main modal -->
  <div id="defaultModal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full justify-center items-center">
      <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
          <!-- Modal content -->
          <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
              <!-- Modal header -->
              <div class="flex justify-between items-start p-4 rounded-t border-b dark:border-gray-600">
                  <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                      Terms of Service
                  </h3>
                  <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="defaultModal">
                      <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                  </button>
              </div>
              <!-- Modal body -->
              <div class="p-6 space-y-6">
                  <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                      With less than a month to go before the European Union enacts new consumer privacy laws for its citizens, companies around the world are updating their terms of service agreements to comply.
                  </p>
                  <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                      The European Union’s General Data Protection Regulation (G.D.P.R.) goes into effect on May 25 and is meant to ensure a common set of data rights in the European Union. It requires organizations to notify users as soon as possible of high-risk data breaches that could personally affect them.
                  </p>
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

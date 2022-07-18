@section('header-actions')
@endsection
@section('title', __('ui.home'))

<div class="flex flex-col h-full m-5">
    <div class="flex flex-row justify-between">
        <div class="basis-1/4">
            <div class="max-w-sm p-4 bg-white rounded-xl  border-gray-200 shadow-md ">
                <div class="flex justify-between px-2 pt-4">
                    <div class="">
                        <i class="fa-solid fa-2x fa-wallet"></i>
                    </div>
                    <button id="dropdownButton" data-dropdown-toggle="dropdown" class="inline-block text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:ring-4 focus:outline-none focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-1.5" type="button">
                        <span class="sr-only">Open dropdown</span>
                        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z"></path>
                        </svg>
                    </button>

                    <!-- Dropdown menu -->
                    <div id="dropdown" class="hidden z-10 w-44 text-base list-none bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700">
                        <ul class="py-1" aria-labelledby="dropdownButton">
                            <li>
                                <a href="#" class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Edit</a>
                            </li>
                            <li>
                                <a href="#" class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Export Data</a>
                            </li>
                            <li>
                                <a href="#" class="block py-2 px-4 text-sm text-red-600 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Delete</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="flex flex-col items-center mt-4 pb-2">
                    <h5 class="mb-1 text-xl font-medium text-gray-900 ">Bonnie Green</h5>
                    <span class="text-sm text-gray-500 dark:text-gray-400">Visual Designer</span>
                    <div class="flex mt-4 space-x-3 lg:mt-6">
                    </div>
                </div>
            </div>
        </div>
        <div class="basis-1/4">
            <div class="max-w-sm p-4 bg-white rounded-xl  border-gray-200 shadow-md ">
                <div class="flex justify-between px-2 pt-4">
                    <div class="">
                        <i class="fa-solid fa-2x fa-wallet"></i>
                    </div>
                    <button id="dropdownButton" data-dropdown-toggle="dropdown" class="inline-block text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:ring-4 focus:outline-none focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-1.5" type="button">
                        <span class="sr-only">Open dropdown</span>
                        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z"></path>
                        </svg>
                    </button>

                    <!-- Dropdown menu -->
                    <div id="dropdown" class="hidden z-10 w-44 text-base list-none bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700">
                        <ul class="py-1" aria-labelledby="dropdownButton">
                            <li>
                                <a href="#" class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Edit</a>
                            </li>
                            <li>
                                <a href="#" class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Export Data</a>
                            </li>
                            <li>
                                <a href="#" class="block py-2 px-4 text-sm text-red-600 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Delete</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="flex flex-col items-center mt-4 pb-2">
                    <h5 class="mb-1 text-xl font-medium text-gray-900 ">Bonnie Green</h5>
                    <span class="text-sm text-gray-500 dark:text-gray-400">Visual Designer</span>
                    <div class="flex mt-4 space-x-3 lg:mt-6">
                    </div>
                </div>
            </div>
        </div>
        <div class="basis-1/4">
            <div class="max-w-sm p-4 bg-white rounded-xl  border-gray-200 shadow-md ">
                <div class="flex justify-between px-2 pt-4">
                    <div class="">
                        <i class="fa-solid fa-2x fa-wallet"></i>
                    </div>
                    <button id="dropdownButton" data-dropdown-toggle="dropdown" class="inline-block text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:ring-4 focus:outline-none focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-1.5" type="button">
                        <span class="sr-only">Open dropdown</span>
                        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z"></path>
                        </svg>
                    </button>

                    <!-- Dropdown menu -->
                    <div id="dropdown" class="hidden z-10 w-44 text-base list-none bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700">
                        <ul class="py-1" aria-labelledby="dropdownButton">
                            <li>
                                <a href="#" class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Edit</a>
                            </li>
                            <li>
                                <a href="#" class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Export Data</a>
                            </li>
                            <li>
                                <a href="#" class="block py-2 px-4 text-sm text-red-600 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Delete</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="flex flex-col items-center mt-4 pb-2">
                    <h5 class="mb-1 text-xl font-medium text-gray-900 ">Bonnie Green</h5>
                    <span class="text-sm text-gray-500 dark:text-gray-400">Visual Designer</span>
                    <div class="flex mt-4 space-x-3 lg:mt-6">
                    </div>
                </div>
            </div>
        </div>
        <div class="basis-1/4">
            <div class="max-w-sm p-4 bg-white rounded-xl  border-gray-200 shadow-md ">
                <div class="flex justify-between px-2 pt-4">
                    <div class="">
                        <i class="fa-solid fa-2x fa-wallet"></i>
                    </div>
                    <button id="dropdownButton" data-dropdown-toggle="dropdown" class="inline-block text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:ring-4 focus:outline-none focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-1.5" type="button">
                        <span class="sr-only">Open dropdown</span>
                        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z"></path>
                        </svg>
                    </button>

                    <!-- Dropdown menu -->
                    <div id="dropdown" class="hidden z-10 w-44 text-base list-none bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700">
                        <ul class="py-1" aria-labelledby="dropdownButton">
                            <li>
                                <a href="#" class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Edit</a>
                            </li>
                            <li>
                                <a href="#" class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Export Data</a>
                            </li>
                            <li>
                                <a href="#" class="block py-2 px-4 text-sm text-red-600 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Delete</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="flex flex-col items-center mt-4 pb-2">
                    <h5 class="mb-1 text-xl font-medium text-gray-900 ">Bonnie Green</h5>
                    <span class="text-sm text-gray-500 dark:text-gray-400">Visual Designer</span>
                    <div class="flex mt-4 space-x-3 lg:mt-6">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="flex mt-5">
            <div class="basis-1/4">
                <div class="max-w-sm p-4 bg-white rounded-xl  border-gray-200 shadow-md ">
                    <div class="flex justify-between px-2 pt-4">
                        <div class="">
                            <i class="fa-solid fa-2x fa-wallet"></i>
                        </div>
                        <button id="dropdownButton" data-dropdown-toggle="dropdown" class="inline-block text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:ring-4 focus:outline-none focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-1.5" type="button">
                            <span class="sr-only">Open dropdown</span>
                            <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z"></path>
                            </svg>
                        </button>

                        <!-- Dropdown menu -->
                        <div id="dropdown" class="hidden z-10 w-44 text-base list-none bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700">
                            <ul class="py-1" aria-labelledby="dropdownButton">
                                <li>
                                    <a href="#" class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Edit</a>
                                </li>
                                <li>
                                    <a href="#" class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Export Data</a>
                                </li>
                                <li>
                                    <a href="#" class="block py-2 px-4 text-sm text-red-600 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Delete</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="flex flex-col items-center mt-4 pb-2">
                        <h5 class="mb-1 text-xl font-medium text-gray-900 ">Bonnie Green</h5>
                        <span class="text-sm text-gray-500 dark:text-gray-400">Visual Designer</span>
                        <div class="flex mt-4 space-x-3 lg:mt-6">
                        </div>
                    </div>
                </div>
            </div>
            <div class="basis-3/4 mb-5">
                <div class="w-full p-4 bg-white rounded-xl  border-gray-200 shadow-md ">
                    <div class="flex justify-between px-2 pt-4">
                        <div class="">
                            <i class="fa-solid fa-2x fa-wallet"></i>
                        </div>
                        <button id="dropdownButton" data-dropdown-toggle="dropdown" class="inline-block text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:ring-4 focus:outline-none focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-1.5" type="button">
                            <span class="sr-only">Open dropdown</span>
                            <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z"></path>
                            </svg>
                        </button>

                        <!-- Dropdown menu -->
                        <div id="dropdown" class="hidden z-10 w-44 text-base list-none bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700">
                            <ul class="py-1" aria-labelledby="dropdownButton">
                                <li>
                                    <a href="#" class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Edit</a>
                                </li>
                                <li>
                                    <a href="#" class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Export Data</a>
                                </li>
                                <li>
                                    <a href="#" class="block py-2 px-4 text-sm text-red-600 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Delete</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="flex flex-col items-center mt-4 pb-2">
                        <h5 class="mb-1 text-xl font-medium text-gray-900 ">Bonnie Green</h5>
                        <span class="text-sm text-gray-500 dark:text-gray-400">Visual Designer</span>
                        <div class="flex mt-4 space-x-3 lg:mt-6">
                        </div>
                    </div>
                </div>
            </div>
    </div>
    <div>
        <div class="max-w-sm p-4 bg-white rounded-xl  border-gray-200 shadow-md ">
            <div class="flex justify-between px-2 pt-4">
                <div class="">
                    <i class="fa-solid fa-2x fa-wallet"></i>
                </div>
                <button id="dropdownButton" data-dropdown-toggle="dropdown" class="inline-block text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:ring-4 focus:outline-none focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-1.5" type="button">
                    <span class="sr-only">Open dropdown</span>
                    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z"></path>
                    </svg>
                </button>

                <!-- Dropdown menu -->
                <div id="dropdown" class="hidden z-10 w-44 text-base list-none bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700">
                    <ul class="py-1" aria-labelledby="dropdownButton">
                        <li>
                            <a href="#" class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Edit</a>
                        </li>
                        <li>
                            <a href="#" class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Export Data</a>
                        </li>
                        <li>
                            <a href="#" class="block py-2 px-4 text-sm text-red-600 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Delete</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="flex flex-col items-center mt-4 pb-2">
                <h5 class="mb-1 text-xl font-medium text-gray-900 ">Bonnie Green</h5>
                <span class="text-sm text-gray-500 dark:text-gray-400">Visual Designer</span>
                <div class="flex mt-4 space-x-3 lg:mt-6">
                </div>
            </div>
        </div>
    </div>
    <div class="mt-5">

<div class="p-4 w-full bg-white rounded-lg border shadow-md sm:p-8 dark:bg-gray-800 dark:border-gray-700">
    <div class="flex justify-between items-center mb-4">
        <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white">Latest Customers</h5>
        <a href="#" class="text-sm font-medium text-blue-600 hover:underline dark:text-blue-500">
            View all
        </a>
   </div>
   <div class="flow-root ">
        <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700">
            <li class="py-3 sm:py-4">
                <div class="flex items-center space-x-4">
                    <div class="flex-shrink-0">
                        <img class="w-8 h-8 rounded-full" src="/docs/images/people/profile-picture-1.jpg" alt="Neil image">
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                            Neil Sims
                        </p>
                        <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                            email@windster.com
                        </p>
                    </div>
                    <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                        $320
                    </div>
                </div>
            </li>
            <li class="py-3 sm:py-4">
                <div class="flex items-center space-x-4">
                    <div class="flex-shrink-0">
                        <img class="w-8 h-8 rounded-full" src="/docs/images/people/profile-picture-3.jpg" alt="Bonnie image">
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                            Bonnie Green
                        </p>
                        <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                            email@windster.com
                        </p>
                    </div>
                    <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                        $3467
                    </div>
                </div>
            </li>
            <li class="py-3 sm:py-4">
                <div class="flex items-center space-x-4">
                    <div class="flex-shrink-0">
                        <img class="w-8 h-8 rounded-full" src="/docs/images/people/profile-picture-2.jpg" alt="Michael image">
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                            Michael Gough
                        </p>
                        <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                            email@windster.com
                        </p>
                    </div>
                    <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                        $67
                    </div>
                </div>
            </li>
            <li class="py-3 sm:py-4">
                <div class="flex items-center space-x-4">
                    <div class="flex-shrink-0">
                        <img class="w-8 h-8 rounded-full" src="/docs/images/people/profile-picture-4.jpg" alt="Lana image">
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                            Lana Byrd
                        </p>
                        <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                            email@windster.com
                        </p>
                    </div>
                    <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                        $367
                    </div>
                </div>
            </li>
            <li class="pt-3 pb-0 sm:pt-4">
                <div class="flex items-center space-x-4">
                    <div class="flex-shrink-0">
                        <img class="w-8 h-8 rounded-full" src="/docs/images/people/profile-picture-5.jpg" alt="Thomas image">
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                            Thomes Lean
                        </p>
                        <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                            email@windster.com
                        </p>
                    </div>
                    <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                        $2367
                    </div>
                </div>
            </li>
        </ul>
   </div>
</div>

    </div>
</div>



{{-- <div>

    <div id="myTabContent">
        <div class="p-4 bg-gray-50 rounded-lg dark:bg-gray-800" id="profile" role="tabpanel" aria-labelledby="profile-tab">
            <div class="flex flex-col p-5 bg-white">
                <div class="flex lg:flex-row flex-col justify-between">
                    <div class="basis-1/8 lg:mt-5 mb-5">
                        <div x-data="{ dropdown: false }" class=" ml-10 relative mr-10 flex flex-row  ">
                            <div>
                                <button @click.stop="dropdown = !dropdown" type="button" class="flex text-sm mr-3 bg-gray-300 p-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                                    <span class="sr-only">Open user menu</span>
                                    <i class="fa-solid fa-filter text-2xl"></i>
                                </button>
                            </div>
                            <select wire:model="select" @click.outside="dropdown = false" @click.stop="" x-show="dropdown" id="countries" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option value="1">سنوي</option>
                                <option value="2">شهري</option>
                                <option value="3">اسبوعي</option>
                                <option value="4">يومي</option>
                            </select>

                        </div>
                    </div>
                    <div class="basis-1/4 lg:mb-0 mb-5">
                        <div class="max-w-sm bg-white rounded-lg border border-gray-200">
                            <div class="grid grid-cols-2 divide-x ">
                                <div class="flex flex-col p-4 text-center ">
                                    <h6 class="text-xs font-semibold text-gray-400">
                                        {{ __('ui.projects_completed') }}
                                    </h6>
                                    <h1 class="font-semibold text-green-600 text-2xl">
                                        {{ $projects_done_count }}
                                    </h1>
                                    <h5 class="text-gray-400 text-sm">
                                        {{ __('ui.current_week') }}
                                    </h5>
                                </div>
                                <div class="flex flex-col p-4 text-center ">
                                    <h6 class="text-xs font-semibold text-gray-400">
                                        {{ __('ui.projects_not_completed') }}
                                    </h6>
                                    <h1 class="font-semibold text-red-600 text-2xl">
                                        {{ $projects_not_done_count }}
                                    </h1>
                                    <h5 class="text-gray-400 text-sm">
                                        {{ __('ui.current_week') }}
                                    </h5>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="basis-1/4 lg:mb-0 mb-5">
                        <div class="max-w-sm bg-white rounded-lg border border-gray-200">
                            <div @class(['grid grid-cols-2', 'divide-x'=> en()])>
                                <div class="flex flex-col p-4 text-center ">
                                    <h6 class="text-xs font-semibold text-gray-400">
                                        {{ __('ui.tasks_completed') }}
                                    </h6>
                                    <h1 class="font-semibold text-green-600 text-2xl">
                                        {{ $tasks_done_count }}
                                    </h1>
                                    <h5 class="text-gray-400 text-sm">
                                        {{ __('ui.current_week') }}
                                    </h5>
                                </div>
                                <div class="flex flex-col p-4 text-center">
                                    <h6 class="text-xs font-semibold text-gray-400">
                                        {{ __('ui.task_not_completed') }}
                                    </h6>
                                    <h1 class="font-semibold text-red-600 text-2xl">
                                        {{ $tasks_in_progress_count }}
                                    </h1>
                                    <h5 class="text-gray-400 text-sm">
                                        {{ __('ui.current_week') }}
                                    </h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="basis-1/4 lg:mb-0 mb-5">
                        <div class="max-w-sm bg-white rounded-lg border border-gray-200">
                            <div class="grid grid-cols-1  ">
                                <div class="flex flex-col p-4 text-center ">
                                    <h6 class="text-xs font-semibold text-gray-400">
                                        {{ __('ui.number_of_employees') }}
                                    </h6>
                                    <h1 class="font-semibold text-green-600 text-2xl">
                                        {{ $employees_count }}
                                    </h1>
                                    <h5 class="text-gray-400 text-sm">
                                        {{ __('ui.in_this_company') }}
                                    </h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex flex-col">
                <div class="flex lg:flex-row flex-col justify-between">
                    <div class="flex flex-col gap-2 bg-white basis-1/4">
                        <div class="flex items-center gap-2 p-3 m-1 text-lg rounded-lg text-secondary-600 bg-secondary-50">
                            <span class="w-3.5 h-3.5 bg-warning-400 border-2 border-white rounded-full"></span>
                            <span>{{ __('ui.projects_in_progress') }}</span>
                        </div>

                        <div class="flex flex-col gap-4 px-2 m-1 overflow-y-auto h-tasklist">
                            @forelse ($projects as $item )
                            <a href="{{route('projects.show' , ['id' => $item->id])}}">
                                <div class="flex flex-col gap-4 px-2 m-1  ">
                                    <div class="relative flex flex-col p-3 border-2 rounded-lg hover:bg-secondary-50 text-secondary-600">
                                        <div class="flex flex-col gap-2 cursor-pointer">
                                            <div class="flex justify-between w-full">
                                                <div class="flex flex-col">
                                                    <div class="flex items-center gap-2">
                                                        <span class="font-semibold">{{$item->title}}</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="flex items-center justify-between w-full">
                                                <span class="text-xs">{{date('Y-m-d' , $item->created_at)}}</span>
                                                <div class="flex flex-col gap-2 w-1/2 ">
                                                    <div class="flex justify-between mb-1">
                                                        <span class="text-xs font-medium text-secondary-500 ">{{$item->percentage_completed_tasks}}%</span>
                                                    </div>
                                                    <div class="w-full bg-gray-200 rounded-full h-1.5">
                                                        <div class="bg-secondary-600 h-1.5 rounded-full" style="width: {{$item->percentage_completed_tasks}}%">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            @empty
                            <div class="flex flex-col gap-4 px-2 m-1  ">
                                {{ __('ui.no_projects_in_progress') }} خلوها بالنص
                            </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>



</div>
</div> --}}


{{-- <div class="max-w-sm p-4 bg-white rounded-xl  border-gray-200 shadow-md ">
    <div class="flex justify-between px-2 pt-4">
        <div class="">
            <i class="fa-solid fa-2x fa-wallet"></i>
        </div>
        <button id="dropdownButton" data-dropdown-toggle="dropdown" class="inline-block text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:ring-4 focus:outline-none focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-1.5" type="button">
            <span class="sr-only">Open dropdown</span>
            <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z"></path>
            </svg>
        </button>

        <!-- Dropdown menu -->
        <div id="dropdown" class="hidden z-10 w-44 text-base list-none bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700">
            <ul class="py-1" aria-labelledby="dropdownButton">
                <li>
                    <a href="#" class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Edit</a>
                </li>
                <li>
                    <a href="#" class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Export Data</a>
                </li>
                <li>
                    <a href="#" class="block py-2 px-4 text-sm text-red-600 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Delete</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="flex flex-col items-center mt-4 pb-2">
        <h5 class="mb-1 text-xl font-medium text-gray-900 ">Bonnie Green</h5>
        <span class="text-sm text-gray-500 dark:text-gray-400">Visual Designer</span>
        <div class="flex mt-4 space-x-3 lg:mt-6">
        </div>
    </div>
</div> --}}

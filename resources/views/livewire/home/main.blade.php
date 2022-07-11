@section('header-actions')
@endsection
@section('title', __('ui.home'))

<div>
    <div class="flex flex-row justify-center">

        <div class="mb-4 border-b border-gray-200 dark:border-gray-700 ">
            <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="myTab"
                data-tabs-toggle="#myTabContent" role="tablist">
                <li class="mr-2" role="presentation">
                    <button
                        class="inline-block p-4 rounded-t-lg border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300 dark:border-transparent text-gray-500 dark:text-gray-400 border-gray-100 dark:border-gray-700"
                        id="dashboard-tab" data-tabs-target="#dashboard" type="button" role="tab"
                        aria-controls="dashboard" aria-selected="false">{{__('ui.private_stats')}}</button>
                </li>
                <li class="mr-2" role="presentation">
                    <button
                        class="inline-block p-4 rounded-t-lg border-b-2 text-blue-600 hover:text-blue-600 dark:text-blue-500 dark:hover:text-blue-500 border-blue-600 dark:border-blue-500"
                        id="profile-tab" data-tabs-target="#profile" type="button" role="tab"
                        aria-controls="profile" aria-selected="true">{{__('ui.general_stats')}}</button>
                </li>
            </ul>
        </div>
    </div>
    <div id="myTabContent">
        <div class="p-4 bg-gray-50 rounded-lg dark:bg-gray-800" id="profile" role="tabpanel"
            aria-labelledby="profile-tab">
            <div class="flex flex-col p-5 bg-white">
                <div class="flex lg:flex-row flex-col justify-between">
                    <div class="basis-1/8 lg:mt-5 mb-5">
                        <div x-data="{ dropdown: false }" class=" ml-10 relative mr-10 flex flex-row  ">
                            <div>
                                <button @click.stop="dropdown = !dropdown" type="button"
                                    class="flex text-sm mr-3 bg-gray-300 p-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white"
                                    id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                                    <span class="sr-only">Open user menu</span>
                                    <i class="fa-solid fa-filter text-2xl"></i>
                                </button>
                            </div>
                            <select @click.outside="dropdown = false" @click.stop="" x-show="dropdown" id="countries"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option selected="">Choose a country</option>
                                <option value="US">United States</option>
                                <option value="CA">Canada</option>
                                <option value="FR">France</option>
                                <option value="DE">Germany</option>
                            </select>

                        </div>
                    </div>
                    <div class="basis-1/4 lg:mb-0 mb-5">
                        <div class="max-w-sm bg-white rounded-lg border border-gray-200">
                            <div class="grid grid-cols-2 divide-x ">
                                <div class="flex flex-col p-4 text-center ">
                                    <h6 class="text-xs font-semibold text-gray-400">
                                        {{__('ui.projects_completed')}}
                                    </h6>
                                    <h1 class="font-semibold text-green-600 text-2xl">
                                        42
                                    </h1>
                                    <h5 class="text-gray-400 text-sm">
                                        {{__('ui.current_week')}}
                                    </h5>
                                </div>
                                <div class="flex flex-col p-4 text-center ">
                                    <h6 class="text-xs font-semibold text-gray-400">
                                        Projecrs not complete
                                    </h6>
                                    <h1 class="font-semibold text-red-600 text-2xl">
                                        42
                                    </h1>
                                    <h5 class="text-gray-400 text-sm">
                                        {{__('ui.current_week')}}
                                    </h5>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="basis-1/4 lg:mb-0 mb-5">
                        <div class="max-w-sm bg-white rounded-lg border border-gray-200">
                            <div @class(['grid grid-cols-2','divide-x' => en()])>
                                <div class="flex flex-col p-4 text-center ">
                                    <h6 class="text-xs font-semibold text-gray-400">
                                        {{__('ui.task_completed')}}
                                    </h6>
                                    <h1 class="font-semibold text-green-600 text-2xl">
                                        42
                                    </h1>
                                    <h5 class="text-gray-400 text-sm">
                                        {{__('ui.current_week')}}
                                    </h5>
                                </div>
                                <div class="flex flex-col p-4 text-center">
                                    <h6 class="text-xs font-semibold text-gray-400">
                                        {{__('ui.task_not_completed')}}
                                    </h6>
                                    <h1 class="font-semibold text-red-600 text-2xl">
                                        42
                                    </h1>
                                    <h5 class="text-gray-400 text-sm">
                                        {{__('ui.current_week')}}
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
                                        {{__('ui.number_of_employees')}}
                                    </h6>
                                    <h1 class="font-semibold text-green-600 text-2xl">
                                        42
                                    </h1>
                                    <h5 class="text-gray-400 text-sm">
                                        {{__('ui.in_this_company')}}
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
                            <span>{{__('ui.projects_in_progress')}}</span>
                        </div>

                        <div class="flex flex-col gap-4 px-2 m-1 overflow-y-auto h-tasklist">
                            @for ($i = 0; $i < 10; $i++)
                                <a href="www.google.com">
                                    <div class="flex flex-col gap-4 px-2 m-1  ">
                                        <div
                                            class="relative flex flex-col p-3 border-2 rounded-lg hover:bg-secondary-50 text-secondary-600">
                                            <div class="flex flex-col gap-2 cursor-pointer">
                                                <div class="flex justify-between w-full">
                                                    <div class="flex flex-col">
                                                        <div class="flex items-center gap-2">
                                                            <span class="font-semibold">Shop</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="flex items-center justify-between w-full">
                                                    <span class="text-xs">2022-01-10</span>
                                                    <div class="flex flex-col gap-2 w-1/2 ">
                                                        <div class="flex justify-between mb-1">
                                                            <span
                                                                class="text-xs font-medium text-secondary-500 ">34%</span>
                                                        </div>
                                                        <div class="w-full bg-gray-200 rounded-full h-1.5">
                                                            <div class="bg-secondary-600 h-1.5 rounded-full"
                                                                style="width: 23%">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            @endfor
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="hidden p-4 bg-gray-50 rounded-lg dark:bg-gray-800" id="dashboard" role="tabpanel"
            aria-labelledby="dashboard-tab">
            @livewire('home.submain')
        </div>
    </div>



</div>
</div>

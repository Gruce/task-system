<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    {{--
    <link rel="icon" href="{{ asset('img/a.png') }}" type="image/x-icon"> --}}
    {{-- Fonts --}}

    {{--
    <link href="https://fonts.googleapis.com/css2?family=Noto+Kufi+Arabic:wght@200&display=swap" rel="stylesheet"> --}}
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link rel="stylesheet" href="https://unpkg.com/flowbite@1.4.6/dist/flowbite.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Cairo&display=swap" rel="stylesheet">
    @livewireStyles
    @laravelPWA
    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/gh/tvdr/alpine-draganddrop@0.x.x/dist/index.min.js" defer></script>
    <script src="{{ mix('js/app.js') }}" defer></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://unpkg.com/flowbite@1.4.7/dist/flowbite.js"></script>
    <script src="https://unpkg.com/flowbite@1.4.7/dist/datepicker.js"></script>
    <script src="https://kit.fontawesome.com/4e8940f861.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
</head>

<body class="font-sans antialiased bg-secondary-100" dir="{{ config('app.locale') == 'en' ? 'ltr' : 'rtl' }}">
    <div class="p-0 mx-auto sm:p-6">
        <div class="flex flex-row h-screen bg-white rounded-lg sm:h-main" x-data="{ sidebar_extended: false, showSideBar: false  }" x-cloak>
            {{-- Left Sidebar --}}
            <x-sidebar />

            {{-- Content --}}
            <div class="w-full pb-0 sm:pb-10 sm:w-8/12 sm:basis-8/12 sm:grow">
                <div class="flex flex-col items-center justify-between p-5 border-b sm:h-20 sm:flex-row">
                    <div class="flex justify-between ">
                        <span class="text-2xl font-semibold text-secondary-700">@yield('title')</span>
                        <button @click="showSideBar=!showSideBar" type="button" class=" inline-flex items-center px-4 py-2 text-lg text-gray-400 bg-transparent rounded-lg sm:hidden hover:bg-gray-200 hover:text-gray-900 ">
                            <i class="fas fa-bars"></i>
                        </button>
                    </div>
                    <div class=" sm:hidden  flex flex-row" x-show="showSideBar">
                        <nav class="bg-white border-gray-200 px-2 sm:px-4 py-2.5 rounded dark:bg-gray-800">
                            <div class="container flex flex-wrap justify-between items-center mx-auto">
                                <div class=" w-full md:block md:w-auto" id="mobile-menu">
                                    <ul class="flex flex-row mt-4 md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium">
                                        <li>
                                            <a href="{{route('home')}}" aria-current="page" @if (Request::route()->getName() == 'home')
                                                class="block py-2 pr-4 pl-3 text-primary-500 group-hover:text-primary-500 rounded"

                                                @else
                                                class="block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700"
                                                @endif
                                                >{{__('ui.home')}}</a>
                                        </li>
                                        <li>
                                            <a href="{{route('employees')}}" aria-current="page" @if (Request::route()->getName() == 'employees')
                                                class="block py-2 pr-4 pl-3 text-primary-500 group-hover:text-primary-500 rounded "
                                                @else
                                                class="block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700"
                                                @endif
                                                >{{__('ui.employees')}}</a>
                                        </li>
                                        <li>
                                            <a href="{{route('projects')}}" aria-current="page" @if (Request::route()->getName() == 'projects')
                                                class="block py-2 pr-4 pl-3 text-primary-500 group-hover:text-primary-500 rounded "

                                                @else
                                                class="block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700"
                                                @endif
                                                >{{__('ui.projects')}}</a>
                                        </li>
                                        <li>
                                            <a href="{{route('tasks')}}" aria-current="page" @if (Request::route()->getName() == 'tasks')
                                                class="block py-2 pr-4 pl-3 text-primary-500 group-hover:text-primary-500 rounded"
                                                @else
                                                class="block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700"
                                                @endif
                                                >{{__('ui.tasks')}}</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </nav>
                    </div>
                    @yield('header-actions')
                    <div class="flex flex-row items-center">
                        <div>
                            @livewire('notification.card')
                        </div>

                        <!-- Profile dropdown -->
                        <div x-data="{dropdown: false}" class=" ml-10 relative mr-10">
                            <div>
                                <button @click.stop="dropdown = !dropdown" type="button" class="flex text-sm bg-gray-800 rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                                    <span class="sr-only">Open user menu</span>
                                    <img class="w-8 h-8 rounded-full" src="{{auth()->user()->profile_photo}}" alt="profile image">
                                </button>
                            </div>
                            <div @click.outside="dropdown = false" @click.stop="" x-show="dropdown" class="absolute right-0 w-48 mt-2 origin-top-right bg-white rounded-lg ring-1 ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
                                @if(!auth()->user()->is_admin)
                                <!-- Active: "bg-gray-100", Not Active: "" -->
                                <a href="{{route('employees.profile',['id' => auth()->user()->employee->id ])}}" class="block px-4 py-2 text-sm text-gray-700 rounded-lg hover:bg-gray-200" role="menuitem" tabindex="-1" id="user-menu-item-0">{{__('ui.profile')}}</a>
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700 rounded-lg hover:bg-gray-200" role="menuitem" tabindex="-1" id="user-menu-item-1">Settings</a>
                                @endif
                                <form method="POST" action="{{ route('logout') }}" x-data>
                                    @csrf
                                    <a href="{{ route('logout') }}" @click.prevent="$root.submit();" class="block px-4 py-2 text-sm text-gray-700 rounded-lg hover:bg-gray-200" role="menuitem" tabindex="-1" id="user-menu-item-2">{{__('ui.logout')}}</a>
                                </form>
                            </div>
                        </div>
                        @hasSection ('disable-search')
                        @else
                        <livewire:ui.search />
                        @endif

                    </div>
                </div>
                <div class="p-1 overflow-y-auto sm:p-5 h-content bg-secondary-50">
                    @isset($slot)
                    {{ $slot }}
                    @endisset
                </div>
            </div>

            {{-- Right Sidebar --}}
            {{-- @if (Route::is('home*') || Route::is('movies-all') || Route::is('series-all'))
            @livewire('right-side')
            @endif --}}
        </div>
    </div>

    @stack('modals')
    @livewireScripts
    @livewireChartsScripts
    <script src="{{ asset('vendor/livewire-alert/livewire-alert.js') }}"></script>
    <x-livewire-alert::flash />

</body>

</html>

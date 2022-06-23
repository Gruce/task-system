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
    <script src="https://unpkg.com/flowbite@1.4.6/dist/flowbite.js"></script>
    <script src="https://kit.fontawesome.com/4e8940f861.js" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/flowbite@1.4.7/dist/datepicker.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
</head>

<body class="font-sans antialiased bg-secondary-100" dir="{{ config('app.locale') == 'en' ? 'ltr' : 'rtl' }}">
    <div class="p-6 mx-auto">
        <div class="flex flex-row bg-white rounded-lg h-main" x-data="{ sidebar_extended: false }" x-cloak>
            {{-- Left Sidebar --}}
            <x-sidebar />

            {{-- Content --}}
            <div class="w-8/12 pb-10 basis-8/12 grow">
                <div class="flex items-center justify-between h-20 p-5 border-b">
                    <span class="text-2xl font-semibold text-secondary-700">@yield('title')</span>
                    @yield('header-actions')
                    <div class="flex flex-row items-center">
                        @hasSection ('disable-search')
                        @else
                        <livewire:ui.search />
                        @endif

                        <div class="m-5">
                            @livewire('notification.card')
                        </div>

                        <!-- Profile dropdown -->
                        <div x-data="{dropdown: false}" class=" ml-3 relative">
                            <div>
                                <button @click.stop="dropdown = !dropdown" type="button" class="bg-gray-800 flex text-sm rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                                    <span class="sr-only">Open user menu</span>
                                    <img class="h-8 w-8 rounded-full" src="{{auth()->user()->profile_photo}}" alt="profile image">
                                </button>
                            </div>
                            <div @click.outside="dropdown = false" @click.stop="" x-show="dropdown" class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
                                <!-- Active: "bg-gray-100", Not Active: "" -->
                                <a href="{{route('employees.profile',['id' => auth()->id() ])}}" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-0">{{__('ui.profile')}}</a>
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-1">Settings</a>
                                <form method="POST" action="{{ route('logout') }}" x-data>
                                    @csrf
                                    <a href="{{ route('logout') }}" @click.prevent="$root.submit();" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-2">{{__('ui.logout')}}</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="p-5 overflow-y-auto h-content bg-secondary-50">
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

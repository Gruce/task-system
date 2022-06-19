<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="icon" href="{{ asset('img/a.png') }}" type="image/x-icon">
    {{-- Fonts --}}

    {{--
    <link href="https://fonts.googleapis.com/css2?family=Noto+Kufi+Arabic:wght@200&display=swap" rel="stylesheet"> --}}
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link rel="stylesheet" href="https://unpkg.com/flowbite@1.4.6/dist/flowbite.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@500&display=swap" rel="stylesheet">
    @livewireStyles
    @laravelPWA



    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://unpkg.com/flowbite@1.4.6/dist/flowbite.js"></script>
    <script src="https://kit.fontawesome.com/4e8940f861.js" crossorigin="anonymous"></script>
</head>

<body class="font-sans antialiased bg-gray-200">
    <div class="p-6 mx-auto ">

        <div class="text-center bg-white rounded-lg ">
            <div class="flex flex-row h-screen " x-data="{ sidebar_extended: false }" dir="rtl">
                {{-- Left Sidebar --}}
                <x-sidebar />

                {{-- Content --}}
                <div class="w-8/12 pb-10 basis-8/12 grow">
                    <div class="flex items-center justify-between p-10 mb-10 border-b h-36">
                        <span class="text-2xl font-semibold text-gray-600">@yield('title')</span>
                        @yield('header-actions')

                        @hasSection ('disable-search')
                        @else
                        <livewire:ui.search />
                        @endif
                    </div>
                    <div class="px-10">
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
    </div>

    @stack('modals')
    @livewireScripts
    {{-- <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script> --}}

</body>
</html>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    {{-- <link rel="icon" href="{{ asset('img/a.png') }}" type="image/x-icon"> --}}
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
</head>

<body class="font-sans antialiased bg-secondary-100" dir="{{ config('app.locale') == 'en' ? 'ltr' : 'rtl' }}">
    <div class="p-6 mx-auto">
        <div class="flex flex-row bg-white rounded-lg h-main" x-data="{ sidebar_extended: false }">
            {{-- Left Sidebar --}}
            <x-sidebar />

            {{-- Content --}}
            <div class="w-8/12 pb-10 basis-8/12 grow">
                <div class="flex items-center justify-between h-20 p-5 border-b">
                    <span class="text-2xl font-semibold text-gray-600">@yield('title')</span>
                    @yield('header-actions')

                    @hasSection ('disable-search')
                    @else
                    <livewire:ui.search />
                    @endif
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
    <script src="{{ asset('vendor/livewire-alert/livewire-alert.js') }}"></script>
    <x-livewire-alert::flash />

</body>

</html>

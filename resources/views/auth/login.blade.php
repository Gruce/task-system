<x-guest-layout>

    {{--NEW LOGIN--}}

    <div class="flex flex-col h-full justify-center items-center lg:m-40 mt-20">
        <div class="bg-white  px-3   border rounded-3xl lg:w-1/4 sm:w-full   shadow-sm  h-full ">
            <div class="ml-40">
                <img src="{{ asset('images\logo.jpg') }}" class="w-20">
            </div>

            <x-jet-validation-errors class="mb-4" />

            @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
            @endif
            <div class="flex flex-col  ml-10 mr-10 ">
                <div class="flex flex-col gap-2 py-5">
                    <h1 class="text-5xl text-dark">Login</h1>
                    <span class="text-xl text-dark mt-2">Welcome back to Task System</span>
                </div>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="flex flex-col mt-5 h-full">
                        <div class=" basis-1/2 mb-5">
                            <label for="email-address-icon" class="block mb-2 text-sm font-medium text-gray-900">{{ __('Username/Email') }}</label>
                            <div class="relative">
                                <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                                    <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path>
                                        <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path>
                                    </svg>
                                </div>
                                <input type="text" name="identity" :value="old('email')" required autofocus id="email-address-icon" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5" placeholder="name@gmail.com">
                            </div>
                        </div>
                        <div class=" basis-1/2">
                            <label for="password-icon" class="block mb-2 text-sm font-medium text-gray-900 ">{{ __('Password') }}</label>
                            <div class="relative">
                                <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                                    <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                                    </svg>
                                </div>
                                <input type="password" name="password" required autocomplete="current-password" id="password-icon" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5" placeholder="name@flowbite.com">
                            </div>
                        </div>
                    </div>
                    <div class="mt-10 text-center mb-10 ">
                        <x-jet-button class="ml-4 px-10">
                            {{ __('Log in') }}
                        </x-jet-button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{--END NEW LOGIN--}}


    {{-- <x-jet-authentication-card class="">
        <div>
            <p>hello mustfa</p>
            <x-slot name="logo">
                <img src="{{ asset('images\task-logo.png') }}" alt="Logo" class="w-20">
            </x-slot>
        </div>

        <x-jet-validation-errors class="mb-4" />

        @if (session('status'))
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ session('status') }}
        </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-jet-label value="{{ __('Username/Email') }}" />
                <x-jet-input class="block mt-1 w-full" type="text" name="identity" :value="old('email')" required autofocus />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-jet-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
                @endif

                <x-jet-button class="ml-4">
                    {{ __('Log in') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card> --}}
</x-guest-layout>

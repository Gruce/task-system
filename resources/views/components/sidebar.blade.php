<div>
    <div class="p-6 border-r" :class="sidebar_extended ? 'basis-2/12 w-2/12' : 'basis-1/12 w-1/12'">
        <aside class="sticky top-0 py-5" aria-label="Sidebar ">
            <div class="overflow-y-hidden h-screen" :class="sidebar_extended ? 'pr-9 pl-3' : ''">
                <div class="mb-5 pb-5">
                    <a href="{{ route('home') }}" class="flex items-center justify-center p-2 text-base text-gray text-blue-700 rounded-lg">
                        <img src="{{asset('images/logo.jpg')}}" alt="">
                        <span class="ml-3 font-bold" x-show="sidebar_extended">hello</span>
                    </a>
                </div>
                @foreach ($tabs as $tab)
                <div :class="sidebar_extended ? 'mb-5 ml-3 text-left' : 'mb-1 text-center text-sm'" class="@if (!$loop->first) mt-10 @endif text-gray-300">
                    {{ $tab->title }}
                </div>
                <ul class="space-y-2" :class="sidebar_extended ? 'ml-3' : ''">
                    @foreach ($tab->items as $item)
                    <li>
                        <a href="{{ route($item->route) }}" :data-tooltip-target="sidebar_extended ? '' : 'tooltip-default-{{ $item->route }}'" :class="sidebar_extended ? 'py-2' : 'justify-center py-3'" class="flex items-center px-4 text-base font-normal @if ($item->active) text-blue-500 @else text-gray-900 @endif rounded-lg group hover:bg-gray-100 ">
                            <i :class="sidebar_extended ? '' : 'text-lg'" class=" {{ $item->icon }}  @if ($item->active) text-blue-500 group-hover:text-blue-500 @else text-gray-500 group-hover:text-gray-900 @endif transition duration-75   "></i>
                            <span class="ml-3" x-show="sidebar_extended">{{ $item->title }}</span>
                        </a>
                        <div x-show="!sidebar_extended" id="tooltip-default-{{ $item->route }}" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 transition-opacity duration-300 tooltip dark:bg-gray-700">
                            {{ $item->title }}
                            <div class="tooltip-arrow" data-popper-arrow></div>
                        </div>
                    </li>
                    @endforeach
                </ul>
                @endforeach
                <ul>
                    <li>
                        <a href="{{ route('change_locale', 'en') }}" class="flex items-center justify-center px-4 text-base text-gray-900 font-normal rounded-lg group hover:bg-gray-100 ">
                            @if(config('app.locale') == 'en')
                            <span class="ml-3 font-semibold text-red-600">English</span>
                            @elseif (config('app.locale') != 'en')
                            <span class="ml-3  ">English</span>
                            @endif
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('change_locale', 'ar') }}" class="flex items-center justify-center px-4 text-base text-gray-900 font-normal rounded-lg group hover:bg-gray-100 ">
                            @if(config('app.locale') == 'ar')
                            <span class="ml-3 font-semibold text-red-600">عربي</span>
                            @elseif (config('app.locale') != 'ar')
                            <span class="ml-3  ">عربي</span>
                            @endif
                        </a>
                    </li>
                </ul>

                {{--
                <x-ui.icon-button @click="sidebar_extended=!sidebar_extended" x-show="sidebar_extended" icon="fas fa-arrow-left text-xl" color="secondary" class="py-3 px-6 mt-10" text="Watch Together" />
                <x-ui.icon-button @click="sidebar_extended=!sidebar_extended" x-show="!sidebar_extended" icon="fas fa-arrow-right text-xl" color="secondary" class="py-3 px-6 mt-10" text="Watch Together" /> --}}
        </aside>
    </div>
</div>

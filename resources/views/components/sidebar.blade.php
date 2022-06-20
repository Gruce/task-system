<div class="relative h-full px-2 py-6 border-x" :class="sidebar_extended ? 'basis-2/12 w-2/12' : 'basis-1/12 w-1/12'">
    <aside class="h-full" aria-label="Sidebar ">
        <div class="flex flex-col items-center justify-center h-full" :class="sidebar_extended ? 'pr-9 pl-3' : ''">
            <div class="flex-none pb-5 mb-5 basis-96">
                <a href="{{ route('home') }}" class="flex items-center justify-center p-2 text-base rounded-lg text-primary-700 text-gray">
                    <img class="w-20" :class="sidebar_extended ? 'w-32' : 'w-20'" src="{{asset('images/task-logo.png')}}" alt="">
                </a>
            </div>
            <div class="flex-1 w-full grow">
                @foreach ($tabs as $tab)
                <div :class="sidebar_extended ? 'mb-5 ml-3 {{en() ? 'text-left' : 'text-right'}}' : 'mb-1 text-center text-sm'" class="@if (!$loop->first) mt-10 @endif text-gray-300">
                    {{ $tab->title }}
                </div>
                <ul class="space-y-4" :class="sidebar_extended ? 'ml-3' : ''">
                    @foreach ($tab->items as $item)
                    <li>
                        <a href="{{ route($item->route) }}" :data-tooltip-target="sidebar_extended ? '' : 'tooltip-default-{{ $item->route }}'" :class="sidebar_extended ? 'py-2' : 'justify-center py-3'" class="flex items-center px-4 text-base font-normal @if ($item->active) text-primary-500 @else text-gray-900 @endif rounded-lg group hover:bg-gray-100 ">
                            <i :class="sidebar_extended ? '' : 'text-lg'" class=" {{ $item->icon }}  @if ($item->active) text-primary-500 group-hover:text-primary-500 @else text-gray-500 group-hover:text-gray-900 @endif transition duration-75   "></i>
                            <span class="mx-3" x-show="sidebar_extended">{{ $item->title }}</span>
                        </a>
                        <div x-show="!sidebar_extended" id="tooltip-default-{{ $item->route }}" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                            {{ $item->title }}
                            <div class="tooltip-arrow" data-popper-arrow></div>
                        </div>
                    </li>
                    @endforeach
                </ul>
                @endforeach
            </div>
            <div class="flex flex-col items-center justify-center flex-none w-full basis-96">
                @foreach ($langs as $locale => $name)
                <a href="{{ route('change_locale', $locale) }}" class="w-full px-4 py-2 text-sm text-center rounded-lg hover:bg-gray-100">
                    @if(lang($locale))
                    <span class="font-semibold text-primary-500">{{$name}}</span>
                    @elseif (!lang($locale))
                    <span>{{$name}}</span>
                    @endif
                </a>
                @endforeach
                <button @click="sidebar_extended=!sidebar_extended" class="w-full px-6 py-3 mt-3 text-gray-500">
                    <i x-show="!sidebar_extended" class="fa-solid fa-arrow-right {{ ar() ? 'ar-flip' : '' }}"></i>
                    <i x-show="sidebar_extended" class="fa-solid fa-arrow-left {{ ar() ? 'ar-flip' : '' }}"></i>
                </button>
            </div>
        </div>
    </aside>
</div>
<ul class="flex flex-wrap -mb-px text-sm font-medium text-center" role="tablist">
    @foreach ($tabs as $i => $tab)
        <li class="mx-2" role="presentation">
            <button wire:click.prevent="$set('selectedTab', {{$i}})" @class([
                'inline-block p-4 rounded-t-lg hover:text-primary-600 hover:border-primary-600 border-b-2',
                'text-primary-600 border-primary-600' => $selectedTab == $i,
                'text-gray-600 border-gray-300' => $selectedTab !== $i
            ]) type="button" role="tab" aria-selected="true">{{$tab}}</button>
        </li>
    @endforeach
</ul>

<div class="flex md:block">
    @foreach($menu as $item)
        @if($item['name'] == $activeMenu)
            <div class="mx-4 mt-4" wire:click='menuButtonClicked("{{ $item['name'] }}");'>
                <div class="flex shadow-md rounded-lg bg-white items-center text-sm">
                    <div class="w-7 h-7 rounded bg-blue-500 m-3 flex items-center justify-center">
                        <i class="fa fa-{{ $item['icon'] }} text-white"></i>
                    </div>
                    <p>{{ $item['text'] }}</p>
                </div>
            </div>
        @else
            <a href="{{ route($item['route']) }}">
                <div class="mx-4 mt-4">
                    <div class="flex items-center rounded-lg hover:bg-slate-200 cursor-pointer text-sm">
                        <div class="w-7 h-7 rounded bg-white m-3 flex items-center justify-center shadow">
                            <i class="fa fa-{{ $item['icon'] }} text-slate-700"></i>
                        </div>
                        <p>{{ $item['text'] }}</p>
                    </div>
                </div>
            </a>
        @endif
    @endforeach
</div>

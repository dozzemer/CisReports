<div>
    @foreach($menuItems as $item)
        @if($activeMenuItem == $item['name'])
        <div class="mx-4 mt-4" wire:click='menuButtonClicked("{{ $item['name'] }}");'>
            <div class="flex shadow-md rounded-lg bg-white items-center text-sm">
                <div class="w-7 h-7 rounded bg-blue-500 m-3 flex items-center justify-center">
                    <i class="fa fa-{{ $item['icon'] }} text-white"></i>
                </div>
                <p>{{ $item['text'] }}</p>
            </div>
        </div>
        @else
        <div class="mx-4 mt-4" wire:click='menuButtonClicked("{{ $item['name'] }}");'>
            <div class="flex items-center rounded-lg hover:bg-slate-200 cursor-pointer text-sm">
                <div class="w-7 h-7 rounded bg-white m-3 flex items-center justify-center shadow">
                    <i class="fa fa-{{ $item['icon'] }} text-slate-700"></i>
                </div>
                <p>{{ $item['text'] }}</p>
                @if($loadingMenuItem == $item['name'])
                <div class="ml-auto pr-3">
                <i class="fa-solid fa-spinner animate-spin"></i>
                </div>
                @endif
            </div>
        </div>
        @endif
    @endforeach
</div>

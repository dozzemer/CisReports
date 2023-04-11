<div>

    @if(!$deleted)
    <div class="w-full border-b bg-slate-50 border rounded mb-4">
        @if($showConfirm)
            <div class="p-4">
                <p class="font-semibold">Möchten Sie den Text "{{ $title }}" wirklich löschen?</p>
                <div class="flex space-x-2">
                    <button class="cis-submit bg-red-700 p-1 text-sm px-2" wire:click="delete">Löschen</button>
                    <button class="cis-submit bg-slate-600 p-1 text-sm px-2" wire:click="$toggle('showConfirm')">Abbrechen</button>
                </div>
            </div>
        @else
            <div class="flex">
                <button wire:click="$toggle('showConfirm')" class="bg-slate-400 hover:bg-slate-500 rounded-tl text-slate-50 px-2">
                    <i class="fa fa-trash px-2"></i>
                </button>
                <input type="text" wire:model.debounce.1s="title" wire:model.lazy="title" class="bg-slate-50 border-b w-full p-4 outline-none">
            </div>

            <textarea wire:model.debounce.1s="text" rows="8" wire:model.lazy="text" class="bg-slate-50 w-full p-4 resize-none outline-none"></textarea>
            <div class="h-8 flex items-center pl-4 text-sm">
                <span wire:dirty wire:target="title,text">
                    <i class="fa fa-spinner animate-spin text-xs"></i>
                    sychronisieren...
                </span>
            </div>
        @endif
    </div>
    @endif

</div>

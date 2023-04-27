<div class="bg-slate-50 border border-slate-400">
    <div class="flex">
        @if(!auth()->user()->group_user)
        <div wire:click="selectTab('text')" class="bg-slate-50 h-12 px-4 border-r text-sm border-slate-300 flex items-center @if($tab == "text") font-bold @else border-b hover:bg-slate-100 cursor-pointer @endif ">
            Berichtstexte
        </div>
        @endif
        <div wire:click="selectTab('personal')" class="bg-slate-50 h-12 px-4 border-r text-sm border-slate-300 flex items-center @if($tab == "personal") font-bold @else border-b hover:bg-slate-100 cursor-pointer @endif ">
            Personaleinsatz
        </div>
        @if(!auth()->user()->group_user)
        <div wire:click="selectTab('atemschutz')" class="bg-slate-50 h-12 px-4 border-r text-sm border-slate-300 flex items-center @if($tab == "atemschutz") font-bold @else border-b hover:bg-slate-100 cursor-pointer @endif ">
            Atemschutz
        </div>
        <div wire:click="selectTab('abschluss')" class="bg-slate-50 h-12 px-4 border-r text-sm border-slate-300 flex items-center @if($tab == "abschluss") font-bold @else border-b hover:bg-slate-100 cursor-pointer @endif ">
            Abschluss
        </div>
        @endif
        <div class="w-full border-b border-slate-300">

        </div>
    </div>

    <div class="w-full p-4">
        @switch($tab)
            @case("overview")
                @include("livewire.frontend.bericht.edit.overview")
                @break
            @case("text")
                @livewire("frontend.bericht.text-editor",['bericht' => $bericht])
                @break
            @case("personal")
                @livewire("frontend.bericht.personaleditor",['bericht' => $bericht])
                @break
            @case("atemschutz")
                @livewire("frontend.bericht.atemschutz",['bericht' => $bericht])
                @break
            @case("abschluss")
                @livewire("frontend.bericht.abschluss",['bericht' => $bericht])
                @break
        @endswitch
    </div>
</div>

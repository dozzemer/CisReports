<div class="w-full p-2">
    <div class="w-full p-2 border-b border-slate-200 text-xs text-slate-700 font-light">
        <i class="fa fa-user pr-2"></i>  {{ auth()->user()->firstname }}
    </div>

    <div class="w-full p-2">
        @if($error)
        {{ $error }}
    @endif

    @if($activePage == "user")
        @livewire("backend.pages.user")
    @endif
    </div>
</div>

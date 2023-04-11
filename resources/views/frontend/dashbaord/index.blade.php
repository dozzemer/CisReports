@extends("layout.frontend")

@section("content")

<a href="{{ route("bericht.create-bericht") }}">
    <div class="h-20 items-center flex">
        <div class="h-full flex items-center justify-center flex-col bg-gradient-to-b from-slate-50 to-slate-200 border border-slate-300 text-slate-600 shadow px-10 text-center">
            <i class="fa fa-plus-circle text-2xl"></i>
            <p class="text-sm">Bericht erstellen</p>
        </div>
    </div>
</a>

<div class="cis-panel mt-4">
    <div class="cis-panel-headline">
        <i class="fa fa-keyboard"></i> offene Berichte
    </div>

    <div class="text-center p-5">
        @livewire("frontend.bericht.open-berichts")
    </div>
</div>

@endsection

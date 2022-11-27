@extends("layout.frontend")

@section("content")

@if(auth()->check() && auth()->user()->backend_access)
<div class="grid grid-flow-col auto-cols-max gap-4 mb-4">
    <div class="cis-panel bg-indigo-100">
        <div class="cis-panel-headline border-indigo-200">
            <i class="fa fa-cog"></i> Verwaltung
        </div>
        <p class="mb-3">
            Sie sind mit Verwaltungsrechten angemeldet.
        </p>
        <a href="#">Zum verwaltungsbereich...</a>
    </div>
  </div>
@endif

<div class="cis-panel">
    <div class="cis-panel-headline">
        <i class="fa fa-keyboard"></i> Einsatzbereichte
    </div>

    <div class="text-center p-5">
        <p class="text-3xl">keine Einsatzberichte vorhanden</p>
        <p>... hier gibt es nichts zu tun.</p>
        <i class="fa fa-wand-magic-sparkles text-4xl mt-5"></i>
    </div>

</div>

@endsection

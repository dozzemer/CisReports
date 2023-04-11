@extends("layout.frontend")

@section("content")
    <div class="cis-panel">
        <div class="cis-panel-headline">
            <i class="fa fa-keyboard"></i> Bericht erstellen
        </div>


        @livewire("frontend.bericht.create-bericht")
    </div>
@endsection

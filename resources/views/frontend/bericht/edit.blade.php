@extends("layout.frontend")

@section("content")
    @livewire("frontend.bericht.edit-bericht",['bericht' => $bericht])
@endsection

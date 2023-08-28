@extends("layout.backend")

@section("content")
    <p class="cis-headline">Dashboard</p>
    <div class="cis-panel">
        <div class="cis-panel-headline">Willkommen</div>
        <p>
            Herzlich Willkommen {{ auth()->user()->fullname() }}
        </p>
    </div>
@endsection

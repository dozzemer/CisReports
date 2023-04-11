@extends("layout.backend")

@section("content")
    <div class="cis-panel">
        <div class="cis-panel-headline">
            Einsatzmittel hinzufügen
        </div>

        @include("layout.error_success")

        <form action="{{ route("backend.em.store") }}" method="POST">
            @csrf
            <div class="cis-form-group">
                <label for="name">Name</label>
                <input type="text" name="name" value="{{ old("name") }}">
            </div>
            <div class="cis-form-group">
                <label for="name">Funkkennung</label>
                <input type="text" name="fmsname" value="{{ old("fmsname") }}">
            </div>

            <button type="submit" class="cis-submit">Speichern</button>
        </form>

    </div>

@endsection

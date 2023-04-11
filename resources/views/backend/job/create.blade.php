@extends("layout.backend")

@section("content")
    <div class="cis-panel">
        <div class="cis-panel-headline">
            Funktion hinzufügen
        </div>

        @include("layout.error_success")

        <form action="{{ route("backend.job.store") }}" method="POST">
            @csrf
            <div class="cis-form-group">
                <label for="name">Name</label>
                <input type="text" name="name" value="{{ old("name") }}">
            </div>
            <div class="cis-form-group">
                <label for="fahrzeug">Standardfunktion</label>
                <select name="fahrzeug">
                    <option value="1" @if(old("fahrzeug",0) == "1") selected @endif>Ja</option>
                    <option value="0" @if(old("fahrzeug",0) == "0") selected @endif>Nein</option>
                </select>
            </div>

            <button type="submit" class="cis-submit">Speichern</button>
        </form>

    </div>

@endsection

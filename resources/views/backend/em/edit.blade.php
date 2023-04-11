@extends("layout.backend")

@section("content")
    <div class="cis-panel">
        <div class="cis-panel-headline">
            Einsatzmittel ändern
        </div>

        @include("layout.error_success")

        <form action="{{ route("backend.em.update",$einsatzmittel->cis_row_id) }}" method="POST">
            @csrf
            <div class="cis-form-group">
                <label for="name">Name</label>
                <input type="text" name="name" value="{{ old("name",$einsatzmittel->name) }}">
            </div>
            <div class="cis-form-group">
                <label for="name">Funkkennung</label>
                <input type="text" name="fmsname" value="{{ old("fmsname",$einsatzmittel->fmsname) }}">
            </div>

            <button type="submit" class="cis-submit">Speichern</button>
        </form>
</div>

    <div class="cis-panel mt-4">
        <div class="cis-panel-headline">
            Einsatzmittel löschen
        </div>



        <p class="mt-8">Um das Einsatzmittel zu löschen, geben Sie bitte den folgenden Bestätigungscode an:</p>

        <p class="text-slate-600 bg-slate-200 my-5 font-bold rounded p-2">
            {{ Carbon\Carbon::now()->day }}-{{ $einsatzmittel->fmsname }}-{{ Carbon\Carbon::now()->year }}
        </p>

        <form action="{{ route("backend.em.delete",$einsatzmittel->cis_row_id) }}" method="POST">
            @csrf
            <div class="cis-form-group">
                <div>Bestätigungscode</div>
                <input type="text" name="verification" @error("verification") class="is-invalid" @enderror>
            </div>
            <button class="cis-submit bg-red-600" type="submit">Einsatzmittel löschen</button>
        </form>
    </div>




@endsection

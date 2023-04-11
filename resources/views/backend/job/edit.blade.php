@extends("layout.backend")

@section("content")
    <div class="cis-panel">
        <div class="cis-panel-headline">
            Funktion ändern
        </div>

        @include("layout.error_success")

        <form action="{{ route("backend.job.update",$job->cis_row_id) }}" method="POST">
            @csrf
            <div class="cis-form-group">
                <label for="name">Name</label>
                <input type="text" name="name" value="{{ old("name",$job->name) }}">
            </div>
            <div class="cis-form-group">
                <label for="fahrzeug">Standardfunktion</label>
                <select name="fahrzeug">
                    <option value="1" @if(old("fahrzeug",$job->fahrzeug) == "1") selected @endif>Ja</option>
                    <option value="0" @if(old("fahrzeug",$job->fahrzeug) == "0") selected @endif>Nein</option>
                </select>
            </div>
            <button type="submit" class="cis-submit">Speichern</button>
        </form>
</div>

    <div class="cis-panel mt-4">
        <div class="cis-panel-headline">
            Funktion löschen
        </div>



        <p class="mt-8">Um die Funktion zu löschen, geben Sie bitte den folgenden Bestätigungscode an:</p>

        <p class="text-slate-600 bg-slate-200 my-5 font-bold rounded p-2">
            {{ Carbon\Carbon::now()->day }}-{{ substr($job->name,0,1) }}-{{ Carbon\Carbon::now()->year }}
        </p>

        <form action="{{ route("backend.job.delete",$job->cis_row_id) }}" method="POST">
            @csrf
            <div class="cis-form-group">
                <div>Bestätigungscode</div>
                <input type="text" name="verification" @error("verification") class="is-invalid" @enderror>
            </div>
            <button class="cis-submit bg-red-600" type="submit">Funktion löschen</button>
        </form>
    </div>




@endsection

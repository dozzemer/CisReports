@extends("layout.backend")

@section("content")
<div class="p-6">
    <h1 class="text-slate-700 font-bold text-2xl my-6">Einstellungen</h1>
    @include("layout.error_success")
    <div class="cis-panel">
        <div class="cis-panel-headline">Allgemeine Einstellungen</div>
        <form action="{{ route("backend.settings.update") }}" method="POST">
            @csrf
            <div class="cis-form-group">
                <div>Organisation</div>
                <input type="text" name="organisation_name" @error("organisation_name") class="is-invalid" @enderror value="{{ old("organisation_name",CisConfig\Facades\Config::get('organisation_name')) }}">
            </div>
            <div class="cis-form-group">
                <div>Authentifizierungsmethode</div>
                <select name="user_auth_method">
                    <option value="username" @if(old("auth_method",CisConfig\Facades\Config::get('user_auth_method')) == "username") selected @endif>Benutzername</option>
                    <option value="email" @if(old("auth_method",CisConfig\Facades\Config::get('user_auth_method')) == "email") selected @endif>E-Mail</option>
                </select>
            </div>

            <button type="submit" class="cis-submit">Änderungen speichern</button>
        </form>
    </div>
</div>
@endsection

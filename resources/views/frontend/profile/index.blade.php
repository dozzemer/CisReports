@extends("layout.frontend")

@section("content")
    <div class="cis-panel">
        <div class="cis-panel-headline">
            Benutzerprofil
        </div>

        @include("layout.error_success")

        <div class="border-b pb-4">
            <form action="{{ route("profile.data.store") }}" method="POST">
                @csrf
                <div class="cis-form-group">
                    <label for="email">
                        E-Mail Adresse
                    </label>
                    <input type="text" name="email" value="{{ old("email",auth()->user()->email) }}">
                </div>

                <button type="submit" class="cis-submit">Benutzerdaten speichern</button>
            </form>
        </div>

        <div class="pt-4">
            <form action="{{ route("profile.password.store") }}" method="POST">
                @csrf
                <div class="cis-form-group">
                    <label for="password">
                        Neues Passwort
                    </label>
                    <input type="password" name="password" value="">
                </div>

                <div class="cis-form-group">
                    <label for="password">
                        Neues Passwort wiederholen
                    </label>
                    <input type="password" name="password_confirmation" value="">
                </div>

                <button type="submit" class="cis-submit">Passwort speichern</button>
            </form>
        </div>



    </div>
@endsection

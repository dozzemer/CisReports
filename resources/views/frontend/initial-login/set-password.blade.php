@extends("layout.initial-login")

@section("content")
    @include("layout.error_success")

    <p class="text-xl text-slate-500"><span class="text-slate-800">Herzlich Willkommen,</span> {{ $user->fullname() }}</p>

    <p class="text-slate-700 text-sm mt-4 mb-4">
        Bitte überprüfe deine Daten und setzte dein persönliches Passwort
    </p>
    <form action="{{ route("initial-login.finish") }}" method="POST">
        @csrf
        <input type="hidden" name="code" value="{{ $code->code }}">

        <div class="cis-form-group">
            <label for="email">E-Mail Adresse:</label>
            <input type="text" name="email" value="{{ old("email",$user->email) }}">
        </div>

        <div class="cis-form-group">
            <label for="password">Passwort:</label>
            <input type="password" name="password" value="">
        </div>

        <div class="cis-form-group">
            <label for="password">Passwort wiederholen:</label>
            <input type="password" name="password_confirmation" value="">
        </div>

        <button type="submit" class="cis-submit">Speichern & Einrichtung abschließen</button>
    </form>
@endsection

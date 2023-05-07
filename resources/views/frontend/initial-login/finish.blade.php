@extends("layout.initial-login")

@section("content")

<p class="text-2xl text-emerald-500">Alles erledigt <i class="fa fa-check"></i></p>
<p class="text-sm mt-4">Ihr Benutzerkonto ist nun freigeschaltet und verfügbar.</p>
<p class="text-sm">Bitte notieren Sie sich Ihren Benutzernamen für die Anmeldung:</p>

<p class="mt-4 mb-4 p-2 bg-slate-100 rounded text-sm">Benutzername: <b>{{ $user->username }}</b></p>

<a href="{{ route("sign-in") }}">
    <p class="p-2 bg-emerald-600 font-light text-slate-50 text-slate-700 border rounded shadow text-center">
        Jetzt anmelden
    </p>
</a>

@endsection

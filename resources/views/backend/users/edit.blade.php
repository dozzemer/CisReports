@extends("layout.backend")

@section("content")
<div class="p-6">
    <a href="{{ route("backend.users.show",$user) }}" class="cis-prev"><i class="fa fa-angles-left"></i> zurück zur {{ $user->firstname }} {{ $user->lastname }}</a>
    <h1 class="text-slate-700 font-bold text-2xl my-6">Stammdaten ändern: {{ $user->firstname }} {{ $user->lastname }}</h1>

    <form action="{{ route("backend.users.update",$user) }}" method="POST">
        @csrf
        <div class="cis-panel">
            <div class="cis-form-group">
                <div>Vorname</div>
                <input type="text" name="firstname" value="{{ old("firstname",$user->firstname) }}"  @error('firstname') class="is-invalid" @endif>
                @error("firstname")
                    <p class="text-xs text-red-500">
                        Bitte geben Sie einen Vornamen an
                    </p>
                @enderror
            </div>
            <div class="cis-form-group">
                <div>Nachname</div>
                <input type="text" name="lastname" value="{{ old("lastname",$user->lastname) }}"  @error('lastname') class="is-invalid" @endif>
                @error("lastname")
                    <p class="text-xs text-red-500">
                        Bitte geben Sie einen Nachnamen an
                    </p>
                @enderror
            </div>
            <div class="cis-form-group">
                <div>E-Mail</div>
                <input type="text" name="email" value="{{ old("email",$user->email) }}" @error('email') class="is-invalid" @endif>
                @error("email")
                    <p class="text-xs text-red-500">
                        Bitte geben Sie eine E-Mail Adresse an, die noch kein anderer Anwender verwendet
                    </p>
                @enderror
            </div>
            @if($userAuthMethod == "username")
            <div class="cis-form-group">
                <div>Benutzername</div>
                <input type="text" name="username" value="{{ old("username",$user->username) }}"  @error('username') class="is-invalid" @endif>
                @error("username")
                    <p class="text-xs text-red-500">
                        Bitte geben Sie einen Benutzername an, die noch kein anderer Anwender verwendet
                    </p>
                @enderror
            </div>
            @else
                <input type="hidden" name="username" value="user-{{ Str::random(40) }}">
            @endif
            <button class="cis-submit" type="submit">Stammdaten speichern</button>
        </div>
    </form>
</div>
@endsection

@extends("layout.backend")

@section("content")
<div class="p-6">
    <a href="{{ route("backend.users") }}" class="cis-prev"><i class="fa fa-angles-left"></i> zurück zu Anwender</a>
    <h1 class="text-slate-700 font-bold text-2xl my-6">Gruppenanwender erstellen</h1>

    <form action="{{ route("backend.groupusers.store") }}" method="POST">
        @csrf
        <div class="cis-panel">
            <div class="cis-form-group">
                <div>Benutzername</div>
                <input type="text" name="username" value="{{ old("username") }}"  @error('username') class="is-invalid" @endif>
                @error("username")
                    <p class="text-xs text-red-500">
                        Bitte geben Sie einen Benutzername an, die noch kein anderer Anwender verwendet
                    </p>
                @enderror
            </div>
            <button class="cis-submit" type="submit">Gruppenanwender erstellen</button>
        </div>
    </form>
</div>
@endsection

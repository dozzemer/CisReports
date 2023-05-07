@extends("layout.backend")

@section("content")
<div class="p-6">
    <a href="{{ route("backend.users") }}" class="cis-prev"><i class="fa fa-angles-left"></i> zurück zu Anwender</a>
    <h1 class="cis-headline">{{ $user->firstname }} {{ $user->lastname }}</h1>

    <div class="grid grid-flow-row gap-4">
        <div class="cis-panel">
            <div class="cis-panel-headline">
                <i class="fa fa-user"></i> Stammdaten
            </div>
            <div class="pr-12">
                @if(!$user->group_user)
                <p class="text-xs">Vorname</p>
                <p class="font-bold mb-4">{{ $user->firstname }}</p>

                <p class="text-xs">Nachname</p>
                <p class="font-bold mb-4">{{ $user->lastname }}</p>

                <p class="text-xs">E-Mail Adresse</p>
                <p class="font-bold mb-4">{{ $user->email }}</p>
                @endif
                @if($userAuthMethod == "username")
                <p class="text-xs">Benutzername</p>
                <p class="font-bold mb-4">{{ $user->username }}</p>
                @endif
            </div>
            @if(!$user->group_user)
            <a href="{{ route("backend.users.edit",$user) }}" class="bg-slate-500 text-white text-xs p-1 rounded shadow">Stammdaten ändern</a>
            @endif
        </div>

        <div class="cis-panel">
            <div class="cis-panel-headline">
                <i class="fa fa-key"></i> Passwort setzen
            </div>
            <div class="pr-12">
                @livewire("backend.user.password",['user' => $user])
            </div>
        </div>

        <div class="cis-panel">
            <div class="cis-panel-headline">
                <i class="fa fa-door-open"></i> Willkommen´s Code einrichten
            </div>
            <div class="pr-12">
                @livewire("backend.user.welcome",['user' => $user])
            </div>
        </div>

        @if(!$user->group_user)
        <div class="cis-panel">
            <div class="cis-panel-headline">
                <i class="fa fa-lock"></i> Zugriff
            </div>
            <div class="pr-12">
                @livewire("backend.user.access",['user' => $user])
            </div>
        </div>
        @endif

        <div class="cis-panel">
            <div class="cis-panel-headline">
                <i class="fa fa-trash"></i> Anwender löschen
            </div>
            <div class="pr-12">
                @livewire("backend.user.delete",['user' => $user])
            </div>
        </div>
    </div>


</div>
@endsection

<div>
<div class="p-2 flex items-center">
    <input type="text" class="border rounded p-2 my-3 w-full" placeholder="Suchen... E-Mail, Name" wire:model='searchString'>
</div>

<div class="p-2">
@if(!$searchString)
{{ $users->links('vendor.pagination.tailwind') }}
@else
<span>
@if($users->count() > 1)
    {{ $users->count() }} Ergebnisse
@elseif($users->count() == 1)
    1 Ergebnis
@endif
</span>
@endif
</div>

<table class="w-full font-light text-slate-700">
        <thead>
            <tr>
                <th class="p-2 text-left">Vorname</th>
                <th class="p-2 text-left">Nachname</th>
                <th class="p-2 text-left ">E-Mail</th>
                @if($user_auth_method == "username")
                <th class="p-2 text-left ">Benutzername</th>
                @endif
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr onclick="window.location='{{ route('backend.users.show',$user->cis_row_id) }}';" class="cursor-pointer hover:bg-slate-100">
                    <td class="p-2 border-t">{{ $user->firstname }}</td>
                    <td class="p-2 border-t">{{ $user->lastname }}</td>
                    <td class="p-2 text-left border-t">{{ $user->email }}</td>
                    @if($user_auth_method == "username")
                    <td class="p-2 text-left border-t">{{ $user->username }}</td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>

    @if(!$users->count())
    <div class="p-2 text-slate-400">
        kein Ergebnis vorhanden
    </div>
    @endif
</div>

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
                <th>Welcome-Mode</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr onclick="window.location='{{ route('backend.users.show',$user->cis_row_id) }}';" class="cursor-pointer hover:bg-slate-100">
                    <td class="p-2 border-t">
                        @if(!$user->group_user)
                        {{ $user->firstname }}
                       @else
                        GROUP-USER
                        @endif
                    </td>
                    <td class="p-2 border-t">
                        @if(!$user->group_user)
                        {{ $user->lastname }}
                        @endif
                    </td>
                    <td class="p-2 text-left border-t">
                        @if(!$user->group_user)
                        {{ $user->email }}
                        @endif
                    </td>
                    @if($user_auth_method == "username")
                    <td class="p-2 text-left border-t">{{ $user->username }}</td>
                    @endif
                    <td class="p-2 text-left border-t text-center">
                        @if($user->welcomeMode)
                            <i class="fa fa-dot-circle text-green-700"></i>
                        @else
                            <i class="fa fa-dot-circle text-red-700"></i>
                        @endif
                    </td>
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

<div>
    <table class="cis-table">
        <thead>
            <th>Name</th>
            <th>
                Funktion
            </th>
            @foreach($einsatzmittel as $em)
                <th>{{ $em->name }} ( @if(!$em->mannschaft) 0 @else {{ $em->mannschaft }} @endif )</th>
            @endforeach
        </thead>
        <tbody>
        @foreach($users as $user)
            @if(!$user->group_user)
            @livewire("frontend.bericht.personal-row",['bericht' => $bericht,'user' => $user],key($user->cis_row_id))
            @endif
        @endforeach
        </tbody>
    </table>
</div>

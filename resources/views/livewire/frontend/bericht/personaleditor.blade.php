<div style="max-height: 400px; overflow: auto;">
    @include("layout.error_success")
    <table class="cis-table">
        <thead class="sticky top-0 bg-white z-10">
            <tr>
                <th>Name</th>
                <th>Funktion</th>
                @foreach($einsatzmittel as $em)
                    <th>
                        {{ $em->name }} ({{ $em->fuehrung_count ?? 0 }} / {{ $em->gesamt_count ?? 0 }})
                    </th>
                @endforeach
            </tr>
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

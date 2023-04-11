<div>
    @if($openBerichts->count())
        <table class="cis-table">
            <thead>
                <tr>
                    <th>Berichtsart</th>
                    <th>eröffnet am/um</th>
                    <th>letzte Änderung</th>
                    <th>erstellt durch</th>
                </tr>
            </thead>
            <tbody>
                @foreach($openBerichts as $bericht)
                <tr onclick="window.location.href='{{ route("bericht.show-bericht",$bericht->cis_row_id) }}';">
                    <td class="text-left">
                        @if($bericht->type == "uebung")
                            <p class="text-white bg-slate-400 inline p-1 rounded shadow">
                                <i class="fa fa-dumbbell"></i> Übung
                            </p>
                        @elseif($bericht->type == "einsatz")
                            <p class="text-white bg-blue-400 inline p-1 rounded shadow">
                                <i class="fa fa-bell"></i> Einsatz
                            </p>
                        @endif
                    </td>
                    <td class="text-left">{{ $bericht->created_at->format("d.m.Y, H:i") }}</td>
                    <td class="text-left">{{ $bericht->updated_at->format("d.m.Y, H:i") }}</td>
                    <td class="text-left">{{ $bericht->creator->fullname() }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p class="text-3xl">keine offenen Berichte vorhanden</p>
        <p>... hier gibt es nichts zu tun.</p>
        <i class="fa fa-wand-magic-sparkles text-4xl mt-5"></i>
    @endif
</div>

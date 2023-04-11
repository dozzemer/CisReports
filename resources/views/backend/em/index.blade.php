@extends("layout.backend")

@section("content")
    <h1 class="text-slate-700 font-bold text-2xl my-6">Einsatzmittel verwalten</h1>
    <div class="cis-panel">
        <div class="cis-panel-headline">
            Einsatzmittelübersicht
        </div>

        <a href="{{ route("backend.em.create") }}" class="cis-submit text-sm p-1 px-2">Einsatzmittel hinzufügen</a>


        @include("layout.error_success")

        <table class="cis-table mt-2">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>FMS-Name</th>
                    <th>Erstellt</th>
                    <th>Geändert</th>
                </tr>
            </thead>
            <tbody>
                @foreach($einsatzmittel as $em)
                    <tr onclick="window.location.href='{{ route("backend.em.edit",$em->cis_row_id) }}'">
                        <td>{{ $em->name }}</td>
                        <td>{{ $em->fmsname }}</td>
                        <td>{{ $em->created_at->format("d.m.Y, H:i") }} Uhr</td>
                        <td>{{ $em->updated_at->format("d.m.Y, H:i") }} Uhr</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection

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
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($einsatzmittel as $em)
                    <tr>
                        <td onclick="window.location.href='{{ route("backend.em.edit",$em->cis_row_id) }}'">{{ $em->name }}</td>
                        <td onclick="window.location.href='{{ route("backend.em.edit",$em->cis_row_id) }}'">{{ $em->fmsname }}</td>
                        <td onclick="window.location.href='{{ route("backend.em.edit",$em->cis_row_id) }}'">{{ $em->created_at->format("d.m.Y, H:i") }} Uhr</td>
                        <td onclick="window.location.href='{{ route("backend.em.edit",$em->cis_row_id) }}'">{{ $em->updated_at->format("d.m.Y, H:i") }} Uhr</td>
                        <td>
                            @if(!$loop->last)
                            <form action="{{ route("backend.em.order.higher") }}" method="POST">
                                @csrf
                                <input type="hidden" name="einsatzmittel" value="{{ $em->cis_row_id }}">
                                <button type="submit">
                                    <i class="fa fa-arrow-down"></i>
                                </button>
                            </form>
                            @endif
                        </td>
                        <td>
                            @if(!$loop->first)
                            <form action="{{ route("backend.em.order.lower") }}" method="POST">
                                @csrf
                                <input type="hidden" name="einsatzmittel" value="{{ $em->cis_row_id }}">
                                <button type="submit">
                                    <i class="fa fa-arrow-up"></i>
                                </button>
                            </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection

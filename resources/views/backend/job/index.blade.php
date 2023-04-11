@extends("layout.backend")

@section("content")
    <h1 class="text-slate-700 font-bold text-2xl my-6">Funktionen verwalten</h1>
    <div class="cis-panel">
        <div class="cis-panel-headline">
            Funktionsübersicht
        </div>

        <a href="{{ route("backend.job.create") }}" class="cis-submit text-sm p-1 px-2">Funktion hinzufügen</a>


        @include("layout.error_success")

        <table class="cis-table mt-2">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Standardfunktion</th>
                    <th>Erstellt</th>
                    <th>Geändert</th>
                </tr>
            </thead>
            <tbody>
                @foreach($jobs as $job)
                    <tr onclick="window.location.href='{{ route("backend.job.edit",$job->cis_row_id) }}'">
                        <td>{{ $job->name }}</td>
                        <td>
                            @if($job->fahrzeug)
                                Ja
                            @else
                                Nein
                            @endif
                        </td>
                        <td>{{ $job->created_at->format("d.m.Y, H:i") }} Uhr</td>
                        <td>{{ $job->updated_at->format("d.m.Y, H:i") }} Uhr</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection

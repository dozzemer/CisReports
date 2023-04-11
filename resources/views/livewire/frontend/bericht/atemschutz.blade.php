<div>
    <table class="cis-table">
        <thead>
            <tr>
                <th></th>
                <th>Name</th>
                <th>PA-Nummer</th>
                <th>Tragezeit in Minuten</th>
                <th>Tätigkeit</th>
            </tr>
        </thead>
        <tbody>
            @foreach($personalBerichts as $row)
                @livewire("frontend.bericht.atemschutz-row",['row' => $row],key($row->cis_row_id))
            @endforeach
        </tbody>
    </table>
</div>

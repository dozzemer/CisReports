<style>
    table {
        border: 1px solid #DEDEDF;
        height: 100%;
        width: 100%;
        table-layout: fixed;
        border-collapse: collapse;
        border-spacing: 1px;
        text-align: left;
        font-size: 0.8em;
    }
    caption {
        caption-side: top;
        text-align: left;
    }
    th {
        border: 1px solid #DEDEDF;
        background-color: #ECEFF1;
        color: #000000;
        padding: 5px;
    }
    td {
        border: 1px solid #DEDEDF;
        background-color: #FFFFFF;
        color: #000000;
        padding-left: 5px;
        padding-top: 2px;
        padding-bottom: 2px;
    }
</style>
<table>
    <thead>
        <tr>
            <th style="text-align: left;">Name</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
    @foreach($data as $item)
        <tr>
            <td>{{ $item['lastname'] }}, {{ $item['firstname'] }}</td>
            <td></td>
        </tr>
    @endforeach
    </tbody>
</table>

<style>
table.customTable {
  font-size: 10px;
  width: 100%;
  background-color: #FFFFFF;
  border-collapse: collapse;
  border-width: 1px;
  border-color: #000000;
  border-style: solid;
  color: #000000;
}

table.customTable td, table.customTable th {
  border-width: 1px;
  border-color: #000000;
  border-style: solid;
  padding: 1px;
}

table.customTable thead {
  background-color: #F8F8F8;
}

</style>
<table class="customTable">
    <thead>
        <tr>
            <th style="text-align: left; width: 30%;">Name</th>
            <th style="width: 70%;"></th>
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

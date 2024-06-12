
<table>
    <thead>
    <tr>
        <th>Unit Kontrakan</th>
        <th>Lokasi</th>
        <th>Total Harga</th>
        <th>Tanggal Mulai Huni</th>
    </tr>
    </thead>
    <tbody>
        @foreach ($notas as  $nota)
        <tr>
            <td>{{ $nota->unit_kontrakan }}</td>
            <td>{{ $nota->lokasi_unit_kontrakan }}</td>
            <td>{{ $nota->harga_unit_kontrakan_total }}</td>
            <td>{{ $nota->tanggal_huni }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

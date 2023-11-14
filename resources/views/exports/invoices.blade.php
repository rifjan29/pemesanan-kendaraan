<table>
    <thead>
    <tr>
        <th>No Transaksi</th>
        <th>Nama Pegawai</th>
        <th>Keperluan</th>
        <th>Kendaraan</th>
        <th>Driver</th>
        <th>Tanggal Dari</th>
        <th>Tanggal Sampai</th>
        <th>Status Pesanan</th>
        <th>Status Pengembalian</th>
        <th>Pihak Yang Menyetujui</th>
    </tr>
    </thead>
    <tbody>
    @foreach($invoices as $item)
        <tr>
            <td>{{ $item->no_transaksi }}</td>
            <td>{{ $item->employee->user->name }}</td>
            <td></td>
            <td>{{ $item->vehicle->name }} - {{ $item->vehicle->merk }}</td>
            <td>{{ $item->driver->name }}</td>
            <td>{{ \Carbon\Carbon::parse($item->date_start)->translatedFormat('d F Y') }}</td>
            <td>{{ \Carbon\Carbon::parse($item->date_end)->translatedFormat('d F Y') }}</td>
            <td>{{ $item->status_reserved }}</td>
            <td>
                @if ($item->vehicleReturn != null)
                    {{ $item->vehicleReturn->return_status }}
                @else
                    Belum Pengembalian
                @endif
            </td>
            <td> {{ ucwords($item->vehicleAgre->user->name) }}</td>
        </tr>
    @endforeach
    </tbody>
</table>

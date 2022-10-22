<table>
    <thead>
        <tr>
            <td colspan="8" style="text-align: center; font-size: 14px"><b>Laporan Omset Pendapatan CV. Citra Berkah Express</b></td>
        </tr>
        <tr>
            <th><b>No</b></th>
            <th><b>Tanggal</b></th>
            <th><b>No Polisi</b></th>
            <th><b>Nama Supir</b></th>
            <th><b>Biaya/1 Mobil</b></th>
            <th><b>Pengeluaran JKT</b></th>
            <th><b>Pengeluaran LPG</b></th>
            <th><b>Jumlah</b></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($omsets as $omset)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $omset->created_at->format('Y-m-d') }}</td>
                <td>{{ $omset->nopol }}</td>
                <td>{{ $omset->nama_supir }}</td>
                <td>{{ rupiah($omset->biaya_mobil) }}</td>
                <td>{{ rupiah($omset->pengeluaran_jkt) }}</td>
                <td>{{ rupiah($omset->pengeluaran_lpg) }}</td>
                <td>{{ rupiah($omset->jumlah_omset_bersih) }}</td>
            </tr>
        @endforeach
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td><b>TOTAL</b></td>
            <td><b>{{ rupiah($omsets->sum('jumlah_omset_bersih')) }}</b></td>
        </tr>
    </tbody>
</table>

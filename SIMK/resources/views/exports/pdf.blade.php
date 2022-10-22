<!DOCTYPE html>
<html>

<head>
    <title>Laporan Omset Pendapatan CV. Citra Berkah Express</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <style type="text/css">
        table tr td,
        table tr th {
            font-size: 9pt;
        }
    </style>
    <center>
        <h4>Laporan Omset Pendapatan CV. Citra Berkah Express</h4>
    </center>

    <table class='table table-bordered'>
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>No Polisi</th>
                <th>Nama Supir</th>
                <th>Biaya/1 Mobil</th>
                <th>Pengeluaran JKT</th>
                <th>Pengeluaran LPG</th>
                <th>Jumlah</th>
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
            <td colspan="6" style="border-bottom-style: hidden; border-left-style: hidden"></td>
            <td><b>TOTAL</b></td>
            <td colspan="2"><b>{{ rupiah($omsets->sum('jumlah_omset_bersih')) }}</b></td>
        </tbody>
    </table>
</body>

</html>

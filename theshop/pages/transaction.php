<title>Transaksi</title>
</head>
<body><br><br><br>
    <section class="main">
        <div class="container">
            <ol class="breadcrumb">
                <li><a href="#!"><i class="fa fa-home"></i> Home</a></li>
                <li><a href="#!"><i class="fa fa-user"></i> User</a></li>
                <li><a href="#!"><i class="fa fa-shopping-cart"></i> <strong>Keranjang Belanja</strong></a></li>
            </ol><br>

            <h1 class="title"><i class="fa fa-shopping-cart"></i> Keranjang Belanja</h1><br>
            <a href="#!" class="btn secondary"><i class="fa fa-print"></i> Cetak Transaksi</a>
            <br><br>
                <?=var_dump($main_page->dapetKeranjang());?>
            <br>

            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama User</th>
                        <th>Nama Barang</th>
                        <th>Merek</th>
                        <th>Kategori</th>
                        <th>Jumlah</th>
                        <th>Total Harga</th>
                        <th>Timestamp</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- <tr>
                        <td>TRK-001</td>
                        <td>Muhammad Yusup</td>
                        <td>Kentang</td>
                        <td>LG</td>
                        <td>Makanan</td>
                        <td>1</td>
                        <td>Rp. 2500</td>
                        <td>Demi waktu</td>
                    </tr> -->
                    
                </tbody>
            </table>
        </div>
    </section>
</body>
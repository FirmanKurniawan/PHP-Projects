<title>Produt details</title>
</head>

<body>
    <section class="main">
        <div class="container pull-down-navbar">
            <?php 
                    foreach ($main_page->DetailBarang($_GET['kategori_id'],$_GET['product_id']) as $key){
                    ?>
                    <ol class="breadcrumb">
                        <li><a href="#!"><i class="fa fa-home"></i> Home</a></li>
                        <li><a href="#!"> Product Details</a></li>
                        <li><a href="#!"> <?=$key['nama_kategori'];?></a></li>
                        <li><a href="#!"><strong><?=$key['nama_barang'];?></strong></a></li>
                    </ol>
                    <div class="product-description">
                        <div class="row">
                            <div class="col-lg-4 product-image">
                                <img src="assets/imgs/upload/<?=$key['gambar'];?>" alt="">
                            </div>
                            <div class="col-lg-8 product-desc">
                                <h1 class="title"><?=$key['nama_barang'];?></h1>
                                <p class="price">Rp. <?=number_format($key['harga'],2,",",".");?></p>

                                <form action="" method="post" class="buy">
                                    <div class="input-group">
                                        <label for="">Jumlah</label>
                                        <input type="number" name="jumlahBarang" class="form-control" value="1" min="1" max="<?=$key['stok'];?>">
                                    </div>
                                    <br>
                                    <button type="submit" href="process/tambahKeranjang.php?usr_id=<?=$_SESSION['usr_id'];?>&brg_id=<?=$key['nama_barang'];?>&jml=<?=$_POST['jml'];?>" class="btn warning"><i class="fa fa-shopping-cart"></i> Tambah ke Keranjang</a>
                                    <button class="btn secondary">Beli</button>
                                </form>
                                </div>
                        </div>
                    <?php
                    }
                ?>
            </div>
        </div>
    </section>    
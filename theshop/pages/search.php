<?php
    
?>
<title>Pencarian produk</title>
</head>

<body>
    <div class="container pull-down-navbar">
        <section class="main">
            <h1 class="title">Hasil Pencarian produk '<?=$_POST['keyword'];?>'</h1><br><br>
        
            <div class="row">
                <!-- <div class="col-12 col-md-4 col-lg-3 with-margin">
                    <a href="#!">
                        <div class="card">
                            <div class="card-image">
                                <img src="assets/imgs/upload/microwave.jpg" alt="">
                            </div>
                            <div class="card-inner">
                                <h2 class="card-title">
                                    Microwave
                                </h2>
                                <p class="price">Rp. 20.000</p>
                            </div>
                        </div>
                    </a>
                </div> -->
                <?php
                    foreach ($main_page->CariBarang($_POST['keyword']) as $key){
                    ?>
                    <div class="col-12 col-md-4 col-lg-3">
                        <a class="a-card" href="?page=details&kategori_id=<?=$key['kategori_id'];?>&product_id=<?=$key['barang_id'];?>">
                            <div class="card">
                                <div class="card-image">
                                    <img src="assets/imgs/upload/<?=$key['gambar'];?>" alt="">
                                </div>
                                <div class="card-inner">
                                    <h2 class="card-title">
                                        <?=$key['nama_barang'];?>
                                    </h2>
                                    <p class="price">
                                        Rp. <?=number_format($key['harga'],2,",",".");?>
                                    </p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <?php
                    }
                ?>
            </div>
        </section>
    </div>
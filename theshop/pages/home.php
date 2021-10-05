<title>Home - TheShop</title>
</head>
<body>
    
<div class="container">
    <section class="main">
        <?php
            foreach ($main_page->UniversalCount("banner",1) as $key){
                if ($key[0] > 0){
        ?>
        <h1 class="title">Promo Menarik</h1><br>

        <div class="slider">
            <div class="slider-inner">
                <?php
                    foreach ($main_page->UniversalDapet("banner") as $row){
                    ?>
                        <div class="content">
                            <img src="assets/imgs/upload/<?=$row['gambar'];?>" alt="">
                            <div class="content-inner text-white">
                                <h1 class="title text-center"><?=$row['judul'];?></h1>
                                <p class="desc"><?=$row['deskripsi'];?></p>
                            </div>
                        </div>
                    <?php
                    }
                ?>
            </div>

            <a href="#!" class="slide-nav prev"><i class="fa fa-chevron-left"></i></a>
            <a href="#!" class="slide-nav next"><i class="fa fa-chevron-right"></i></a>

            <div class="bubbles">
                <?php
                    for ($i=1;$i<=$key[0];$i++){
                    ?>
                        <a href="#!" data-slide-to="<?=$i;?>" class="bubble"></a>
                    <?php
                    }
                ?>
            </div>
        </div>
        <?php 
                }
            } 
        ?>
        <br><br>

        <h1 class="title">Kategori</h1>
        <div class="product-category">
            <div class="container">
                <div class="row no-wrap">
                    <?php
                        foreach ($main_page->UniversalDapet("kategori") as $key){
                        ?>
                            <div class="col-lg-2 col-md-4 col-12 product-item">
                                <a href="#!"><?=$key['nama'];?></a>
                            </div>
                        <?php
                        }
                    ?>                
                </div>
            </div>
        </div>

        <br><br>

        <h1 class="title">Official Stores</h1>
    </section>
</div>
<?php
    if (isset($_POST['btnTambahBanner'])){
        $judul_banner = $_POST['txtJudulBanner'];
        $deskripsi_banner = $_POST['txtDeskripsiBanner'];
        $gambar_banner = $_FILES['gambarBanner']['tmp_name'];
        $gambar_banner_name = $_FILES['gambarBanner']['name'];
        $barang->TambahBanner($judul_banner,$deskripsi_banner,$gambar_banner,$gambar_banner_name);

        // echo $deskripsi_banner;
    }
?>
<title>Banner - TheShop Administrator</title>
</head>
<body>

<!--modal dong -->
<div class="modal-dong">
    <div class="modal-inner">
        <h1 class="text-center">Tambah Banner</h1><br>

        <form action="" method="post" class="modal" enctype="multipart/form-data">
            <a href="#!" class="modal-close"><i class="fa fa-times"></i></a>
            <div class="input-group">
                <label for="">Judul Banner</label>
                <input type="text" name="txtJudulBanner" placeholder="Judul Banner" class="form-control">
            </div>
            <div class="input-group">
                <label for="">Deskripsi Banner</label>
                <input type="text" name="txtDeskripsiBanner" placeholder="Deskripsi Banner" class="form-control">
            </div>
            <div class="input-group">
                <label for="">Gambar Banner</label>
                <input type="file" name="gambarBanner">
            </div>
            <button type="submit" class="btn primary modal-close" name="btnTambahBanner"><i class="fa fa-plus"></i> Tambah</button>
        </form>
    </div>
</div>
<div class="container-fluid">
<!-- <section class="main"> -->
    <ol class="breadcrumb">
        <li><a href="#!"><i class="fa fa-home"></i> Home</a></li>
        <li><a href="#!"><i class="fa fa-flag"></i> Banner</a></li>
    </ol>
    <h1 class="title">Banner</h1><br><br>

    <a href="#!" class="btn primary modal-show"><i class="fa fa-plus"></i> Tambah Merek</a><br>
    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Judul Banner</th>
                    <th>Deskripsi Banner</th>
                    <th>Gambar</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            <?php
                    foreach ($barang->DapetBanner() as $key){
                    ?>
                        <tr>
                            <td><?=$key['banner_id'];?></td>
                            <td><?=$key['judul'];?></td>
                            <td><?=$key['deskripsi'];?></td>
                            <td><img src="../assets/imgs/upload/<?=$key['gambar'];?>" alt="Gambar"></td>
                            <td>
                                <a href="#!" class="btn primary"><i class="fa fa-pencil"></i></a>
                                <a href="process/HapusRecord.php?table=banner&id=<?=$key['banner_id'];?>" class="btn danger"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                    <?php
                    }
                ?>
            </tbody>
        </table>
    </div>
</div>

<script type="text/javascript">
    document.querySelector('.modal-show').onclick = function(){
        document.querySelector('.modal-dong').classList.add('show');
    }

    document.querySelector('.modal-close').onclick = function(){
        document.querySelector('.modal-dong').classList.remove('show');
    }

    document.querySelector('.n-banner').classList.add('active');
</script>
<?php
    if (isset($_POST['btnTambahBarang'])){
        $namaBarang = $_POST['txtBarang'];
        $kategori = $_POST['txtKategori'];
        $merek = $_POST['txtMerek'];
        $warna = $_POST['txtWarna'];
        $harga = $_POST['txtHarga'];
        $stok = $_POST['txtStok'];
        $gambar = $_FILES['gbr']['tmp_name'];
        $gambar_nama = $_FILES['gbr']['name'];
        $barang->TambahBarang($namaBarang,$kategori,$merek,$warna,$harga,$stok,$gambar_nama);
        move_uploaded_file($gambar,"../assets/imgs/upload/".$gambar_nama);

        // var_dump($_FILES);

    }
?>
<title>Barang - TheShop Administrator</title>
</head>
<body>

<!--modal dong -->
<div class="modal-dong">
    <div class="modal-inner">
        <h1 class="text-center">Tambah Barang</h1><br>

        <form action="" method="post" class="modal" enctype="multipart/form-data">
            <a href="#!" class="modal-close"><i class="fa fa-times"></i></a>
            <div class="input-group">
                <label for="">Nama Barang</label>
                <input type="text" name="txtBarang" placeholder="Nama Barang" class="form-control">
            </div>
            <div class="input-group">
                <label for="">Kategori</label>
                <select name="txtKategori" id="">
                    <option value="">-- Pilih Salah satu Kategori --</option>
                    <?php foreach ($barang->DapetKategori() as $key){
                    ?>
                        <option value="<?=$key['kategori_id'];?>"><?=$key['nama'];?></option>
                    <?php
                    } ?>
                </select>
            </div>
            <div class="input-group">
                <label for="">Merek</label>
                <select name="txtMerek" id="">
                    <option value="">-- Pilih Salah satu Merek --</option>
                    <?php foreach ($barang->DapetMerek() as $key){
                    ?>
                        <option value="<?=$key['merek_id'];?>"><?=$key['nama'];?></option>
                    <?php
                    } ?>
                </select>
            </div>
            <div class="input-group">
                <label for="">Warna</label>
                <select name="txtWarna" id="">
                    <option value="">-- Pilih Salah satu Warna --</option>
                    <?php foreach ($barang->DapetWarna() as $key){
                    ?>
                        <option value="<?=$key['warna_id'];?>"><?=$key['nama'];?></option>
                    <?php
                    } ?>
                </select>
            </div>
            <div class="input-group">
                <label for="">Harga</label>
                <input type="text" name="txtHarga" placeholder="Harga" class="form-control">
            </div>
            <div class="input-group">
                <label for="">Stok</label>
                <input type="text" name="txtStok" placeholder="Stok" class="form-control">
            </div>
            <div class="input-group">
                <label for="">Gambar</label>
                <input type="file" name="gbr"/>
            </div>
            <button type="submit" class="btn primary modal-close" name="btnTambahBarang"><i class="fa fa-plus"></i> Tambah</button>
        </form>
    </div>
</div>

<!-- <section class="main"> -->
    <div class="container-fluid">
        <ol class="breadcrumb">
            <li><a href="#!"><i class="fa fa-home"></i> Home</a></li>
            <li><a href="#!"><i class="fa fa-cube"></i> Barang</a></li>
        </ol>
        <h1 class="title">Data barang</h1><br><br>

        <a href="#!" class="btn primary modal-show"><i class="fa fa-plus"></i> Tambah Barang</a><br>
        <div class="table-container">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama barang</th>
                        <th>Kategori</th>
                        <th>Merek</th>
                        <th>Warna</th>
                        <th>Harga</th>
                        <th>Stok</th>
                        <th>Gambar</th>
                        <th class="actions">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        foreach ($barang->DapetBarang() as $key){
                        ?>
                            <tr>
                                <td><?=$key['barang_id'];?></td>
                                <td><?=$key['nama_barang'];?></td>
                                <td><?=$key['kategori_id'];?></td>
                                <td><?=$key['merek_id'];?></td>
                                <td><?=$key['warna_id'];?></td>
                                <td><?=$key['harga'];?></td>
                                <td><?=$key['stok'];?></td>
                                <td><img src="../assets/imgs/upload/<?=$key['gambar'];?>" alt=""></td>
                                <td>
                                    <a href="#!" class="btn primary"><i class="fa fa-pencil"></i></a>
                                    <a href="process/HapusRecord.php?table=barang&id=<?=$key['barang_id'];?>" class="btn danger"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                        <?php
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
<!-- </section> -->

<script type="text/javascript">
    document.querySelector('.modal-show').onclick = function(){
        document.querySelector('.modal-dong').classList.add('show');
    }

    document.querySelector('.modal-close').onclick = function(){
        document.querySelector('.modal-dong').classList.remove('show');
    }

    document.querySelector('.n-barang').classList.add('active');
</script>
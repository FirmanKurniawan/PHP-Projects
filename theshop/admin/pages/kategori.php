<?php
    if (isset($_POST['btnTambahKategori'])){
        $barang->TambahKategori($_POST['txtKategori']);
    }
?>

<title>Kategori - TheShop Administrator</title>
</head>
<body>

<!--modal dong -->
<div class="modal-dong">
    <div class="modal-inner">
        <h1 class="text-center">Tambah Kategori</h1><br>

        <form action="" method="post" class="modal">
            <a href="#!" class="modal-close"><i class="fa fa-times"></i></a>
            <div class="input-group">
                <label for="">Nama Kategori</label>
                <input type="text" name="txtKategori" placeholder="Nama Barang" class="form-control">
            </div>
            <button type="submit" class="btn primary modal-close" name="btnTambahKategori"><i class="fa fa-plus"></i> Tambah</button>
        </form>
    </div>
</div>
    
<div class="container-fluid">
        <ol class="breadcrumb">
            <li><a href="#!"><i class="fa fa-home"></i> Home</a></li>
            <li><a href="#!"><i class="fa fa-bookmark-o"></i> Kategori</a></li>
        </ol>
    <h1 class="title">Kategori barang</h1><br><br>

    <a href="#!" class="btn primary modal-show"><i class="fa fa-plus"></i> Tambah Kategori</a><br>
    <div class="table-contianer">
        <table>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nama Kategori</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach ($barang->DapetKategori() as $key){
                    ?>
                        <tr>
                            <td><?=$key['kategori_id'];?></td>
                            <td><?=$key['nama'];?></td>
                            <td>
                                <a href="?page=edit_data&id=<?=$key['kategori_id'];?>&table=kategori" class="btn primary"><i class="fa fa-pencil"></i></a>
                                <a href="process/HapusRecord.php?table=kategori&id=<?=$key['kategori_id'];?>" class="btn danger"><i class="fa fa-trash"></i></a>
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

    document.querySelector('.n-kategori').classList.add('active');
</script>
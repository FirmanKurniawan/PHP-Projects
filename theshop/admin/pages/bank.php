<?php
    if (isset($_POST['btnTambahBank'])){
        $barang->TambahBank($_POST['txtBank']);
    }
?>
<title>Bank - TheShop Administrator</title>
</head>
<body>

<!--modal dong -->
<div class="modal-dong">
    <div class="modal-inner">
        <h1 class="text-center">Tambah Bank</h1><br>

        <form action="" method="post" class="modal">
            <a href="#!" class="modal-close"><i class="fa fa-times"></i></a>
            <div class="input-group">
                <label for="">Nama Bank</label>
                <input type="text" name="txtBank" placeholder="Nama Bank" class="form-control">
            </div>
            <button type="submit" class="btn primary modal-close" name="btnTambahBank"><i class="fa fa-plus"></i> Tambah</button>
        </form>
    </div>
</div>

    <div class="container-fluid">
        <ol class="breadcrumb">
            <li><a href="#!"><i class="fa fa-home"></i> Home</a></li>
            <li><a href="#!"><i class="fa fa-institution"></i> Bank</a></li>
        </ol>

        <h1 class="title">Bank</h1><br><br>

        <a href="#!" class="btn primary modal-show"><i class="fa fa-plus"></i> Tambah Bank</a><br>

        <table>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nama Bank</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            <?php
                    foreach ($barang->DapetBank() as $key){
                    ?>
                        <tr>
                            <td><?=$key['bank_id'];?></td>
                            <td><?=$key['nama'];?></td>
                            <td>
                                <a href="?page=edit_data&id=<?=$key['bank_id'];?>&table=bank" class="btn primary"><i class="fa fa-pencil"></i></a>
                                <a href="process/HapusRecord.php?table=bank&id=<?=$key['bank_id'];?>" class="btn danger"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                    <?php
                    }
                ?>
            </tbody>
        </table>
    </div>

<script type="text/javascript">
    document.querySelector('.modal-show').onclick = function(){
        document.querySelector('.modal-dong').classList.add('show');
    }

    document.querySelector('.modal-close').onclick = function(){
        document.querySelector('.modal-dong').classList.remove('show');
    }

    document.querySelector('.n-bank').classList.add('active');
</script>
<?php

    if (!isset($_GET['table']) || $_GET['table'] == ''){
        header('location: index.php?page=home');
    } else {
        $id = $_GET['id'];
        $tabel = $_GET['table'];
        $nama = '';
        $nama_awal = '';
        $back_link = '';

        switch ($tabel){
            case 'kategori':
                $nama_awal = $barang->DapetKategori($id);
                $back_link = '?page=kategori';
                break;
            case 'warna':
                $nama_awal = $barang->DapetWarna($id);
                $back_link = '?page=warna';
                break;
            case 'merek':
                $nama_awal = $barang->DapetMerek($id);
                $back_link = '?page=merek';
                break;
            case 'bank':
                $nama_awal = $barang->DapetBank($id);
                $back_link = '?page=bank';
                break;
            default:
                $nama_awal = '';
                break;
        }

        foreach ($nama_awal as $key){
            $nama = $key['nama'];
        }
    }

    if (isset($_POST['btnUpdate'])){
        // $barang->UniversalEdit($_GET['id'],$_POST['txtNama'],$_GET['table']);
        $barang->EditKategori($id, $nama);
            // header('location: '.$back_link);
            // echo "Id : ".$id."\nNama : ".$nama;
    }
?>
<title>Edit data</title>
</head>

<body>
    <div class="container-fluid">
        <!-- breadcrumbs -->
        <ol class="breadcrumb">
            <li><a href="#!"><i class="fa fa-home"></i> Home</a></li>
            <li><a href="#!"><i class="fa fa-flag"></i> <?=ucwords($tabel);?></a></li>
            <li><a href="#!"><i class="fa fa-pencil"></i> <strong>Edit</strong></a></li>
        </ol>

        <h1 class="title">Edit Data (<?=ucwords($tabel);?>)</h1><br><br>

        <form action="" method="post" class="formEdit">
            <div class="input-group">
                <label for="">id</label>
                <input type="text" class="form-control" disabled value="<?=$id;?>">
                <input type="hidden" value="<?=$id;?>" name="txtId">
            </div>
            <div class="input-group">
                <label for="">Nama</label>
                <input type="text" name="txtNama" class="form-control" value="<?=$nama;?>">
            </div>
            <button type="submit" name="btnUpdate" class="btn primary"><i class="fa fa-refresh"></i> Update</button>
            <a href="<?=$back_link;?>" class="btn danger"><i class="fa fa-times"></i> Cancel</a>
        </form>
    </div>
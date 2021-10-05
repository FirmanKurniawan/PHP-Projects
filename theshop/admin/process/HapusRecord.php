<?php
    include '../../classes/Barang.php';
    $barang = new Barang;

    if (isset($_GET['table']) && isset($_GET['id'])){
        if ($_GET['table'] == 'kategori'){
            $barang->HapusRecord($_GET['table'],$_GET['id']);
            header('location: ../index.php?page=kategori');
        }else if ($_GET['table'] == 'barang'){
            $barang->HapusRecord($_GET['table'],$_GET['id']);
            header('location: ../index.php?page=barang');
        } else if ($_GET['table'] == 'warna'){
            $barang->HapusRecord($_GET['table'],$_GET['id']);
            header('location: ../index.php?page=warna');
        } else if ($_GET['table'] == 'bank'){
            $barang->HapusRecord($_GET['table'],$_GET['id']);
            header('location: ../index.php?page=bank');
        } else if ($_GET['table'] == 'merek'){
            $barang->HapusRecord($_GET['table'],$_GET['id']);
            header('location: ../index.php?page=merek');
        } else if ($_GET['table'] == 'banner'){
            $barang->HapusRecord($_GET['table'],$_GET['id']);
            header('location: ../index.php?page=banner');
        }
    }
?>
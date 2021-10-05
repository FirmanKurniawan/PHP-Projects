<?php
    include 'pages/head.php';

    if (isset($_GET['page'])){
        switch($_GET['page']){
            case 'home':
                include 'pages/home.php';
                break;
            case 'barang':
                include 'pages/barang.php';
                break;
            case 'kategori':
                include 'pages/kategori.php';
                break;
            case 'warna':
                include 'pages/warna.php';
                break;
            case 'merek':
                include 'pages/merek.php';
                break;
            case 'banner':
                include 'pages/banner.php';
                break;
            case 'bank':
                include 'pages/bank.php';
                break;
            case 'edit_data':
                include 'pages/editData.php';
                break;
            case 'edit_barang':
                include 'pages/editBarang.php';
                break;
            case 'edit_banner':
                include 'pages/editBanner.php';
                break;
            case 'transaksi':
                include 'pages/transaksi.php';
                break;
            default: 
                include 'pages/home.php';
                break;
        }
    } else {
        include 'pages/home.php';
    }

    include 'pages/foot.php';
?>
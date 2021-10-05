<?php
    session_start();

    if (!isset($_SESSION['logged_in']) || $_SESSION['usr_type'] != 'admin'){
        header('location: ../login.php');
    }

    include '../classes/Barang.php';
    $barang = new Barang;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../assets/css/base.css">
    <link rel="stylesheet" href="../assets/css/admin.css">
    <link rel="stylesheet" href="../assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css">

    <section class="root">
        <aside class="sidebar">
            <img class="base-sidebar" src="../assets/imgs/wallhaven-365817.jpg" alt="">
            <div class="sidebar-inner">
                <a href="#!" class="close-sidebar"><i class="fa fa-times"></i></a>
                <div class="account-profile text-center">
                    <div class="user-icon">
                        <i class="fa fa-5x fa-user-o"></i>
                    </div>

                    <h1 class="username"><?=$_SESSION['username'];?></h1>
                </div>

                <div class="sidebar-menu">
                    <a href="?page=home" class="menu n-home"><i class="fa fa-home"></i> Home</a>
                    <a href="?page=kategori" class="menu n-kategori"><i class="fa fa-bookmark-o"></i> Kategori</a>
                    <a href="?page=warna" class="menu n-warna"><i class="fa fa-eyedropper"></i> Warna</a>
                    <a href="?page=merek" class="menu n-merek"><i class="fa fa-registered"></i> Merek</a>
                    <a href="?page=bank" class="menu n-bank"><i class="fa fa-institution"></i> Bank</a>
                    <a href="?page=barang" class="menu n-barang"><i class="fa fa-cube"></i> Barang</a>
                    <a href="?page=banner" class="menu n-banner"><i class="fa fa-flag"></i> Banner</a>
                    <a href="?page=transaksi" class="menu n-transaksi"><i class="fa fa-refresh"></i> Transaksi</a>
                    <a href="../index.php" class="menu"><i class="fa fa-amazon"></i> Ke Toko</a>
                    <a href="../logout.php" class="menu n-logout"><i class="fa fa-sign-out"></i> Logout</a>
                </div>
            </div>
        </aside>
        <section class="main">
        <nav class="navbar">
            <div class="row">
                <div class="navbar-header">
                    <a href="#!" class="show-sidebar"><i class="fa fa-bars"></i></a>
                    <a href="#!" class="title show-sidebar">TheShop Admin</a>
                </div>
                
            </div>
        </nav>
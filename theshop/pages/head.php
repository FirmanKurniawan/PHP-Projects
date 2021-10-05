<?php
    include 'classes/MainPage.php';

    $main_page = new MainPage;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="assets/css/base.css">
    <link rel="stylesheet" href="assets/css/custom.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css">

    <!-- buat bikin navbar -->
    <nav class="navbar">
        <div class="container">
            <div class="navbar-inner">
                <a href="?page=home" class="title navbar-item">TheShop</a>
                

                <form action="?page=search" method="post" class="search">
                    <i class="fa fa-search"></i>
                    <?php
                        $kywrd = '';
                        if (isset($_POST['keyword'])){
                            $kywrd = $_POST['keyword'];
                        }
                    ?>
                    <input type="text" placeholder="Cari apa aja" class="cari" name="keyword" value="<?=$kywrd;?>" autocomplete="off">
                    <select name="cmbBy" id="">
                        <option value="nama_barang">Nama</option>
                        <option value="kategori">Kategori</option>
                        <option value="merek">Merek</option>
                        <option value="warna">Warna</option>
                    </select>
                </form>

                <!-- login and register -->
                <?php 
                    if (!isset($_SESSION['logged_in'])){
                ?>
                <div class="account blm-masuk">
                    <a href="login.php" class="btn secondary">Login</a>
                    <a href="register.php" class="btn warning">Register</a>
                </div>
                <?php
                    } else {
                ?>
                <div class="account">
                    <ul class="nav account" style="display: flex">
                        <li class="shop-cart">
                            <a href="?page=transaction">
                                <i class="fa fa-shopping-cart"></i>
                                <!-- <span class="badge warning"><?=$main_page->UniversalCount('transaksi');?></span> -->
                            </a>
                        </li>
                        <li><a href="#!" class="link" data-dropdown="dropdown-1"><i class="fa fa-user"></i> <?=$_SESSION['username'];?> <i class="fa fa-caret-down"></i></a>
                            <ul class="dropdown dropdown-1">
                                <?php
                                    if ($_SESSION['usr_type'] == 'admin'){
                                    ?>
                                        <li><a href="admin/index.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                                    <?php
                                    }
                                ?>
                                <li><a href="?page=account_settings"><i class="fa fa-cog"></i> Account Setting</a></li>
                                <li><a href="logout.php"><i class="fa fa-sign-out"></i> Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <?php
                    }
                ?>
            </div>
        </div>
    </nav>
<?php

session_start();
require "../../controllers/barang_keluar.php";

if (!isset($_SESSION['login'])) {
    header("Location: ../login/login.php");
    exit;
}

$id_barang_keluar = $_GET["id_barang_keluar"];

if( hapusBarang($id_barang_keluar) > 0) {
    header("Location: barang_keluar.php");
} else {
    header("Location: barang_keluar.php");
}

?>
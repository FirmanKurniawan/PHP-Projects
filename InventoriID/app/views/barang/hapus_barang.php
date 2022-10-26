<?php

session_start();
require "../../controllers/stok_barang.php";

if (!isset($_SESSION['login'])) {
    header("Location: ../login/login.php");
    exit;
}

$id_stok = $_GET["id_stok"];

if( hapusBarang($id_stok) > 0) {
    header("Location: stok_barang.php");
} else {
    header("Location: stok_barang.php");
}

?>
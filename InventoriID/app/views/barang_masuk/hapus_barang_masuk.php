<?php
session_start();
require "../../controllers/barang_masuk.php";

if (!isset($_SESSION['login'])) {
    header("Location: ../login/login.php");
    exit;
}

$id_barang_masuk = $_GET["id_barang_masuk"];

if( hapusBarang($id_barang_masuk) > 0) {
    header("Location: barang_masuk.php");
} else {
    header("Location: barang_masuk.php");
}

?>
<?php
    include '../config/database.php';

    if (!isset($_GET['id'])){
        header('location:../index.php?p=viewData');
    } else {
        $id = $_GET['id'];
        $nama = $_POST['txtNama'];
        $kelas = $_POST['txtKelas'];
        $alamat = $_POST['txtAlamat'];

        $hasil = $conn->prepare("UPDATE orang SET nama='$nama', kelas='$kelas', alamat='$alamat' WHERE id='$id'");
        $hasil->execute();
        header('location: ../index.php?p=viewData');
    }
?>
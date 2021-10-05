<?php
    include '../config/conf.php';
    include '../config/database.php';

    if (!isset($_POST['btnInsert'])){
        header('location: ../index.php?p=insertData');
    } else {
        if (($_POST['txtNama'] != null) && ($_POST['txtKelas'] != null) && ($_POST['txtAlamat'] != null)){
            $nama = $_POST['txtNama'];
            $kelas = $_POST['txtKelas'];
            $alamat = $_POST['txtAlamat'];

            $hasil = $conn->prepare("INSERT INTO orang (`nama`,`kelas`,`alamat`) VALUES ('$nama','$kelas','$alamat')");
            $hasil->execute();

            header('location: ../index.php?p=viewData');
        } else {
            header('location: ../index.php?p=insertData');
        }
    }
?>
<?php
    include '../config/database.php';

    if (!isset($_GET['id'])){
        header('location:../index.php?p=viewData');
    } else {
        $id = $_GET['id'];
        $hasil = $conn->prepare("DELETE FROM orang WHERE id='$id'");
        $hasil->execute();
        header('location:../index.php?p=viewData');
    }
?>
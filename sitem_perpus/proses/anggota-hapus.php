<?php
include'../koneksi.php';
$id_anggota=$_GET['id'];

mysqli_query(
    $koneksi,
	"DELETE FROM tbanggota
	WHERE idanggota='$id_anggota'"
);
header("location:../index.php?p=anggota");

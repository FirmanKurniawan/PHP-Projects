<?php
include'../koneksi.php';
$id_user=$_GET['id'];

mysqli_query(
    $koneksi,
	"DELETE FROM tbuser
	WHERE iduser='$id_user'"
);
header("location:../index.php?p=user");

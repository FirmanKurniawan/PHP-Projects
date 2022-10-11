<?php
include'../koneksi.php';

$id_user=$_POST['id_user'];
$nama=$_POST['nama'];
$alamat=$_POST['alamat'];

If(isset($_POST['simpan'])){
	mysqli_query(
        $koneksi,
		"UPDATE tbuser
		SET nama='$nama',alamat='$alamat'
		WHERE iduser='$id_user'"
	);
	header("location:../index.php?p=user");
}

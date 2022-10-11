<?php
include'../koneksi.php';

$id_anggota=$_POST['id_anggota'];
$nama=$_POST['nama'];
$jenis_kelamin=$_POST['jenis_kelamin'];
$alamat=$_POST['alamat'];

If(isset($_POST['simpan'])){
	mysqli_query(
        $koneksi,
		"UPDATE tbanggota
		SET nama='$nama',jeniskelamin='$jenis_kelamin',alamat='$alamat'
		WHERE idanggota='$id_anggota'"
	);
	header("location:../index.php?p=anggota");
}

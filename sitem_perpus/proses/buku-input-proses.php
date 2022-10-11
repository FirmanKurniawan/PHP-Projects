<?php
include'../koneksi.php';
$id_buku=$_POST['id_buku'];
$judul_buku=$_POST['judul_buku'];
$kategori=$_POST['kategori'];
$pengarang=$_POST['pengarang'];
$penerbit=$_POST['penerbit'];
$status="Tersedia";
	
if(isset($_POST['simpan'])){
	mysqli_query(
        $koneksi,
		"INSERT INTO tbbuku
		VALUES('$id_buku','$judul_buku','$kategori','$pengarang','$penerbit','$status')"
	);
	header("location:../index.php?p=buku");
}

<?php
include'../koneksi.php';

$tgl_kembali=date('Y-m-d');
$id_transaksi=$_GET['id'];
$q_transaksi=mysqli_query(
    $koneksi,
	"SELECT * FROM tbtransaksi WHERE idtransaksi='$id_transaksi'"
);
$r_transaksi=mysqli_fetch_array($q_transaksi);
$id_anggota=$r_transaksi['idanggota'];
$status_anggota="Tidak Meminjam";
$id_buku=$r_transaksi['idbuku'];
$status_buku="Tersedia";
	
if(isset($_GET['id'])){
	mysqli_query(
        $koneksi,
		"UPDATE tbtransaksi
		SET tglkembali='$tgl_kembali'
		WHERE idtransaksi='$id_transaksi'"
	);
	mysqli_query(
        $koneksi,
		"UPDATE tbanggota
		SET status='$status_anggota'
		WHERE idanggota='$id_anggota'"
	);
	mysqli_query(
        $koneksi,
		"UPDATE tbbuku
		SET status='$status_buku'
		WHERE idbuku='$id_buku'"
	);
	header("location:../index.php?p=transaksi-peminjaman");
}

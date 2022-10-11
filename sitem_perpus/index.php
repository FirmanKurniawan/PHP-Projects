<?php
include'koneksi.php';
$tgl=date('Y-m-d');
?>
<!doctype html>
<html>
<head>
	<title>Sistem Informasi Perpustakaan</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div id="container">
		<div id="header">
			<div id="logo-perpustakaan-container">
				<image id="logo-perpustakaan" src="images/logo-perpustakaan.png">
			</div>
			<div id="nama-alamat-perpustakaan-container">
				<div class="nama-alamat-perpustakaan">
					<h1>PERPUSTAKAAN UMUM</h1>
				</div>
				<div class="nama-alamat-perpustakaan">
					<h4>Jl.Apel No 11, Telp: (001)345678</h4>
				</div>
			</div>
		</div>
		<div id="header2">
			<div id="nama-user">Hai, Admin</div>
		</div>
		<div id="sidebar">
			<a href="index.php?p=beranda">Beranda</a>
			<p class="label-navigasi">Entry Data Dan Transaksi</p>
			<ul>
				<li><a href="index.php?p=user">Data User</a></li>
				<li><a href="index.php?p=anggota">Data Anggota</a></li>
				<li><a href="index.php?p=buku">Data Buku</a></li>
				<li><a href="index.php?p=transaksi-peminjaman">Transaksi Peminjaman</a></li>
			</ul>
			<p class="label-navigasi">Laporan</p>
			<ul>
				<li><a href="cetak/cetak-user.php" target="_blank">Lap.Data User</a></li>
				<li><a href="cetak/cetak-anggota.php" target="_blank">Lap.Data Anggota</a></li>
				<li><a href="cetak/cetak-buku.php" target="_blank">Lap.Data Buku</a></li>
				<li><a href="cetak/cetak-transaksi-peminjaman.php" target="_blank">Lap.Peminjaman</a></li>
				<li><a href="cetak/cetak-transaksi-peminjaman-pengembalian.php" target="_blank">Lap.Peminjaman dan Pengembalian</a></li>
			</ul>
		</div>
		<div id="content-container">
		<?php
			$pages_dir='pages';
			if(!empty($_GET['p'])){
				$pages=scandir($pages_dir,0);
				unset($pages[0],$pages[1]);
				$p=$_GET['p'];
				if(in_array($p.'.php',$pages)){
					include($pages_dir.'/'.$p.'.php');
				}else{
					echo'Halaman Tidak Ditemukan';
				}
			}else{
				include($pages_dir.'/beranda.php');
			}
		?>
		</div>
		<div id="footer"><h3>Sistem Informasi Perpustakaan (sipus) | Lab Koding</h3></div>
	</div>
</body>
</html>
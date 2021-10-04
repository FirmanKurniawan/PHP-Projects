<?php
	include("../status_login.php");
	include("../status_admin.php");

	include("../function/waktu.php");

	$user = $dataUser['nama_lengkap'];

	// Cek proses form yang akan di submit ke database
	if(isset($_POST['Submit'])) {
		$nama_aset = $_POST['nama_aset'];
		$alokasi = $_POST['alokasi'];
		$kuantitas = $_POST['kuantitas'];
		$harga = $_POST['harga'];
		$tgl_pembelian = $_POST['tgl_pembelian'];
		$penanggung_jawab = $_POST['penanggung_jawab'];
		$nama_pemeriksa = $_POST['nama_pemeriksa'];
		$tgl_diperiksa = $_POST['tgl_diperiksa'];
		$catatan = $_POST['catatan'];
	
		// Include database koneksi
		include("../koneksi.php");
		
		// Insert data berdasarkan lokasi ke table database
		if($alokasi === 'Kantor'){
			mysqli_query($db, "INSERT INTO aset_kantor(nama_aset,alokasi,kuantitas,harga,tgl_pembelian,penanggung_jawab,nama_pemeriksa,tgl_diperiksa,catatan) VALUES('$nama_aset','$alokasi','$kuantitas','$harga','$tgl_pembelian','$penanggung_jawab','$nama_pemeriksa','$tgl_diperiksa','$catatan')");

			mysqli_query($db, "INSERT INTO latest_aset(nama_aset,alokasi,user) VALUES('$nama_aset','$alokasi','$user')");
		}
		if($alokasi === 'Kelas'){
			mysqli_query($db, "INSERT INTO aset_kelas(nama_aset,alokasi,kuantitas,harga,tgl_pembelian,penanggung_jawab,nama_pemeriksa,tgl_diperiksa,catatan) VALUES('$nama_aset','$alokasi','$kuantitas','$harga','$tgl_pembelian','$penanggung_jawab','$nama_pemeriksa','$tgl_diperiksa','$catatan')");

			mysqli_query($db, "INSERT INTO latest_aset(nama_aset,alokasi,user) VALUES('$nama_aset','$alokasi','$user')");
		}
		if($alokasi === 'Aula'){
			mysqli_query($db, "INSERT INTO aset_aula(nama_aset,alokasi,kuantitas,harga,tgl_pembelian,penanggung_jawab,nama_pemeriksa,tgl_diperiksa,catatan) VALUES('$nama_aset','$alokasi','$kuantitas','$harga','$tgl_pembelian','$penanggung_jawab','$nama_pemeriksa','$tgl_diperiksa','$catatan')");

			mysqli_query($db, "INSERT INTO latest_aset(nama_aset,alokasi,user) VALUES('$nama_aset','$alokasi','$user')");
		}
		if($alokasi === 'Lab'){
			mysqli_query($db, "INSERT INTO aset_lab(nama_aset,alokasi,kuantitas,harga,tgl_pembelian,penanggung_jawab,nama_pemeriksa,tgl_diperiksa,catatan) VALUES('$nama_aset','$alokasi','$kuantitas','$harga','$tgl_pembelian','$penanggung_jawab','$nama_pemeriksa','$tgl_diperiksa','$catatan')");

			mysqli_query($db, "INSERT INTO latest_aset(nama_aset,alokasi,user) VALUES('$nama_aset','$alokasi','$user')");
		}

		// Redirect
		header("Location: ../aset/tambah.php");
	}

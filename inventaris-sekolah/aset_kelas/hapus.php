<?php
	include("../status_login.php");
	include("../status_admin.php");

	include("../koneksi.php");

	$id = $_GET['id'];
	$nama_aset = $_GET['nama_aset'];

	// Query untuk menghapus data yang dipilih
	mysqli_query($db, "DELETE FROM aset_lab WHERE id=$id");
	mysqli_query($db, "DELETE FROM latest_aset WHERE nama_aset='$nama_aset'");

	header("Location: index.php");
<?php
	include("../status_login.php");
	include("../status_admin.php");

	include("../koneksi.php");

	$username = $_GET['username'];

	$foto = mysqli_fetch_array(mysqli_query($db, "SELECT * FROM profil WHERE username='$username'"));

	$filename = $foto['foto'];

	// Query untuk menghapus data yang dipilih
	mysqli_query($db, "DELETE FROM user WHERE username='$username'");
	mysqli_query($db, "DELETE FROM profil WHERE username='$username'");

	unlink('../assets/foto/' . $filename);

	header("Location: index.php");
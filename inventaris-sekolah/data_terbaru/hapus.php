<?php
	include("../status_login.php");
	include("../status_admin.php");

	include("../koneksi.php");

	$id = $_GET['id'];

	// Query untuk menghapus data yang dipilih
	mysqli_query($db, "DELETE FROM latest_aset WHERE id=$id");

	header("Location: index.php");

<?php
	// cek apakah sudah login
	session_start();

	include('koneksi.php');

	$id_profil = $_SESSION['id_profil'];

	$dataUser = mysqli_fetch_array(mysqli_query($db, "SELECT * FROM profil WHERE id='$id_profil'"));

	// Sesi login expired
	$timeout = 1;
	$timeout = $timeout * 7200; // 2 jam

	if($_SESSION['sesi_login']) {
		$elapsed_time = time() - $_SESSION['sesi_login'];
		if($elapsed_time >= $timeout){
			session_destroy();

			header('Location: ../login/index.php?error=sesi_habis');
		}
	}

	if($_SESSION['status'] != true){
		header('Location: ../login/index.php?error=belum_login');
	}
<?php
	session_start();

	include("../koneksi.php");

	$username = $_POST['username'];
	$password = $_POST['password'];

	$query = mysqli_query($db, "SELECT * FROM user WHERE username='$username' AND password='$password'");

	$idUser = mysqli_fetch_array($query);

	$cek = mysqli_num_rows($query);

	if($cek > 0) {
		$queryData = mysqli_query($db, "SELECT * FROM profil WHERE username='$username'");

		$data = mysqli_fetch_array($queryData);
		if($data['role'] == 'Administrator') {
		
			$_SESSION['id_profil'] = $data['id'];
			$_SESSION['id_user'] =  $idUser['id'];
			$_SESSION['status'] = true;
			$_SESSION['sesi_login'] = time();
			
			header("Location: ../dashboard");
		}

		if($data['role'] == 'Guest') {
		
			$_SESSION['id_profil'] = $data['id'];
			$_SESSION['id_user'] =  $idUser['id'];
			$_SESSION['status'] = true;
			$_SESSION['sesi_login'] = time();
			
			header("Location: ../dashboard");
		}
	} else {
		header("Location: index.php?error=tidak_ditemukan");
	}
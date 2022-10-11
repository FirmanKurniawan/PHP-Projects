<?php
	session_start();

	include ("config.php");

	$username = $_POST['username'];
	$password = $_POST['password'];

	$username_escape = mysqli_real_escape_string($db, $username);
	$password_escape = mysqli_real_escape_string($db, $password);

	$query = "SELECT *
				FROM user
				WHERE username = '$username_escape' AND password = '$password_escape'";

	$data = mysqli_query($db, $query);

	$cek = mysqli_num_rows($data);

	if ($cek > 0) {
		$_SESSION["username_admin"] = $username;
		$_SESSION["status_login_admin"] = "true";
		$_SESSION["login_time_stamp"] = time(); 
		header("Location: /ukk/index.php");
	} else {
		header("Location: /ukk/login.php?pesan=gagal");
	}
?>
<?php
	if (isset($_GET['error'])) {
		$error = $_GET['error'];
	} else {
		$error = '';
	}

	$pesan = '';

	if($error == 'tidak_ditemukan') {
		$pesan = 'Username atau Password salah!';
	} else if($error == 'belum_login') {
		$pesan = 'Anda harus login terlebih dahulu!';
	} else if($error == 'sesi_habis') {
		$pesan = 'Sesi Anda habis, silakan login kembali.';
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	
	<!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">

    <!-- Style -->
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">

	<title>Aplikasi Inventaris</title>
</head>
<body class="bg-login" style="background-image: url('../assets/bg-login.svg')">

	<div class="login-konten">
		<center>
		<div class="form-login rounded shadow">
			<h4 style="font-weight: 800;" class="my-2"><img src="../assets/logo-black.svg"> Inventaris Aset Sekolah</h4>
			<hr>
			<?php if($pesan) { ?>
				<div class="alert alert-danger" role="alert">
				  	<?= $pesan; ?>
				</div>
			<?php } else { ?>
				Masuk<br><br>
			<?php } ?>
			<form action="cek.php" method="post">
				<input class="form-control login-input" type="text" name="username" placeholder="Username" required>
				<br>
				<input class="form-control login-input" type="password" name="password" placeholder="Password" required>
				<button class="btn btn-login text-white mt-4 shadow" name="login" type="submit">Login</button>
			</form>
			<hr>
			<small>Made with 
				<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-heart-fill" fill="#B91B19" xmlns="http://www.w3.org/2000/svg">
				  <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"/>
				</svg>
				by Rizal Kadamong
			</small>
		</div>
		</center>
	</div>

	<!-- JQuery -->
	<script src="../bootstrap/js/jquery-3.5.1.min.js"></script>

	<!-- Bootstrap JS -->
	<script src="../bootstrap/js/bootstrap.min.js"></script>

	<!-- Script -->
	<script src="../assets/js/script.js"></script>
</body>
</html>
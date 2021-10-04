<?php
	include("../status_login.php");
	include("../status_admin.php");

	include("../koneksi.php");

	if(isset($_POST['User'])) {
		$nama_lengkap = $_POST['nama_lengkap'];
		$role = $_POST['role'];
		$username = $_POST['username'];
		$password = $_POST['password'];
		$note = '';

		// Konfigurasi file foto
		$ekstensi_required = array('png','jpg');
		$foto = $_FILES['foto']['name'];
		$x = explode('.', $foto);
		$ekstensi = strtolower(end($x));
		$ukuran	= $_FILES['foto']['size'];
		$file_tmp = $_FILES['foto']['tmp_name'];

		if($foto == true) {
			if(in_array($ekstensi, $ekstensi_required) == true) {
			    if($ukuran < 1044070) {	// 1Mb		
					move_uploaded_file($file_tmp, '../assets/foto/' . $foto);
					
					$queryUser = mysqli_query($db, "INSERT INTO user(username,password) VALUES('$username','$password')");

					$queryProfil = mysqli_query($db, "INSERT INTO profil(nama_lengkap,username,role,foto,note) VALUES('$nama_lengkap','$username','$role','$foto','$note')");

					header('Location: index.php');
			    } else { 	
					echo '<script>alert("Ukuran foto terlalu besar.");history.back()</script>';
			    }
			} else {
				echo '<script>alert("Ekstensi foto yang diupload tidak diperbolehkan.");history.back()</script>';
			}
		} else {
			$queryUser = mysqli_query($db, "INSERT INTO user(username,password) VALUES('$username','$password')");
			
			$queryProfil = mysqli_query($db, "INSERT INTO profil(nama_lengkap,username,role,note) VALUES('$nama_lengkap','$username','$role','$note')");

			header('Location: index.php');
		}
    }
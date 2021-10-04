<?php
	include("../status_login.php");
	include("../status_admin.php");

	include("../koneksi.php");

	if(isset($_POST['Update'])) {
		$nama_lengkap = $_POST['nama_lengkap'];
		$role = $_POST['role'];
		$username = $_POST['username'];
		$password = $_POST['password'];
		$id_profil = $_SESSION['id_profil'];
		$id_user = $_SESSION['id_user'];

		// Konfigurasi file foto
		$ekstensi_required = array('png','jpg');
		$foto = $_FILES['foto']['name'];
		$x = explode('.', $foto);
		$ekstensi = strtolower(end($x));
		$ukuran	= $_FILES['foto']['size'];
		$file_tmp = $_FILES['foto']['tmp_name'];

		// Foto lama
		$foto_old = $_POST['foto_old'];

		if($foto == true) {
			if(in_array($ekstensi, $ekstensi_required) == true) {
			    if($ukuran < 1044070) {	// 1Mb		
			    	unlink('../assets/foto/' . $foto_old);
					move_uploaded_file($file_tmp, '../assets/foto/' . $foto);
					
					$queryUser = mysqli_query($db, "UPDATE user SET username = '$username', password = '$password' WHERE id='$id_user'");

					$queryProfil = mysqli_query($db, "UPDATE profil SET nama_lengkap = '$nama_lengkap', username = '$username', role = '$role', foto = '$foto' WHERE id='$id_profil'");

					header('Location: index.php');
			    } else { 	
					echo '<script>alert("Ukuran foto terlalu besar.");history.back()</script>';
			    }
			} else {
				echo '<script>alert("Ekstensi foto yang diupload tidak diperbolehkan.");history.back()</script>';
			}
		} 
		
		$queryUser = mysqli_query($db, "UPDATE user SET username = '$username', password = '$password' WHERE id='$id_user'");
			
		$queryProfil = mysqli_query($db, "UPDATE profil SET nama_lengkap = '$nama_lengkap', username = '$username', role = '$role' WHERE id='$id_profil'");

		header('Location: index.php');
    }
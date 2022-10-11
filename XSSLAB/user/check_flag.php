<?php
session_start();

	include ("/xampp/htdocs/ukk/config.php");

	$flags = $_POST['flags'];

	$level = mysqli_query($db, "SELECT level FROM flag WHERE flags = '$flags'");
	// $ceklevel = mysqli_num_rows($level);
	$arraylevel = mysqli_fetch_array($level);
	$stringlevel = $arraylevel[0];

	// check flag ada atau tidak
	$query = "SELECT * FROM flag WHERE flags = '$flags'";

	$data = mysqli_query($db, $query);

	$cek = mysqli_num_rows($data);

	if ($cek > 0) {
		
		$username = $_SESSION["username_admin"];

		// masukin data solved
		$masuksolved = "INSERT INTO solved (username, solved_level) VALUES ('$username', '$stringlevel')";

		// misal kalau datanya udah ada
		$checksolved = mysqli_query($db, "SELECT * FROM solved WHERE username = '$username' AND solved_level = '$stringlevel'");

		if(mysqli_num_rows($checksolved)) {
			if ($stringlevel == 'LEVEL1') {
				header("Location: /ukk/xss/xss1.php?pesan=already");
			} elseif ($stringlevel == 'LEVEL2') {
				header("Location: /ukk/xss/xss2.php?pesan=already");
			} elseif ($stringlevel == 'LEVEL3') {
				header("Location: /ukk/xss/xss3.php?pesan=already");
			} elseif ($stringlevel == 'LEVEL4') {
				header("Location: /ukk/xss/xss4.php?pesan=already");
			} elseif ($stringlevel == 'LEVEL5') {
				header("Location: /ukk/xss/xss5.php?pesan=already");
			}

		} else {
			$masuk = mysqli_query($db, $masuksolved);

			if ($stringlevel == 'LEVEL1') {
				header("Location: /ukk/xss/xss1.php?pesan=benar");
			} elseif ($stringlevel == 'LEVEL2') {
				header("Location: /ukk/xss/xss2.php?pesan=benar");
			} elseif ($stringlevel == 'LEVEL3') {
				header("Location: /ukk/xss/xss3.php?pesan=benar");
			} elseif ($stringlevel == 'LEVEL4') {
				header("Location: /ukk/xss/xss4.php?pesan=benar");
			} elseif ($stringlevel == 'LEVEL5') {
				header("Location: /ukk/xss/xss5.php?pesan=benar");
			}

			$hitung = mysqli_query($db, "SELECT COUNT(*) FROM solved WHERE username = '$username'"); // Hitung data
			$baris = mysqli_fetch_array($hitung);
			
			$angka = $baris[0];
			$point = 20;
			$total = $angka * $point;
			
			$rowada = mysqli_query($db, "SELECT EXISTS(SELECT * FROM user_score WHERE username = '$username')"); // Check kalau data udah ada
			$ada = mysqli_fetch_array($rowada);
			$oke = $ada[0];

			if ($oke[0] === '1') { 
				$masukscore = mysqli_query($db, "UPDATE user_score SET score = '$total' WHERE username = '$username'");
			//	echo "Error: " . $masukscore . ":-" . mysqli_error($db);
			//	echo "HASILNYA 1";
			}

			if ($oke[0] === '0') { 
				$inputscore = "INSERT INTO user_score (username, score) VALUES ('$username', '$total')";
				$udahkah = mysqli_query($db, $inputscore);
			//	echo "Error: " . $inputscore . ":-" . mysqli_error($db);
			//	echo "HASILNYA 0";
			}
		}
	}
?>
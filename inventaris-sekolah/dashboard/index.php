<?php
	include("../status_login.php");

	include("../koneksi.php");

	include("../function/created_at.php");

	$resultKantor = mysqli_fetch_array(mysqli_query($db, "SELECT SUM(kuantitas) AS totalKuantitas FROM aset_kantor"));
	$resultKelas = mysqli_fetch_array(mysqli_query($db, "SELECT SUM(kuantitas) AS totalKuantitas FROM aset_kelas"));
	$resultAula = mysqli_fetch_array(mysqli_query($db, "SELECT SUM(kuantitas) AS totalKuantitas FROM aset_aula"));
	$resultLab = mysqli_fetch_array(mysqli_query($db, "SELECT SUM(kuantitas) AS totalKuantitas FROM aset_lab"));

	$latest_data = mysqli_query($db, "SELECT * FROM latest_aset ORDER BY id DESC LIMIT 4");
?>

	<?php include("../layout/head.php") ?>
	
	<?php include("../layout/sidebar_profil.php") ?>

	<?php include("../layout/sidebar_menu.php") ?>

	<?php include("../layout/navbar.php") ?>

	<div class="content-container">
		<ol class="breadcrumb">
	    	<li class="breadcrumb-item active" aria-current="page">Dashboard</li>
		</ol>

		<div class="content shadow">
			<div class="isi">
				<?php include("content.php") ?>
			</div>
		</div>
	</div>

	<?php include("../layout/footer.php") ?>
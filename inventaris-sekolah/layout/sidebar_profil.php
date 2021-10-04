<div class="sidebar">
	<a class="navbar-brand" href="../">
		<img src="../assets/logo.svg"> Inventaris Aset Sekolah
	</a>

	<div class="sidebar-content">
		<div class="fp-container shadow">
			<div class="foto-profil shadow">
				<?php if($dataUser['foto']) { ?>
					<img style="border-radius: 15px;" src="../assets/foto/<?= $dataUser['foto']; ?>">
				<?php } ?>
				<?php if(!$dataUser['foto']) { ?>
					<img class="foto-profil-default" src="../assets/foto-profil.svg">
				<?php } ?>
			</div>
			<p class="text-center pt-3"><?= $dataUser['nama_lengkap']; ?></p>
			<hr>
			<p class="text-center text-success"><?= $dataUser['role'] ?></p>
		</div>
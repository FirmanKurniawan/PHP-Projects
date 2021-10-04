<?php
	include("../status_login.php");
	include("../status_admin.php");

	// Menghubungkan file koneksi.php
	include("../koneksi.php");

	$id_profil = $_SESSION['id_profil'];
	$id_user = $_SESSION['id_user'];

	// Mengambil data pada database
	$data_profil = mysqli_query($db, "SELECT * FROM profil WHERE id='$id_profil'");
	$data_user = mysqli_query($db, "SELECT * FROM user WHERE id='$id_user'");

	$user = mysqli_fetch_array($data_user);

	include("../function/rupiah.php");
?>

	<?php include("../layout/head.php") ?>
	
	<?php include("../layout/sidebar_profil.php") ?>

	<?php include("../layout/sidebar_menu.php") ?>

	<?php include("../layout/navbar.php") ?>

	<div class="content-container">
		<ol class="breadcrumb">
		   	<li class="breadcrumb-item"><a href="#">Dashboard</a></li>
		   	<li class="breadcrumb-item"><a href="#">Daftar Aset</a></li>
		    <li class="breadcrumb-item active" aria-current="page">Aset Lab</li>
		</ol>

		<div class="content shadow">
			<div class="isi">
				<h4>Profil Anda</h4>
				<hr>
				<form action="update.php" method="post" enctype="multipart/form-data">
					<?php foreach($data_profil as $data) { ?>
				  	<div class="form-group">
				    	<label for="nama-lengkap">Nama Lengkap</label>
				    	<input type="text" name="nama_lengkap" value="<?= $data['nama_lengkap'] ?>" class="form-control" id="nama-lengkap" placeholder="Nama Lengkap" required>
				  	</div>
				  	<div class="form-row">
				    	<div class="col pl-1">
					   		<div class="form-group">
					   			<label for="role">Role</label>
						   		<select name="role" class="form-control" id="role">
							      	<option value="Administrator">Administrator</option>
							      	<option value="Guest">Guest</option>
						    	</select>
					      	</div>
				    	</div>
				    	<div class="col pr-1">
				    		<div class="form-group">
					    		<label for="username">Username</label>
					      		<input type="text" name="username" value="<?= $data['username'] ?>" class="form-control" id="username" placeholder="Username" required>
					      	</div>
				    	</div>
				    	<div class="col pr-1">
				    		<div class="form-group">
					    		<label for="password">Password</label>
					      		<input type="text" name="password" value="<?= $user['password'] ?>" class="form-control" id="password" placeholder="Password" required>
					      	</div>
				    	</div>
				  	</div>
				  	<div class="form-group row mt-3">
					    <div class="col-sm-2">Upload Foto</div>
					    <div class="col-sm-2">
					    	<!-- <img src="" class="img-thumbnail foto-preview"> -->
					    	<?php if($dataUser['foto']) { ?>
								<img class="img-thumbnail foto-preview" src="../assets/foto/<?= $dataUser['foto']; ?>">
							<?php } ?>
							<?php if(!$dataUser['foto']) { ?>
								<img class="img-thumbnail foto-preview" src="../assets/foto-profil.svg">
							<?php } ?>
					    </div>
					    <div class="col-sm-8">
					      	<div class="custom-file">
							  	<input type="file" style="cursor: pointer;" class="custom-file-input file-foto" id="foto" name="foto" onchange='previewFoto()'>
							  	<label class="custom-file-label label-foto" for="foto">Pilih foto..</label>
							  	<small class="text-muted">Foto harus berekstensi PNG, JPG, dengan ukuran dibawah atau sama dengan 1Mb.</small>
							</div>
						</div>
					</div>
					<center>
						<input type="hidden" name="foto_old" value="<?= $data['foto'] ?>">
						<input class="btn btn-success" type="submit" name="Update" value="Update">
					</center>
					<?php } ?>
				</form>
			</div>
		</div>
	</div>

	<?php include("../layout/footer.php") ?>
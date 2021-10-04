<?php
	include("../status_login.php");
	include("../status_admin.php");
?>

	<?php include("../layout/head.php") ?>
	
	<?php include("../layout/sidebar_profil.php") ?>

	<?php include("../layout/sidebar_menu.php") ?>

	<?php include("../layout/navbar.php") ?>

	<div class="content-container">
		<ol class="breadcrumb">
		   	<li class="breadcrumb-item"><a href="#">Dashboard</a></li>
		    <li class="breadcrumb-item active" aria-current="page">Tambah User</li>
		</ol>

		<div class="content shadow">
			<div class="isi">
				<h4>Tambah User</h4>
				<hr>
				<form action="add.php" method="post" name="form" enctype="multipart/form-data">
				  	<div class="form-group">
				    	<label for="nama-lengkap">Nama Lengkap</label>
				    	<input type="text" name="nama_lengkap" class="form-control" id="nama-lengkap" placeholder="Nama Lengkap" required>
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
					      		<input type="text" name="username" class="form-control" id="username" placeholder="Username" required>
					      	</div>
				    	</div>
				    	<div class="col pr-1">
				    		<div class="form-group">
					    		<label for="password">Password</label>
					      		<input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
					      	</div>
				    	</div>
				  	</div>
				  	<div class="form-group row mt-3">
					    <div class="col-sm-2">Upload Foto</div>
					    <div class="col-sm-2">
					    	<img src="" class="img-thumbnail foto-preview">
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
						<input class="btn btn-success mt-3" type="submit" name="User" value="Submit">
					</center>
				</form>
			</div>
		</div>
	</div>

	<?php include("../layout/footer.php") ?>
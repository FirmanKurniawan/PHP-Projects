<?php
	include("../status_login.php");
	include("../status_admin.php");

	// Menghubungkan file koneksi.php
	include("../koneksi.php");

	// Mengambil data pada database
	$result = mysqli_query($db, "SELECT * FROM profil ORDER BY id DESC");

?>

	<?php include("../layout/head.php") ?>
	
	<?php include("../layout/sidebar_profil.php") ?>

	<?php include("../layout/sidebar_menu.php") ?>

	<?php include("../layout/navbar.php") ?>

	<div class="content-container">
		<ol class="breadcrumb">
		   	<li class="breadcrumb-item"><a href="#">Dashboard</a></li>
		   	<li class="breadcrumb-item"><a href="#">Daftar User</a></li>
		    <li class="breadcrumb-item active" aria-current="page">User</li>
		</ol>

		<div class="content shadow">
			<div class="isi">
				<h4>Daftar User</h4>
				<hr>
				<div class="table-responsive">
					<table class="table bg-white table-bordered table-hover" style="display: table;">
					  	<thead>
					    	<tr>
					      		<th scope="col" width="10" style="text-align: center;">No</th>
					      		<th scope="col">Nama Lengkap</th>
					      		<th scope="col">Role</th>
					      		<th scope="col" width="20" style="text-align: center;">Aksi</th>
					    	</tr>
					  	</thead>
					  	<tbody>
					    	<?php
					    		$no = 1;
					    		foreach($result as $data) {
					    	?>
						    	<tr>
						    		<td style="text-align: center;"><?= $no++ ?></td>
						    		<td><?= $data['nama_lengkap'] ?></td>
						    		<td><?= $data['role'] ?></td>
						    		<td>
						    			<a href="hapus.php?username=<?= $data['username'] ?>" class="btn btn-sm btn-danger">
						    				<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
											  	<path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
											  	<path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
											</svg>
						    			</a>
						    		</td>
						    	</tr>
						    <?php } ?>
					  	</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>

	<?php include("../layout/footer.php") ?>
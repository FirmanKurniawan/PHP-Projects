<?php
	include("../status_login.php");

	include("../koneksi.php");

	$latest_data = mysqli_query($db, "SELECT * FROM latest_aset");

	include("../function/created_at.php");
?>

	<?php include("../layout/head.php") ?>
	
	<?php include("../layout/sidebar_profil.php") ?>

	<?php include("../layout/sidebar_menu.php") ?>

	<?php include("../layout/navbar.php") ?>

	<div class="content-container">
		<ol class="breadcrumb">
		   	<li class="breadcrumb-item"><a href="#">Dashboard</a></li>
		    <li class="breadcrumb-item active" aria-current="page">Data terbaru</li>
		</ol>

		<div class="content shadow">
			<div class="isi">
				<h4>Daftar Data Aset terbaru</h4>
				<hr>
				<div class="table-responsive">
					<table class="table bg-white table-bordered table-hover" style="display: table; margin: 0px;">
					  	<thead>
					    	<tr>
					      		<th scope="col" width="10" style="text-align: center;">No</th>
					      		<th scope="col">Nama Aset</th>
					      		<th scope="col">Lokasi</th>
					      		<th scope="col">Waktu</th>
					      		<th scope="col">Ditambahkan oleh</th>
					      		<?php if($dataUser['role'] == 'Administrator') { ?>
					      		<th scope="col" width="10">Aksi</th>
					      		<?php } ?>"
					    	</tr>
					  	</thead>
					  	<tbody>
					  	<?php
					  		$no = 1;

					  		foreach($latest_data as $data){
					  	?>
					  		<tr>
							    <td style="text-align: center;"><?= $no++; ?></td>
							    <td><?= $data['nama_aset'] ?></td>
							    <td><?= $data['alokasi'] ?></td>
							    <td>
							    	<?= waktu($data['created_at']) ?>
							    	<span style="font-size: 14px">
								    	Pada <?= date("d F Y", strtotime($data['created_at'])); ?>, 
								    	<br>
								    	Pukul <?= date("H:i:s", strtotime($data['created_at'])); ?> WITA
								    </span>
							    </td>
							    <td><?= $data['user'] ?></td>
							    <?php if($dataUser['role'] == 'Administrator') { ?>
							    <td>
							    	<a href="hapus.php?id=<?= $data['id'] ?>" class="btn btn-sm btn-danger">
							    		<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
										  	<path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
										  	<path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
										</svg>
							    	</a>
							    </td>
								<?php } ?>
							</tr>
						<?php } ?>
					  	</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>

	<?php include("../layout/footer.php") ?>
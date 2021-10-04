<?php
	include("../status_login.php");

	// Menghubungkan file koneksi.php
	include("../koneksi.php");

	// Mengambil data pada database
	if(isset($_GET['cari'])) {
		$cari = $_GET['cari'];
		$result = mysqli_query($db, "SELECT * FROM aset_kelas WHERE nama_aset LIKE '%".$cari."%'");
	} else {
		$result = mysqli_query($db, "SELECT * FROM aset_kelas ORDER BY id DESC");
	}

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
		    <li class="breadcrumb-item active" aria-current="page">Aset Kelas</li>
		</ol>

		<div class="content shadow">
			<div class="isi">
				<h4>Daftar Aset Kelas</h4>
				<a href="cetak.php" target="_blank" class="float-right mt-4 btn btn-outline-info">Cetak PDF</a>
				<hr>
				<form action="index.php" method="get">
					<div class="form-row">
					    <div class="col-3 pl-0">
					      <input type="text" name="cari" class="form-control" placeholder="Cari Aset Aula...">
					    </div>
					    <div class="col">
					      <input type="submit" class="btn btn-success" value="Cari">
					    </div>
					  </div>
				</form>
				<?php
					if(isset($_GET['cari'])) {
						$cari = $_GET['cari'];
						echo '<p>Hasil pencarian : ' . $cari . '</p>';
					}
				?>
				<div class="table-responsive">
					<table class="table bg-white table-bordered table-hover" style="display: table;">
					  	<thead>
					    	<tr>
					      		<th scope="col" width="10" style="text-align: center;">No</th>
					      		<th scope="col">Nama Aset</th>
					      		<th scope="col">Qty</th>
					      		<th scope="col">Harga</th>
					      		<th scope="col">Nama Pemeriksa</th>
					      		<th scope="col">Tanggal Diperiksa</th>
					      		<th scope="col">Catatan</th>
					      		<th scope="col" style="text-align: center;">Aksi</th>
					    	</tr>
					  	</thead>
					  	<tbody>
					    	<?php
					    		$no = 1;
					    		foreach($result as $data) {
					    	?>
						    	<tr>
						    		<td style="text-align: center;"><?= $no++ ?></td>
						    		<td width="140"><?= $data['nama_aset'] ?></td>
						    		<td><?= $data['kuantitas'] ?></td>
						    		<td width="120"><?= harga($data['harga']) ?></td>
						    		<td width="150"><?= $data['nama_pemeriksa'] ?></td>
						    		<td><?php 
						    			if($data['tgl_diperiksa'] == '0000-00-00'){
											echo '';
										} else {
											echo date("d F Y", strtotime($data['tgl_diperiksa']));
										}
						    		?></td>
						    		<td><?= $data['catatan'] ?></td>
						    		<td style="width: 130px">
						    			<a href="detail.php?id=<?= $data['id'] ?>" class="btn btn-sm btn-info">
						    				<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-search" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
										  		<path fill-rule="evenodd" d="M10.442 10.442a1 1 0 0 1 1.415 0l3.85 3.85a1 1 0 0 1-1.414 1.415l-3.85-3.85a1 1 0 0 1 0-1.415z"/>
										  		<path fill-rule="evenodd" d="M6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11zM13 6.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z"/>
											</svg>
										</a>
										<?php if($dataUser['role'] == 'Administrator') { ?>
						    			<a href="edit.php?id=<?= $data['id'] ?>" class="btn btn-sm btn-warning">
						    				<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
											  	<path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
											  	<path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
											</svg>
						    			</a>
						    			<a href="hapus.php?id=<?= $data['id'] ?>&nama_aset=<?= $data['nama_aset'] ?>" class="btn btn-sm btn-danger">
						    				<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
											  	<path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
											  	<path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
											</svg>
						    			</a>
						    			<?php } ?>
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
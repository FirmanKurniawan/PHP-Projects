<?php
	include("../status_login.php");

	include("../koneksi.php");

	// get id dari url
	$id = $_GET['id'];

	$result = mysqli_query($db, "SELECT * FROM aset_kelas WHERE id=$id");

	include("../function/rupiah.php");
?>

	<?php include("../layout/head.php") ?>
	
	<?php include("../layout/sidebar_profil.php") ?>

	<?php include("../layout/sidebar_menu.php") ?>

	<?php include("../layout/navbar.php") ?>

	<div class="content-container">
		<ol class="breadcrumb">
		   	<li class="breadcrumb-item"><a href="#">Dashboard</a></li>
		   	<li class="breadcrumb-item"><a href="#">Aset Kelas</a></li>
		   	<li class="breadcrumb-item"><a href="#">Detail Data Aset</a></li>
		    <li class="breadcrumb-item active" aria-current="page"><?= $_GET['id'] ?></li>
		</ol>

		<div class="content shadow">
			<div class="isi">
				<h4>Detail Data Aset</h4>
				<hr>
				<?php foreach($result as $data) { ?>
				  	<div class="form-group">
				    	<label for="nama-aset">Nama Aset</label>
				    	<input type="text" name="nama_aset" class="form-control" id="nama-aset" placeholder="Contoh: Kursi, Meja, Papan tulis..." value="<?= $data['nama_aset'] ?>" readonly>
				  	</div>
				  	<div class="form-group">
				    	<label for="alokasi-penempatan">Alokasi Penempatan</label>
				    	<input type="text" class="form-control" name="alokasi" value="Kantor" readonly>
				  	</div>
				  	<div class="form-row">
				    	<div class="col pl-1">
				    		<div class="form-group">
					    		<label for="kuantitas">Kuantitas</label>
					      		<input type="text" name="kuantitas" class="form-control" id="kuantitas" placeholder="Jumlah barang" value="<?= $data['kuantitas'] ?>" readonly>
					      	</div>
				    	</div>
				    	<div class="col">
				    		<div class="form-group">
					    		<label for="harga-aset">Harga Aset</label>
					      		<input type="text" name="harga" class="form-control" id="harga-aset" value="<?= harga($data['harga']) ?>" placeholder="Rp." readonly>
					      	</div>
				    	</div>
				    	<div class="col pr-1">
				    		<div class="form-group">
					    		<label for="tanggal-pembelian">Tanggal Pembelian</label>
					      		<input type="text" name="tgl_pembelian" class="form-control" 
					      		value="<?php
					      			if($data['tgl_pembelian'] == '0000-00-00'){
											echo '';
									} else {
										echo date("d F Y", strtotime($data['tgl_pembelian']));
									}
					      		?>" id="tanggal-diperiksa" readonly>
					      	</div>
				    	</div>
				  	</div>
				  	<hr>
				  	<div class="form-row">
				    	<div class="col pl-1">
				    		<div class="form-group">
					    		<label for="penanggung-jawab">Penanggung Jawab</label>
					      		<input type="text" name="penanggung_jawab" class="form-control" id="penanggung-jawab" placeholder="Nama lengkap" value="<?= $data['penanggung_jawab'] ?>" readonly>
					      	</div>
				    	</div>
				    	<div class="col">
				    		<div class="form-group">
					    		<label for="nama-pemeriksa">Telah diperiksa oleh</label>
					      		<input type="text" name="nama_pemeriksa" class="form-control" id="nama-pemeriksa" value="<?= $data['nama_pemeriksa'] ?>"placeholder="Nama pemeriksa" readonly>
					      	</div>
				    	</div>
				    	<div class="col pr-1">
				    		<div class="form-group">
					    		<label for="tanggal-diperiksa">Tanggal Diperiksa</label>
					      		<input type="text" name="tgl_diperiksa" class="form-control" 
					      		value="<?php
					      			if($data['tgl_diperiksa'] == '0000-00-00'){
											echo '';
									} else {
										echo date("d F Y", strtotime($data['tgl_diperiksa']));
									}
					      		?>" id="tanggal-diperiksa" readonly>
					      	</div>
				    	</div>
				  	</div>
				  	<div class="form-group">
				    	<label for="catatan">Catatan</label>
				    	<textarea class="form-control" name="catatan" id="catatan" rows="3" placeholder="Optional" readonly><?= $data['catatan'] ?></textarea>
				  	</div>
				<?php } ?>
			</div>
		</div>
	</div>

	<?php include("../layout/footer.php") ?>

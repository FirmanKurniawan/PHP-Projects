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
		    <li class="breadcrumb-item active" aria-current="page">Tambah Data Aset</li>
		</ol>

		<div class="content shadow">
			<div class="isi">
				<h4>Tambah Data Aset</h4>
				<hr>
				<form action="add.php" method="post" name="form">
				  	<div class="form-group">
				    	<label for="nama-aset">Nama Aset</label>
				    	<input type="text" name="nama_aset" class="form-control" id="nama-aset" placeholder="Contoh: Kursi, Meja, Papan tulis..." required>
				  	</div>
				  	<div class="form-group">
				    	<label for="alokasi-penempatan">Alokasi Penempatan</label>
				    	<select name="alokasi" class="form-control" id="alokasi-penempatan">
				    		<option><-- Pilih --></option>
					      	<option value="Kantor">Kantor / Ruang Guru</option>
					      	<option value="Kelas">Kelas</option>
					      	<option value="Aula">Aula</option>
					      	<option value="Lab">Laboratorium</option>
					      	<option value="Lainnya">Lainnya</option>
				    	</select>
				  	</div>
				  	<div class="form-row">
				    	<div class="col pl-1">
					   		<div class="form-group">
					    		<label for="kuantitas">Kuantitas</label>
					      		<input type="number" name="kuantitas" class="form-control" id="kuantitas" placeholder="Jumlah barang" required>
					      	</div>
				    	</div>
					    <div class="col">
				    		<div class="form-group">
					    		<label for="harga-aset">Harga Aset</label>
					      		<input type="number" name="harga" class="form-control" id="harga-aset" placeholder="Rp.">
					      	</div>
				    	</div>
				    	<div class="col pr-1">
				    		<div class="form-group">
					    		<label for="tanggal-pembelian">Tanggal Pembelian</label>
					      		<input type="date" name="tgl_pembelian" class="form-control" id="tanggal-pembelian">
					      	</div>
				    	</div>
				  	</div>
				  	<hr>
				  	<div class="form-row">
				    	<div class="col pl-1">
				    		<div class="form-group">
					    		<label for="penanggung-jawab">Penanggung Jawab</label>
					      		<input type="text" name="penanggung_jawab" class="form-control" id="penanggung-jawab" placeholder="Nama lengkap" required>
							</div>
					   	</div>
					   	<div class="col">
					   		<div class="form-group">
					    		<label for="nama-pemeriksa">Telah diperiksa oleh</label>
					      		<input type="text" name="nama_pemeriksa" class="form-control" id="nama-pemeriksa" placeholder="Nama pemeriksa">
					      	</div>
					   	</div>
					   	<div class="col pr-1">
					   		<div class="form-group">
					    		<label for="tanggal-diperiksa">Tanggal Diperiksa</label>
					      		<input type="date" name="tgl_diperiksa" class="form-control" id="tanggal-diperiksa">
					      	</div>
					   	</div>
					</div>
					<div class="form-group">
					   	<label for="catatan">Catatan</label>
					   	<textarea class="form-control" name="catatan" id="catatan" rows="3" placeholder="Optional"></textarea>
					</div>
					<center>
						<input class="btn btn-success" type="submit" name="Submit" value="Submit">
					</center>
				</form>
			</div>
		</div>
	</div>

	<?php include("../layout/footer.php") ?>
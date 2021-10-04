<?php
	include("../status_login.php");
	include("../status_admin.php");

	include("../koneksi.php");

	if(isset($_POST['Update'])) {
		$id = $_POST['id'];

	   	$nama_aset = $_POST['nama_aset'];
		$alokasi = $_POST['alokasi'];
		$kuantitas = $_POST['kuantitas'];
		$harga = $_POST['harga'];
		$tgl_pembelian = $_POST['tgl_pembelian'];
		$penanggung_jawab = $_POST['penanggung_jawab'];
		$nama_pemeriksa = $_POST['nama_pemeriksa'];
		$tgl_diperiksa = $_POST['tgl_diperiksa'];
		$catatan = $_POST['catatan'];

	    // Update data ke database
		$result = mysqli_query($db, "UPDATE aset_kelas SET 
			nama_aset = '$nama_aset',
			alokasi = '$alokasi',
			kuantitas = '$kuantitas',
			harga = '$harga',
			tgl_pembelian = '$tgl_pembelian',
			penanggung_jawab = '$penanggung_jawab',
			nama_pemeriksa = '$nama_pemeriksa',
			tgl_diperiksa = '$tgl_diperiksa',
			catatan = '$catatan' WHERE id=$id
		");
		
		// Redirect
	    header("Location: index.php");
	}
?>

<?php
	// get id dari url
	$id = $_GET['id'];

	$result = mysqli_query($db, "SELECT * FROM aset_kelas WHERE id=$id");
?>

	<?php include("../layout/head.php") ?>
	
	<?php include("../layout/sidebar_profil.php") ?>

	<?php include("../layout/sidebar_menu.php") ?>

	<?php include("../layout/navbar.php") ?>

	<div class="content-container">
		<ol class="breadcrumb">
		   	<li class="breadcrumb-item"><a href="#">Dashboard</a></li>
		   	<li class="breadcrumb-item"><a href="#">Aset Kelas</a></li>
		   	<li class="breadcrumb-item"><a href="#">Edit Data Aset</a></li>
		    <li class="breadcrumb-item active" aria-current="page"><?= $_GET['id'] ?></li>
		</ol>

		<div class="content shadow">
			<div class="isi">
				<h4>Edit Data Aset</h4>
				<hr>
				<form action="edit.php" method="post" name="update">
					<?php foreach($result as $data) { ?>
				  	<div class="form-group">
				    	<label for="nama-aset">Nama Aset</label>
				    	<input type="text" name="nama_aset" class="form-control" id="nama-aset" placeholder="Contoh: Kursi, Meja, Papan tulis..." value="<?= $data['nama_aset'] ?>" required>
				  	</div>
				  	<div class="form-group">
				    	<label for="alokasi-penempatan">Alokasi Penempatan</label>
				    	<input type="text" class="form-control" name="alokasi" value="Kelas" readonly>
				  	</div>
				  	<div class="form-row">
				    	<div class="col pl-1">
				    		<div class="form-group">
					    		<label for="kuantitas">Kuantitas</label>
					      		<input type="number" name="kuantitas" class="form-control" id="kuantitas" placeholder="Jumlah barang" value="<?= $data['kuantitas'] ?>" required>
					      	</div>
				    	</div>
				    	<div class="col">
				    		<div class="form-group">
					    		<label for="harga-aset">Harga Aset</label>
					      		<input type="number" name="harga" class="form-control" id="harga-aset" value="<?= $data['harga'] ?>" placeholder="Rp.">
					      	</div>
				    	</div>
				    	<div class="col pr-1">
				    		<div class="form-group">
					    		<label for="tanggal-pembelian">Tanggal Pembelian</label>
					      		<input type="date" name="tgl_pembelian" class="form-control" value="<?= $data['tgl_pembelian'] ?>" id="tanggal-pembelian">
					      	</div>
				    	</div>
				  	</div>
				  	<hr>
				  	<div class="form-row">
				    	<div class="col pl-1">
				    		<div class="form-group">
					    		<label for="penanggung-jawab">Penanggung Jawab</label>
					      		<input type="text" name="penanggung_jawab" class="form-control" id="penanggung-jawab" placeholder="Nama lengkap" value="<?= $data['penanggung_jawab'] ?>" required>
					      	</div>
				    	</div>
				    	<div class="col">
				    		<div class="form-group">
					    		<label for="nama-pemeriksa">Telah diperiksa oleh</label>
					      		<input type="text" name="nama_pemeriksa" class="form-control" id="nama-pemeriksa" value="<?= $data['nama_pemeriksa'] ?>"placeholder="Nama pemeriksa">
					      	</div>
				    	</div>
				    	<div class="col pr-1">
				    		<div class="form-group">
					    		<label for="tanggal-diperiksa">Tanggal Diperiksa</label>
					      		<input type="date" name="tgl_diperiksa" class="form-control" value="<?= $data['tgl_diperiksa'] ?>" id="tanggal-diperiksa">
					      	</div>
				    	</div>
				  	</div>
				  	<div class="form-group">
				    	<label for="catatan">Catatan</label>
				    	<textarea class="form-control" name="catatan" id="catatan" rows="3" placeholder="Optional"><?= $data['catatan'] ?></textarea>
				  	</div>
				  	<center>
				  		<input type="hidden" name="id" value="<?= $_GET['id'] ?>">
				  		<input class="btn btn-success" type="submit" name="Update" value="Update">
				  	</center>
				  	<?php } ?>
				</form>
			</div>
		</div>
	</div>

	<?php include("../layout/footer.php") ?>
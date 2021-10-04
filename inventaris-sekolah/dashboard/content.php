<div class="row">
	<div class="col">
		<div class="card-info shadow rounded">
			<div class="title rounded-top">
				<p>Aset Kantor</p>
			</div>
			<div class="body rounded-bottom">
				<div class="row">
					<div class="col">
						<h1 class="totalKuantitas"><span class="counter"><?= $resultKantor['totalKuantitas'] ?></span></h1>
					</div>
					<div class="col">
						<svg viewBox="0 0 16 16" class="bi bi-box-seam asetkantor-icon" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
						  	<path fill-rule="evenodd" d="M8.186 1.113a.5.5 0 0 0-.372 0L1.846 3.5l2.404.961L10.404 2l-2.218-.887zm3.564 1.426L5.596 5 8 5.961 14.154 3.5l-2.404-.961zm3.25 1.7l-6.5 2.6v7.922l6.5-2.6V4.24zM7.5 14.762V6.838L1 4.239v7.923l6.5 2.6zM7.443.184a1.5 1.5 0 0 1 1.114 0l7.129 2.852A.5.5 0 0 1 16 3.5v8.662a1 1 0 0 1-.629.928l-7.185 2.874a.5.5 0 0 1-.372 0L.63 13.09a1 1 0 0 1-.63-.928V3.5a.5.5 0 0 1 .314-.464L7.443.184z"/>
						</svg>
					</div>
				</div>
				<small class="text-muted">Total seluruh aset</small>
				<br>
				<div class="btn-lihat rounded-pill">
					<a href="../aset_kantor" class="btn btn-sm btn-info rounded-pill shadow">Lihat</a>
				</div>
			</div>
		</div>
	</div>

	<div class="col">
		<div class="card-info shadow rounded">
			<div class="title rounded-top">
				<p>Aset Kelas</p>
			</div>
			<div class="body rounded-bottom">
				<div class="row">
					<div class="col">
						<h1 class="totalKuantitas"><span class="counter"><?= $resultKelas['totalKuantitas'] ?></span></h1>
					</div>
					<div class="col">
						<svg viewBox="0 0 16 16" class="bi bi-box-seam asetkelas-icon" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
						  	<path fill-rule="evenodd" d="M8.186 1.113a.5.5 0 0 0-.372 0L1.846 3.5l2.404.961L10.404 2l-2.218-.887zm3.564 1.426L5.596 5 8 5.961 14.154 3.5l-2.404-.961zm3.25 1.7l-6.5 2.6v7.922l6.5-2.6V4.24zM7.5 14.762V6.838L1 4.239v7.923l6.5 2.6zM7.443.184a1.5 1.5 0 0 1 1.114 0l7.129 2.852A.5.5 0 0 1 16 3.5v8.662a1 1 0 0 1-.629.928l-7.185 2.874a.5.5 0 0 1-.372 0L.63 13.09a1 1 0 0 1-.63-.928V3.5a.5.5 0 0 1 .314-.464L7.443.184z"/>
						</svg>
					</div>
				</div>
				<small class="text-muted">Total seluruh aset</small>
				<br>
				<div class="btn-lihat rounded-pill">
					<a href="../aset_kelas" class="btn btn-sm btn-info rounded-pill shadow">Lihat</a>
				</div>
			</div>
		</div>
	</div>

	<div class="col">
		<div class="card-info shadow rounded">
			<div class="title rounded-top">
				<p>Aset Aula</p>
			</div>
			<div class="body rounded-bottom">
				<div class="row">
					<div class="col">
						<h1 class="totalKuantitas"><span class="counter"><?= $resultAula['totalKuantitas'] ?></span></h1>
					</div>
					<div class="col">
						<svg viewBox="0 0 16 16" class="bi bi-box-seam asetaula-icon" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
						  	<path fill-rule="evenodd" d="M8.186 1.113a.5.5 0 0 0-.372 0L1.846 3.5l2.404.961L10.404 2l-2.218-.887zm3.564 1.426L5.596 5 8 5.961 14.154 3.5l-2.404-.961zm3.25 1.7l-6.5 2.6v7.922l6.5-2.6V4.24zM7.5 14.762V6.838L1 4.239v7.923l6.5 2.6zM7.443.184a1.5 1.5 0 0 1 1.114 0l7.129 2.852A.5.5 0 0 1 16 3.5v8.662a1 1 0 0 1-.629.928l-7.185 2.874a.5.5 0 0 1-.372 0L.63 13.09a1 1 0 0 1-.63-.928V3.5a.5.5 0 0 1 .314-.464L7.443.184z"/>
						</svg>
					</div>
				</div>
				<small class="text-muted">Total seluruh aset</small>
				<br>
				<div class="btn-lihat rounded-pill">
					<a href="../aset_aula" class="btn btn-sm btn-info rounded-pill shadow">Lihat</a>
				</div>
			</div>
		</div>
	</div>

	<div class="col">
		<div class="card-info shadow rounded">
			<div class="title rounded-top">
				<p>Aset Lab</p>
			</div>
			<div class="body rounded-bottom">
				<div class="row">
					<div class="col">
						<h1 class="totalKuantitas"><span class="counter"><?= $resultLab['totalKuantitas'] ?></span></h1>
					</div>
					<div class="col">
						<svg viewBox="0 0 16 16" class="bi bi-box-seam asetlab-icon" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
						  	<path fill-rule="evenodd" d="M8.186 1.113a.5.5 0 0 0-.372 0L1.846 3.5l2.404.961L10.404 2l-2.218-.887zm3.564 1.426L5.596 5 8 5.961 14.154 3.5l-2.404-.961zm3.25 1.7l-6.5 2.6v7.922l6.5-2.6V4.24zM7.5 14.762V6.838L1 4.239v7.923l6.5 2.6zM7.443.184a1.5 1.5 0 0 1 1.114 0l7.129 2.852A.5.5 0 0 1 16 3.5v8.662a1 1 0 0 1-.629.928l-7.185 2.874a.5.5 0 0 1-.372 0L.63 13.09a1 1 0 0 1-.63-.928V3.5a.5.5 0 0 1 .314-.464L7.443.184z"/>
						</svg>
					</div>
				</div>
				<small class="text-muted">Total seluruh aset</small>
				<br>
				<div class="btn-lihat rounded-pill">
					<a href="../aset_lab" class="btn btn-sm btn-info rounded-pill shadow">Lihat</a>
				</div>
			</div>
		</div>
	</div>
</div>
<hr>

<div class="alert alert-info" role="alert">
  	<h4 class="alert-heading">Selamat Datang di halaman Dashboard!</h4>
  	<p>Halo, <?= $dataUser['nama_lengkap'] ?>. Kamu berhasil memasuki halaman utama. kamu sedang berada di tampilan halaman Dashboard Aplikasi Inventaris Aset Sekolah.</p>
  	<hr>
  	<p class="mb-0">Enjoy dengan tampilan ini! :)</p>
</div>

<hr>
<?php if($dataUser['role'] == 'Administrator') { ?>
<div class="row">
	<div class="col">	
		<div class="note">
			<h5>Catatan</h5>
			<form action="update_note.php" method="post" name="form">
				<input type="hidden" name="id" value="<?= $_SESSION['id_profil'] ?>">
				<textarea class="form-control" rows="4" name="note" placeholder="*Isikan apa saja :)"><?= $dataUser['note'] ?></textarea>
				<div class="button">
					<input class="btn btn-sm btn-success" type="submit" name="Note" value="Update Note">
				</div>
			</form>
		</div>
	</div>
	<div class="col">
		<div class="recent">
			<h5>Data terbaru</h5>
			<div class="table-responsive">
				<table class="table bg-white table-bordered table-hover" style="display: table; margin: 0px;">
				  	<thead>
				    	<tr>
				      		<th scope="col" width="10" style="text-align: center;">#</th>
				      		<th scope="col">Nama Aset</th>
				      		<th scope="col">Lokasi</th>
				      		<th scope="col">Waktu</th>
				      		<th scope="col">Ditambahkan oleh</th>
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
						</tr>
					<?php } ?>
				  	</tbody>
				</table>
				<div style="display: flex; justify-content: flex-end;">
					<a href="../data_terbaru" class="btn btn-sm btn-info">Selengkapnya</a>
				</div>
			</div>
		</div>
	</div>
</div>
<?php } ?>
<?php if($dataUser['role'] != 'Administrator') { ?>
<h5>Data terbaru</h5>
<div class="table-responsive">
	<table class="table bg-white table-bordered table-hover" style="display: table; margin: 0px;">
	  	<thead>
	    	<tr>
	      		<th scope="col" width="10" style="text-align: center;">#</th>
	      		<th scope="col">Nama Aset</th>
	      		<th scope="col">Lokasi</th>
	      		<th scope="col">Waktu</th>
	      		<th scope="col">Ditambahkan oleh</th>
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
			</tr>
		<?php } ?>
	  	</tbody>
	</table>
	<div style="display: flex; justify-content: flex-end;">
		<a href="../data_terbaru" class="btn btn-sm btn-info">Selengkapnya</a>
	</div>
</div>
<?php } ?>
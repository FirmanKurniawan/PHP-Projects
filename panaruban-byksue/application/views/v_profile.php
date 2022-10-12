<!-- Home -->

	<div class="home">
		<div class="breadcrumbs_container">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="breadcrumbs">
							<ul>
								<li><a href="index.html">Home</a></li>
								<li>Profile Sekolah</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>			
	</div>

<!-- Isi Konten -->

<div class="contact_info_container">
		<div class="container">
			<div class="row">

				<div class="col-sm-4 text-center">
					<img src="<?= base_url('foto_kepsek/'.$sekolah->foto_kepsek) ?>" >
					<br>
					<h4><?= $sekolah->kepala_sekolah ?></h4>
					<h4>NIP : <?= $sekolah->nip ?></h4>
				</div>

				<div class="col-sm-8">
				<div class="form-group">
                <div class="form_title">Nama Sekolah</div>
                <input type="text" class="comment_input" value="<?= $sekolah->nama_sekolah ?>" type="text" name="nama_sekolah" readonly>
            </div>

            <div class="form-group">
                <label>Alamat Sekolah</label>
                <input type="text" class="comment_input" value="<?= $sekolah->alamat ?>" type="text" name="alamat" readonly>
            </div>

             <div class="form-group">
                <label>No Telepon</label>
                <input type="text" class="comment_input" value="<?= $sekolah->no_telepon ?>" type="text" name="no_telepon" readonly>
            </div>
				</div>
				 <div class="col-sm-12">
				 	<div class="form-group">
        			<div class="form_title">
        			<h4>Visi</h4>
        		</div>
                	<p><?= $sekolah->visi ?></p>
        </div>
        		<div class="form-group">
          		<div class="form_title">
          			<h4>Misi</h4>
          		</div>
                <p><?= $sekolah->misi ?></p>
        </div>

    </div>

			</div>
		</div>
	</div>



<!-- end -->



					</div>
				</div>
			</div>
		</div>
	</div>

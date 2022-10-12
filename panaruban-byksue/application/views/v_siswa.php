<!-- Home -->

	<div class="home">
		<div class="breadcrumbs_container">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="breadcrumbs">
							<ul>
								<li><a href="index.html">Home</a></li>
								<li>Download</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>			
	</div>
	<!-- Contact -->
	
		</div>

	<div class="contact">

		<div class="contact_info_container">
			<div class="container">
				<div class="row">

					<div class="col-lg-12 text-center">
						<h2>Siswa</h2><br>
					</div>

					<!-- Team Item -->
<?php foreach ($siswa as $key => $value) { ?>
				<div class="col-lg-3 col-md-6 team_col">
					<div class="team_item">
						<div class="team_image"><img src="<?= base_url('foto_siswa/'.$value->foto_siswa) ?>" alt=""></div>
						<div class="team_body">
							<div class="team_subtitle"><?= $value->nis ?></div>
							<div class="team_title"><a href="#"><?= $value->nama_siswa ?></a></div>
							<div class="team_subtitle"><?= $value->tempat_lahir ?>, <?= $value->tgl_lahir ?></div>
							<div class="team_subtitle"><?= $value->kelas ?></div>
							
							
						</div>
					</div>
				</div>
			<?php } ?>

				</div>
			</div>
		</div>
	</div>

					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Footer -->

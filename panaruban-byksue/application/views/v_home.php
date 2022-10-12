<div class="home">
		<div class="home_slider_container">
			
			<!-- Home Slider -->
			<div class="owl-carousel owl-theme home_slider">
				
				<!-- Home Slider Item -->
				<?php foreach ($berita as $key => $value) { ?>
				<div class="owl-item">
					<div class="home_slider_background" style="background-image:url(<?= base_url('gambar_berita/'.$value->gambar_berita) ?>)"></div>
					<div class="home_slider_content">
						<div class="container">
							<div class="row">
								<div class="col text-center">
									<div class="home_slider_title"><a href="<?= base_url('home/detail_berita/'.$value->slug_berita) ?>"><?= $value->judul_berita ?></a></div>
									<div class="home_slider_subtitle"><p><?= substr(strip_tags($value->isi_berita),0,200) ?>...</p></div>
									<div class="home_slider_form_container">
										
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

			<?php } ?>


				
			</div>
		</div>

		<!-- Home Slider Nav -->
		<div class="home_slider_nav home_slider_prev"><i class="fa fa-angle-left" aria-hidden="true"></i></div>
		<div class="home_slider_nav home_slider_next"><i class="fa fa-angle-right" aria-hidden="true"></i></div>
	</div>


	<!-- Popular Courses -->

	<div class="courses">
		<div class="section_background parallax-window" data-parallax="scroll" data-image-src="<?= base_url() ?>template/front-end/images/courses_background.jpg" data-speed="0.8"></div>
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="section_title_container text-center">
						<h2 class="section_title">Latest News</h2>
						<div class="section_subtitle"><p></p></div>
					</div>
				</div>
			</div>
			<div class="row courses_row">
				
				<!-- Course -->
				<?php foreach ($berita as $key => $value) { ?>
					<br><br>
				<div class="col-lg-4 course_col">
					<div class="course">
						<div class="course_image"><img src="<?= base_url('gambar_berita/'.$value->gambar_berita) ?>" height="230px"></div>
						<div class="course_body">
							<h3 class="course_title"><a href="<?= base_url('home/detail_berita/'.$value->slug_berita) ?>"><?= substr(strip_tags($value->judul_berita),0,20) ?>...</a></h3>
							<div class="course_teacher">User : <?= $value->nama_user ?></div>
							<div class="course_text">
								<p><?= substr(strip_tags($value->isi_berita),0,100) ?>...</p>
							</div>
						</div>
						<div class="course_footer">
							<div class="course_footer_content d-flex flex-row align-items-center justify-content-start">
								<div class="course_info">
									<i class="fa fa-calendar" aria-hidden="true"></i>
									<span><?= $value->tgl_berita ?></span>
								</div>
								
							</div>
						</div>
					</div>
				</div>
<br>
				<?php } ?>

			</div>
			<div class="row">
				<div class="col">
					<div class="courses_button trans_200"><a href="<?= base_url('home/berita') ?>">view all news</a></div>
				</div>
			</div>
		</div>
	</div>

	

						
	<!-- Team -->

	<div class="team">
		<div class="team_background parallax-window" data-parallax="scroll" data-image-src="<?= base_url() ?>template/front-end/images/team_background.jpg" data-speed="0.8"></div>
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="section_title_container text-center">
						<h2 class="section_title">Guru Sekolah</h2>
						
					</div>
				</div>
			</div>
			<div class="row team_row">
				
				<!-- Team Item -->
				<?php foreach ($guru as $key => $value) { ?>
				<div class="col-lg-3 col-md-6 team_col">
					<div class="team_item">
						<div class="team_image"><img src="<?= base_url('foto_guru/'.$value->foto_guru) ?>" alt=""></div>
						<div class="team_body">
							<div class="team_subtitle">NIP : <?= $value->nip ?></a></div>
							<div class="team_title"><a href="#"><?= $value->nama_guru ?></a></div>
							<div class="team_subtitle"><?= $value->tempat_lahir ?>, <?= $value->tgl_lahir ?></div>
							<div class="team_subtitle"><?= $value->nama_mapel ?></div>
							<div class="team_subtitle"><?= $value->pendidikan ?></div>
							
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
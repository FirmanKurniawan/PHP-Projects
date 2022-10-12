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
	<div class="contact">
		
		<!-- Contact Map -->

		

	<div class="contact">

		<div class="contact_info_container">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 text-center">
						<h3>Download Area</h3><br>
					</div>

					<div class="col-lg-12">

					<table class="table table-bordered" id="myTable">
					<thead>
					<tr>
						<th class="text-center" width="50px">No</th>
						<th class="text-center">Keterangan File</th>
						<th class="text-center" width="100px">Download</th>
					</tr>
					</thead>
					<tbody>
						<?php $no=1; foreach ($download as $key => $value) { ?>
						<tr>
							<td class="text-center"><?= $no++ ?></td>
							<td><?= $value->ket_file ?></td>
						
							<td class="text-center"><a href="<?= base_url ('file/'.$value->file); ?>" class="btn btn-primary btn-sm"><i class="fa fa-download"></i>Download</a></td>
						</tr>
					<?php } ?>
					</tbody>
					</table>
			
					</div>

				</div>
			</div>
		</div>
	</div>
	<!-- Newsletter -->

	

					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Footer -->

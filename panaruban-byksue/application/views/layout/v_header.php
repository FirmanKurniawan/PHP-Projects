<body>
<?php
$setting = $this->m_setting->detail();

?>
<div class="super_container">

	<!-- Header -->

	<header class="header">
			
		<!-- Top Bar -->
		<div class="top_bar">
			<div class="top_bar_container">
				<div class="container">
					<div class="row">
						<div class="col">
							<div class="top_bar_content d-flex flex-row align-items-center justify-content-start">
								<ul class="top_bar_contact_list">
									<li><div class="question">Have any questions?</div></li>
									<li>
										<i class="fa fa-phone" aria-hidden="true"></i>
										<div><?= $setting->no_telepon ?></div>
									</li>
									
									
								</ul>
								<div class="top_bar_login ml-auto">
									<div class="login_button"><a href="<?=base_url('login') ?>">Login Admin</a></div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>				
		</div>
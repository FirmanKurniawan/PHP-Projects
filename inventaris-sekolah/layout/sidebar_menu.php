		<div class="menu shadow">
			<p class="menu-title text-light">Menu</p>
			<nav class="navbar menu-content">
	    		<ul class="navbar-nav mr-auto">
	      			<li class="nav-item">
	        			<a class="nav-link" href="../dashboard">Dashboard</a>
	      			</li>
	      			<li class="nav-item dropdown">
	        			<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	         			Daftar Aset
			    		</a>
			    		<div class="dropdown-menu" aria-labelledby="navbarDropdown">
			      			<a class="dropdown-item" href="../aset_kantor">Aset Kantor</a>
			      			<a class="dropdown-item" href="../aset_kelas">Aset Kelas</a>
			      			<a class="dropdown-item" href="../aset_aula">Aset Aula</a>
			      			<a class="dropdown-item" href="../aset_lab">Aset Laboratorium</a>
			      			<div class="dropdown-divider"></div>
			      			<a class="dropdown-item" href="#">Lainnya</a>
			    		</div>
			  		</li>
			  		<?php if($dataUser['role'] == 'Administrator') { ?>
			  		<li class="nav-item">
			    		<a class="nav-link" href="../aset/tambah.php">Tambah Data Aset</a>
			  		</li>
			  		<li class="nav-item dropdown">
			    		<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" zria-haspopup="true" aria-expanded="false">
				    		Daftar User
				    	</a>
				 		<div class="dropdown-menu" aria-labelledby="navbarDropdown">
				   			<a class="dropdown-item" href="../user">Daftar User</a>
				   			<a class="dropdown-item" href="../user/tambah_user.php">Tambah User</a>
						</div>
					</li>
					<?php } ?>
					<li class="nav-item">
						<a class="nav-link" href="../data_terbaru">Data terbaru</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">Lainnya</a>
					</li>
				</ul>
			</nav>
		</div>
	</div>
</div>
<div class="shadow">
	<nav class="navbar navbar-expand-sm navbar-light navbar-top">
  		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    		<span class="navbar-toggler-icon"></span>
  		</button>
  		<div class="collapse navbar-collapse" id="navbarText">
	    	<ul class="navbar-nav mr-auto">
			    <li class="nav-item">
			        <span class="navbar-text text-light pl-1">Hai, <?= $dataUser['username']; ?>! Selamat datang.</span>
			    </li>
	    	</ul>
			<div class="pr-2">
			    <a href="../logout.php" class="btn btn-danger mr-2 shadow">Keluar</a>
			    <?php if($dataUser['role'] == 'Administrator') { ?>
			    	<a href="../profil" class="btn btn-light btn-profil shadow">Profil <img src="../assets/profil.svg"></a>
			    <?php } ?>
			</div>
  		</div>
	</nav>
</div>
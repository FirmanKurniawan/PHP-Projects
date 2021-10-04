<?php
	if($dataUser['role'] != 'Administrator'){
		echo '<script>alert("Anda tidak memiliki akses untuk halaman ini.");history.back()</script>';
	}

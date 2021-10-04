<?php

	function waktu($waktu){
		date_default_timezone_set('Asia/Ujung_Pandang');

		$created_at = strtotime($waktu);

		$now = strtotime('now');

		$waktu = $now - $created_at;

		$menit = floor($waktu / 60);

		$jam = floor($waktu / (60 * 60));

		if($menit < 60){
			echo '<small class="last-data rounded-pill">' . $menit . ' menit yang lalu</small><br><br>';
		} else if($jam < 23) {
			echo '<small class="last-data rounded-pill">' . $jam . ' jam yang lalu</small><br><br>';
		}
	}
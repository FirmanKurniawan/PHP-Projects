<?php
	
	function harga($angka){
		$hasil = "Rp. " . number_format($angka,2,',','.');

		return $hasil;
	}
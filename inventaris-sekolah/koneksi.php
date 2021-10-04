<?php
/**
 *	File config / koneksi untuk menghubungkan database
 */

	$databaseHost = 'localhost';
	$databaseName = 'inventarisdb';
	$databaseUsername = 'root';
	$databasePassword = '';

	$db = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);

	echo '<script>console.log("Berhasil terkoneksi ke database")</script>';

	if( !$db ) {
		die('Gagal menghubungkan dengan database: ' . mysqli_connect_error());
	}

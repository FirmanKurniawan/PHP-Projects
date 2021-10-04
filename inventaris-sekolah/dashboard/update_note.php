<?php
	include("../status_login.php");
	include("../status_admin.php");

	include("../koneksi.php");

	if(isset($_POST['Note'])) {
		$id = $_POST['id'];

	   	$note = $_POST['note'];

	    // Update data ke database
		mysqli_query($db, "UPDATE profil SET note = '$note' WHERE id=$id");
		
		// Redirect
	    header("Location: index.php");
	}
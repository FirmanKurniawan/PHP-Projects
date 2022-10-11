
<?php
	session_start();

	session_unset();

	session_destroy();

	header("Location: /ukk/login.php?pesan=logout")
?>
<?php
error_reporting(0);

# Coded by Marz

# \n -> linux
# \r\n -> windows
$list = explode("\n", file_get_contents($argv[1])); # change \n to \r\n if you're using windows
# ------------------- #

$hash = '$2y$10$BxO1iVD3HYjVO83NJ58VgeM4wNc7gd3gpggEV8OoHzB1dOCThBpb6'; # hash here, NB: use single quote (') , don't use double quote (")

if(isset($argv[1])) {
	foreach($list as $wordlist) {
		print " [+]"; print (password_verify($wordlist, $hash)) ? "$hash -> $wordlist (OK)\n" : "$hash -> $wordlist (SALAH)\n";
	}
} else {
	print "usage: php ".$argv[0]." wordlist.txt\n";
}
?>

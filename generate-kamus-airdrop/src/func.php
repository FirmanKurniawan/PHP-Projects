<?php
error_reporting(0);

function nl2br2($string) {
  $string = str_replace(array("\r\n", "\r", "\n"), "<br />", $string);
return $string;
}

$nameToken = htmlspecialchars($_POST['name']);
$tagFriend = htmlspecialchars($_POST['friends']);
$walletAddrs = htmlspecialchars($_POST['walletaddrs']);
$twHastag = htmlspecialchars($_POST['hastag']);
$submit = htmlspecialchars(isset($_POST['submit']));

if($submit){
  $string = file_get_contents("kamus.json");
  $json_a = json_decode($string, true);
  $get_json = $json_a['quotes'];
}

?>
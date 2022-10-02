<?php

if(isset($_POST['boom'])){

	$str_nomer=$_POST['nomer_id'];	$str_pesan=htmlspecialchars($_POST['text_id']);

	//Fix input

	$parse_nomer=substr("$str_nomer", '1');

	$nomer="62$parse_nomer";

	$pesan=urlencode($str_pesan);

	//function sending

	function send($nomer,$pesan){

		if (empty($pesan)) {

			$send="https://api.whatsapp.com/send?phone=$nomer";

			header("location: $send");

		}elseif (!empty($pesan)) {

			$send="https://api.whatsapp.com/send?phone=$nomer&text=$pesan";

			header("location: $send");

		}

	}

	//Sending now

	send($nomer,$pesan);

}

?>

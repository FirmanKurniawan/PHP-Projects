<?php
/* Dibuat Pada Tanggal : 13-07-2021
 * Nama project		: Covid api From kawalcorona

 * Dibuat Oleh ♡ Yoppy0x100 
*/

function getData() {
	$ch = curl_init('https://api.kawalcorona.com/indonesia/provinsi/');
	curl_setopt($ch, CURLOPT_HTTPGET, 1);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	$resp = curl_exec($ch);
	curl_close($ch);

	return json_decode($resp, true, JSON_PRETTY_PRINT);
}

function menu($data)
{
	echo chr(27).chr(91).'H'.chr(27).chr(91).'J';
	echo PHP_EOL . PHP_EOL;
	
	foreach($data as $no => $dataCovid) {
		echo $no . '. ' . $dataCovid['attributes']['Provinsi'] . PHP_EOL;
	}
	echo PHP_EOL . 'Input Number : ';
	$no = trim(fgets(STDIN));
	sleep(1);
	echo chr(27).chr(91).'H'.chr(27).chr(91).'J';
	
	echo PHP_EOL . PHP_EOL;
	echo 'Provinsi : ' . $data[$no]['attributes']['Provinsi'] . PHP_EOL;
	echo 'Positif : ' . $data[$no]['attributes']['Kasus_Posi'] . PHP_EOL;
	echo 'Sembuh : ' . $data[$no]['attributes']['Kasus_Semb'] . PHP_EOL;
	echo 'Meninggal : ' . $data[$no]['attributes']['Kasus_Meni'] . PHP_EOL;
	
	sleep(3);
	echo PHP_EOL . PHP_EOL;
	echo 'Back To menu ? (y/n)';
	$opt = strtolower(trim(fgets(STDIN)));
	echo PHP_EOL . '@hacktoberfest2021';

	if($opt == 'y') {
		echo chr(27).chr(91).'H'.chr(27).chr(91).'J';
		menu($data);
	}else {
		exit;
	}
}

$dataCovid = getData();
menu($dataCovid);
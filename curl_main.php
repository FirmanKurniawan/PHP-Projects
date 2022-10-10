<?php

//Buat fungsi http_request
function http_request($url){
	
	//persiapkan CURL
	$ch = curl_init();

	//set URL
	curl_setopt($ch, CURLOPT_URL, $url);

	//aktifkan fungsi transfer nilai yang berupa string
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

	//setting agar dapat dijalankan pada localhost
	//mematikan ssl verifiy (https)
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

	//tampung hasil ke dalam variabel @output
	$output = curl_exec($ch);

	//tutup CURL
	curl_close($ch);

	//mengembalikan hasil curl
	return $output;
}
//panggil fungsi http_request(url/link api)
$data =	http_request("https://api.kawalcorona.com/indonesia/provinsi/");
//ubah format json
	$data = json_decode($data, TRUE);

	// echo "<pre>";
	// 	print_r($data);
	// echo "</pre>";

	//tampung jumlah data
	$jumlah = count($data);
	
	$nomor = 1;

	for($i = 0; $i < $jumlah; $i++){
		$hasil = $data[$i]['attributes']
	?>
		<tr>
			<td><?=$nomor++?></td>
			<td><?=$hasil['Provinsi']?></td>
			<td><?=$hasil['Kasus_Posi']?></td>
			<td><?=$hasil['Kasus_Semb']?></td>
			<td><?=$hasil['Kasus_Meni']?></td>
		</tr>
	<?php 
	}
	 ?>
?>

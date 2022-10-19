function timeAgo($date) {
	$timestamp = strtotime($date);	
	
	$str_time = array("detik", "menit", "jam", "hari", "bulan", "tahun");
	$length = array("60","60","24","30","12","10");

	$current_time = time();
	if($current_time >= $timestamp) {
	 $diff     = time()- $timestamp;
	 for($i = 0; $diff >= $length[$i] && $i < count($length)-1; $i++) {
	 $diff = $diff / $length[$i];
	 }

	 $diff = round($diff);
	 return $diff . " " . $str_time[$i] . " yang lalu";
	}
}

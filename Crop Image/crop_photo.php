<?php
// Target siz
$targ_w = $_POST['targ_w'];
$targ_h = $_POST['targ_h'];
// quality
$jpeg_quality = 90;
// photo path
$src = $_POST['photo_url'];
// create new jpeg image based on the target sizes
$img_r = imagecreatefromjpeg($src);
$dst_r = ImageCreateTrueColor( $targ_w, $targ_h );
// crop photo
imagecopyresampled($dst_r,$img_r,0,0,$_POST['x'],$_POST['y'], $targ_w,$targ_h,$_POST['w'],$_POST['h']);
// create the physical photo
imagejpeg($dst_r,$src,$jpeg_quality);
// display the  photo - "?time()" to force refresh by the browser
echo '<img src="'.$src.'?'.time().'">';
exit;
?>
<?php
$nim = "nim anda";
$nama = "nama anda";
$umur = "umur anda";
$nilai = 82.25;
$status = TRUE;

echo "NIM : " . $nim . "<br>"
echo "Nama : $nama<br>";
print "Umur : " . $umur; print "<br>";
printf ("Nilai : %.3f<br>", $nilai);
if ($status)
    echo "Status : Aktif";
else
    echo "Status : Tidak Aktif";
?>

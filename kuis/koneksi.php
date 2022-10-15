<?php 
$con = mysql_connect("localhost", "root", "");

mysql_select_db("pasang");

if(!$con) {
    echo "Gagal Koneksi";
}
?>
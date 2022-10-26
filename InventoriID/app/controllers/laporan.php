<?php

$conn = mysqli_connect("localhost","root","","db_inventory");

function cariBarang($keyword) {
    global $conn;
    $query = "SELECT * FROM tb_barang_masuk WHERE
            kd_barang_masuk LIKE '%$keyword%' OR
            nama_barang_masuk LIKE '%$keyword%' OR
            jenis LIKE '%$keyword%' OR
            asal_barang LIKE '%$keyword%'
            ";
    return mysqli_query($conn, $query);
}

?>
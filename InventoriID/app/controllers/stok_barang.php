<?php 
// Koneksi database
$conn = mysqli_connect("localhost","root","","db_inventory");

function query($query) {
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) { 
        $rows[] = $row;
    }

    return $rows;
}

function tambahBarang($tambah) {
    global $conn;
    $kd_barang = htmlspecialchars(stripslashes($tambah['kd_barang']));
    $nama = htmlspecialchars(stripslashes($tambah['nama']));
    $jenis = htmlspecialchars(stripslashes($tambah['jenis']));
    $stok_barang = htmlspecialchars(stripslashes($tambah['stok_barang']));
     
    $query = "INSERT INTO tb_stok_barang VALUES('','$kd_barang','$nama','$jenis', '$stok_barang')";
    mysqli_query($conn, $query);
    
    return mysqli_affected_rows($conn);
}

function ubahBarang($ubah) {
    global $conn;
    $id_stok = $ubah['id_stok'];
    $kd_barang = htmlspecialchars(stripslashes($ubah['kd_barang']));
    $nama = htmlspecialchars(stripslashes($ubah['nama']));
    $jenis = htmlspecialchars(stripslashes($ubah['jenis']));
    $stok_barang = htmlspecialchars(stripslashes($ubah['stok_barang']));
    
    $query = "UPDATE tb_stok_barang SET 
                kd_barang = '$kd_barang',
                nama='$nama', 
                jenis='$jenis', 
                stok_barang='$stok_barang' 
                WHERE id_stok = $id_stok"
                ;
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function hapusBarang($id_stok) {
    global $conn;
    mysqli_query($conn, "DELETE FROM tb_stok_barang WHERE id_stok = $id_stok");

    return mysqli_affected_rows($conn);
}

function cariBarang($keyword) {
    $query = "SELECT * FROM tb_stok_barang WHERE
            kd_barang LIKE '%$keyword%' OR
            nama LIKE '%$keyword%' OR
            jenis LIKE '%$keyword%'
            ";
    return query($query);
}
?>
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
    $kd_barang_keluar = htmlspecialchars(stripslashes($tambah['kd_barang_keluar']));
    $nama_barang_keluar = htmlspecialchars(stripslashes($tambah['nama_barang_keluar']));
    $jenis = htmlspecialchars(stripslashes($tambah['jenis']));
    $jumlah_keluar = htmlspecialchars(stripslashes($tambah['jumlah_keluar']));


    $query = "INSERT INTO tb_barang_keluar VALUES('','$kd_barang_keluar','$nama_barang_keluar','$jenis','$jumlah_keluar',now())";
    mysqli_query($conn, $query);
    
    return mysqli_affected_rows($conn);
}

function ubahBarang($ubah) {
    global $conn;
    $id_barang_keluar = $ubah['id_barang_keluar'];
    $kd_barang_keluar = htmlspecialchars(stripslashes($ubah['kd_barang_keluar']));
    $nama_barang_keluar = htmlspecialchars(stripslashes($ubah['nama_barang_keluar']));
    $jenis = htmlspecialchars(stripslashes($ubah['jenis']));
    $jumlah_keluar = htmlspecialchars(stripslashes($ubah['jumlah_keluar']));
    
    $query = "UPDATE tb_barang_keluar SET 
                kd_barang_keluar = '$kd_barang_keluar',
                nama_barang_keluar ='$nama_barang_keluar', 
                jenis = '$jenis',
                jumlah_keluar ='$jumlah_keluar'
                WHERE id_barang_keluar = $id_barang_keluar"
                ;
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function hapusBarang($id_barang_keluar) {
    global $conn;
    mysqli_query($conn, "DELETE FROM tb_barang_keluar WHERE id_barang_keluar = $id_barang_keluar");

    return mysqli_affected_rows($conn);
}

function cariBarang($keyword) {
    $query = "SELECT * FROM tb_barang_keluar WHERE
            kd_barang_keluar LIKE '%$keyword%' OR
            nama_barang_keluar LIKE '%$keyword%' OR
            jenis LIKE '%$keyword%'
            ";
    return query($query);
}
?>
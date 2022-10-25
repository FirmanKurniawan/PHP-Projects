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
    $kd_barang_masuk = htmlspecialchars(stripslashes($tambah['kd_barang_masuk']));
    $nama_barang_masuk = htmlspecialchars(stripslashes($tambah['nama_barang_masuk']));
    $jenis = htmlspecialchars(stripslashes($tambah['jenis']));
    $asal_barang = htmlspecialchars(stripslashes($tambah['asal_barang']));
    $jumlah_masuk = htmlspecialchars(stripslashes($tambah['jumlah_masuk']));

    $query = "INSERT INTO tb_barang_masuk VALUES('','$kd_barang_masuk','$nama_barang_masuk','$jenis','$asal_barang','$jumlah_masuk',now())";
    mysqli_query($conn, $query);
    
    return mysqli_affected_rows($conn);
}

function ubahBarang($ubah) {
    global $conn;
    $id_barang_masuk = $ubah['id_barang_masuk'];
    $kd_barang_masuk = htmlspecialchars(stripslashes($ubah['kd_barang_masuk']));
    $nama_barang_masuk = htmlspecialchars(stripslashes($ubah['nama_barang_masuk']));
    $asal_barang = htmlspecialchars(stripslashes($ubah['asal_barang']));
    $jenis = htmlspecialchars(stripslashes($ubah['jenis']));
    $jumlah_masuk = htmlspecialchars(stripslashes($ubah['jumlah_masuk']));
    
    $query = "UPDATE tb_barang_masuk SET 
                kd_barang_masuk = '$kd_barang_masuk',
                nama_barang_masuk ='$nama_barang_masuk', 
                jenis ='$jenis', 
                asal_barang = '$asal_barang',
                jumlah_masuk = '$jumlah_masuk'
                WHERE id_barang_masuk = $id_barang_masuk"
                ;
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function hapusBarang($id_barang_masuk) {
    global $conn;
    mysqli_query($conn, "DELETE FROM tb_barang_masuk WHERE id_barang_masuk = $id_barang_masuk");

    return mysqli_affected_rows($conn);
}

function cariBarang($keyword) {
    $query = "SELECT * FROM tb_barang_masuk WHERE
            kd_barang_masuk LIKE '%$keyword%' OR
            nama_barang_masuk LIKE '%$keyword%' OR
            jenis LIKE '%$keyword%' OR
            asal_barang LIKE '%$keyword%'
            ";
    return query($query);
}
?>
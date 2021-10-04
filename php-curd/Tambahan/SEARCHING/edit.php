<?php

require 'koneksi.php';

// ambil data dari URL
$id = $_GET["id"];

// query data pelanggan berdasarkan id (['0'] agar penulisan array lebih singkat)
$datpel = query("SELECT * FROM data_pelanggan WHERE id = $id")["0"];



// cek apakah tombol submit sudah di tekan atau belum
if (isset($_POST["submit"])) {

    //cek apakah data berhasil di ubah atau tidak
    if (edit($_POST) > 0) {
        echo "
        <script>
        alert('data berhasil diubah!')
        document.location.href = 'index.php'
        </script>
        ";
    } else {
        echo "
        <script>
        alert('data gagal diubah!')
        document.location.href = 'index.php'
        </script>   
        ";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=H1, initial-scale=1.0">
    <title>EditData</title>
</head>

<body>
    <h1>Edit Data Pelanggan</h1>

    <form action="" method="post">
        <input type="hidden" name="id" value="<?= $datpel["id"]; ?>">
        <ul>
            <!-- <li>
                <label for="id">ID</label>
                <input type="text" name="id" id="id" value="<?= $datpel["id"]; ?>">
            </li> -->
            <li>
                <label for="nama">Nama :</label>
                <input type="text" name="nama" id="nama" required value="<?= $datpel["nama"]; ?>">
            </li>
            <li>
                <label for="usia">Usia :</label>
                <input type="text" name="usia" id="usia" required value="<?= $datpel["usia"]; ?>">
            </li>
            <li>
                <label for="merek">Merek :</label>
                <input type="text" name="merek" id="merek" required value="<?= $datpel["merek"]; ?>">
            </li>
            <li>
                <label for="produk">Produk :</label>
                <input type="text" name="produk" id="produk" required value="<?= $datpel["produk"]; ?>">
            </li>
            <li>
                <label for="gambar">Gambar :</label>
                <input type="text" name="gambar" id="gambar" required value="<?= $datpel["gambar"]; ?>">
            </li>
            <button type="submit" name="submit">Edit</button>
        </ul>
    </form>

</body>

</html>
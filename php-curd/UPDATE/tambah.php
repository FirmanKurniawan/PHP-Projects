<?php

require 'koneksi.php';

// cek apakah tombol submit sudah di tekan atau belum
if (isset($_POST["submit"])) {

    if (tambah($_POST) > 0) {
        echo "
        <script>
        alert('data berhasil ditambahkan!')
        document.location.href = 'index.php'
        </script>
        ";
    } else {
        echo "
        <script>
        alert('data gagal ditambahkan!')
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
    <title>Update Data</title>
</head>

<body>
    <h1>Tambah Data Pelanggan</h1>

    <form action="" method="post">
        <ul>
            <li>
                <label for="id">ID</label>
                <input type="text" name="id" id="id">
            </li>
            <li>
                <label for="nama">Nama :</label>
                <input type="text" name="nama" id="nama" required>
            </li>
            <li>
                <label for="usia">Usia :</label>
                <input type="text" name="usia" id="usia" required>
            </li>
            <li>
                <label for="merek">Merek :</label>
                <input type="text" name="merek" id="merek" required>
            </li>
            <li>
                <label for="produk">Produk :</label>
                <input type="text" name="produk" id="produk" required>
            </li>
            <li>
                <label for="gambar">Gambar :</label>
                <input type="text" name="gambar" id="gambar" required>
            </li>
            <button type="submit" name="submit">Submit</button>
        </ul>
    </form>

</body>

</html>
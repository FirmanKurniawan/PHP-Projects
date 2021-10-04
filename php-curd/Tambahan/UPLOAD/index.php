<?php

// mengambil dari file koneksi.php
require 'koneksi.php';
$pelanggan = query("SELECT * FROM data_pelanggan");

//  jika tombol search ditekan
if (isset($_POST['cari'])) {
    $pelanggan = cari($_POST["keyword"]);
}

?>


<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Data Pelanggan</h1>

    <a href="tambah.php">Tambah Data</a>
    <br><br>

    <form action="" method="POST">
        <input type="text" name="keyword" size="50" autofocus placeholder="cari data pelanggan..." autocomplete="off"> <!--  size berfungsi untuk panjang input, autofocus untuk langsung seperti klik, auto complate untuk hapus history pengisian -->
        <button type="submit" name="cari">Search!</button>

    </form>
    <br>
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>Id</th>
            <th>Nama</th>
            <th>Usia</th>
            <th>Merek</th>
            <th>Produk</th>
            <th>Gambar</th>
            <th>Action</th>
        </tr>
        <!-- <?php $x = 1 ?>  mengurutkan tabel ID -->
        <?php foreach ($pelanggan as $pel) : ?>
            <!--  looping database -->
            <tr>
                <td><?= $x; ?></td>

                <td><?= $pel['nama']; ?></td>
                <td><?= $pel['usia']; ?></td>
                <td><?= $pel['merek']; ?></td>
                <td><?= $pel['produk']; ?></td>
                <td><img src="img/<?= $pel["gambar"]; ?>" width="50"></td>
                <td>
                    <a href="edit.php?id=<?= $pel['id']; ?>">Edit</a> |
                    <a href="hapus.php?id=<?= $pel['id']; ?>" onclick="return confirm('yakin dihapuss?')">Delete</a>
                </td>
            </tr>
            <?php $x++; ?>
        <?php endforeach; ?>

    </table>

</body>

</html>
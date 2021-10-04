<?php

// mengambil dari file koneksi.php
// include_once('koneksi.php');
require 'koneksi.php';
$pelanggan = query("SELECT * FROM data_pelanggan"); // query sebagai argument 

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
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>Id</th>
            <th>Nama</th>
            <th>Usia</th>
            <th>Merek</th>
            <th>Produk</th>
            <th>Action</th>
        </tr>
        <!-- <?php $x = 1 ?>  mengurutkan tabel ID -->
        <!-- <?php foreach ($pelanggan as $pel) : ?> looping database -->
        <tr>
            <td><?= $x; ?></td>
            <td><?= $pel['nama']; ?></td>
            <td><?= $pel['usia']; ?></td>
            <td><?= $pel['merek']; ?></td>
            <td><?= $pel['produk']; ?></td>
            <td>
                <a href="#">Edit</a> |
                <a href="#">Delete</a>
            </td>
        </tr>
        <?php $x++; ?>
    <?php endforeach; ?>

    </table>

</body>

</html>
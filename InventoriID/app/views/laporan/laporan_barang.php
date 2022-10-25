<?php
session_start();

if(!isset($_SESSION['login'])) {
    header("Location: ../login/login.php");
}

require "../../controllers/laporan.php";

$query = mysqli_query($conn, "SELECT tb_barang_masuk.kd_barang_masuk, tb_barang_masuk.nama_barang_masuk,
tb_barang_masuk.jenis, tb_barang_masuk.asal_barang, tb_barang_masuk.jumlah_masuk, tb_barang_masuk.tanggal_masuk,
tb_barang_keluar.tanggal_keluar, tb_barang_keluar.jumlah_keluar, tb_barang_keluar.tanggal_keluar 
FROM tb_barang_masuk, tb_barang_keluar WHERE tb_barang_masuk.nama_barang_masuk = tb_barang_keluar.nama_barang_keluar");

// Tombol search ditekan
if (isset($_POST["cariBarang"])) {
    $query = cariBarang($_POST["keyword"]);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../../../src/css/table.css">
    <title>Barang Masuk</title>
</head>
<body>
    <nav class="navbar navbar-expand-md navbar-dark bg-danger p-1 position-absolute top-0 start-0 end-0">
        <div class="container-fluid">
            <a class="navbar-brand" href="../../../index.php" style="font-size: 17px;">
                <img src="../../../src/img/INVENTORY.png" alt="" width="30px">
                InventoriID 
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class=" collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="../../../index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../barang/stok_barang.php">Stok Barang</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../barang_masuk/barang_masuk.php">Barang Masuk</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../barang_keluar/barang_keluar.php">Barang keluar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link  active text-light" href="laporan_barang.php">Laporan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../user/user.php">User</a>
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item mx-1">
                        <a class="nav-link active text-light" style="font-size: 12;">Hai, <?php echo $_SESSION['username']; ?></a>
                    </li>
                    <li class="nav-item mx-1">
                        <a href="../login/logout.php">
                            <button type="button" class="btn btn-sm btn-light btn-outline-warning mt-1"><i class="bi bi-box-arrow-in-right"></i></button>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <br><br>
    <div class="container-md mt-5">
        <h3 style="text-align: center;">Laporan Barang</h3>
        <br>
        <div class="table-responsive mt-5">
            <table class="table table-danger table-striped table-bordered border-danger" style="text-align: center; vertical-align: middle;">
                <tr>
                    <th>No.</th>
                    <th>Kode Barang</th>
                    <th>Nama Barang</th>
                    <th>Jenis Barang</th>
                    <th>Asal Barang</th>
                    <th>Jumlah Masuk</th>
                    <th>Tanggal Masuk</th>
                    <th>Jumlah Keluar</th>
                    <th>Tanggal Keluar</th>
                </tr>
                <?php $i = 1; ?>
                <?php foreach ($query as $row) :
                    $tanggal_masuk = $row['tanggal_masuk'];
                    $date_masuk = new DateTime($tanggal_masuk);
                    $tanggal_keluar = $row['tanggal_keluar'];
                    $date_keluar = new DateTime($tanggal_keluar);?>
                    <tr>
                        <td><?= $i++; ?></td>
                        <td><?= $row["kd_barang_masuk"]; ?></td>
                        <td><?= $row["nama_barang_masuk"]; ?></td>
                        <td><?= $row["jenis"]; ?></td>
                        <td><?= $row["asal_barang"]; ?></td>
                        <td><?= $row["jumlah_masuk"]; ?></td>
                        <td><?= $date_masuk->format('d-m-Y'); ?></td>
                        <td><?= $row["jumlah_keluar"]; ?></td>
                        <td><?= $date_keluar->format('d-m-Y'); ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
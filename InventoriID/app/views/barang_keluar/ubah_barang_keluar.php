<?php
session_start();

if (!isset($_SESSION["login"])) {
    header("Location: ../login/login.php");
    exit;
}

require '../../controllers/barang_keluar.php';

// Mengambil data di URL
$id_barang_keluar = $_GET["id_barang_keluar"];
$barang = query("SELECT * FROM tb_barang_keluar WHERE id_barang_keluar = $id_barang_keluar")[0];
?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">
    <title>Ubah Barang Keluar</title>
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
                        <a class="nav-link" href="../../index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../barang/stok_barang.php">Stok Barang</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../barang_masuk/barang_masuk.php">Barang Masuk</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active text-light" href="barang_keluar.php">Barang keluar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../laporan/laporan_barang.php">Laporan</a>
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
    <br><br><br>
    <!-- Navbar -->
    <div class="card mt-4 offset-sm-4 col-sm-4">
        <h5 class="card-header bg-danger text-center text-white">Ubah Barang Keluar</h5>
        <div class="card-body">
            <!-- Form Add Data -->
            <div class="container-sm">
                <form action="" method="POST">
                    <input type="hidden" name="id_barang_keluar" value="<?= $barang["id_barang_keluar"]; ?>">
                    <div class="mb-2">
                        <label for="kd_barang_keluar" class="form-label">Kode Barang</label>
                        <input type="text" class="form-control" name="kd_barang_keluar" placeholder="Masukkan kode barang" required value="<?= $barang["kd_barang_keluar"]; ?>">
                    </div>
                    <div class="mb-2">
                        <label for="nama_barang_keluar" class="form-label">Nama Barang</label>
                        <input type="text" class="form-control" name="nama_barang_keluar" placeholder="Masukkan nama barang" required value="<?= $barang["nama_barang_keluar"]; ?>">
                    </div>
                    <div class="row g-3 mb-2">
                        <div class="col-md-6">
                            <label for="jenis" class="form-label">Jenis Barang</label>
                            <select class="form-select" name="jenis">
                                <option selected><?= $barang['jenis']; ?></option>
                                <option value="Elektronik">Elektronik</option>
                                <option value="Aksesoris">Aksesoris</option>
                                <option value="Pakaian">Pakaian</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="jumlah_keluar" class="form-label">Jumlah Barang Keluar</label>
                            <input type="number" class="form-control" name="jumlah_keluar" placeholder="Masukkan jumlah" required value="<?= $barang["jumlah_keluar"]; ?>">
                        </div>
                    </div>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                        <button class="btn btn-danger mt-2" type="button"><a href="barang_keluar.php" style="text-decoration: none; color: #ffff;">Kembali</a></button>
                        <button type="submit" name="submit" class="btn btn-danger mt-2" type="button">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        <?php
        // Tambah Guru
        if (isset($_POST["submit"])) {
            // Cek apakah data berhasil ditambahkan atau tidak
            if (ubahBarang($_POST) > 0) {
        ?>
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil!',
                    text: 'Data Berhasil Diubah'
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.location.href = 'barang_keluar.php';
                    }
                })
        <?php
            } else {
                echo "
                <script>
                    alert('Data Gagal diubah!');
                </script>
                ";
            }
        }
        ?>
    </script>
</body>
</html>
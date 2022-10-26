<?php
session_start();

if (!isset($_SESSION['login'])) {
    header("Location: ../login/login.php");
    exit;
}

require "../../controllers/barang_masuk.php";

$query_barang = query("SELECT * FROM tb_barang_masuk");

// Tombol search ditekan
if (isset($_POST["cariBarang"])) {
    $query_barang = cariBarang($_POST["keyword"]);
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
                        <a class="nav-link active text-light" href="barang_masuk.php">Barang Masuk</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../barang_keluar/barang_keluar.php">Barang keluar</a>
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
    <br><br>
    <div class="container-md mt-5">
        <h3 style="text-align: center;">Data Barang Masuk</h3>
        <br>
        <div class="mt-4 offset-sm-0 col-sm-3 py-1">
            <form action="" method="POST" class="d-flex">
                <input class="form-control me-2" type="text" name="keyword" placeholder="Masukkan pencarian" autocomplete="off">
                <button class="btn btn-danger btn-outline-warning text-white" type="submit" name="cariBarang">
                    Search
                </button>
            </form>
            <div class="py-2">
                <button type="button" class="btn btn-md btn-danger btn-outline-warning text-white" data-bs-toggle="modal" data-bs-target="#tambahModal">
                    <i class="bi bi-plus-circle" style="color: white; text-decoration: none; font-style: normal;">
                        Tambah Barang
                    </i>
                </button>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-danger table-striped table-bordered border-danger" style="text-align: center; vertical-align: middle;">
                <tr>
                    <th>No.</th>
                    <th>Kode Barang</th>
                    <th>Nama Barang</th>
                    <th>Jenis Barang</th>
                    <th>Asal Barang</th>
                    <th>Tanggal Masuk</th>
                    <th>Waktu</th>
                    <th>Jumlah Masuk</th>
                    <th>Fitur</th>
                </tr>
                <?php $i = 1; ?>
                <?php foreach ($query_barang as $row) :
                    $tanggal_masuk = $row['tanggal_masuk'];
                    $date = new DateTime($tanggal_masuk); ?>
                    <tr>
                        <td><?= $i++; ?></td>
                        <td><?= $row["kd_barang_masuk"]; ?></td>
                        <td><?= $row["nama_barang_masuk"]; ?></td>
                        <td><?= $row["jenis"]; ?></td>
                        <td><?= $row["asal_barang"]; ?></td>
                        <td><?= $row["jumlah_masuk"]; ?></td>
                        <td><?= $date->format('d-m-Y'); ?></td>
                        <td><?= $date->format('H:i:s'); ?></td>
                        <td>
                            <a href="ubah_barang_masuk.php?id_barang_masuk=<?= $row["id_barang_masuk"]; ?>">
                                <button type="button" class="btn btn-sm btn-danger btn-outline-warning">
                                    <i class="bi bi-pencil-square" style="color: white; font-style: normal;"> Ubah</i>
                                </button>
                            </a>
                            <a href="hapus_barang_masuk.php?id_barang_masuk=<?= $row["id_barang_masuk"]; ?>" id="btn-hapus">
                                <button type="button" class="btn btn-sm btn-danger btn-outline-warning">
                                    <i class="bi bi-lg bi-trash" style="color: white; font-style:normal"> Hapus</i>
                                </button>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
        <!-- Tambah Modal-->
        <div class="modal fade mt-4" id="tambahModal" tabindex="-1">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Tambah Barang masuk</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="" method="POST">
                            <div class="mb-2">
                                <label for="kd_barang_masuk" class="form-label">Kode Barang masuk</label>
                                <input type="text" class="form-control" name="kd_barang_masuk" placeholder="Masukkan kode barang" required>
                            </div>
                            <div class="mb-2">
                                <label for="nama_barang_masuk" class="form-label">Nama Barang</label>
                                <input type="text" class="form-control" name="nama_barang_masuk" placeholder="Masukkan nama barang" required>
                            </div>
                            <div class="row g-3 mb-2">
                                <div class="col-md-6">
                                    <label for="jenis" class="form-label">Jenis Barang</label>
                                    <select class="form-select" name="jenis">
                                        <option selected>Pilih Jenis Barang</option>
                                        <option value="Elektronik">Elektronik</option>
                                        <option value="Aksesoris">Aksesoris</option>
                                        <option value="Pakaian">Pakaian</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="asal_barang" class="form-label">Asal Barang</label>
                                    <input type="text" class="form-control" name="asal_barang" placeholder="Masukkan asal barang" required>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="jumlah_masuk" class="form-label">Jumlah Barang masuk</label>
                                <input type="number" class="form-control" name="jumlah_masuk" placeholder="Masukkan jumlah" required>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                <button type="submit" name="submit" class="btn btn-danger btn-outline-warning text-white">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).on('click', '#btn-hapus', function(e) {
            e.preventDefault();
            var link = $(this).attr('href');
            Swal.fire({
                title: 'Apakah kamu yakin?',
                text: "Data akan dihapus!",
                icon: 'warning',
                confirmButtonText: 'Hapus',
                cancelButtonText: 'Batal',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33'
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil!',
                        text: 'Data Berhasil Dihapus',
                    }).then((result) => {
                        if (result.isConfirmed) {
                            document.location.href = link;
                        }
                    })
                }
            })
        })

        <?php
        // Tambah Guru
        if (isset($_POST["submit"])) {
            // Cek apakah data berhasil ditambahkan atau tidak
            if (tambahBarang($_POST) > 0) {
        ?>
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil!',
                    text: 'Data Berhasil Ditambahkan'
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.location.href = 'barang_masuk.php';
                    }
                })
        <?php
            } else {
                echo "
                <script>
                    alert('Data Gagal ditambahkan!');
                </script>
                ";
                }
            }
        ?>
    </script>
</body>
</html>
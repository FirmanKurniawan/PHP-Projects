<?php
session_start();

if(!isset($_SESSION['login'])) {
    header("Location: ../login/login.php");
}

require '../../controllers/login.php';

$query = query("SELECT * FROM tb_login");

// Tombol search ditekan
if (isset($_POST["cariBarang"])) {
    $query = search($_POST["keyword"]);
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
            <button class="navbar-toggler" type="button" data-bs-toggle="collap se" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
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
                        <a class="nav-link" href="../laporan/laporan_barang.php">Laporan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active text-light" href="user.php">User</a>
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
        <h3 style="text-align: center;">Data User Login</h3>
        <br>
        <div class="mt-4 offset-sm-0 col-sm-3 py-1">
            <form action="" method="POST" class="d-flex">
                <input class="form-control me-2" type="text" name="keyword" placeholder="Masukkan pencarian" autocomplete="off">
                <button class="btn btn-danger btn-outline-warning text-white" type="submit" name="cariBarang">
                    Search
                </button>
            </form>
        </div>
        <div class="table-responsive mt-3">
            <table class="table table-danger table-striped table-bordered border-danger" style="text-align: center; vertical-align: middle;">
                <tr>
                    <th>No.</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Username</th>
                    <th>Fitur</th>
                </tr>
                <?php $i = 1; ?>
                <?php foreach ($query as $row) : ?>
                    <tr>
                        <td><?= $i++; ?></td>
                        <td><?= $row["nama"]; ?></td>
                        <td><?= $row["email"]; ?></td>
                        <td><?= $row["username"]; ?></td>
                        <td>
                            <a href="hapus_user.php?id_user=<?= $row["id_user"]; ?>" id="btn-hapus">
                                <button type="button" class="btn btn-sm btn-danger btn-outline-warning">
                                    <i class="bi bi-lg bi-trash" style="color: white; font-style:normal"> Hapus</i>
                                </button>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
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
                    text: 'Data Berhasil Disimpan',
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.location.href = 'stok_barang.php';
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
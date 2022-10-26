<?php
session_start();

if (!isset($_SESSION['login'])) {
    header("Location: ./app/views/login/login.php");
    exit;
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
    <link rel="stylesheet" href="./src/css/home.css">
    <title>Home</title>
</head>
<body>
    <main class="p-5 py-5 p-sm-5 min-vh-100 bg-main d-flex flex-column-reverse flex-md-row align-items-center justify-content-center justify-content-md-between">
        <section class="container-md">
            <h1 class="d-flex flex-column text-white fw-bold fs-4">
                Selamat datang <?php echo $_SESSION['username']; ?> di InventoriID
                <span class="mt-2 fw-normal text-small"> InventoriID adalah gudang penyimpanan untuk berbagai barang</span>
            </h1>
            <p class="text-white text-small">
                Sudah melihat barang di InventoriID?
                <br>
                <span class="text-white"> Jika belum, silahkan pilih
                <br>
                <a class="btn btn-danger text-capitalize d-inline-block mt-3" href="./app/views/barang/stok_barang.php">Stok Barang</a>
                <a class="btn btn-danger text-capitalize d-inline-block mt-3" href="./app/views/barang_masuk/barang_masuk.php">Barang Masuk</a>
                <a class="btn btn-danger text-capitalize d-inline-block mt-3" href="./app/views/barang_keluar/barang_keluar.php">Barang Keluar</a>
            </p>
        </section>
        <div>
            <img class="img-main mt-2 me-4" src="./src/img/INVENTORY.png" alt="inventori" style="max-width: 33rem;">
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php
session_start();

require '../../controllers/login.php';

if (isset($_POST["login"])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $result = mysqli_query($conn, "SELECT * FROM tb_login WHERE username = '$username'");

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row['password'])) {
            $_SESSION["login"] = true;
            $_SESSION['username'] = $username;
            echo "
            <script>
                alert('Berhasil login!');
                document.location.href = '../../../index.php';
            </script>
            ";
            exit;
        }
    }
    $error = true;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CDN Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- script JQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <!-- CDN Sweetalert -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="../../../src/css/login.css">
    <title>Login Inventori</title>
</head>
<body>
    <section>
        <div class="imgBx bg-primary">
            <img src="../../../src/img/INVENTORY.png" alt="backgroundForm" class="">
        </div>
        <div class="contentBx">
            <div class="formBx">
                <h2 class="mt-4 ">Login</h2>
                <?php if (isset($error)) : ?>
                    <script>
                    Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Username atau Password salah!'
                  });
                  </script>
                <?php endif; ?>
                <form action="" method="POST">
                    <div class="inputBx">
                        <label for="username" class="label">Username</label>
                        <input type="text" name="username" id="username" required>
                    </div>
                    <div class="inputBx">
                        <label for="password" class="label">Password</label>
                        <input type="password" name="password" id="password">
                    </div>
                    <div class="remember">
                        <label><input type="checkbox" name="">Remember me</label>
                    </div>
                    <div class="inputBx">
                        <input type="submit" class="tombol" name="login" id="login" value="Login">
                    </div>
                    <div class="inputBx">
                        <p>Tidak memiliki akun? <a href="registrasi.php" data-bs-toggle="modal" data-bs-target="#registrasi_modal"> Registrasi</a></p>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <!-- Modal registrasi -->
    <div class="modal fade mt-3" id="registrasi_modal" tabindex="-1">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #03a9f4;">
                    <h5 class="modal-title">Registrasi Akun</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="POST">
                        <div class="mb-2">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukkan nama" required>
                        </div>
                        <div class="mb-2">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="Masukkan email" required>
                        </div>
                        <div class="mb-2">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" name="username" id="username" placeholder="Masukkan username" required>
                        </div>
                        <div class="row g-3 mb-3">
                            <div class="col-md-6">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" name="password" id="password" placeholder="Masukkan password" required>
                            </div>
                            <div class="col-md-6">
                                <label for="password2" class="form-label">Konfirm Password</label>
                                <input type="password" class="form-control" name="password2" id="password2" placeholder="Masukkan ulang password" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary float-end" data-bs-dismiss="modal">Batal</button> 
                            <button type="submit" name="regist" class="btn btn-primary float-end ms-1 btn-outline-info text-white">Daftar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
    <?php
        if(isset($_POST["regist"])) {
            if (registrasi($_POST) > 0) {
            ?>
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil!',
                    text: 'Registrasi berhasil, silahkan lakukan login!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.location.href = 'login.php';
                    }
                });
            <?php
            } else {
                echo  "
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
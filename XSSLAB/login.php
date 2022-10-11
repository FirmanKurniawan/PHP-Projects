<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- Custom CSS -->
    <style>

    html, body {
        height: 100%;
        background-color: #222d32 !important;
    }

    .global-container {
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .login-form {
        width: 380px;
        height: 410px;
        padding: 30px;
        border-radius: 10px;
    }

    </style>

    <title>LOGIN PAGE</title>
  </head>
  <body>

    <?php
      if (isset($_GET['pesan'])) {
        if ($_GET['pesan'] == 'gagal') {
          echo '<script>alert("Login gagal, cek ulang username / password")</script>';
        } else if ($_GET['pesan'] == 'logout') {
          echo '<script>alert("Berhasil logout")</script>';
        } else if ($_GET['pesan'] == 'belum_login') {
          echo '<script>alert("Silahkan login terlebih dahulu")</script>';
        }
      }
    ?>

  <?php
      if (isset($_GET['status'])) {
        if ($_GET['status'] == 'sukses') {
          echo '<script>alert("Daftar berhasil, silahkan login!")</script>';
        }
      } 
  ?>

    <div class="global-container">
        <div class="card login-form">
            <div class="card-body">
                <h1 class="card-title text-center">L O G I N</h1>
            </div>
            <div class="card-text">
                <form action="cek_login.php" method="POST">
                    <div class="mb-3">
                      <label class="form-label">Username</label>
                      <input type="text" class="form-control" name="username" required />
                    </div>
                    <div class="mb-3">
                      <label class="form-label">Password</label>
                      <input type="password" class="form-control" name="password" required />
                    </div>
                    <div class="d-grid gap-2">
                      <button class="btn btn-primary" type="submit">Login</button>
                    </div>
                    <p class="text-md-start mt-3">Dont have account? <a href="register.php">Register here.</p>
                  </form>
            </div>
        </div>
    </div>

  </body>
</html>
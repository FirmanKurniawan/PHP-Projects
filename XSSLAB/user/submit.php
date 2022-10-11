<?php
session_start();

if($_SESSION["status_login_admin"] != "true") {
    header("Location: /ukk/login.php?pesan=belum_login");
}
?>

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
          background-color: #222d32 !important;
      }

      .global-container {
          height: 100%;
          display: flex;
          align-items: center;
          justify-content: center;
          padding-top: 70px;
          
      }

      .submit-form {
          width: 500px;
          height: 500px;
          padding: 30px;
          border-radius: 10px;

      }

      .card-title {
        padding-top: 20px;
      }

      .center {
        display: block;
        margin-left: auto;
        margin-right: auto;
      }
    </style>

    <title>SUBMIT FLAG</title>
  </head>
  <body>

  <?php
      if (isset($_GET['pesan'])) {
        if ($_GET['pesan'] == 'benar') {
          echo '<script>alert("CONGRATZ YOU GOT THE FLAG!!")</script>';
        } elseif ($_GET['pesan'] == 'already') {
          echo '<script>alert("FLAG SUDAH DICAPTURE!")</script>';
        } elseif ($_GET['pesan'] == 'salah') {
          echo '<script>alert("FLAG SALAH!")</script>';
        }
      } 
  ?>

    <div class="global-container">
        <div class="card submit-form">
            <div class="card-body">
                <img src="/ukk/user/img/flag.png" class="img-fluid center" alt="Flag" width="80px" height="80px">
                <h1 class="card-title text-center">SUBMIT YOUR FLAG</h1>
            </div>
            <div class="card-text">
                <form action="check_flag.php" method="POST">
                    <div class="mb-3">
                      <label class="form-label">LEVEL</label>
                      <input type="text" class="form-control" name="level" placeholder="ex: LEVEL1" required />
                    </div>
                    <div class="mb-3">
                      <label class="form-label">FLAG</label>
                      <input type="text" class="form-control" name="flags" required />
                    </div>
                    <div class="d-grid gap-2">
                      <button class="btn btn-primary" type="submit">Submit</button>
                    </div>
                    <p class="text-md-center mt-3 "><a href="dashboard.php">Back to dashboard</p>
                  </form>
            </div>
        </div>
    </div>

  </body>
</html>
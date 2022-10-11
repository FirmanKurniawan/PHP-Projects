<?php
include("config.php");
include("proses_daftar.php")

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
    height: 100%;
    background-color: #222d32 !important;
    }

    .global-container {
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .register-form {
    width: 400px;
    height: 580px;
    padding: 30px;
    border-radius: 10px;
  }
    </style>

    <title>REGISTER PAGE</title>
  </head>
  <body>


    <div class="global-container">
        <div class="card register-form">
            <div class="card-body">
                <h1 class="card-title text-center">R E G I S T E R</h1>
            </div>
            <div class="card-text">
                 <form action="proses_daftar.php" method="POST">
                    <div class="mb-3">
                      <label class="form-label">Username</label>
                      <input type="text" class="form-control" id="Username" name="username" required />
                      <p style="display: none; color: #FF2709;" id="user">Username already taken!</p>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="text" class="form-control" id="Email" name="email" required />
                        <p style="display: none; color: #FF2709;" id="email">Email already taken!</p>
                    </div>
                    <div class="mb-3">
                      <label class="form-label">Password</label>
                      <input type="password" class="form-control" id="Password" name="userpass" required />
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" id="ConfirmPassword" name="userpass_confirm" required />
                      </div>
                    <div class="d-grid gap-2">
                      <button class="btn btn-primary" type="submit" name="daftar">Submit</button>
                    </div>
                    <p class="text-md-start mt-3">Already have account? <a href="login.php">Login here.</p>
                  </form>
            </div>
        </div>
    </div>

    <script>
      var x = document.getElementById("user");
      if (window.location.href.indexOf("user_exist") > -1) {
        x.style.display = "block";
      }

      var z = document.getElementById("email");
      if (window.location.href.indexOf("email_exist") > -1) {
        z.style.display = "block"
      }

    </script>

  </body>
</html>
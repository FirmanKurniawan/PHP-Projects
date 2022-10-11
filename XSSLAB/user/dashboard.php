<?php
session_start();

if(time()-$_SESSION["login_time_stamp"] > 3600) {
  session_unset();
  session_destroy();
  header("Location:/ukk/login.php");
}


include("/xampp/htdocs/ukk/config.php");

if($_SESSION["status_login_admin"] != "true") {
    header("Location: /ukk/login.php?pesan=belum_login");
}

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="dash.css">

    <title>Dashboard</title>
  </head>
  <body>
    
    <div class="container navigasi">
        <div class="row">
            <div class="col-md-12">
                <nav class="navbar navbar-expand-lg navbar-dark">
                    

                    <a class="navbar-brand" href="/ukk/index.php">Home</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav active ml-auto menu">
                        <li class="nav-item active">
                        <a class="nav-link submit" href="users.php">Users</a>
                        </li>
                        <li class="nav-item active">
                        <a class="nav-link submit" href="scoreboard.php">Scoreboard</a>
                        </li>
                        <li class="nav-item active">
                        <a class="nav-link submit" href="dashboard.php">Challenges</a>
                        </li>
                        <li class="nav-item active">
                        <a class="nav-link btn text-center" href="logout.php">Logout</a>
                        </li>
                    </ul>
                    </div>

                
                </nav>
            </div>
        </div>
    </div>

    <?php 

    $username = $_SESSION["username_admin"];
    $scorenya = "SELECT score FROM user_score WHERE username = '$username'";
    $data = mysqli_query($db, $scorenya);
    $cek = mysqli_num_rows($data);

    $yaa = mysqli_fetch_array($data);
    $string = $yaa[0];

    ?>

    <?php 

      $hijausatu = mysqli_query($db, "SELECT * FROM solved WHERE username = '$username' AND solved_level = 'LEVEL1'");
      $gas1 = mysqli_num_rows($hijausatu);

      $hijaudua = mysqli_query($db, "SELECT * FROM solved WHERE username = '$username' AND solved_level = 'LEVEL2'");
      $gas2 = mysqli_num_rows($hijaudua);

      $hijautiga = mysqli_query($db, "SELECT * FROM solved WHERE username = '$username' AND solved_level = 'LEVEL3'");
      $gas3 = mysqli_num_rows($hijautiga);

      $hijauempat = mysqli_query($db, "SELECT * FROM solved WHERE username = '$username' AND solved_level = 'LEVEL4'");
      $gas4 = mysqli_num_rows($hijauempat);

      $hijaulima = mysqli_query($db, "SELECT * FROM solved WHERE username = '$username' AND solved_level = 'LEVEL5'");
      $gas5 = mysqli_num_rows($hijaulima);
    
    ?>



    <div class="jumbotron jumbotron-fluid">
      <div class="container">
        <img src="img/jumbo.png" alt="Hack" class="img-fluid">
        <div class="row justify-content-center">
          <div class="col-md-4 info">
            <h3>Hello <?php echo $_SESSION["username_admin"] ?></h3>
            <?php
                if ($cek === 0) {
                    echo "<p> Your score is 0";
                } else {
                    echo "<p> Your score is $string</p>";
                }
            ?>
          </div>
        </div>
      </div>
    </div>

    <div class="container judul">
      <div class="row">
        <div class="col-md-6 offset-md-3">
          <h2>CHALLENGE</h2>
        </div>
      </div>
    </div>

    <div class="container chall">
      <div class="row">
        <div class="col-md-3">
          <?php 
            if ($gas1 > 0 ) { ?>
            <div class="card mb-4" style="background-color: #59F66E;">
              <div class="card-body text-center">
                  <h5 class="card-title" style="color: white;">LEVEL 1</h5>
                  <a href="/ukk/xss/xss1.php" class="btn btn-primary">Click Here</a>
                  <p style="color: #0B8640; padding-top: 10px; font-weight: 400; margin-bottom: -10px;">Solved</p>
              </div>
            </div>
          <?php } else { ?>
          <div class="card mb-4">
            <div class="card-body text-center">
                <h5 class="card-title">LEVEL 1</h5>
                <a href="/ukk/xss/xss1.php" class="btn btn-primary">Click Here</a>
            </div>
          </div>
          <?php } ?>
        </div>

        <div class="col-md-3 ml-3">
          <?php 
            if ($gas2 > 0 ) { ?>
            <div class="card mb-4" style="background-color: #59F66E;">
              <div class="card-body text-center">
                  <h5 class="card-title" style="color: white;">LEVEL 2</h5>
                  <a href="/ukk/xss/xss2.php" class="btn btn-primary">Click Here</a>
                  <p style="color: #0B8640; padding-top: 10px; font-weight: 400; margin-bottom: -10px;">Solved</p>
              </div>
            </div>
          <?php } else { ?>
          <div class="card mb-4">
            <div class="card-body text-center">
                <h5 class="card-title">LEVEL 2</h5>
                <a href="/ukk/xss/xss2.php" class="btn btn-primary">Click Here</a>
            </div>
          </div>
          <?php } ?>
        </div>

        <div class="col-md-3 ml-3">
          <?php 
            if ($gas3 > 0 ) { ?>
            <div class="card mb-4" style="background-color: #59F66E;">
              <div class="card-body text-center">
                  <h5 class="card-title" style="color: white;">LEVEL 3</h5>
                  <a href="/ukk/xss/xss3.php" class="btn btn-primary">Click Here</a>
                  <p style="color: #0B8640; padding-top: 10px; font-weight: 400; margin-bottom: -10px;">Solved</p>
              </div>
            </div>
          <?php } else { ?>
          <div class="card mb-4">
            <div class="card-body text-center">
                <h5 class="card-title">LEVEL 3</h5>
                <a href="/ukk/xss/xss3.php" class="btn btn-primary">Click Here</a>
            </div>
          </div>
          <?php } ?>
        </div>
      </div>



      <div class="row">
        <div class="col-md-3">
          <?php 
            if ($gas4 > 0 ) { ?>
            <div class="card mb-4" style="background-color: #59F66E;">
              <div class="card-body text-center">
                  <h5 class="card-title" style="color: white;">LEVEL 4</h5>
                  <a href="/ukk/xss/xss4.php" class="btn btn-primary">Click Here</a>
                  <p style="color: #0B8640; padding-top: 10px; font-weight: 400; margin-bottom: -10px;">Solved</p>
              </div>
            </div>
          <?php } else { ?>
          <div class="card mb-3 mr-2">
            <div class="card-body text-center">
                <h5 class="card-title">LEVEL 4</h5>
                <a href="/ukk/xss/xss4.php" class="btn btn-primary">Click Here</a>
            </div>
          </div>
          <?php } ?>
        </div>

        <div class="col-md-3">
          <?php 
            if ($gas5 > 0 ) { ?>
            <div class="card mb-4" style="background-color: #59F66E;">
              <div class="card-body text-center">
                  <h5 class="card-title" style="color: white;">LEVEL 5</h5>
                  <a href="/ukk/xss/xss5.php" class="btn btn-primary">Click Here</a>
                  <p style="color: #0B8640; padding-top: 10px; font-weight: 400; margin-bottom: -10px;">Solved</p>
              </div>
            </div>
          <?php } else { ?>
          <div class="card mb-3 ml-2">
            <div class="card-body text-center">
                <h5 class="card-title">LEVEL 5</h5>
                <a href="/ukk/xss/xss5.php" class="btn btn-primary">Click Here</a>
            </div>
          </div>
          <?php } ?>
        </div>
      </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->
  </body>
</html>
<?php
error_reporting(0);
session_start();
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="about.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>XSS LAB</title>
  </head>
  <body>
   
    <!-- Navbar -->
    <?php if($_SESSION["status_login_admin"] != "true") { ?>
    <div class="container atas">
        <div class="row">
            <div class="col-md-12">
                <nav class="navbar navbar-expand-lg navbar-dark">
                    
                    <a class="navbar-brand" href="index.php">Home</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav active ml-auto menu">
                        <li class="nav-item active">
                        <a class="nav-link ml-2" href="about.php">About</a>
                        </li>
                        <li class="nav-item active">
                        <a class="nav-link ml-2" href="login.php" target="_blank">Login</a>
                        </li>
                        <li class="nav-item active">
                        <a class="nav-link ml-2" href="register.php" target="_blank">Register</a>
                        </li>
                    </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <?php } ?>

    <?php if($_SESSION["status_login_admin"] == "true") { ?>
    <div class="container atas">
        <div class="row">
            <div class="col-md-12">
                <nav class="navbar navbar-expand-lg navbar-dark">
                    

                    <a class="navbar-brand" href="index.php">Home</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav active ml-auto menu">
                    <style>
                        .atas .btn {
                        font-weight: 600;
                        border-radius: 20px;
                        background-color: rgb(37, 106, 233);

                    }

                    .atas .btn:hover {
                        background-color:  rgb(106, 156, 250) !important;
                    }

                    </style>
                    <li class="nav-item active">
                        <a class="nav-link btn text-center" href="user/logout.php">Logout</a>
                    </li>
                    </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <?php } ?>
    
    <!-- Text tengah -->
    <div class="container tengah">
        <div class="row">
            <div class="col-md-8 offset-md-2 tentang">
                <h2>About This Site</h2>
                <p>XSS LAB adalah situs yang dirancang memiliki vulnerability XSS atau Cross Site Scripting.
                <br>Situs ini gabungan dengan Hack Lab dan Capture The Flag yang dimana bila setiap user menyelesaikan
                challenge akan diberi sebuah poin.
                Terdapat beberapa challenge dengan level yang berbeda - beda, tentunya user dengan score tertinggi akan
                masuk pada Top 10 besar.
                </p>
                <br>
                <h5>Thanks to:</h5>
                <h6>Muhammad Daffa <br>(Cybersecurity Professional)</h6>
                <h6 class="konteng">Arya Rizky Tri Putra <br>(Fullstack Developer)</h6>
            </div>
        </div>
    </div>


    <!-- Bawah -->
    <div class="container bawah"></div>
        <div class="row footer">
            <div class="col text-center">
                <p>Created by Tunas Abdi Pranata XII-RPL</p>
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
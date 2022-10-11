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
    <style>
        body {
            background-color: #222d32;
        }

        .navigasi .menu .nav-item .submit:hover {
            color: #ACACAC !important;
        }

        .navigasi .nav-link {
            margin-left: 20px;
        }

        .navigasi .btn {
            font-weight: 600;
            border-radius: 20px;
            background-color: rgb(37, 106, 233);

        }

        .navigasi .btn:hover {
            background-color:  rgb(106, 156, 250) !important;
        }

        .header h2 {
            color: white;
            padding-top: 30px;
            margin-bottom: -40px;
            letter-spacing: 2px;
            
        }
        
        .container .info {
            margin-top: 15%;
            margin-bottom: 15%;
            margin-left: 50%;
            transform: (-15%, -50%);
            border-radius: 15px;
        }

        .page .pagination {
            margin-top: -40px;
            margin-left: -10px;
        }

    </style>


    <title>LIST USERS</title>
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
    

    <div class="container header">
        <div class="row">
            <div class="col-md-4 offset-md-4 text-center">
                <h2>LIST USERS</h2>
            </div>
        </div>
    </div>

        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-borderless table-light info text-center">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Username</th>
                            </tr>
                        </thead>
                        <?php
                            $batas = 10;
                            $halaman = isset($_GET['halaman'])?(int)$_GET['halaman'] : 1;
                            $halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;	
             
                            $previous = $halaman - 1;
                            $next = $halaman + 1;

                            $result = mysqli_query($db,"SELECT username FROM user");
                            $jumlah = mysqli_num_rows($result);
                            $total = ceil($jumlah/$batas);

                            $data_user = mysqli_query($db, "SELECT username FROM user LIMIT $halaman_awal, $batas");
                            $no = $halaman_awal+1;

                            while($row = mysqli_fetch_array($data_user)) {
                        ?>
                        <tbody>
                            <tr>
                                <th scope="row"><?php echo $no++;?></th>
                                <td><?php echo $row['username'];?></td>
                            </tr>
                        <?php } ?>
                     </table>
                </div>
            </div>
        </div>

        <div class="container page">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <nav>
                        <ul class="pagination">
                            <li class="page-item">
                                <a class="page-link" <?php if($halaman > 1){ echo "href='?halaman=$previous'"; } ?>>Previous</a>
                            </li>
                            <?php 
                            for($x=1;$x<=$total;$x++){
                                ?> 
                                <li class="page-item"><a class="page-link" href="?halaman=<?php echo $x ?>"><?php echo $x; ?></a></li>
                                <?php } ?>				
                            <li class="page-item">
                                <a  class="page-link" <?php if($halaman < $total) { echo "href='?halaman=$next'"; } ?>>Next</a>
                            </li>
                        </ul>
                    </nav>
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
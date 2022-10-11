<?php
session_start();

if(time()-$_SESSION["login_time_stamp"] > 3600) {
    session_unset();
    session_destroy();
    header("Location:/ukk/login.php");
}

if($_SESSION["status_login_admin"] != "true") {
    header("Location: /ukk/login.php?pesan=belum_login");
}
error_reporting(0);
header('X-XSS-Protection: 0');
$param = $_GET['query'];
include("/xampp/htdocs/ukk/config.php");
?>
<html>

<head>
    <title>Cross Site Scripting | Level 2</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

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
        
        .atas {
            padding-top: 30px;
        }

        .container .xss {
            background-color: white;
            border-radius: 15px;
            box-shadow: 0 3px 10px rgba(233, 233, 233, 0.5);
            margin-right: 20px;
            padding-bottom: 15px;
        }

        .container .xss h2 {
            padding-top: 10px;
            letter-spacing: 2px;
        }

        .container .xss a {
            float: right;
            margin-right: 5px;
        }

        .container .xss .previous {
            float: left;
            margin-left: 5px;
        }

        .container .flag {
            background-color: white;
            border-radius: 15px;
            box-shadow: 0 3px 10px rgba(233, 233, 233, 0.5);
            margin-left: 20px;
        }

        .container .flag h2 {
            padding-top: 10px;
            padding-bottom: 20px;
            letter-spacing: 2px;
        }

        .container .flag .btn {
            margin-top: 20px;
            margin-left: 50%;
            transform: translateX(-50%);
        }

        .bawah h2 {
            padding-top: 30px;
            color: white;
            letter-spacing: 2px;
        }

        .bawah .info {
            margin-top: 20px;
            border-radius: 15px;
            box-shadow: 0 3px 10px rgba(233, 233, 233, 0.5);
        }
    </style>

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
                        <a class="nav-link submit" href="/ukk/user/users.php">Users</a>
                        </li>
                        <li class="nav-item active">
                        <a class="nav-link submit" href="/ukk/user/scoreboard.php">Scoreboard</a>
                        </li>
                        <li class="nav-item active">
                        <a class="nav-link submit" href="/ukk/user/dashboard.php">Challenges</a>
                        </li>
                        <li class="nav-item active">
                        <a class="nav-link btn text-center" href="/ukk/user/logout.php">Logout</a>
                        </li>
                    </ul>
                    </div>

                    
                </nav>
            </div>
        </div>
    </div>



    <div class="container atas">
        <div class="row justify-content-center">
            <div class="col-md-5 xss">
                <h2 class="text-center">XSS Level 2</h2>
                <p>Try to alert using <b>document.URL</b></p>
                <button class="btn btn-primary mb-3" onclick="func()">Clue</button>
                <p id="clue" style="display:none">3 kind of popup boxes in javascript</p>
                <form class="form-inline my-2 my-lg-0" action="?query=" method="get">
                    <input class="form-control mr-sm-2" type="text" placeholder="keyword" name="query" id="query">
                    <button class="btn btn-primary my-2 my-sm-0" type="submit" onclick="check()">Search</button>
                </form>
                <br>
                <?php echo preg_replace(array('/alert/', '/prompt/'), '', $param) ?>
                <br>
                <b><a href="xss3.php">Next Level</a></b>
                <b><a href="xss1.php" class="previous">Previous Level</a></b>
            </div>

            <div class="col-md-5 flag">
                <h2 class="text-center">SUBMIT FLAG</h3>
                <iframe name="hiddenFrame" width="0" height="0" border="0" style="display: none;"></iframe>
                <form action="/ukk/user/check_flag.php" method="POST" target="hiddenFrame">
                      <input type="text" class="form-control" name="flags" placeholder="submit your flag here.." id="cekflag" required />
                      <button class="btn btn-primary" type="submit" onclick="flag()">Submit</button>
                </form>
            </div>
        </div>    
    </div>


    <div class="container bawah">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <h2 class="text-center">Solved List</h2>
                <table class="table table-borderless table-light info text-center">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Username</th>
                            </tr>
                        </thead>
                        <?php
                            $batas = 5;
                            $halaman = isset($_GET['halaman'])?(int)$_GET['halaman'] : 1;
                            $halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;	
             
                            $previous = $halaman - 1;
                            $next = $halaman + 1;

                            $result = mysqli_query($db,"SELECT username FROM solved WHERE solved_level = 'LEVEL2'");
                            $jumlah = mysqli_num_rows($result);
                            $total = ceil($jumlah/$batas);

                            $data_user = mysqli_query($db, "SELECT username FROM solved WHERE solved_level = 'LEVEL2' LIMIT $halaman_awal, $batas");
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
        <div class="row justify-content-center">
            <div class="col-md-5">
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



    <script>
        function func() {
            var x = document.getElementById("clue");
            if (x.style.display === "none") {
                x.style.display = "block";
            } else {
                x.style.display = "none";
            }
        }

        function check() {
            var y = document.getElementById("query");
            if (y.value === "<script>confirm(document.URL)<\/script>") {
                alert("The flag is : WADOOHEKERBANGET");
            } 
        }

        function flag() {
            var z = document.getElementById("cekflag");
            if (z.value != "WADOOHEKERBANGET") {
                alert("Wrong flag!");
            }
        }
    </script>   
</body>

</html>
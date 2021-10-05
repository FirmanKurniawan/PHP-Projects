<?php
    include 'classes/User.php';
    session_start();

    if (isset($_POST['btnLogin'])){
        $usr = new User;

        $usr->Login($_POST['txtUsername'],$_POST['txtPassword']);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="assets/css/base.css">
    <link rel="stylesheet" href="assets/css/login.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <title>Login ke TheShop</title>
</head>
<body class="lightgrey">
    <form action="" method="post" class="form-login">
        <h1 class="text-center title">
            TheShop
        </h1>

        <div class="input-group">
            <label for="">Username</label>
            <div class="inputs">
                <i class="icon fa fa-user"></i>
                <input type="text" name="txtUsername" placeholder="Username" class="form-control">
            </div>
            
        </div>
        <div class="input-group">
            <label for="">Password</label>
            <div class="inputs">
                <i class="icon fa fa-asterisk"></i>
                <input type="password" name="txtPassword" placeholder="Secret Password" class="form-control">
            </div>
        </div>
        <button type="submit" class="btn primary" name="btnLogin">Login</button>
        <a href="register.php" class="link">Nggk punya akun?</a>
    </form>
</body>
</html>
<?php
    include 'classes/User.php';

    if (isset($_POST['btnRegister'])){
        
    // print_r($_POST);
    // die();
        $fullname = $_POST['txtFullname'];
        $email = $_POST['txtEmail'];
        $username = $_POST['txtUsername'];
        $password = $_POST['txtPassword'];
        $phone = $_POST['txtPhone'];
        $address = $_POST['txtAlamat'];


        $usr = new User;
        $usr->Register($fullname,$email,$username,$password,$phone,$address);
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
    <title>Daftar ke TheShop</title>
</head>
<body class="lightgrey">
    <form action="" method="post" class="form-login">
        <h1 class="text-center title">
            Daftar akun
        </h1>

        <div class="input-group">
            <label for="">Nama Lengkap</label>
            <div class="inputs">
                <i class="icon fa fa-user-circle-o"></i>
                <input type="text" name="txtFullname" placeholder="Nama Lengkap" class="form-control">
            </div>
            
        </div>
        <div class="input-group">
            <label for="">Surel</label>
            <div class="inputs">
                <i class="icon fa fa-envelope"></i>
                <input type="text" name="txtEmail" placeholder="Surat elektronik" class="form-control">
            </div>
        </div>
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
        <div class="input-group">
            <label for="">Nomor telepon</label>
            <div class="inputs">
                <i class="icon fa fa-phone-square"></i>
                <input type="text" name="txtPhone" placeholder="Nomor telepon" class="form-control">
            </div>
        </div>
        <div class="input-group">
            <label for="">Alamat</label>
            <textarea id="" cols="30" rows="10" name="txtAlamat" placeholder="Alamat"></textarea>
        </div>
        
        <button type="submit" class="btn primary" name="btnRegister">Register</button>
        <a href="login.php" class="link">Punya akun?</a>
    </form>
</body>
</html>
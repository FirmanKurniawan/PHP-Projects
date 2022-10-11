<?php
include("config.php");

// check tombol daftar sudah di klik atau tidak
if(isset($_POST['daftar'])){

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['userpass'];
    $password_confirm = $_POST['userpass_confirm'];

    $sql_u = mysqli_query($db, "SELECT * FROM user WHERE username = '$username'");
    $sql_e = mysqli_query($db, "SELECT * FROM user WHERE email = '$email'");

    // bila password tidak sama
    if ($_POST['userpass'] !== $_POST['userpass_confirm']) {
        die('Password and Confirm password should match!');   
    } elseif (mysqli_num_rows($sql_u) > 0) { // username duplicate
        header('Location: register.php?status=user_exist');
    } elseif (mysqli_num_rows($sql_e) > 0) { // email duplicate
        header('Location: register.php?status=email_exist');
        // insert ke database
    } else {$sql = "INSERT INTO user (username, email, password) VALUES ('$username', '$email', '$password')";
    $query = mysqli_query($db, $sql);

         // apakah query simpan berhasil?
        if( $query ) {
            // kalau berhasil alihkan ke halaman login.phpS
            header('Location: login.php?status=sukses');
        } else {
            // kalau gagal tampilkan error
            echo "Error: " . $sql . ":-" . mysqli_error($db);
        }
    }

}
?>
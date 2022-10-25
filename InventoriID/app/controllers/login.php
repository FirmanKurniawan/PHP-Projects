<?php

// Koneksi ke database dengan variabel $conn
$conn = mysqli_connect("localhost","root","","db_inventory");

function query($query) {
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}

function registrasi($regist) {
    global $conn;

    $nama = htmlspecialchars(stripslashes($regist['nama']));
    $email = htmlspecialchars(stripslashes($regist['email']));
    $username = htmlspecialchars(stripslashes($regist['username']));
    $password = mysqli_real_escape_string($conn, $regist['password']);
    $password2 = mysqli_real_escape_string($conn, $regist['password2']);

    // Konfirm password
    if ($password !== $password2) {
        echo "<script>
        alert('Password dengan Konfirmasi Password tidak sesuai!');
        </script>";

        // Tidak melanjutkan ekseskusi
        return false; 
    }
    // Username tidak boleh duplikat
    $ResultUsername = mysqli_query($conn, "SELECT username from tb_login WHERE username = '$username'");
    
    if(mysqli_fetch_assoc($ResultUsername)) {
        echo "<script>
        alert('Akun yang dibuat sudah terdaftar');
        </script>";

        // Tidak melanjutkan eksekusi
        return false;
    }

    // Encrypt password
    $password = password_hash($password, PASSWORD_DEFAULT);
    mysqli_query($conn, "INSERT INTO tb_login VALUES('','$nama','$email','$username','$password')");

    return mysqli_affected_rows($conn);

}

function hapusUser($id_user) {
    global $conn;
    mysqli_query($conn, "DELETE FROM tb_login WHERE id_user = $id_user");
    return mysqli_affected_rows($conn);
}

function search($keyword) {
    $query = "SELECT * FROM tb_login WHERE
            nama LIKE '%$keyword%' OR
            username LIKE '%$keyword%' OR
            email LIKE '%$keyword%'
            ";
    return query($query);
}
?>
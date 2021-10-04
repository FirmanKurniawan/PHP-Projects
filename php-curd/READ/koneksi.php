<?php

//koneksi ke databse
$db = mysqli_connect("localhost", "root", "", "phpdasar");

function query($query) // function query dan ($query parameter memanggil sql SELECT) sebagai fungsi memanggil di index
{
    global $db; // global untuk mengambil variable di atas
    $result = mysqli_query($db, $query); // menampilkan data SELECT / menirim perintah  sql ke server sql untuk melakukan CURD
    $rows = []; // array kosong untuk tempat
    while ($row = mysqli_fetch_assoc($result)) { // loop untuk menampilkan semua data dari database
        $rows[] = $row; //
    }

    return $rows; // mengambalikan nilai $rows
}

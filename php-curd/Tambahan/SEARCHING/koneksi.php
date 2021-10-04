<?php

//koneksi ke databse
$db = mysqli_connect("localhost", "root", "", "phpdasar");

function query($query) // function query dan ($query parameter memanggil sql SELECT) sebagai fungsi memanggil di index
{
    global $db; // global untuk mengambil variable di atas
    $result = mysqli_query($db, $query); // menampilkan data SELECT / menirim perintah  sql ke server sql untuk melakukan CURD
    $rows = []; // array kosong untuk tempat
    while ($row = mysqli_fetch_assoc($result)) {  // loop untuk menampilkan semua data dari database
        $rows[] = $row; //
    }

    return $rows; // mengambalikan nilai $rows
}



function tambah($post)
{
    global $db;
    $id = htmlspecialchars($post["id"]);
    $nama = htmlspecialchars($post["nama"]);
    $usia = htmlspecialchars($post["usia"]);
    $merek = htmlspecialchars($post["merek"]);
    $produk = htmlspecialchars($post["produk"]);
    $gambar = htmlspecialchars($post["gambar"]);


    $query = "INSERT INTO data_pelanggan VALUES ('$id', '$nama', '$usia', '$merek', '$produk','$gambar')";
    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}


function hapus($id)
{

    global $db;
    mysqli_query($db, "DELETE FROM data_pelanggan WHERE id = $id");
    return mysqli_affected_rows($db);
}


function edit($data)
{
    global $db;
    $id = $data["id"];
    $nama = htmlspecialchars($data["nama"]);
    $usia = htmlspecialchars($data["usia"]);
    $merek = htmlspecialchars($data["merek"]);
    $produk = htmlspecialchars($data["produk"]);
    $gambar = htmlspecialchars($data["gambar"]);

    $query = "UPDATE data_pelanggan SET
    nama = '$nama', 
    usia = '$usia',
    merek = '$merek',
    produk = '$produk',
    gambar = '$gambar'
    WHERE id = $id;
    ";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

function cari($keyword)
{
    $query = "SELECT * FROM data_pelanggan WHERE 
    nama LIKE '%$keyword%' OR 
    usia LIKE '%$keyword%' OR 
    merek LIKE '%$keyword%' OR 
    produk LIKE '%$keyword%'
    ";

    return query($query);
}
